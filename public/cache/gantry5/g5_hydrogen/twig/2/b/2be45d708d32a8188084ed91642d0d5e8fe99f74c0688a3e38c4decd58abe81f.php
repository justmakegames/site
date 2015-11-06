<?php

/* @particles/assets.html.twig */
class __TwigTemplate_e93791158cfa95b50ded0d257d1b652a04e195db84acf914a003cca0db7db1b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/assets.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
            // line 5
            echo "        ";
            $context["attr_extra"] = "";
            // line 6
            echo "        ";
            if ($this->getAttribute($context["css"], "extra", array())) {
                // line 7
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["css"], "extra", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                    // line 8
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                    foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                        // line 9
                        echo "                    ";
                        $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                        // line 10
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 11
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 12
                echo "        ";
            }
            // line 13
            echo "
        <link rel=\"stylesheet\" href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["css"], "location", array())), "html", null, true);
            echo "\" type=\"text/css\"";
            echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
            echo " />

        ";
            // line 16
            if ($this->getAttribute($context["css"], "inline", array())) {
                // line 17
                echo "            <style type=\"text/css\"";
                echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                echo ">";
                echo $this->getAttribute($context["css"], "inline", array());
                echo "</style>
        ";
            }
            // line 19
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 22
    public function block_javascript($context, array $blocks = array())
    {
        // line 23
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "javascript", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 24
            echo "        ";
            if (($this->getAttribute($context["script"], "in_footer", array()) == false)) {
                // line 25
                echo "            ";
                $context["attr_extra"] = "";
                // line 26
                echo "            ";
                if ($this->getAttribute($context["script"], "extra", array())) {
                    // line 27
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["script"], "extra", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                        // line 28
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 29
                            echo "                        ";
                            $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                            // line 30
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 31
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 32
                    echo "            ";
                }
                // line 33
                echo "
            <script src=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["script"], "location", array())), "html", null, true);
                echo "\" type=\"text/javascript\"";
                echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                echo "></script>

            ";
                // line 36
                if ($this->getAttribute($context["script"], "inline", array())) {
                    // line 37
                    echo "                <script type=\"text/javascript\"";
                    echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                    echo ">";
                    echo $this->getAttribute($context["script"], "inline", array());
                    echo "</script>
            ";
                }
                // line 39
                echo "        ";
            }
            // line 40
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 43
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 44
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "javascript", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 45
            echo "        ";
            if (($this->getAttribute($context["script"], "in_footer", array()) == true)) {
                // line 46
                echo "            ";
                $context["attr_extra"] = "";
                // line 47
                echo "
            ";
                // line 48
                if ($this->getAttribute($context["script"], "extra", array())) {
                    // line 49
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["script"], "extra", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                        // line 50
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 51
                            echo "                        ";
                            $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                            // line 52
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 53
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 54
                    echo "            ";
                }
                // line 55
                echo "
            <script src=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["script"], "location", array())), "html", null, true);
                echo "\" type=\"text/javascript\"";
                echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                echo "></script>

            ";
                // line 58
                if ($this->getAttribute($context["script"], "inline", array())) {
                    // line 59
                    echo "                <script type=\"text/javascript\"";
                    echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                    echo ">";
                    echo $this->getAttribute($context["script"], "inline", array());
                    echo "</script>
            ";
                }
                // line 61
                echo "        ";
            }
            // line 62
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@particles/assets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 62,  243 => 61,  235 => 59,  233 => 58,  226 => 56,  223 => 55,  220 => 54,  214 => 53,  208 => 52,  205 => 51,  200 => 50,  195 => 49,  193 => 48,  190 => 47,  187 => 46,  184 => 45,  179 => 44,  176 => 43,  168 => 40,  165 => 39,  157 => 37,  155 => 36,  148 => 34,  145 => 33,  142 => 32,  136 => 31,  130 => 30,  127 => 29,  122 => 28,  117 => 27,  114 => 26,  111 => 25,  108 => 24,  103 => 23,  100 => 22,  92 => 19,  84 => 17,  82 => 16,  75 => 14,  72 => 13,  69 => 12,  63 => 11,  57 => 10,  54 => 9,  49 => 8,  44 => 7,  41 => 6,  38 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     {% for css in particle.css %}*/
/*         {% set attr_extra = '' %}*/
/*         {% if css.extra %}*/
/*             {% for attributes in css.extra %}*/
/*                 {% for key, value in attributes %}*/
/*                     {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                 {% endfor %}*/
/*             {% endfor %}*/
/*         {% endif %}*/
/* */
/*         <link rel="stylesheet" href="{{ url(css.location) }}" type="text/css"{{ attr_extra|raw }} />*/
/* */
/*         {% if css.inline %}*/
/*             <style type="text/css"{{ attr_extra|raw }}>{{ css.inline|raw }}</style>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/*     {% for script in particle.javascript %}*/
/*         {% if script.in_footer == false %}*/
/*             {% set attr_extra = '' %}*/
/*             {% if script.extra %}*/
/*                 {% for attributes in script.extra %}*/
/*                     {% for key, value in attributes %}*/
/*                         {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                     {% endfor %}*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/* */
/*             <script src="{{ url(script.location) }}" type="text/javascript"{{ attr_extra|raw }}></script>*/
/* */
/*             {% if script.inline %}*/
/*                 <script type="text/javascript"{{ attr_extra|raw }}>{{ script.inline|raw }}</script>*/
/*             {% endif %}*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
/* {% block javascript_footer %}*/
/*     {% for script in particle.javascript %}*/
/*         {% if script.in_footer == true %}*/
/*             {% set attr_extra = '' %}*/
/* */
/*             {% if script.extra %}*/
/*                 {% for attributes in script.extra %}*/
/*                     {% for key, value in attributes %}*/
/*                         {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                     {% endfor %}*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/* */
/*             <script src="{{ url(script.location) }}" type="text/javascript"{{ attr_extra|raw }}></script>*/
/* */
/*             {% if script.inline %}*/
/*                 <script type="text/javascript"{{ attr_extra|raw }}>{{ script.inline|raw }}</script>*/
/*             {% endif %}*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
/* */
