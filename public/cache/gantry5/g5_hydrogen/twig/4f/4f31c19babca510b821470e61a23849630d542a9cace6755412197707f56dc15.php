<?php

/* @particles/assets.html.twig */
class __TwigTemplate_9c662cd09a3f433d91506c69f5583e17fc260f9cbe6baa3de206e3943d5235f3 extends Twig_Template
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
        if ($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "enabled", array())) {
            // line 5
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
                // line 6
                echo "            ";
                $context["attr_extra"] = "";
                // line 7
                echo "            ";
                if ($this->getAttribute($context["css"], "extra", array())) {
                    // line 8
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["css"], "extra", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                        // line 9
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 10
                            echo "                        ";
                            $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                            // line 11
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 12
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 13
                    echo "            ";
                }
                // line 14
                echo "
            ";
                // line 15
                if ($this->getAttribute($context["css"], "location", array())) {
                    // line 16
                    echo "                <link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["css"], "location", array())), "html", null, true);
                    echo "\" type=\"text/css\"";
                    echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                    echo " />
            ";
                }
                // line 18
                echo "
            ";
                // line 19
                if ($this->getAttribute($context["css"], "inline", array())) {
                    // line 20
                    echo "                <style type=\"text/css\"";
                    echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                    echo ">";
                    echo $this->getAttribute($context["css"], "inline", array());
                    echo "</style>
            ";
                }
                // line 22
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "    ";
        }
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "    ";
        if ($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "enabled", array())) {
            // line 28
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "javascript", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 29
                echo "            ";
                if (($this->getAttribute($context["script"], "in_footer", array()) == false)) {
                    // line 30
                    echo "                ";
                    $context["attr_extra"] = "";
                    // line 31
                    echo "                ";
                    if ($this->getAttribute($context["script"], "extra", array())) {
                        // line 32
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["script"], "extra", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                            // line 33
                            echo "                        ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                                // line 34
                                echo "                            ";
                                $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                                // line 35
                                echo "                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 36
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 37
                        echo "                ";
                    }
                    // line 38
                    echo "
                ";
                    // line 39
                    if ($this->getAttribute($context["script"], "location", array())) {
                        // line 40
                        echo "                    <script src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["script"], "location", array())), "html", null, true);
                        echo "\" type=\"text/javascript\"";
                        echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                        echo "></script>
                ";
                    }
                    // line 42
                    echo "
                ";
                    // line 43
                    if ($this->getAttribute($context["script"], "inline", array())) {
                        // line 44
                        echo "                    <script type=\"text/javascript\"";
                        echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                        echo ">";
                        echo $this->getAttribute($context["script"], "inline", array());
                        echo "</script>
                ";
                    }
                    // line 46
                    echo "            ";
                }
                // line 47
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "    ";
        }
    }

    // line 51
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        if ($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "enabled", array())) {
            // line 53
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "javascript", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 54
                echo "            ";
                if (($this->getAttribute($context["script"], "in_footer", array()) == true)) {
                    // line 55
                    echo "                ";
                    $context["attr_extra"] = "";
                    // line 56
                    echo "
                ";
                    // line 57
                    if ($this->getAttribute($context["script"], "extra", array())) {
                        // line 58
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["script"], "extra", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                            // line 59
                            echo "                        ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                                // line 60
                                echo "                            ";
                                $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                                // line 61
                                echo "                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 62
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 63
                        echo "                ";
                    }
                    // line 64
                    echo "
                ";
                    // line 65
                    if ($this->getAttribute($context["script"], "location", array())) {
                        // line 66
                        echo "                    <script src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["script"], "location", array())), "html", null, true);
                        echo "\" type=\"text/javascript\"";
                        echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                        echo "></script>
                ";
                    }
                    // line 68
                    echo "
                ";
                    // line 69
                    if ($this->getAttribute($context["script"], "inline", array())) {
                        // line 70
                        echo "                    <script type=\"text/javascript\"";
                        echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
                        echo ">";
                        echo $this->getAttribute($context["script"], "inline", array());
                        echo "</script>
                ";
                    }
                    // line 72
                    echo "            ";
                }
                // line 73
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "    ";
        }
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
        return array (  285 => 74,  279 => 73,  276 => 72,  268 => 70,  266 => 69,  263 => 68,  255 => 66,  253 => 65,  250 => 64,  247 => 63,  241 => 62,  235 => 61,  232 => 60,  227 => 59,  222 => 58,  220 => 57,  217 => 56,  214 => 55,  211 => 54,  206 => 53,  203 => 52,  200 => 51,  195 => 48,  189 => 47,  186 => 46,  178 => 44,  176 => 43,  173 => 42,  165 => 40,  163 => 39,  160 => 38,  157 => 37,  151 => 36,  145 => 35,  142 => 34,  137 => 33,  132 => 32,  129 => 31,  126 => 30,  123 => 29,  118 => 28,  115 => 27,  112 => 26,  107 => 23,  101 => 22,  93 => 20,  91 => 19,  88 => 18,  80 => 16,  78 => 15,  75 => 14,  72 => 13,  66 => 12,  60 => 11,  57 => 10,  52 => 9,  47 => 8,  44 => 7,  41 => 6,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     {% if (particle.enabled) %}*/
/*         {% for css in particle.css %}*/
/*             {% set attr_extra = '' %}*/
/*             {% if css.extra %}*/
/*                 {% for attributes in css.extra %}*/
/*                     {% for key, value in attributes %}*/
/*                         {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                     {% endfor %}*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/* */
/*             {% if css.location %}*/
/*                 <link rel="stylesheet" href="{{ url(css.location) }}" type="text/css"{{ attr_extra|raw }} />*/
/*             {% endif %}*/
/* */
/*             {% if css.inline %}*/
/*                 <style type="text/css"{{ attr_extra|raw }}>{{ css.inline|raw }}</style>*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/*     {% if particle.enabled %}*/
/*         {% for script in particle.javascript %}*/
/*             {% if script.in_footer == false %}*/
/*                 {% set attr_extra = '' %}*/
/*                 {% if script.extra %}*/
/*                     {% for attributes in script.extra %}*/
/*                         {% for key, value in attributes %}*/
/*                             {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                         {% endfor %}*/
/*                     {% endfor %}*/
/*                 {% endif %}*/
/* */
/*                 {% if script.location %}*/
/*                     <script src="{{ url(script.location) }}" type="text/javascript"{{ attr_extra|raw }}></script>*/
/*                 {% endif %}*/
/* */
/*                 {% if script.inline %}*/
/*                     <script type="text/javascript"{{ attr_extra|raw }}>{{ script.inline|raw }}</script>*/
/*                 {% endif %}*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block javascript_footer %}*/
/*     {% if particle.enabled %}*/
/*         {% for script in particle.javascript %}*/
/*             {% if script.in_footer == true %}*/
/*                 {% set attr_extra = '' %}*/
/* */
/*                 {% if script.extra %}*/
/*                     {% for attributes in script.extra %}*/
/*                         {% for key, value in attributes %}*/
/*                             {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*                         {% endfor %}*/
/*                     {% endfor %}*/
/*                 {% endif %}*/
/* */
/*                 {% if script.location %}*/
/*                     <script src="{{ url(script.location) }}" type="text/javascript"{{ attr_extra|raw }}></script>*/
/*                 {% endif %}*/
/* */
/*                 {% if script.inline %}*/
/*                     <script type="text/javascript"{{ attr_extra|raw }}>{{ script.inline|raw }}</script>*/
/*                 {% endif %}*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* */
