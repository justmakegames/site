<?php

/* @particles/analytics.html.twig */
class __TwigTemplate_60a0b9a757871966af321fd59a4aed57b3a69cf244367687ae157cb149370227 extends Twig_Template
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
            echo "
            ga('create', '";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "code", array()), "html", null, true);
            echo "', 'auto');
        ";
            // line 13
            if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "anonym", array())) {
                // line 14
                echo "            ga('set', 'anonymizeIp', true);
        ";
            }
            // line 16
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "ua", array()), "ssl", array())) {
                // line 17
                echo "            ga('set', 'forceSSL', true);
        ";
            }
            // line 19
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
        return array (  70 => 19,  66 => 17,  63 => 16,  59 => 14,  57 => 13,  53 => 12,  50 => 11,  44 => 10,  38 => 6,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
/* */
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
