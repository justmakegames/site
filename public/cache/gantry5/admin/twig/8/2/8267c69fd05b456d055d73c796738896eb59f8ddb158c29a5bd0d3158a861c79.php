<?php

/* forms/fields/menu/item.html.twig */
class __TwigTemplate_0df32a7fa504e1c1203fe9083eeda49d6535044bf4509412a341ec3c9793e95b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/select/selectize.html.twig", "forms/fields/menu/item.html.twig", 1);
        $this->blocks = array(
            'options' => array($this, 'block_options'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/select/selectize.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_options($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("options", $context, $blocks);
        echo "
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "menu", array()), "getGroupedItems", array(), "method"));
        foreach ($context['_seq'] as $context["group"] => $context["items"]) {
            // line 6
            echo "        ";
            if (twig_length_filter($this->env, $context["items"])) {
                // line 7
                echo "        <optgroup label=\"";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
                echo "\">
        ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["items"]);
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 9
                    echo "        <option
                ";
                    // line 11
                    echo "                ";
                    if (($context["key"] == (isset($context["value"]) ? $context["value"] : null))) {
                        echo "selected=\"selected\"";
                    }
                    // line 12
                    echo "                value=\"";
                    echo twig_escape_filter($this->env, $context["key"]);
                    echo "\"
                ";
                    // line 14
                    echo "                ";
                    if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "options", array()), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
                        echo "disabled=\"disabled\"";
                    }
                    // line 15
                    echo "                >";
                    echo $this->getAttribute($context["item"], "spacing", array());
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "label", array()));
                    echo "</option>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "        </optgroup>
        ";
            }
            // line 19
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['group'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms/fields/menu/item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 19,  80 => 17,  70 => 15,  65 => 14,  60 => 12,  55 => 11,  52 => 9,  48 => 8,  43 => 7,  40 => 6,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'forms/fields/select/selectize.html.twig' %}*/
/* */
/* {% block options %}*/
/*     {{ parent() }}*/
/*     {% for group, items in gantry.menu.getGroupedItems() %}*/
/*         {% if items|length %}*/
/*         <optgroup label="{{ group|capitalize }}">*/
/*         {% for key, item in items %}*/
/*         <option*/
/*                 {# required attribute structures #}*/
/*                 {% if key == value %}selected="selected"{% endif %}*/
/*                 value="{{ key|e }}"*/
/*                 {# non-gloval attribute structures #}*/
/*                 {% if field.options.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*                 >{{ item.spacing|raw }}{{ item.label|e }}</option>*/
/*         {% endfor %}*/
/*         </optgroup>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
