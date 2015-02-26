<?php

/* core/themes/bartik/templates/page.html.twig */
class __TwigTemplate_42b1327ba2db0ff3ad64da0762583e012df5c54ec4a65bf88b38c3070db2f799 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 77
        echo "<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" role=\"banner\" aria-label=\"";
        // line 79
        echo twig_render_var(t("Site header"));
        echo "\">
      <div class=\"section clearfix\">
        ";
        // line 81
        echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true);
        echo "
        ";
        // line 82
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            // line 83
            echo "          <a href=\"";
            echo twig_drupal_escape_filter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true);
            echo "\" title=\"";
            echo twig_render_var(t("Home"));
            echo "\" rel=\"home\" id=\"logo\">
            <img src=\"";
            // line 84
            echo twig_drupal_escape_filter($this->env, (isset($context["logo"]) ? $context["logo"] : null), "html", null, true);
            echo "\" alt=\"";
            echo twig_render_var(t("Home"));
            echo "\" />
          </a>
        ";
        }
        // line 87
        echo "        ";
        if (((isset($context["site_name"]) ? $context["site_name"] : null) || (isset($context["site_slogan"]) ? $context["site_slogan"] : null))) {
            // line 88
            echo "          <div id=\"name-and-slogan\"";
            if (((isset($context["hide_site_name"]) ? $context["hide_site_name"] : null) && (isset($context["hide_site_slogan"]) ? $context["hide_site_slogan"] : null))) {
                echo " class=\"visually-hidden\"";
            }
            echo ">
            ";
            // line 89
            if ((isset($context["site_name"]) ? $context["site_name"] : null)) {
                // line 90
                echo "              ";
                if ((isset($context["title"]) ? $context["title"] : null)) {
                    // line 91
                    echo "                <div id=\"site-name\"";
                    if ((isset($context["hide_site_name"]) ? $context["hide_site_name"] : null)) {
                        echo " class=\"visually-hidden\"";
                    }
                    echo ">
                  <strong>
                    <a href=\"";
                    // line 93
                    echo twig_drupal_escape_filter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true);
                    echo "\" title=\"";
                    echo twig_render_var(t("Home"));
                    echo "\" rel=\"home\"><span>";
                    echo twig_drupal_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
                    echo "</span></a>
                  </strong>
                </div>
              ";
                    // line 97
                    echo "              ";
                } else {
                    // line 98
                    echo "                <h1 id=\"site-name\"";
                    if ((isset($context["hide_site_name"]) ? $context["hide_site_name"] : null)) {
                        echo " class=\"visually-hidden\" ";
                    }
                    echo ">
                  <a href=\"";
                    // line 99
                    echo twig_drupal_escape_filter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true);
                    echo "\" title=\"";
                    echo twig_render_var(t("Home"));
                    echo "\" rel=\"home\"><span>";
                    echo twig_drupal_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
                    echo "</span></a>
                </h1>
              ";
                }
                // line 102
                echo "            ";
            }
            // line 103
            echo "            ";
            if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
                // line 104
                echo "              <div id=\"site-slogan\"";
                if ((isset($context["hide_site_slogan"]) ? $context["hide_site_slogan"] : null)) {
                    echo " class=\"visually-hidden\"";
                }
                echo ">
                ";
                // line 105
                echo twig_drupal_escape_filter($this->env, (isset($context["site_slogan"]) ? $context["site_slogan"] : null), "html", null, true);
                echo "
              </div>
            ";
            }
            // line 108
            echo "          </div>
        ";
        }
        // line 110
        echo "        ";
        echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true);
        echo "
        ";
        // line 111
        echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array()), "html", null, true);
        echo "
      </div>
    </header>
    ";
        // line 114
        if ((isset($context["messages"]) ? $context["messages"] : null)) {
            // line 115
            echo "      <div id=\"messages\">
        <div class=\"section clearfix\">";
            // line 116
            echo twig_drupal_escape_filter($this->env, (isset($context["messages"]) ? $context["messages"] : null), "html", null, true);
            echo "</div>
      </div>
    ";
        }
        // line 119
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array())) {
            // line 120
            echo "      <div id=\"featured\">
        <aside class=\"section clearfix\" role=\"complementary\">
          ";
            // line 122
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array()), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 126
        echo "    <div id=\"main-wrapper\" class=\"clearfix\">
      <div id=\"main\" class=\"clearfix\">
        ";
        // line 128
        echo twig_drupal_escape_filter($this->env, (isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "html", null, true);
        echo "
        <main id=\"content\" class=\"column\" role=\"main\">
          <section class=\"section\">
            <a id=\"main-content\" tabindex=\"-1\"></a>
            ";
        // line 132
        echo twig_drupal_escape_filter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true);
        echo "
            ";
        // line 133
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 134
            echo "              <h1 class=\"title\" id=\"page-title\">
                ";
            // line 135
            echo twig_drupal_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo "
              </h1>
            ";
        }
        // line 138
        echo "            ";
        echo twig_drupal_escape_filter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true);
        echo "
            ";
        // line 139
        if ((isset($context["tabs"]) ? $context["tabs"] : null)) {
            // line 140
            echo "              <nav class=\"tabs\" role=\"navigation\" aria-label=\"";
            echo twig_render_var(t("Tabs"));
            echo "\">
                ";
            // line 141
            echo twig_drupal_escape_filter($this->env, (isset($context["tabs"]) ? $context["tabs"] : null), "html", null, true);
            echo "
              </nav>
            ";
        }
        // line 144
        echo "            ";
        echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true);
        echo "
            ";
        // line 145
        if ((isset($context["action_links"]) ? $context["action_links"] : null)) {
            // line 146
            echo "              <ul class=\"action-links\">";
            echo twig_drupal_escape_filter($this->env, (isset($context["action_links"]) ? $context["action_links"] : null), "html", null, true);
            echo "</ul>
            ";
        }
        // line 148
        echo "            ";
        echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true);
        echo "
          </section>
        </main>
        ";
        // line 151
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 152
            echo "          <div id=\"sidebar-first\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 154
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true);
            echo "
            </aside>
          </div>
        ";
        }
        // line 158
        echo "        ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())) {
            // line 159
            echo "          <div id=\"sidebar-second\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 161
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()), "html", null, true);
            echo "
            </aside>
          </div>
        ";
        }
        // line 165
        echo "      </div>
    </div>
    ";
        // line 167
        if ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_first", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_middle", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_last", array()))) {
            // line 168
            echo "      <div id=\"triptych-wrapper\">
        <aside id=\"triptych\" class=\"clearfix\" role=\"complementary\">
          ";
            // line 170
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_first", array()), "html", null, true);
            echo "
          ";
            // line 171
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_middle", array()), "html", null, true);
            echo "
          ";
            // line 172
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "triptych_last", array()), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 176
        echo "    <div id=\"footer-wrapper\">
      <footer class=\"section\">
        ";
        // line 178
        if (((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_firstcolumn", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_secondcolumn", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_thirdcolumn", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_fourthcolumn", array()))) {
            // line 179
            echo "          <div id=\"footer-columns\" class=\"clearfix\">
            ";
            // line 180
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_firstcolumn", array()), "html", null, true);
            echo "
            ";
            // line 181
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_secondcolumn", array()), "html", null, true);
            echo "
            ";
            // line 182
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_thirdcolumn", array()), "html", null, true);
            echo "
            ";
            // line 183
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_fourthcolumn", array()), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 186
        echo "        ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 187
            echo "          <div id=\"footer\" role=\"contentinfo\" class=\"clearfix\">
            ";
            // line 188
            echo twig_drupal_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 191
        echo "      </footer>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 191,  310 => 188,  307 => 187,  304 => 186,  298 => 183,  294 => 182,  290 => 181,  286 => 180,  283 => 179,  281 => 178,  277 => 176,  270 => 172,  266 => 171,  262 => 170,  258 => 168,  256 => 167,  252 => 165,  245 => 161,  241 => 159,  238 => 158,  231 => 154,  227 => 152,  225 => 151,  218 => 148,  212 => 146,  210 => 145,  205 => 144,  199 => 141,  194 => 140,  192 => 139,  187 => 138,  181 => 135,  178 => 134,  176 => 133,  172 => 132,  165 => 128,  161 => 126,  154 => 122,  150 => 120,  147 => 119,  141 => 116,  138 => 115,  136 => 114,  130 => 111,  125 => 110,  121 => 108,  115 => 105,  108 => 104,  105 => 103,  102 => 102,  92 => 99,  85 => 98,  82 => 97,  72 => 93,  64 => 91,  61 => 90,  59 => 89,  52 => 88,  49 => 87,  41 => 84,  34 => 83,  32 => 82,  28 => 81,  23 => 79,  19 => 77,);
    }
}
