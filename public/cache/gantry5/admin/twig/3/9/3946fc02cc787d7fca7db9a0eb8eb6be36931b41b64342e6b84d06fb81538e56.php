<?php

/* forms/fields/select/selectize.html.twig */
class __TwigTemplate_5611ab724b3f9733858fe097d7c25dceca5ba1e684ece0f62770c2722312b45b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/select/select.html.twig", "forms/fields/select/selectize.html.twig", 1);
        $this->blocks = array(
            'global_attributes' => array($this, 'block_global_attributes'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/select/select.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 4
        echo "    data-selectize=\"";
        echo (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "selectize", array(), "any", true, true)) ? (twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "selectize", array())), "html_attr")) : (""));
        echo "\"
    ";
        // line 5
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "forms/fields/select/selectize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'forms/fields/select/select.html.twig' %}*/
/* */
/* {% block global_attributes %}*/
/*     data-selectize="{{ (field.selectize is defined ? field.selectize|json_encode()|e('html_attr') : '') }}"*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
