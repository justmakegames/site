<?php

/* forms/fields/input/colorpicker.html.twig */
class __TwigTemplate_2880cd96fc88c3683c4ff38b090603dbd4a27d4c8db96b7d969f2fc4a72af166 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/input/group/group.html.twig", "forms/fields/input/colorpicker.html.twig", 1);
        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/input/group/group.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_input($context, array $blocks = array())
    {
        // line 10
        echo "        ";
        $context["field"] = twig_array_merge((isset($context["field"]) ? $context["field"] : null), array("style" => ("background-color: " . (isset($context["value"]) ? $context["value"] : null)), "pattern" => "^#([a-fA-F0-9]{6})|(rgba\\(\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*((0.[0-9]+)|[01])\\s*\\))\$"));
        // line 11
        echo "        <div class=\"colorpicker ";
        echo $this->getAttribute($this, "contrast", array(0 => $this->env->getExtension('GantryTwig')->colorContrastFunc(twig_lower_filter($this->env, (isset($context["value"]) ? $context["value"] : null)))), "method");
        echo "\">
        <input
            ";
        // line 14
        echo "            type=\"text\"
            name=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
            value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", ")));
        echo "\"
            ";
        // line 18
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 20
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()), array(0 => "on", 1 => "off"))) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()));
            echo "\"";
        }
        // line 21
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 22
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array(), "any", true, true)) {
            echo "pattern=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array()));
            echo "\"";
        }
        // line 23
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 24
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array(), "any", true, true)) {
            echo "list=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array()));
            echo "\"";
        }
        // line 25
        echo "            />
            <i class=\"fa fa-tint\"></i>
        </div>
";
    }

    // line 3
    public function getcontrast($__value__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "value" => $__value__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            ob_start();
            // line 4
            echo "    ";
            if ( !(isset($context["value"]) ? $context["value"] : null)) {
                // line 5
                echo "    light-text
    ";
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/input/colorpicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 5,  107 => 4,  94 => 3,  87 => 25,  80 => 24,  75 => 23,  68 => 22,  63 => 21,  56 => 20,  51 => 18,  47 => 16,  43 => 15,  40 => 14,  34 => 11,  31 => 10,  28 => 9,  11 => 1,);
    }
}
/* {% extends 'forms/fields/input/group/group.html.twig' %}*/
/* */
/* {% macro contrast(value) %}{% spaceless %}*/
/*     {% if not value %}*/
/*     light-text*/
/*     {% endif %}*/
/* {% endspaceless %}{% endmacro %}*/
/* */
/* {% block input %}*/
/*         {% set field = field|merge({'style': 'background-color: ' ~ value, 'pattern': '^#([a-fA-F0-9]{6})|(rgba\\(\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*((0.[0-9]+)|[01])\\s*\\))$'}) %}*/
/*         <div class="colorpicker {{ _self.contrast(colorContrast(value|lower)) }}">*/
/*         <input*/
/*             {# required attribute structures #}*/
/*             type="text"*/
/*             name="{{ (scope ~ name)|fieldName|e }}"*/
/*             value="{{ value|join(', ')|lower|e }}"*/
/*             {# global attribute structures #}*/
/*             {{ block('global_attributes') }}*/
/*             {# non-gloval attribute structures #}*/
/*             {% if field.autocomplete in ['on', 'off'] %}autocomplete="{{ field.autocomplete|e }}"{% endif %}*/
/*             {% if field.autofocus in ['on', 'true', 1] %}autofocus="autofocus"{% endif %}*/
/*             {% if field.pattern is defined %}pattern="{{ field.pattern|e }}"{% endif %}*/
/*             {% if field.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*             {% if field.list is defined %}list="{{ field.list|e }}"{% endif %}*/
/*             />*/
/*             <i class="fa fa-tint"></i>*/
/*         </div>*/
/* {% endblock %}*/
/* */
