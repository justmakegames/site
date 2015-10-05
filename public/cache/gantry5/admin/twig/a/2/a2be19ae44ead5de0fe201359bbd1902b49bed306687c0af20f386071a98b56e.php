<?php

/* partials/field.html.twig */
class __TwigTemplate_985d29082abf87a82a5efcb28252983c25e34622b305239110282f053eea530c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'group' => array($this, 'block_group'),
            'input' => array($this, 'block_input'),
            'global_attributes' => array($this, 'block_global_attributes'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 9
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "footer";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 10
        echo "    ";
        $this->displayBlock('javascript_footer', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 14
        $context["name"] = (((null === (isset($context["name"]) ? $context["name"] : null))) ? ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array())) : ((isset($context["name"]) ? $context["name"] : null)));
        // line 15
        $context["value"] = (((null === (isset($context["value"]) ? $context["value"] : null))) ? ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "default", array())) : ((isset($context["value"]) ? $context["value"] : null)));
        // line 17
        $this->displayBlock('group', $context, $blocks);
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_javascript($context, array $blocks = array())
    {
        // line 6
        echo "    ";
    }

    // line 10
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 11
        echo "    ";
    }

    // line 17
    public function block_group($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        $this->displayBlock('input', $context, $blocks);
    }

    public function block_input($context, array $blocks = array())
    {
        // line 19
        echo "        <input
                ";
        // line 21
        echo "                name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))), "html", null, true);
        echo "\"
                value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "), "html", null, true);
        echo "\"
                ";
        // line 24
        echo "                ";
        $this->displayBlock('global_attributes', $context, $blocks);
        // line 31
        echo "                />
    ";
    }

    // line 24
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 25
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "class", array(), "any", true, true)) {
            echo " class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "class", array()), "html", null, true);
            echo "\" ";
        }
        // line 26
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array(), "any", true, true)) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()), "html", null, true);
            echo "\" ";
        }
        // line 27
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "style", array(), "any", true, true)) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "style", array()), "html", null, true);
            echo "\" ";
        }
        // line 28
        echo "                    ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "title", array(), "any", true, true)) {
            echo " title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "title", array()), "html", null, true);
            echo "\" ";
        }
        // line 29
        echo "                    aria-label=\"";
        echo twig_escape_filter($this->env, trim(twig_title_string_filter($this->env, twig_replace_filter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null)), array("." => " ")))), "html", null, true);
        echo "\"
                ";
    }

    public function getTemplateName()
    {
        return "partials/field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 29,  147 => 28,  140 => 27,  133 => 26,  126 => 25,  123 => 24,  118 => 31,  115 => 24,  111 => 22,  106 => 21,  103 => 19,  96 => 18,  93 => 17,  89 => 11,  86 => 10,  82 => 6,  79 => 5,  75 => 3,  72 => 2,  68 => 17,  66 => 15,  64 => 14,  59 => 10,  47 => 9,  43 => 5,  40 => 4,  37 => 2,  25 => 1,);
    }
}
/* {% assets %}*/
/*     {% block stylesheets %}*/
/*     {% endblock %}*/
/* */
/*     {% block javascript %}*/
/*     {% endblock %}*/
/* {% endassets -%}*/
/* */
/* {% assets in 'footer' %}*/
/*     {% block javascript_footer %}*/
/*     {% endblock %}*/
/* {% endassets -%}*/
/* */
/* {% set name = (name is null ? field.name : name) -%}*/
/* {% set value = (value is null ? field.default : value) -%}*/
/* */
/* {% block group %}*/
/*     {% block input %}*/
/*         <input*/
/*                 {# required attribute structures #}*/
/*                 name="{{ (scope ~ name)|fieldName }}"*/
/*                 value="{{ value|join(', ') }}"*/
/*                 {# global attribute structures #}*/
/*                 {% block global_attributes %}*/
/*                     {% if field.class is defined %} class="{{ field.class }}" {% endif %}*/
/*                     {% if field.id is defined %} id="{{ field.id }}" {% endif %}*/
/*                     {% if field.style is defined %} style="{{ field.style }}" {% endif %}*/
/*                     {% if field.title is defined %} title="{{ field.title }}" {% endif %}*/
/*                     aria-label="{{ (scope ~ name)|replace({'.': ' '})|title|trim }}"*/
/*                 {% endblock %}*/
/*                 />*/
/*     {% endblock %}*/
/* {% endblock %}*/
/* */
