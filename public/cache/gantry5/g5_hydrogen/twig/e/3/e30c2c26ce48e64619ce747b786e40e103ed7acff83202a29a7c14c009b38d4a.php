<?php

/* partials/page.html.twig */
class __TwigTemplate_143b0a10e3c900a0863768b14b869d2fa4abc3c3633cebc60da1e7bf17193ff3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/page.html.twig", "partials/page.html.twig", 1);
        $this->blocks = array(
            'page_footer' => array($this, 'block_page_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_footer($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("page_footer", $context, $blocks);
        echo "
    <jdoc:include type=\"modules\" name=\"debug\" />
";
    }

    public function getTemplateName()
    {
        return "partials/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "@nucleus/page.html.twig" %}*/
/* */
/* {% block page_footer %}*/
/*     {{ parent() }}*/
/*     <jdoc:include type="modules" name="debug" />*/
/* {% endblock %}*/
/* */
