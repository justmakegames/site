<?php

/* forms/fields/select/select.html.twig */
class __TwigTemplate_efd1c372371ca1b9a6127d0c0626f92af4095e492ecc085035425bbd00b85096 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
            'options' => array($this, 'block_options'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"), "forms/fields/select/select.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <select
            ";
        // line 6
        echo "            name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
            ";
        // line 8
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 10
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 11
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 12
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "multiple", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "multiple=\"multiple\"";
        }
        // line 13
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 14
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array(), "any", true, true)) {
            echo "data-placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array()));
            echo "\"";
        }
        // line 15
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "size", array(), "any", true, true)) {
            echo "size=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "size", array()));
            echo "\"";
        }
        // line 16
        echo "            >

        ";
        // line 18
        $this->displayBlock('options', $context, $blocks);
        // line 30
        echo "    </select>
    ";
        // line 31
        $this->displayBlock('reset_field', $context, $blocks);
    }

    // line 18
    public function block_options($context, array $blocks = array())
    {
        // line 19
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 20
            echo "                <option
                        ";
            // line 22
            echo "                        ";
            if (($context["key"] == (isset($context["value"]) ? $context["value"] : null))) {
                echo "selected=\"selected\"";
            }
            // line 23
            echo "                        value=\"";
            echo twig_escape_filter($this->env, $context["key"]);
            echo "\"
                        ";
            // line 25
            echo "                        ";
            if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
                echo "disabled=\"disabled\"";
            }
            // line 26
            echo "                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array(), "any", false, true), "label", array(), "any", true, true)) {
                echo "label=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()), "label", array()));
                echo "\"";
            }
            // line 27
            echo "                        >";
            echo twig_escape_filter($this->env, $context["text"]);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        ";
    }

    // line 31
    public function block_reset_field($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "forms/fields/select/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 31,  134 => 29,  125 => 27,  118 => 26,  113 => 25,  108 => 23,  103 => 22,  100 => 20,  95 => 19,  92 => 18,  88 => 31,  85 => 30,  83 => 18,  79 => 16,  72 => 15,  65 => 14,  60 => 13,  55 => 12,  50 => 11,  45 => 10,  40 => 8,  35 => 6,  32 => 4,  29 => 3,  20 => 1,);
    }
}
/* {% extends 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <select*/
/*             {# required attribute structures #}*/
/*             name="{{ (scope ~ name)|fieldName|e }}"*/
/*             {# global attribute structures #}*/
/*             {{ block('global_attributes') }}*/
/*             {# non-gloval attribute structures #}*/
/*             {% if field.autofocus in ['on', 'true', 1] %}autofocus="autofocus"{% endif %}*/
/*             {% if field.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*             {% if field.multiple in ['on', 'true', 1] %}multiple="multiple"{% endif %}*/
/*             {% if field.required in ['on', 'true', 1] %}required="required"{% endif %}*/
/*             {% if field.placeholder is defined %}data-placeholder="{{ field.placeholder|e }}"{% endif %}*/
/*             {% if field.size is defined %}size="{{ field.size|e }}"{% endif %}*/
/*             >*/
/* */
/*         {% block options %}*/
/*             {% for key, text in field.options %}*/
/*                 <option*/
/*                         {# required attribute structures #}*/
/*                         {% if key == value %}selected="selected"{% endif %}*/
/*                         value="{{ key|e }}"*/
/*                         {# non-gloval attribute structures #}*/
/*                         {% if field.options.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*                         {% if field.options.label is defined %}label="{{ field.options.label|e }}"{% endif %}*/
/*                         >{{ text|e }}</option>*/
/*             {% endfor %}*/
/*         {% endblock %}*/
/*     </select>*/
/*     {% block reset_field %}{% endblock %}*/
/* {% endblock %}*/
/* */
