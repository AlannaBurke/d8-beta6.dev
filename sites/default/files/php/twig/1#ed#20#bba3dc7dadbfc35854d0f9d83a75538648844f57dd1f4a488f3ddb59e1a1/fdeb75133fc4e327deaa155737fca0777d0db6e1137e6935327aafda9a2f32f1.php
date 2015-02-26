<?php

/* core/modules/system/templates/maintenance-task-list.html.twig */
class __TwigTemplate_ed20bba3dc7dadbfc35854d0f9d83a75538648844f57dd1f4a488f3ddb59e1a1 extends Twig_Template
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
        // line 17
        echo "<h2 class=\"visually-hidden\">Installation tasks</h2>
<ol class=\"task-list\">
";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 20
            echo "  <li";
            echo twig_drupal_escape_filter($this->env, $this->getAttribute($context["task"], "attributes", array()), "html", null, true);
            echo ">
    ";
            // line 21
            echo twig_drupal_escape_filter($this->env, $this->getAttribute($context["task"], "item", array()), "html", null, true);
            echo "
    ";
            // line 22
            if ($this->getAttribute($context["task"], "status", array())) {
                echo "<span class=\"visually-hidden\"> (";
                echo twig_drupal_escape_filter($this->env, $this->getAttribute($context["task"], "status", array()), "html", null, true);
                echo ")</span>";
            }
            // line 23
            echo "  </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/maintenance-task-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 25,  42 => 23,  36 => 22,  32 => 21,  27 => 20,  23 => 19,  19 => 17,);
    }
}
