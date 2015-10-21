<?php

/* @nucleus/page_head.html.twig */
class __TwigTemplate_007600591c2e24bee046de7afc1b4eb00f97131a17d2255666b8e87fea0d892c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head_stylesheets' => array($this, 'block_head_stylesheets'),
            'head_platform' => array($this, 'block_head_platform'),
            'head_overrides' => array($this, 'block_head_overrides'),
            'head_meta' => array($this, 'block_head_meta'),
            'head_title' => array($this, 'block_head_title'),
            'head_application' => array($this, 'block_head_application'),
            'head_ie_stylesheets' => array($this, 'block_head_ie_stylesheets'),
            'head' => array($this, 'block_head'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array("priority" => 10);
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
        $this->displayBlock('head_stylesheets', $context, $blocks);
        // line 12
        $this->displayBlock('head_platform', $context, $blocks);
        // line 13
        echo "
    ";
        // line 14
        $this->displayBlock('head_overrides', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 23
        echo "<head>";
        // line 24
        $this->displayBlock('head_meta', $context, $blocks);
        // line 32
        $this->displayBlock('head_title', $context, $blocks);
        // line 36
        echo "
    ";
        // line 37
        $this->displayBlock('head_application', $context, $blocks);
        // line 41
        echo "
    ";
        // line 42
        $this->displayBlock('head_ie_stylesheets', $context, $blocks);
        // line 50
        $this->displayBlock('head', $context, $blocks);
        // line 51
        echo "</head>
";
    }

    // line 2
    public function block_head_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-assets://css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-engine://css-compiled/nucleus.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "configuration", array(), "any", false, true), "css", array(), "any", false, true), "persistent", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "configuration", array(), "any", false, true), "css", array(), "any", false, true), "persistent", array()), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "files", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "files", array()))));
        foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
            // line 6
            $context["url"] = $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method"));
            if ((isset($context["url"]) ? $context["url"] : null)) {
                // line 7
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method")), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    ";
    }

    // line 12
    public function block_head_platform($context, array $blocks = array())
    {
    }

    // line 14
    public function block_head_overrides($context, array $blocks = array())
    {
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "overrides", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
            // line 16
            $context["url"] = $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method"));
            if ((isset($context["url"]) ? $context["url"] : null)) {
                // line 17
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method")), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    ";
    }

    // line 24
    public function block_head_meta($context, array $blocks = array())
    {
        // line 25
        echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
        ";
        // line 27
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "styles", array()), "base", array()), "favicon", array())) {
            // line 28
            echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "styles", array()), "base", array()), "favicon", array())), "html", null, true);
            echo "\" />
        ";
        }
    }

    // line 32
    public function block_head_title($context, array $blocks = array())
    {
        // line 33
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Title</title>";
    }

    // line 37
    public function block_head_application($context, array $blocks = array())
    {
        // line 38
        echo twig_join_filter($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "styles", array(0 => "head"), "method"), "
    ");
        echo "
        ";
        // line 39
        echo twig_join_filter($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "scripts", array(0 => "head"), "method"), "
    ");
    }

    // line 42
    public function block_head_ie_stylesheets($context, array $blocks = array())
    {
        // line 43
        echo "<!--[if (gte IE 8)&(lte IE 9)]>
        <script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-assets://js/html5shiv-printshiv.min.js"), "html", null, true);
        echo "\"></script>
        <link rel=\"stylesheet\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-engine://css/nucleus-ie9.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-assets://js/matchmedia.polyfill.js"), "html", null, true);
        echo "\"></script>
        <![endif]-->
    ";
    }

    // line 50
    public function block_head($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@nucleus/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 50,  188 => 46,  184 => 45,  180 => 44,  177 => 43,  174 => 42,  169 => 39,  164 => 38,  161 => 37,  156 => 33,  153 => 32,  145 => 28,  143 => 27,  139 => 25,  136 => 24,  132 => 20,  122 => 17,  119 => 16,  115 => 15,  112 => 14,  107 => 12,  103 => 10,  93 => 7,  90 => 6,  86 => 5,  82 => 4,  77 => 3,  74 => 2,  69 => 51,  67 => 50,  65 => 42,  62 => 41,  60 => 37,  57 => 36,  55 => 32,  53 => 24,  51 => 23,  47 => 14,  44 => 13,  42 => 12,  39 => 2,  27 => 1,);
    }
}
/* {% assets with { priority: 10 } %}*/
/*     {% block head_stylesheets -%}*/
/*         <link rel="stylesheet" href="{{ url('gantry-assets://css/font-awesome.min.css') }}" type="text/css"/>*/
/*         <link rel="stylesheet" href="{{ url('gantry-engine://css-compiled/nucleus.css') }}" type="text/css"/>*/
/*         {% for css in gantry.theme.configuration.css.persistent|default(gantry.theme.configuration.css.files) %}*/
/*             {%- set url = url(gantry.theme.css(css)) %}{% if url %}*/
/*             <link rel="stylesheet" href="{{ url(gantry.theme.css(css)) }}" type="text/css"/>*/
/*         {% endif %}*/
/*         {%- endfor %}*/
/*     {% endblock -%}*/
/* */
/*     {% block head_platform %}{% endblock %}*/
/* */
/*     {% block head_overrides -%}*/
/*         {% for css in gantry.theme.configuration.css.overrides %}*/
/*             {%- set url = url(gantry.theme.css(css)) %}{% if url %}*/
/*             <link rel="stylesheet" href="{{ url(gantry.theme.css(css)) }}" type="text/css"/>*/
/*         {% endif %}*/
/*         {%- endfor %}*/
/*     {% endblock -%}*/
/* {% endassets -%}*/
/* */
/* <head>*/
/*     {%- block head_meta -%}*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge" />*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1.0" />*/
/*         {% if gantry.config.styles.base.favicon %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ url(gantry.config.styles.base.favicon) }}" />*/
/*         {% endif %}*/
/*     {%- endblock %}*/
/* */
/*     {%- block head_title -%}*/
/*         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/*         <title>Title</title>*/
/*     {%- endblock %}*/
/* */
/*     {% block head_application -%}*/
/*         {{ gantry.styles('head')|join("\n    ")|raw }}*/
/*         {{ gantry.scripts('head')|join("\n    ")|raw }}*/
/*     {%- endblock %}*/
/* */
/*     {% block head_ie_stylesheets -%}*/
/*         <!--[if (gte IE 8)&(lte IE 9)]>*/
/*         <script type="text/javascript" src="{{ url('gantry-assets://js/html5shiv-printshiv.min.js') }}"></script>*/
/*         <link rel="stylesheet" href="{{ url('gantry-engine://css/nucleus-ie9.css') }}" type="text/css"/>*/
/*         <script type="text/javascript" src="{{ url('gantry-assets://js/matchmedia.polyfill.js') }}"></script>*/
/*         <![endif]-->*/
/*     {% endblock -%}*/
/* */
/*     {% block head %}{% endblock %}*/
/* </head>*/
/* */
