<?php

/* @nucleus/content/particle.html.twig */
class __TwigTemplate_f2bd9a867a51fe9dd3c2697eff55e3165401f3e742f7120fb58917b7c65bb3df extends Twig_Template
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
            if ((isset($context["noConfig"]) ? $context["noConfig"] : null)) {
                // line 3
                echo "        ";
                $context["enabled"] = true;
                // line 4
                echo "        ";
                $context["particle"] = $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array());
                // line 5
                echo "    ";
            } else {
                // line 6
                echo "        ";
                $context["enabled"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".enabled"), 1 => 1), "method");
                // line 7
                echo "        ";
                $context["particle"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "getJoined", array(0 => ("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())), 1 => $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array())), "method");
                // line 8
                echo "    ";
            }
            // line 9
            echo "
    ";
            // line 10
            ob_start();
            // line 11
            echo "        ";
            if (((isset($context["enabled"]) ? $context["enabled"] : null) && ((null === $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())))) {
                // line 12
                echo "            ";
                try {
                    $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute(                    // line 13
(isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig")), "@nucleus/content/particle.html.twig", 12)->display($context);
                } catch (Twig_Error_Loader $e) {
                    // ignore missing template
                }

                // line 15
                echo "        ";
            }
            // line 16
            echo "    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 17
            echo "
    ";
            // line 18
            $context["classes"] = trim(((( !(isset($context["inContent"]) ? $context["inContent"] : null)) ? ("g-content ") : ("")) . twig_join_filter($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "classes", array()), " ")));
            // line 19
            echo "    ";
            if (trim((isset($context["html"]) ? $context["html"] : null))) {
                // line 20
                echo "    ";
                if ((isset($context["classes"]) ? $context["classes"] : null)) {
                    // line 21
                    echo "    <div class=\"";
                    echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html", null, true);
                    echo "\">
        ";
                    // line 22
                    echo (isset($context["html"]) ? $context["html"] : null);
                    echo "
    </div>
    ";
                } else {
                    // line 25
                    echo "        ";
                    echo (isset($context["html"]) ? $context["html"] : null);
                    echo "
    ";
                }
                // line 27
                echo "    ";
            }
            // line 28
            echo "
";
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            $context['e'] = $e;
            // line 30
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
        return array (  101 => 30,  95 => 28,  92 => 27,  86 => 25,  80 => 22,  75 => 21,  72 => 20,  69 => 19,  67 => 18,  64 => 17,  61 => 16,  58 => 15,  52 => 13,  49 => 12,  46 => 11,  44 => 10,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  26 => 4,  23 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% try %}*/
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
/*             '@particles/' ~ segment.subtype ~ '.html.twig']*/
/*             ignore missing %}*/
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
