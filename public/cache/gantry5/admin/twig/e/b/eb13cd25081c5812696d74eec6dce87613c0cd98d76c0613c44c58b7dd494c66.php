<?php

/* forms/fields/enable/enable.html.twig */
class __TwigTemplate_6802ddb3ae3375300bd47f771ae690bd63e45e73fcb338033276bcffd4ec88f4 extends Twig_Template
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
        return $this->loadTemplate((((isset($context["default"]) ? $context["default"] : null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/enable/enable.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <span class=\"enabler\" role=\"checkbox\" aria-checked=\"";
        echo (((isset($context["value"]) ? $context["value"] : null)) ? ("true") : ("false"));
        echo "\" tabindex=\"0\" aria-label=\"";
        echo twig_escape_filter($this->env, (((isset($context["disabled"]) ? $context["disabled"] : null)) ? ("Disabled") : (("Enables " . _twig_default_filter(trim(twig_title_string_filter($this->env, twig_replace_filter((isset($context["scope"]) ? $context["scope"] : null), array("." => " ")))), trim((isset($context["title"]) ? $context["title"] : null)))))), "html", null, true);
        echo "\">
    <input
            ";
        // line 7
        echo "            type=\"hidden\"
            name=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
            value=\"";
        // line 9
        echo (((isset($context["value"]) ? $context["value"] : null)) ? (1) : (0));
        echo "\"
            ";
        // line 10
        if ((isset($context["disabled"]) ? $context["disabled"] : null)) {
            echo "disabled=\"disabled\"";
        }
        // line 11
        echo "            ";
        // line 12
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            />
    ";
        // line 14
        if ((isset($context["disabled"]) ? $context["disabled"] : null)) {
            // line 15
            echo "    <span><i class=\"fa fa-power-off\"></i></span>
    ";
        } else {
            // line 17
            echo "    <span class=\"toggle\"><span class=\"knob\"></span></span>
    ";
        }
        // line 19
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/enable/enable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 19,  67 => 17,  63 => 15,  61 => 14,  55 => 12,  53 => 11,  49 => 10,  45 => 9,  41 => 8,  38 => 7,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends default ? "partials/field.html.twig" : 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <span class="enabler" role="checkbox" aria-checked="{{ value ? 'true' : 'false' }}" tabindex="0" aria-label="{{ disabled ? 'Disabled' : 'Enables ' ~ scope|replace({'.': ' '})|title|trim|default(title|trim) }}">*/
/*     <input*/
/*             {# required attribute structures #}*/
/*             type="hidden"*/
/*             name="{{ (scope ~ name)|fieldName|e }}"*/
/*             value="{{ value ? 1 : 0 }}"*/
/*             {% if disabled %}disabled="disabled"{% endif %}*/
/*             {# global attribute structures #}*/
/*             {{ block('global_attributes') }}*/
/*             />*/
/*     {% if disabled %}*/
/*     <span><i class="fa fa-power-off"></i></span>*/
/*     {% else %}*/
/*     <span class="toggle"><span class="knob"></span></span>*/
/*     {% endif %}*/
/* </span>*/
/* {% endblock %}*/
/* */
