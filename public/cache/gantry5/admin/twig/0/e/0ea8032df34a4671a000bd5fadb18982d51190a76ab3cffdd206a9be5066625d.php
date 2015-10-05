<?php

/* forms/fields/input/fonts.html.twig */
class __TwigTemplate_fdd8fc775915ce7da7be114aff6caa8a50f3b39b0db1ce83b07fc174340fcdeb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((isset($context["default"]) ? $context["default"] : null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/input/fonts.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["local_fonts"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "details", array(), "any", false, true), "configuration", array(), "any", false, true), "fonts", array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "details", array(), "any", false, true), "configuration", array(), "any", false, true), "fonts", array(), "array"), array())) : (array()));
        // line 5
        echo "    ";
        $context["map"] = array();
        // line 6
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["local_fonts"]) ? $context["local_fonts"] : null));
        foreach ($context['_seq'] as $context["name"] => $context["variants"]) {
            // line 7
            echo "        ";
            if (twig_test_iterable($context["variants"])) {
                $context["variants"] = twig_get_array_keys_filter($context["variants"]);
                // line 8
                echo "        ";
            } else {
                $context["variants"] = array(0 => "regular");
            }
            // line 9
            echo "        ";
            $context["map"] = twig_array_merge((isset($context["map"]) ? $context["map"] : null), array(0 => array("family" => $context["name"], "variants" => $context["variants"])));
            // line 10
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['variants'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
    <div class=\"g-fonts\">
        <div class=\"input-group append\">
            <input
                    ";
        // line 16
        echo "                    type=\"text\"
                    name=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
                    value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "));
        echo "\"
                    ";
        // line 20
        echo "                    ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
                    ";
        // line 22
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()), array(0 => "on", 1 => "off"))) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()));
            echo "\"";
        }
        // line 23
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 24
        echo "                    ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 25
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array(), "any", true, true)) {
            echo "list=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array()));
            echo "\"";
        }
        // line 26
        echo "                    />
            ";
        // line 27
        $context["picker"] = array("field" => (("input[name=\"" . twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))))) . "\"]"));
        // line 28
        echo "            <span class=\"input-group-btn\">
                <button class=\"button\" type=\"button\" aria-label=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "label", array()));
        echo "\" data-g5-fontpicker=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["picker"]) ? $context["picker"] : null)), "html_attr");
        echo "\">
                    <i class=\"fa fa-font\"></i>
                </button>
            </span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/input/fonts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  110 => 28,  108 => 27,  105 => 26,  98 => 25,  93 => 24,  88 => 23,  81 => 22,  76 => 20,  72 => 18,  68 => 17,  65 => 16,  59 => 11,  53 => 10,  50 => 9,  45 => 8,  41 => 7,  36 => 6,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends default ? "partials/field.html.twig" : 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     {% set local_fonts = gantry.theme.details.configuration['fonts']|default([]) %}*/
/*     {% set map = [] %}*/
/*     {% for name, variants in local_fonts %}*/
/*         {% if variants is iterable %}{% set variants = variants|keys %}*/
/*         {% else %}{% set variants = ['regular'] %}{% endif %}*/
/*         {% set map = map|merge([{ family: name, variants: variants }]) %}*/
/*     {% endfor %}*/
/* */
/*     <div class="g-fonts">*/
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
/*             {% set picker = {'field':'input[name="' ~ ((scope ~ name)|fieldName|e) ~ '"]'} %}*/
/*             <span class="input-group-btn">*/
/*                 <button class="button" type="button" aria-label="{{ 'GANTRY5_PLATFORM_SELECT'|trans }} {{ field.label|e }}" data-g5-fontpicker="{{ picker|json_encode()|e('html_attr') }}">*/
/*                     <i class="fa fa-font"></i>*/
/*                 </button>*/
/*             </span>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
