<?php

/* forms/fields/input/icon.html.twig */
class __TwigTemplate_99c182ed568d80729714dc4787372c9694e8f4b40a074d87dd3748a684923e1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((isset($context["default"]) ? $context["default"] : null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/input/icon.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"g-icons\">
        <div class=\"input-group append\">
            <input
                    ";
        // line 8
        echo "                    type=\"text\"
                    name=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
                    value=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "));
        echo "\"
                    ";
        // line 12
        echo "                    ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
                    ";
        // line 14
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()), array(0 => "on", 1 => "off"))) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()));
            echo "\"";
        }
        // line 15
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 16
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 17
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array(), "any", true, true)) {
            echo "list=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array()));
            echo "\"";
        }
        // line 18
        echo "                    />
            ";
        // line 19
        $context["picker"] = (("input[name=\"" . twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))))) . "\"]");
        // line 20
        echo "             <span class=\"input-group-btn\">
                <button class=\"button\" type=\"button\" aria-label=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()));
        echo "\" data-g5-iconpicker=\"";
        echo twig_escape_filter($this->env, (isset($context["picker"]) ? $context["picker"] : null), "html_attr");
        echo "\">
                    <i class=\"";
        // line 22
        echo twig_escape_filter($this->env, ((array_key_exists("value", $context)) ? (_twig_default_filter((isset($context["value"]) ? $context["value"] : null), "fa fa-hand-o-up picker")) : ("fa fa-hand-o-up picker")), "html_attr");
        echo "\"></i>
                </button>
            </span>
            ";
        // line 25
        $this->displayBlock('reset_field', $context, $blocks);
        // line 26
        echo "        </div>
    </div>
";
    }

    // line 25
    public function block_reset_field($context, array $blocks = array())
    {
        $this->displayParentBlock("reset_field", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "forms/fields/input/icon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 25,  100 => 26,  98 => 25,  92 => 22,  84 => 21,  81 => 20,  79 => 19,  76 => 18,  69 => 17,  64 => 16,  59 => 15,  52 => 14,  47 => 12,  43 => 10,  39 => 9,  36 => 8,  31 => 4,  28 => 3,  19 => 1,);
    }
}
/* {% extends default ? "partials/field.html.twig" : 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <div class="g-icons">*/
/*         <div class="input-group append">*/
/*             <input*/
/*                     {# required attribute structures #}*/
/*                     type="text"*/
/*                     name="{{ (scope ~ name)|fieldName|e }}"*/
/*                     value="{{ value|join(', ')|e }}"*/
/*                     {# global attribute structures #}*/
/*                     {{ block('global_attributes') }}*/
/*                     {# non-gloval attribute structures #}*/
/*                     {% if field.autocomplete in ['on', 'off'] %}autocomplete="{{ field.autocomplete|e }}"{% endif %}*/
/*                     {% if field.autofocus in ['on', 'true', 1] %}autofocus="autofocus"{% endif %}*/
/*                     {% if field.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*                     {% if field.list is defined %}list="{{ field.list|e }}"{% endif %}*/
/*                     />*/
/*             {% set picker = 'input[name="' ~ ((scope ~ name)|fieldName|e) ~ '"]' %}*/
/*              <span class="input-group-btn">*/
/*                 <button class="button" type="button" aria-label="{{ 'GANTRY5_PLATFORM_SELECT'|trans }} {{ field.label|e }}" data-g5-iconpicker="{{ picker|e('html_attr') }}">*/
/*                     <i class="{{ value|default('fa fa-hand-o-up picker')|e('html_attr') }}"></i>*/
/*                 </button>*/
/*             </span>*/
/*             {% block reset_field %}{{ parent() }}{% endblock %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
