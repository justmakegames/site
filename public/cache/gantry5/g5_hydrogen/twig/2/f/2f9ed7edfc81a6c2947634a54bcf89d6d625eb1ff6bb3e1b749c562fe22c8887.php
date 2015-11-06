<?php

/* @nucleus/layout/section.html.twig */
class __TwigTemplate_d67fbe9eabbc276f206932d9976b2972bbed84a7b65cda8b56b1963feee974f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["attr_class"] = (($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array())) ? (((" class=\"" . twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array()))) . "\"")) : (""));
        // line 2
        $context["attr_id"] = twig_replace_filter(twig_lower_filter($this->env, $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "title", array())), array(" " => "-"));
        // line 3
        $context["attr_extra"] = "";
        // line 4
        $context["tag_type"] = ((twig_in_filter((isset($context["attr_id"]) ? $context["attr_id"] : null), array(0 => "aside", 1 => "footer", 2 => "header", 3 => "main"))) ? ((isset($context["attr_id"]) ? $context["attr_id"] : null)) : ("section"));
        // line 5
        echo "
";
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "extra", array())) {
            // line 7
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "extra", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 8
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 9
                    echo "        ";
                    $context["attr_extra"] = ((((((isset($context["attr_extra"]) ? $context["attr_extra"] : null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                    // line 10
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 13
        echo "
";
        // line 14
        ob_start();
        // line 15
        echo "    ";
        if ($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "children", array())) {
            // line 16
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["segments"]) ? $context["segments"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
                // line 17
                echo "            ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/layout/section.html.twig", 17)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
                // line 18
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 21
        echo "
";
        // line 22
        if (trim((isset($context["html"]) ? $context["html"] : null))) {
            // line 23
            echo "    ";
            if (($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array(), "any", false, true), "boxed", array(), "any", true, true) &&  !$this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "boxed", array()))) {
                // line 24
                echo "        ";
                ob_start();
                // line 25
                echo "        <div class=\"g-container\">";
                echo (isset($context["html"]) ? $context["html"] : null);
                echo "</div>
        ";
                $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 27
                echo "    ";
            }
            // line 28
            echo "
    ";
            // line 29
            ob_start();
            // line 30
            echo "    <";
            echo twig_escape_filter($this->env, (isset($context["tag_type"]) ? $context["tag_type"] : null), "html", null, true);
            echo " id=\"g-";
            echo twig_escape_filter($this->env, (isset($context["attr_id"]) ? $context["attr_id"] : null), "html", null, true);
            echo "\" ";
            echo (isset($context["attr_class"]) ? $context["attr_class"] : null);
            echo (isset($context["attr_extra"]) ? $context["attr_extra"] : null);
            echo ">
        ";
            // line 31
            echo (isset($context["html"]) ? $context["html"] : null);
            echo "
    </";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["tag_type"]) ? $context["tag_type"] : null), "html", null, true);
            echo ">
    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 34
            echo "
    ";
            // line 35
            if ($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "boxed", array())) {
                // line 36
                echo "    <div class=\"g-container\">";
                echo (isset($context["html"]) ? $context["html"] : null);
                echo "</div>
    ";
            } else {
                // line 38
                echo "    ";
                echo (isset($context["html"]) ? $context["html"] : null);
                echo "
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 38,  154 => 36,  152 => 35,  149 => 34,  144 => 32,  140 => 31,  130 => 30,  128 => 29,  125 => 28,  122 => 27,  116 => 25,  113 => 24,  110 => 23,  108 => 22,  105 => 21,  101 => 19,  87 => 18,  84 => 17,  66 => 16,  63 => 15,  61 => 14,  58 => 13,  51 => 11,  45 => 10,  42 => 9,  37 => 8,  32 => 7,  30 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set attr_class = segment.attributes.class ? ' class="' ~ segment.attributes.class|e ~ '"' %}*/
/* {% set attr_id = segment.title|lower|replace({' ': '-'}) %}*/
/* {% set attr_extra = '' %}*/
/* {% set tag_type = (attr_id in ['aside', 'footer', 'header', 'main']) ? attr_id : 'section' %}*/
/* */
/* {% if segment.attributes.extra %}*/
/*     {% for attributes in segment.attributes.extra %}*/
/*         {% for key, value in attributes %}*/
/*         {% set attr_extra = attr_extra ~ ' ' ~ key|e ~ '="' ~ value|e('html_attr') ~ '"' %}*/
/*         {% endfor %}*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* {% set html %}*/
/*     {% if segment.children %}*/
/*         {% for segment in segments %}*/
/*             {% include '@nucleus/layout/' ~ segment.type ~ '.html.twig' with { 'segments':segment.children } %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endset %}*/
/* */
/* {% if html|trim %}*/
/*     {% if (segment.attributes.boxed is defined and not segment.attributes.boxed) %}*/
/*         {% set html %}*/
/*         <div class="g-container">{{ html|raw }}</div>*/
/*         {% endset %}*/
/*     {% endif %}*/
/* */
/*     {% set html %}*/
/*     <{{ tag_type }} id="g-{{ attr_id }}" {{ attr_class|raw }}{{ attr_extra|raw }}>*/
/*         {{ html|raw }}*/
/*     </{{ tag_type }}>*/
/*     {% endset %}*/
/* */
/*     {% if (segment.attributes.boxed) %}*/
/*     <div class="g-container">{{ html|raw }}</div>*/
/*     {% else %}*/
/*     {{ html|raw }}*/
/*     {% endif %}*/
/* {% endif %}*/
/* */
