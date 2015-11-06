<?php

/* @gantry-admin/partials/base.html.twig */
class __TwigTemplate_bf560562302b2cf95ecc0c0f280b94617d15057b12cacb5187aaed2981cb8b28 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@gantry-admin/partials/page.html.twig", "@gantry-admin/partials/base.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'content' => array($this, 'block_content'),
            'gantry_content_wrapper' => array($this, 'block_gantry_content_wrapper'),
            'gantry' => array($this, 'block_gantry'),
            'footer_section' => array($this, 'block_footer_section'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@gantry-admin/partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-admin://assets/css-compiled/admin.css"));
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-admin://assets/css/font-awesome.min.css"));
        echo "\" type=\"text/css\" />
    ";
        // line 6
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_javascript($context, array $blocks = array())
    {
        // line 10
        echo "    <script type=\"text/javascript\" async=\"async\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-admin://assets/js/main.js"));
        echo "\"></script>
    ";
        // line 11
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "    <div id=\"main-header\" data-mode-indicator=\"production\">
        ";
        // line 16
        $this->loadTemplate("@gantry-admin/partials/header.html.twig", "@gantry-admin/partials/base.html.twig", 16)->display($context);
        // line 17
        echo "    </div>
    <div class=\"inner-container\">
        ";
        // line 19
        $this->loadTemplate("@gantry-admin/partials/updates.html.twig", "@gantry-admin/partials/base.html.twig", 19)->display($context);
        // line 20
        echo "        ";
        $this->displayBlock('gantry_content_wrapper', $context, $blocks);
        // line 35
        echo "    </div>
";
    }

    // line 20
    public function block_gantry_content_wrapper($context, array $blocks = array())
    {
        // line 21
        echo "            <div data-g5-content-wrapper>
                ";
        // line 22
        $this->loadTemplate("@gantry-admin/partials/navigation.html.twig", "@gantry-admin/partials/base.html.twig", 22)->display($context);
        // line 23
        echo "                <div class=\"g-grid\">
                    <div class=\"g-block main-block\">
                        <section id=\"g-main\">
                            <div class=\"g-content\" data-g5-content>
                                ";
        // line 27
        $this->displayBlock('gantry', $context, $blocks);
        // line 29
        echo "                            </div>
                        </section>
                    </div>
                </div>
            </div>
        ";
    }

    // line 27
    public function block_gantry($context, array $blocks = array())
    {
        // line 28
        echo "                                ";
    }

    // line 38
    public function block_footer_section($context, array $blocks = array())
    {
        // line 39
        echo "    <footer id=\"footer\">
        <div>
            ";
        // line 41
        echo $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FOOTER");
        echo "
        </div>
        ";
        // line 43
        $context["version"] = twig_constant("GANTRY5_VERSION");
        // line 44
        echo "        ";
        $context["version_date"] = twig_constant("GANTRY5_VERSION_DATE");
        // line 45
        echo "        <div>Version: <span class=\"g-version\">";
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : null), "html", null, true);
        echo "</span> / Released: <span class=\"g-version-date\">";
        echo twig_escape_filter($this->env, (isset($context["version_date"]) ? $context["version_date"] : null), "html", null, true);
        echo "</span></div>
        <div><a href=\"#\" data-changelog=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_constant("GANTRY5_VERSION"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CHANGELOG"), "html", null, true);
        echo "</a></div>
    </footer>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 46,  136 => 45,  133 => 44,  131 => 43,  126 => 41,  122 => 39,  119 => 38,  115 => 28,  112 => 27,  103 => 29,  101 => 27,  95 => 23,  93 => 22,  90 => 21,  87 => 20,  82 => 35,  79 => 20,  77 => 19,  73 => 17,  71 => 16,  68 => 15,  65 => 14,  59 => 11,  54 => 10,  51 => 9,  45 => 6,  41 => 5,  36 => 4,  33 => 3,  11 => 1,);
    }
}
/* {% extends "@gantry-admin/partials/page.html.twig" %}*/
/* */
/* {% block stylesheets %}*/
/*     <link rel="stylesheet" href="{{ url('gantry-admin://assets/css-compiled/admin.css')|e }}" type="text/css" />*/
/*     <link rel="stylesheet" href="{{ url('gantry-admin://assets/css/font-awesome.min.css')|e }}" type="text/css" />*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/*     <script type="text/javascript" async="async" src="{{ url('gantry-admin://assets/js/main.js')|e }}"></script>*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div id="main-header" data-mode-indicator="production">*/
/*         {% include "@gantry-admin/partials/header.html.twig" %}*/
/*     </div>*/
/*     <div class="inner-container">*/
/*         {% include "@gantry-admin/partials/updates.html.twig" %}*/
/*         {% block gantry_content_wrapper %}*/
/*             <div data-g5-content-wrapper>*/
/*                 {% include "@gantry-admin/partials/navigation.html.twig" %}*/
/*                 <div class="g-grid">*/
/*                     <div class="g-block main-block">*/
/*                         <section id="g-main">*/
/*                             <div class="g-content" data-g5-content>*/
/*                                 {% block gantry %}*/
/*                                 {% endblock %}*/
/*                             </div>*/
/*                         </section>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         {% endblock %}*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block footer_section %}*/
/*     <footer id="footer">*/
/*         <div>*/
/*             {{ 'GANTRY5_PLATFORM_FOOTER'|trans|raw }}*/
/*         </div>*/
/*         {% set version = constant('GANTRY5_VERSION') %}*/
/*         {% set version_date = constant('GANTRY5_VERSION_DATE') %}*/
/*         <div>Version: <span class="g-version">{{ version }}</span> / Released: <span class="g-version-date">{{ version_date}}</span></div>*/
/*         <div><a href="#" data-changelog="{{ constant('GANTRY5_VERSION') }}">{{ 'GANTRY5_PLATFORM_CHANGELOG'|trans }}</a></div>*/
/*     </footer>*/
/* {% endblock %}*/
/* */
