<?php

/* menu/item.html.twig */
class __TwigTemplate_09925aaff2d8418e0747242a06a083aa643089210bbce107bd225328e00620ba extends Twig_Template
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
        $context["ajaxTarget"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) > 1)) ? ("data-g5-ajaxify-target-parent=\".submenu-column\"") : ("data-g5-ajaxify-target=\"[data-g5-menu-columns]\""));
        // line 2
        echo "
";
        // line 3
        $context["attributes"] = ((("data-g5-ajaxify=\"\" data-g5-ajaxify-params=\"" . twig_escape_filter($this->env, "{\"inline\":1}", "html_attr")) . "\" ") . (isset($context["ajaxTarget"]) ? $context["ajaxTarget"] : null));
        // line 4
        echo "
";
        // line 5
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "path", array())) {
            // line 6
            echo "<a ";
            echo (isset($context["attributes"]) ? $context["attributes"] : null);
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu", 1 => (isset($context["id"]) ? $context["id"] : null), 2 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "path", array())), "method"), "html", null, true);
            echo "\" class=\"menu-item\">
";
        } else {
            // line 8
            echo "<span class=\"menu-item\">
";
        }
        // line 10
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()) == "particle")) {
            // line 11
            echo "    <span class=\"menu-item-content\">
        <span class=\"menu-item-title\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()));
            echo "</span>
        ";
            // line 13
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array())) {
                echo "<span class=\"menu-item-subtitle\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array()));
                echo "</span>";
            }
            // line 14
            echo "    </span>
    <span class=\"badge menu-item-type\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "particle", array()));
            echo "</span>
";
        } else {
            // line 17
            echo "    ";
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())) {
                // line 18
                echo "        <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())));
                echo "\" />
    ";
            } elseif ($this->getAttribute(            // line 19
(isset($context["item"]) ? $context["item"] : null), "icon", array())) {
                // line 20
                echo "        <i class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array()));
                echo "\"></i>
    ";
            }
            // line 22
            echo "    ";
            if (( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon_only", array()) ||  !($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()) || $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array())))) {
                // line 23
                echo "        <span class=\"menu-item-content\">
            <span class=\"menu-item-title\">";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()));
                echo "</span>
                ";
                // line 25
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array())) {
                    echo "<span class=\"menu-item-subtitle\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array()));
                    echo "</span>";
                }
                // line 26
                echo "        </span>
    ";
            }
            // line 28
            echo "    ";
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) {
                // line 29
                echo "<span class=\"parent-indicator\"></span>";
            }
        }
        // line 32
        if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "path", array())) {
            // line 33
            echo "</span>
";
        } else {
            // line 35
            echo "</a>
";
        }
        // line 37
        echo "<a class=\"config-cog\" href=\"";
        echo ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()) == "particle")) ? (twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/particle"), "method"))) : (twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/edit", 1 => (isset($context["id"]) ? $context["id"] : null), 2 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "path", array())), "method"))));
        echo "\">
    <i aria-label=\"Menu Item Settings\" class=\"fa fa-cog\"></i>
</a>
";
    }

    public function getTemplateName()
    {
        return "menu/item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 37,  115 => 35,  111 => 33,  109 => 32,  105 => 29,  102 => 28,  98 => 26,  92 => 25,  88 => 24,  85 => 23,  82 => 22,  76 => 20,  74 => 19,  69 => 18,  66 => 17,  61 => 15,  58 => 14,  52 => 13,  48 => 12,  45 => 11,  43 => 10,  39 => 8,  31 => 6,  29 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set ajaxTarget = (item.level > 1) ? 'data-g5-ajaxify-target-parent=".submenu-column"' : 'data-g5-ajaxify-target="[data-g5-menu-columns]"' %}*/
/* */
/* {% set attributes = 'data-g5-ajaxify="" data-g5-ajaxify-params="' ~ ('{"inline":1}'|escape('html_attr')) ~ '" ' ~ ajaxTarget %}*/
/* */
/* {% if item.path %}*/
/* <a {{ attributes|raw }} href="{{ gantry.route('menu', id, item.path) }}" class="menu-item">*/
/* {% else %}*/
/* <span class="menu-item">*/
/* {% endif %}*/
/* {% if item.type == 'particle' %}*/
/*     <span class="menu-item-content">*/
/*         <span class="menu-item-title">{{ item.title|e }}</span>*/
/*         {% if item.subtitle %}<span class="menu-item-subtitle">{{ item.subtitle|e }}</span>{% endif %}*/
/*     </span>*/
/*     <span class="badge menu-item-type">{{ item.particle|e }}</span>*/
/* {% else %}*/
/*     {% if item.image %}*/
/*         <img src="{{ url(item.image)|e }}" />*/
/*     {% elseif item.icon %}*/
/*         <i class="{{ item.icon|e }}"></i>*/
/*     {% endif %}*/
/*     {% if not item.icon_only or not (item.image or item.icon) %}*/
/*         <span class="menu-item-content">*/
/*             <span class="menu-item-title">{{ item.title|e }}</span>*/
/*                 {% if item.subtitle %}<span class="menu-item-subtitle">{{ item.subtitle|e }}</span>{% endif %}*/
/*         </span>*/
/*     {% endif %}*/
/*     {% if (item.children) -%}*/
/*         <span class="parent-indicator"></span>*/
/*     {%- endif %}*/
/* {% endif %}*/
/* {% if not item.path %}*/
/* </span>*/
/* {% else %}*/
/* </a>*/
/* {% endif %}*/
/* <a class="config-cog" href="{{ item.type == 'particle' ? gantry.route('menu/particle')|e : gantry.route('menu/edit', id, item.path)|e }}">*/
/*     <i aria-label="Menu Item Settings" class="fa fa-cog"></i>*/
/* </a>*/
/* */
