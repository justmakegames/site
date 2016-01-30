<?php

/* @particles/analytics.html.twig */
class __TwigTemplate_2ede8011af5065793b2e041e02f057812bd9c62f6a317752042963b8ef3076a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/analytics.html.twig", 1);
        $this->blocks = array(
            'javascript' => array($this, 'block_javascript'),
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
    public function block_javascript($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
    ";
        // line 5
        if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "code", array())) {
            // line 6
            echo "        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })";
            // line 10
            if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "debug", array())) {
                echo "(window,document,'script','//www.google-analytics.com/analytics_debug.js','ga');";
            } else {
                echo "(window,document,'script','//www.google-analytics.com/analytics.js','ga');";
            }
            // line 11
            echo "            ga('create', '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "code", array()), "html", null, true);
            echo "', 'auto');
        ";
            // line 12
            if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "anonym", array())) {
                // line 13
                echo "            ga('set', 'anonymizeIp', true);
        ";
            }
            // line 15
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "ssl", array())) {
                // line 16
                echo "            ga('set', 'forceSSL', true);
        ";
            }
            // line 18
            echo "            ga('send', 'pageview');

        </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/analytics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 18,  64 => 16,  61 => 15,  57 => 13,  55 => 12,  50 => 11,  44 => 10,  38 => 6,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block javascript %}*/
/*     {{ parent() }}*/
/*     {% if particle.ua.code  %}*/
/*         <script>*/
/*             (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){*/
/*             (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),*/
/*             m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)*/
/*             }){% if particle.ua.debug %}(window,document,'script','//www.google-analytics.com/analytics_debug.js','ga');{% else %}(window,document,'script','//www.google-analytics.com/analytics.js','ga');{% endif %}*/
/*             ga('create', '{{ particle.ua.code }}', 'auto');*/
/*         {% if particle.ua.anonym  %}*/
/*             ga('set', 'anonymizeIp', true);*/
/*         {% endif %}*/
/*         {% if particle.ua.ssl  %}*/
/*             ga('set', 'forceSSL', true);*/
/*         {% endif %}*/
/*             ga('send', 'pageview');*/
/* */
/*         </script>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
