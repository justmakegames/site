<?php

/* forms/fields/input/text.html.twig */
class __TwigTemplate_4dac7bc97761f2ea4695f95250108dcb0df11d569d7ef95c266b2dd5aba6cfcb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/input/group/group.html.twig", "forms/fields/input/text.html.twig", 1);
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

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <input
            ";
        // line 6
        echo "            type=\"text\"
            name=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
            value=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "));
        echo "\"
            ";
        // line 10
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 12
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()), array(0 => "on", 1 => "off"))) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autocomplete", array()));
            echo "\"";
        }
        // line 13
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 14
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "dirname", array(), "any", true, true)) {
            echo "dirname=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "dirname", array()));
            echo "\"";
        }
        // line 15
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 16
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array(), "any", true, true)) {
            echo "list=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "list", array()));
            echo "\"";
        }
        // line 17
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "maxlength", array(), "any", true, true)) {
            echo "maxlength=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "maxlength", array()));
            echo "\"";
        }
        // line 18
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "minlength", array(), "any", true, true)) {
            echo "minlength=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "minlength", array()));
            echo "\"";
        }
        // line 19
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array(), "any", true, true)) {
            echo "pattern=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array()));
            echo "\"";
        }
        // line 20
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array(), "any", true, true)) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "placeholder", array()));
            echo "\"";
        }
        // line 21
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "readonly", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "readonly=\"readonly\"";
        }
        // line 22
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 23
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "size", array(), "any", true, true)) {
            echo "size=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "size", array()));
            echo "\"";
        }
        // line 24
        echo "            />
";
    }

    public function getTemplateName()
    {
        return "forms/fields/input/text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 24,  119 => 23,  114 => 22,  109 => 21,  102 => 20,  95 => 19,  88 => 18,  81 => 17,  74 => 16,  69 => 15,  62 => 14,  57 => 13,  50 => 12,  45 => 10,  41 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'forms/fields/input/group/group.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <input*/
/*             {# required attribute structures #}*/
/*             type="text"*/
/*             name="{{ (scope ~ name)|fieldName|e }}"*/
/*             value="{{ value|join(', ')|e }}"*/
/*             {# global attribute structures #}*/
/*             {{ block('global_attributes') }}*/
/*             {# non-gloval attribute structures #}*/
/*             {% if field.autocomplete in ['on', 'off'] %}autocomplete="{{ field.autocomplete|e }}"{% endif %}*/
/*             {% if field.autofocus in ['on', 'true', 1] %}autofocus="autofocus"{% endif %}*/
/*             {% if field.dirname is defined %}dirname="{{ field.dirname|e }}"{% endif %}*/
/*             {% if field.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*             {% if field.list is defined %}list="{{ field.list|e }}"{% endif %}*/
/*             {% if field.maxlength is defined %}maxlength="{{ field.maxlength|e }}"{% endif %}*/
/*             {% if field.minlength is defined %}minlength="{{ field.minlength|e }}"{% endif %}*/
/*             {% if field.pattern is defined %}pattern="{{ field.pattern|e }}"{% endif %}*/
/*             {% if field.placeholder is defined %}placeholder="{{ field.placeholder|e }}"{% endif %}*/
/*             {% if field.readonly in ['on', 'true', 1] %}readonly="readonly"{% endif %}*/
/*             {% if field.required in ['on', 'true', 1] %}required="required"{% endif %}*/
/*             {% if field.size is defined %}size="{{ field.size|e }}"{% endif %}*/
/*             />*/
/* {% endblock %}*/
/* */
