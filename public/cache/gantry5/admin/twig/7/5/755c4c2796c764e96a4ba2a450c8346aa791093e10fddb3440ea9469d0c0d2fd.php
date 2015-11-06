<?php

/* forms/fields/input/filepicker.html.twig */
class __TwigTemplate_0bdf09efb1ea75460d28c655b3ce28b3ce113f7ca3c01348921b7a5bae582922 extends Twig_Template
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
        return $this->loadTemplate((((isset($context["default"]) ? $context["default"] : null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/input/filepicker.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"g-filepicker\">
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
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array(), "any", true, true)) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array()), "html", null, true);
            echo "\"";
        }
        // line 19
        echo "                    />
            ";
        // line 20
        $context["picker"] = array("field" => (("input[name=\"" . twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))))) . "\"]"), "root" => twig_escape_filter($this->env, (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "root", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "root", array()), "gantry-media://")) : ("gantry-media://"))), "filter" => twig_escape_filter($this->env, (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "filter", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "filter", array()), false)) : (false))));
        // line 21
        echo "            <span class=\"input-group-btn\">
                <button class=\"button\" type=\"button\" aria-label=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()));
        echo "\" data-g5-filepicker=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["picker"]) ? $context["picker"] : null)), "html_attr");
        echo "\">
                    <i class=\"fa ";
        // line 23
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "icon", array()), "fa-file-o")) : ("fa-file-o")));
        echo "\" ></i>
                </button>
            </span>
            ";
        // line 26
        $this->displayBlock('reset_field', $context, $blocks);
        // line 27
        echo "        </div>
    </div>
";
    }

    // line 26
    public function block_reset_field($context, array $blocks = array())
    {
        $this->displayParentBlock("reset_field", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "forms/fields/input/filepicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 26,  107 => 27,  105 => 26,  99 => 23,  91 => 22,  88 => 21,  86 => 20,  83 => 19,  76 => 18,  69 => 17,  64 => 16,  59 => 15,  52 => 14,  47 => 12,  43 => 10,  39 => 9,  36 => 8,  31 => 4,  28 => 3,  19 => 1,);
    }
}
/* {% extends default ? "partials/field.html.twig" : 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <div class="g-filepicker">*/
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
/*                     {% if field.placeholder is defined %}placeholder="{{ field.placeholder }}"{% endif %}*/
/*                     />*/
/*             {% set picker = {'field': 'input[name="' ~ ((scope ~ name)|fieldName|e) ~ '"]', 'root': (field.root|default('gantry-media://'))|e, 'filter': (field.filter|default(false))|e } %}*/
/*             <span class="input-group-btn">*/
/*                 <button class="button" type="button" aria-label="{{ 'GANTRY5_PLATFORM_SELECT'|trans }} {{ field.label|e }}" data-g5-filepicker="{{ picker|json_encode()|e('html_attr') }}">*/
/*                     <i class="fa {{ field.icon|default('fa-file-o')|e }}" ></i>*/
/*                 </button>*/
/*             </span>*/
/*             {% block reset_field %}{{ parent() }}{% endblock %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
