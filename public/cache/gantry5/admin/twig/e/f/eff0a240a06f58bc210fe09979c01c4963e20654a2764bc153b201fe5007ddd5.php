<?php

/* forms/fields/select/date.html.twig */
class __TwigTemplate_0028c84f403e367d83ea7b9290bb8005249c86f30c81aa0d37c0e7f62f6208eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/select/selectize.html.twig", "forms/fields/select/date.html.twig", 1);
        $this->blocks = array(
            'options' => array($this, 'block_options'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/select/selectize.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_options($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 5
            echo "        <option
                ";
            // line 7
            echo "                ";
            if (($context["key"] == (isset($context["value"]) ? $context["value"] : null))) {
                echo "selected=\"selected\"";
            }
            // line 8
            echo "                value=\"";
            echo twig_escape_filter($this->env, $context["key"]);
            echo "\"
                ";
            // line 10
            echo "                ";
            if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
                echo "disabled=\"disabled\"";
            }
            // line 11
            echo "                ";
            if ($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array(), "any", false, true), "label", array(), "any", true, true)) {
                echo "label=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()), "label", array()));
                echo "\"";
            }
            // line 12
            echo "                >";
            echo twig_escape_filter($this->env, ((twig_test_empty($context["key"])) ? ($context["text"]) : (twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", $context["key"])))), "html", null, true);
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms/fields/select/date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  54 => 11,  49 => 10,  44 => 8,  39 => 7,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'forms/fields/select/selectize.html.twig' %}*/
/* */
/* {% block options %}*/
/*     {% for key, text in field.options %}*/
/*         <option*/
/*                 {# required attribute structures #}*/
/*                 {% if key == value %}selected="selected"{% endif %}*/
/*                 value="{{ key|e }}"*/
/*                 {# non-gloval attribute structures #}*/
/*                 {% if field.options.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*                 {% if field.options.label is defined %}label="{{ field.options.label|e }}"{% endif %}*/
/*                 >{{ key is empty ? text : "now"|date(key)|e }}</option>*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
