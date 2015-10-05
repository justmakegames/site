<?php

/* @gantry-admin/partials/page.html.twig */
class __TwigTemplate_d9b9cd6e1c787c5bf2ed8ef328b5fa680097d0ad3aa81529fb6f74d9659ccdc7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'content' => array($this, 'block_content'),
            'footer_section' => array($this, 'block_footer_section'),
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
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 5
        echo "
    ";
        // line 6
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 17
        echo "<div id=\"g5-container\">
    ";
        // line 18
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "
    ";
        // line 21
        $this->displayBlock('footer_section', $context, $blocks);
        // line 23
        echo "</div>

";
        // line 25
        $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "finalize", array(), "method");
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-admin://assets/css-compiled/joomla-admin.css"));
        echo "\" type=\"text/css\" />
    ";
    }

    // line 6
    public function block_javascript($context, array $blocks = array())
    {
        // line 7
        echo "        <script>
            var GANTRY_AJAX_SUFFIX = '";
        // line 8
        echo $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "ajax_suffix", array());
        echo "';
            var GANTRY_AJAX_URL = '";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "%ajax%"), "method"));
        echo "';
            var GANTRY_AJAX_CONF_URL = '";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations/%ajax%"), "method"));
        echo "';
            var GANTRY_AJAX_NONCE = null;
            var GANTRY_PLATFORM = 'joomla';
        </script>
    ";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    ";
    }

    // line 21
    public function block_footer_section($context, array $blocks = array())
    {
        // line 22
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 22,  103 => 21,  99 => 19,  96 => 18,  87 => 10,  83 => 9,  79 => 8,  76 => 7,  73 => 6,  66 => 3,  63 => 2,  59 => 25,  55 => 23,  53 => 21,  50 => 20,  48 => 18,  45 => 17,  41 => 6,  38 => 5,  35 => 2,  23 => 1,);
    }
}
/* {% assets with { priority: 10 } %}*/
/*     {% block stylesheets %}*/
/*         <link rel="stylesheet" href="{{ url('gantry-admin://assets/css-compiled/joomla-admin.css')|e }}" type="text/css" />*/
/*     {% endblock %}*/
/* */
/*     {% block javascript %}*/
/*         <script>*/
/*             var GANTRY_AJAX_SUFFIX = '{{ gantry.ajax_suffix|raw }}';*/
/*             var GANTRY_AJAX_URL = '{{ gantry.route('%ajax%')|e }}';*/
/*             var GANTRY_AJAX_CONF_URL = '{{ gantry.route('configurations/%ajax%')|e }}';*/
/*             var GANTRY_AJAX_NONCE = null;*/
/*             var GANTRY_PLATFORM = 'joomla';*/
/*         </script>*/
/*     {% endblock %}*/
/* {% endassets -%}*/
/* */
/* <div id="g5-container">*/
/*     {% block content %}*/
/*     {% endblock %}*/
/* */
/*     {% block footer_section %}*/
/*     {% endblock %}*/
/* </div>*/
/* */
/* {% do gantry.platform.finalize() %}*/
/* */
