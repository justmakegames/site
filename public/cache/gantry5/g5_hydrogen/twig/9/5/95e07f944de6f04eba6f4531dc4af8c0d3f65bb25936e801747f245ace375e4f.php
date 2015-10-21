<?php

/* partials/page_head.html.twig */
class __TwigTemplate_eaa2b5cc44c24dec93cfdc3e2392874684df6d6b8ada135a99830d6763435951 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/page_head.html.twig", "partials/page_head.html.twig", 1);
        $this->blocks = array(
            'head_title' => array($this, 'block_head_title'),
            'head_application' => array($this, 'block_head_application'),
            'head_platform' => array($this, 'block_head_platform'),
            'head' => array($this, 'block_head'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/page_head.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head_title($context, array $blocks = array())
    {
    }

    // line 6
    public function block_head_application($context, array $blocks = array())
    {
        // line 7
        echo "<jdoc:include type=\"head\" />";
    }

    // line 10
    public function block_head_platform($context, array $blocks = array())
    {
        // line 11
        $this->displayParentBlock("head_platform", $context, $blocks);
        echo "
    ";
        // line 12
        if ((isset($context["joomla"]) ? $context["joomla"] : null)) {
            // line 13
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-assets://css/bootstrap-gantry.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-engine://css-compiled/joomla.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        ";
            // line 15
            if (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array()), "direction", array()) == "rtl")) {
                // line 16
                echo "        <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("media/jui/css/bootstrap-rtl.css"), "html", null, true);
                echo "\" type=\"text/css\" />
        ";
            }
            // line 18
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("media/jui/css/icomoon.css"), "html", null, true);
            echo "\" type=\"text/css\" />
    ";
        }
        // line 20
        echo "    ";
        if ($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "debug", array())) {
            // line 21
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("media/cms/css/debug.css"), "html", null, true);
            echo "\" type=\"text/css\" />
    ";
        }
    }

    // line 25
    public function block_head($context, array $blocks = array())
    {
        // line 26
        $this->displayParentBlock("head", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "partials/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 26,  86 => 25,  78 => 21,  75 => 20,  69 => 18,  63 => 16,  61 => 15,  57 => 14,  52 => 13,  50 => 12,  46 => 11,  43 => 10,  39 => 7,  36 => 6,  31 => 3,  11 => 1,);
    }
}
/* {% extends "@nucleus/page_head.html.twig" %}*/
/* */
/* {% block head_title -%}*/
/* {%- endblock %}*/
/* */
/* {% block head_application -%}*/
/*     <jdoc:include type="head" />*/
/* {%- endblock %}*/
/* */
/* {% block head_platform -%}*/
/*     {{ parent() }}*/
/*     {% if joomla %}*/
/*         <link rel="stylesheet" href="{{ url('gantry-assets://css/bootstrap-gantry.css') }}" type="text/css" />*/
/*         <link rel="stylesheet" href="{{ url('gantry-engine://css-compiled/joomla.css') }}" type="text/css" />*/
/*         {% if gantry.page.direction == 'rtl' %}*/
/*         <link rel="stylesheet" href="{{ url('media/jui/css/bootstrap-rtl.css') }}" type="text/css" />*/
/*         {% endif %}*/
/*         <link rel="stylesheet" href="{{ url('media/jui/css/icomoon.css') }}" type="text/css" />*/
/*     {% endif %}*/
/*     {% if gantry.debug %}*/
/*         <link rel="stylesheet" href="{{ url('media/cms/css/debug.css') }}" type="text/css" />*/
/*     {% endif %}*/
/* {%- endblock %}*/
/* */
/* {% block head -%}*/
/*     {{ parent() }}*/
/* {%- endblock %}*/
/* */
