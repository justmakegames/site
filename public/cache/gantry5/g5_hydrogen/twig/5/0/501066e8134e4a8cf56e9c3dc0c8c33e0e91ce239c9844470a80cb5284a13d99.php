<?php

/* @nucleus/layout/grid.html.twig */
class __TwigTemplate_0fddf24a89253be04484633b8b85eece6b1a7fd36a76e5ac96ecb32abe55386b extends Twig_Template
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
        ob_start();
        // line 2
        echo "    ";
        if ($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "children", array())) {
            // line 3
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
                // line 4
                echo "            ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/layout/grid.html.twig", 4)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
                // line 5
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
            // line 6
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "

";
        // line 10
        if (trim((isset($context["html"]) ? $context["html"] : null))) {
            // line 11
            echo "    <div class=\"g-grid";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array())) ? ((" " . twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array()), " ")))) : ("")), "html", null, true);
            echo "\">
      ";
            // line 12
            echo (isset($context["html"]) ? $context["html"] : null);
            echo "
    </div>
";
        }
        // line 15
        echo "

";
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 15,  74 => 12,  69 => 11,  67 => 10,  63 => 8,  59 => 6,  45 => 5,  42 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set html %}*/
/*     {% if segment.children %}*/
/*         {% for segment in segments %}*/
/*             {% include '@nucleus/layout/' ~ segment.type ~ '.html.twig' with { 'segments':segment.children } %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endset %}*/
/* */
/* */
/* {% if html|trim %}*/
/*     <div class="g-grid{{ segment.attributes.class ? ' ' ~ segment.attributes.class|join(' ')|e }}">*/
/*       {{ html|raw }}*/
/*     </div>*/
/* {% endif %}*/
/* */
/* */
/* */
