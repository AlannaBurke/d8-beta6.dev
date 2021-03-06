<?php

/**
 * @file
 * Contains \Drupal\config\Tests\ConfigInstallWebTest.
 */

namespace Drupal\config\Tests;

use Drupal\Core\Config\InstallStorage;
use Drupal\Core\Config\PreExistingConfigException;
use Drupal\Core\Config\StorageInterface;
use Drupal\language\Entity\ConfigurableLanguage;
use Drupal\simpletest\WebTestBase;
use Drupal\Core\Config\FileStorage;

/**
 * Tests installation and removal of configuration objects in install, disable
 * and uninstall functionality.
 *
 * @group config
 */
class ConfigInstallWebTest extends WebTestBase {

  /**
   * The admin user used in this test.
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->adminUser = $this->drupalCreateUser(array('administer modules', 'administer themes'));

    // Ensure the global variable being asserted by this test does not exist;
    // a previous test executed in this request/process might have set it.
    unset($GLOBALS['hook_config_test']);
  }

  /**
   * Tests module re-installation.
   */
  function testIntegrationModuleReinstallation() {
    $default_config = 'config_integration_test.settings';
    $default_configuration_entity = 'config_test.dynamic.config_integration_test';

    // Install the config_test module we're integrating with.
    \Drupal::service('module_installer')->install(array('config_test'));

    // Verify the configuration does not exist prior to installation.
    $config_static = $this->config($default_config);
    $this->assertIdentical($config_static->isNew(), TRUE);
    $config_entity = $this->config($default_configuration_entity);
    $this->assertIdentical($config_entity->isNew(), TRUE);

    // Install the integration module.
    \Drupal::service('module_installer')->install(array('config_integration_test'));

    // Verify that default module config exists.
    \Drupal::configFactory()->reset($default_config);
    \Drupal::configFactory()->reset($default_configuration_entity);
    $config_static = $this->config($default_config);
    $this->assertIdentical($config_static->isNew(), FALSE);
    $this->assertIdentical($config_static->get('foo'), 'default setting');
    $config_entity = $this->config($default_configuration_entity);
    $this->assertIdentical($config_entity->isNew(), FALSE);
    $this->assertIdentical($config_entity->get('label'), 'Default integration config label');

    // Customize both configuration objects.
    $config_static->set('foo', 'customized setting')->save();
    $config_entity->set('label', 'Customized integration config label')->save();

    // @todo FIXME: Setting config keys WITHOUT SAVING retains the changed config
    //   object in memory. Every new call to $this->config() MUST revert in-memory changes
    //   that haven't been saved!
    //   In other words: This test passes even without this reset, but it shouldn't.
    $this->container->get('config.factory')->reset();

    // Disable and uninstall the integration module.
    $this->container->get('module_installer')->uninstall(array('config_integration_test'));

    // Verify the integration module's config was uninstalled.
    $config_static = $this->config($default_config);
    $this->assertIdentical($config_static->isNew(), TRUE);

    // Verify the integration config still exists.
    $config_entity = $this->config($default_configuration_entity);
    $this->assertIdentical($config_entity->isNew(), FALSE);
    $this->assertIdentical($config_entity->get('label'), 'Customized integration config label');

    // Reinstall the integration module.
    try {
      \Drupal::service('module_installer')->install(array('config_integration_test'));
      $this->fail('Expected PreExistingConfigException not thrown.');
    }
    catch (PreExistingConfigException $e) {
      $this->assertEqual($e->getExtension(), 'config_integration_test');
      $this->assertEqual($e->getConfigObjects(), [StorageInterface::DEFAULT_COLLECTION => ['config_test.dynamic.config_integration_test']]);
      $this->assertEqual($e->getMessage(), 'Configuration objects (config_test.dynamic.config_integration_test) provided by config_integration_test already exist in active configuration');
    }

    // Delete the configuration entity so that the install will work.
    $config_entity->delete();
    \Drupal::service('module_installer')->install(array('config_integration_test'));

    // Verify the integration module's config was re-installed.
    \Drupal::configFactory()->reset($default_config);
    \Drupal::configFactory()->reset($default_configuration_entity);
    $config_static = $this->config($default_config);
    $this->assertIdentical($config_static->isNew(), FALSE);
    $this->assertIdentical($config_static->get('foo'), 'default setting');

    // Verify the integration config is using the default.
    $config_entity = \Drupal::config($default_configuration_entity);
    $this->assertIdentical($config_entity->isNew(), FALSE);
    $this->assertIdentical($config_entity->get('label'), 'Default integration config label');
  }

  /**
   * Tests install profile config changes.
   */
  function testInstallProfileConfigOverwrite() {
    $config_name = 'system.cron';
    // The expected configuration from the system module.
    $expected_original_data = array(
      'threshold' => array(
        'autorun' => 0,
        'requirements_warning' => 172800,
        'requirements_error' => 1209600,
      ),
    );
    // The expected active configuration altered by the install profile.
    $expected_profile_data = array(
      'threshold' => array(
        'autorun' => 0,
        'requirements_warning' => 259200,
        'requirements_error' => 1209600,
      ),
    );

    // Verify that the original data matches. We have to read the module config
    // file directly, because the install profile default system.cron.yml
    // configuration file was used to create the active configuration.
    $config_dir = drupal_get_path('module', 'system') . '/'. InstallStorage::CONFIG_INSTALL_DIRECTORY;
    $this->assertTrue(is_dir($config_dir));
    $source_storage = new FileStorage($config_dir);
    $data = $source_storage->read($config_name);
    $this->assertIdentical($data, $expected_original_data);

    // Verify that active configuration matches the expected data, which was
    // created from the testing install profile's system.cron.yml file.
    $config = $this->config($config_name);
    $this->assertIdentical($config->get(), $expected_profile_data);
  }

  /**
   * Tests pre-existing configuration detection.
   */
  public function testPreExistingConfigInstall() {
    $this->drupalLogin($this->adminUser);

    // Try to install config_install_fail_test and config_test. Doing this
    // will install the config_test module first because it is a dependency of
    // config_install_fail_test.
    // @see \Drupal\system\Form\ModulesListForm::submitForm()
    $this->drupalPostForm('admin/modules', array('modules[Testing][config_test][enable]' => TRUE, 'modules[Testing][config_install_fail_test][enable]' => TRUE), t('Save configuration'));
    $this->assertRaw('Unable to install Configuration install fail test, <em class="placeholder">config_test.dynamic.dotted.default</em> already exists in active configuration.');

    // Uninstall the config_test module to test the confirm form.
    $this->drupalPostForm('admin/modules/uninstall', array('uninstall[config_test]' => TRUE), t('Uninstall'));
    $this->drupalPostForm(NULL, array(), t('Uninstall'));

    // Try to install config_install_fail_test without selecting config_test.
    // The user is shown a confirm form because the config_test module is a
    // dependency.
    // @see \Drupal\system\Form\ModulesListConfirmForm::submitForm()
    $this->drupalPostForm('admin/modules', array('modules[Testing][config_install_fail_test][enable]' => TRUE), t('Save configuration'));
    $this->drupalPostForm(NULL, array(), t('Continue'));
    $this->assertRaw('Unable to install Configuration install fail test, <em class="placeholder">config_test.dynamic.dotted.default</em> already exists in active configuration.');

    // Test that collection configuration clashes during a module install are
    // reported correctly.
    \Drupal::service('module_installer')->install(['language']);
    $this->rebuildContainer();
    ConfigurableLanguage::createFromLangcode('fr')->save();
    \Drupal::languageManager()
      ->getLanguageConfigOverride('fr', 'config_test.dynamic.dotted.default')
      ->set('label', 'Je suis Charlie')
      ->save();

    $this->drupalPostForm('admin/modules', array('modules[Testing][config_install_fail_test][enable]' => TRUE), t('Save configuration'));
    $this->assertRaw('Unable to install Configuration install fail test, <em class="placeholder">config_test.dynamic.dotted.default, language/fr/config_test.dynamic.dotted.default</em> already exist in active configuration.');

    // Test installing a theme through the UI that has existing configuration.
    // This relies on the fact the config_test has been installed and created
    // the config_test.dynamic.dotted.default configuration and the translation
    // override created still exists.
    $this->drupalGet('admin/appearance');
    $url = $this->xpath("//a[contains(@href,'config_clash_test_theme') and contains(@href,'/install?')]/@href")[0];
    $this->drupalGet($this->getAbsoluteUrl($url));
    $this->assertRaw('Unable to install config_clash_test_theme, <em class="placeholder">config_test.dynamic.dotted.default, language/fr/config_test.dynamic.dotted.default</em> already exist in active configuration.');

    // Test installing a theme through the API that has existing configuration.
    try {
      \Drupal::service('theme_handler')->install(['config_clash_test_theme']);
      $this->fail('Expected PreExistingConfigException not thrown.');
    }
    catch (PreExistingConfigException $e) {
      $this->assertEqual($e->getExtension(), 'config_clash_test_theme');
      $this->assertEqual($e->getConfigObjects(), [StorageInterface::DEFAULT_COLLECTION => ['config_test.dynamic.dotted.default'], 'language.fr' => ['config_test.dynamic.dotted.default']]);
      $this->assertEqual($e->getMessage(), 'Configuration objects (config_test.dynamic.dotted.default, language/fr/config_test.dynamic.dotted.default) provided by config_clash_test_theme already exist in active configuration');
    }
  }
}
