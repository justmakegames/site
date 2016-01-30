<?php

/* @nucleus/content/pagecontent.html.twig */
class __TwigTemplate_75b4862a1f81a8e6bcdf4e433030cf11c69a26c4b5c7b2279bc076d1d0ce416c extends Twig_Template
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
        $context["subtype"] = (($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array()), $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "type", array()))) : ($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "type", array())));
        // line 2
        $context["enabled"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("particles." . (isset($context["subtype"]) ? $context["subtype"] : null)) . ".enabled"), 1 => 1), "method");
        // line 3
        echo "
";
        // line 4
        ob_start();
        // line 5
        echo "    ";
        if (((isset($context["enabled"]) ? $context["enabled"] : null) && ((null === $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())))) {
            // line 6
            echo "        ";
            if (((isset($context["subtype"]) ? $context["subtype"] : null) == "pagecontent")) {
                // line 7
                echo "            ";
                $context["class"] = "g-content";
                // line 8
                echo "            ";
                echo (isset($context["content"]) ? $context["content"] : null);
                echo "
        ";
            } elseif ((            // line 9
(isset($context["subtype"]) ? $context["subtype"] : null) == "system-messages")) {
                // line 10
                echo "            ";
                $context["class"] = "g-system-messages";
                // line 11
                echo "            ";
                echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "displaySystemMessages", array(), "method");
                echo "
        ";
            }
            // line 13
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        echo "
";
        // line 16
        if (trim((isset($context["html"]) ? $context["html"] : null))) {
            // line 17
            echo "    <div class=\"";
            echo twig_escape_filter($this->env, ((isset($context["class"]) ? $context["class"] : null) . (($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array())) ? ((" " . twig_join_filter($this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "class", array()), " "))) : (""))), "html", null, true);
            echo "\">
        ";
            // line 18
            echo (isset($context["html"]) ? $context["html"] : null);
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/content/pagecontent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 18,  62 => 17,  60 => 16,  57 => 15,  53 => 13,  47 => 11,  44 => 10,  42 => 9,  37 => 8,  34 => 7,  31 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set subtype = segment.subtype|default(segment.type) %}*/
/* {% set enabled = gantry.config.get('particles.' ~ subtype ~ '.enabled', 1) %}*/
/* */
/* {% set html %}*/
/*     {% if enabled and (segment.attributes.enabled is null or segment.attributes.enabled) %}*/
/*         {% if subtype == 'pagecontent' %}*/
/*             {% set class = 'g-content' %}*/
/*             {{ content|raw }}*/
/*         {% elseif subtype == 'system-messages' %}*/
/*             {% set class = 'g-system-messages' %}*/
/*             {{ gantry.platform.displaySystemMessages()|raw }}*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endset %}*/
/* */
/* {% if html|trim %}*/
/*     <div class="{{ class ~ (segment.attributes.class ? ' ' ~ segment.attributes.class|join(' ')) }}">*/
/*         {{ html|raw }}*/
/*     </div>*/
/* {% endif %}*/
/* */
