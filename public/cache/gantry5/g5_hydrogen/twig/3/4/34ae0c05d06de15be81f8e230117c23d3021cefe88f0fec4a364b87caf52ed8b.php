<?php

/* @particles/logo.html.twig */
class __TwigTemplate_884f7fa1c09136867262bac0b527bb4e2c1cb679ab7154861e93a8c1685a789c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/logo.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "<a href=\"";
        echo twig_escape_filter($this->env, _twig_default_filter($this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "url", array())), $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "siteUrl", array(), "method")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "text", array()), "html", null, true);
        echo "\" rel=\"home\" class=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "class", array()), "html", null, true);
        echo "\">
    ";
        // line 5
        $context["image"] = $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "image", array()));
        // line 6
        echo "    ";
        if ((isset($context["image"]) ? $context["image"] : null)) {
            // line 7
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "image", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "text", array()), "html", null, true);
            echo "\" />
    ";
        } else {
            // line 9
            echo "    ";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "text", array()), "Logo")) : ("Logo")), "html", null, true);
            echo "
    ";
        }
        // line 11
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "@particles/logo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 11,  53 => 9,  45 => 7,  42 => 6,  40 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block particle %}*/
/* <a href="{{ url(particle.url)|default(gantry.siteUrl()) }}" title="{{ particle.text }}" rel="home" class="{{ particle.class }}">*/
/*     {% set image = url(particle.image) %}*/
/*     {% if image %}*/
/*     <img src="{{ url(particle.image) }}" alt="{{ particle.text }}" />*/
/*     {% else %}*/
/*     {{ particle.text|default('Logo') }}*/
/*     {% endif %}*/
/* </a>*/
/* {% endblock %}*/
/* */
