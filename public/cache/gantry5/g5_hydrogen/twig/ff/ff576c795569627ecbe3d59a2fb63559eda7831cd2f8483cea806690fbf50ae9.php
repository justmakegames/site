<?php

/* @nucleus/content/particle.html.twig */
class __TwigTemplate_c95daea78a0b95bddb954d740218b60692b03bbed5056b01ff726205c44dea56 extends Twig_Template
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
        try {            // line 2
            echo "    ";
            $context["id"] = $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "id", array());
            // line 3
            echo "    ";
            if ((isset($context["noConfig"]) ? $context["noConfig"] : null)) {
                // line 4
                echo "        ";
                $context["enabled"] = true;
                // line 5
                echo "        ";
                $context["particle"] = $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array());
                // line 6
                echo "    ";
            } else {
                // line 7
                echo "        ";
                $context["enabled"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".enabled"), 1 => 1), "method");
                // line 8
                echo "        ";
                $context["particle"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "getJoined", array(0 => ("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())), 1 => $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array())), "method");
                // line 9
                echo "    ";
            }
            // line 10
            echo "
    ";
            // line 11
            ob_start();
            // line 12
            echo "        ";
            if (((isset($context["enabled"]) ? $context["enabled"] : null) && ((null === $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())))) {
                // line 13
                echo "            ";
                $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute(                // line 14
(isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig"), 2 => "@nucleus/content/missing.html.twig"), "@nucleus/content/particle.html.twig", 13)->display($context);
                // line 16
                echo "        ";
            }
            // line 17
            echo "    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 18
            echo "
    ";
            // line 19
            $context["classes"] = trim(((( !(isset($context["inContent"]) ? $context["inContent"] : null)) ? ("g-content ") : ("")) . twig_join_filter($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "classes", array()), " ")));
            // line 20
            echo "    ";
            if (trim((isset($context["html"]) ? $context["html"] : null))) {
                // line 21
                echo "    ";
                if ((isset($context["classes"]) ? $context["classes"] : null)) {
                    // line 22
                    echo "    <div class=\"";
                    echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html", null, true);
                    echo "\">
        ";
                    // line 23
                    echo (isset($context["html"]) ? $context["html"] : null);
                    echo "
    </div>
    ";
                } else {
                    // line 26
                    echo "        ";
                    echo (isset($context["html"]) ? $context["html"] : null);
                    echo "
    ";
                }
                // line 28
                echo "    ";
            }
            // line 29
            echo "
";
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            $context['e'] = $e;
            // line 31
            echo "    <div class=\"alert alert-error\"><strong>Error</strong> while rendering ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array()), "html", null, true);
            echo " particle.</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/content/particle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 31,  93 => 29,  90 => 28,  84 => 26,  78 => 23,  73 => 22,  70 => 21,  67 => 20,  65 => 19,  62 => 18,  59 => 17,  56 => 16,  54 => 14,  52 => 13,  49 => 12,  47 => 11,  44 => 10,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  26 => 4,  23 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% try %}*/
/*     {% set id = segment.id %}*/
/*     {% if noConfig %}*/
/*         {% set enabled = true %}*/
/*         {% set particle = segment.attributes %}*/
/*     {% else %}*/
/*         {% set enabled = gantry.config.get('particles.' ~ segment.subtype ~ '.enabled', 1) %}*/
/*         {% set particle = gantry.config.getJoined('particles.' ~ segment.subtype, segment.attributes) %}*/
/*     {% endif %}*/
/* */
/*     {% set html %}*/
/*         {% if enabled and (segment.attributes.enabled is null or segment.attributes.enabled) %}*/
/*             {% include ['particles/' ~ segment.subtype ~ '.html.twig',*/
/*             '@particles/' ~ segment.subtype ~ '.html.twig',*/
/*             '@nucleus/content/missing.html.twig'] %}*/
/*         {% endif %}*/
/*     {% endset %}*/
/* */
/*     {% set classes = ((not inContent ? 'g-content ' : '') ~ segment.classes|join(' '))|trim %}*/
/*     {% if html|trim %}*/
/*     {% if classes %}*/
/*     <div class="{{ classes }}">*/
/*         {{ html|raw }}*/
/*     </div>*/
/*     {% else %}*/
/*         {{ html|raw }}*/
/*     {% endif %}*/
/*     {% endif %}*/
/* */
/* {% catch %}*/
/*     <div class="alert alert-error"><strong>Error</strong> while rendering {{ segment.subtype }} particle.</div>*/
/* {% endtry %}*/
/* */
