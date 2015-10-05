<?php

/* menu/base.html.twig */
class __TwigTemplate_265fdf2fd3944dc3d486d2ec10fdd80cc20d50ea180fd8446adc74d8d94bd577 extends Twig_Template
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
        echo "<section";
        // line 2
        if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()), "id", array())) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()), "id", array()));
            echo "\"";
        }
        echo " class=\"menu-selector-bar";
        if ($this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()), "class", array())) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()), "class", array()));
        }
        echo "\" role=\"navigation\">
    <ul class=\"g-grid g-toplevel menu-selector\" data-mm-id=\"\" data-mm-base=\"\" data-mm-base-level=\"1\">
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["item"]) ? $context["item"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 5
            echo "            ";
            $context["active"] = (((twig_first($this->env, twig_split_filter($this->env, $this->getAttribute($context["child"], "path", array()), "/")) == twig_first($this->env, twig_split_filter($this->env, (isset($context["path"]) ? $context["path"] : null), "/")))) ? (" active") : (""));
            // line 6
            echo "            <li data-mm-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "path", array()), "html", null, true);
            echo "\" data-mm-level=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "level", array()), "html", null, true);
            echo "\"";
            if ((($this->getAttribute($context["child"], "type", array()) == "particle") || ($this->getAttribute($context["child"], "type", array()) == "module"))) {
                echo " class=\"g-menu-item-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "type", array()), "html", null, true);
                echo twig_escape_filter($this->env, (isset($context["active"]) ? $context["active"] : null), "html", null, true);
                echo "\" data-mm-original-type=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "type", array()), "html", null, true);
                echo "\"";
            } else {
                echo " class=\"";
                echo twig_escape_filter($this->env, (isset($context["active"]) ? $context["active"] : null), "html", null, true);
                echo "\"";
            }
            echo ">
                ";
            // line 7
            $this->loadTemplate("menu/item.html.twig", "menu/base.html.twig", 7)->display(array_merge($context, array("item" => $context["child"], "target" => "columns")));
            // line 8
            echo "            </li>
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </ul>
    <a class=\"global-menu-settings\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/edit", 1 => (isset($context["id"]) ? $context["id"] : null)), "method"), "html", null, true);
        echo "\">
        <i aria-label=\"Global Menu Settings\" class=\"fa fa-cog\"></i>
    </a>
</section>
<div class=\"column-container\" data-g5-menu-columns=\"\">
    ";
        // line 16
        if ((isset($context["columns"]) ? $context["columns"] : null)) {
            // line 17
            echo "        ";
            $this->loadTemplate("menu/columns.html.twig", "menu/base.html.twig", 17)->display(array_merge($context, array("item" => (isset($context["columns"]) ? $context["columns"] : null))));
            // line 18
            echo "    ";
        }
        // line 19
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "menu/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 19,  108 => 18,  105 => 17,  103 => 16,  95 => 11,  92 => 10,  77 => 8,  75 => 7,  55 => 6,  52 => 5,  35 => 4,  21 => 2,  19 => 1,);
    }
}
/* <section*/
/*     {%- if particle.css.id %} id="{{ particle.css.id|e }}"{% endif %} class="menu-selector-bar{%- if particle.css.class %} {{ particle.css.class|e }}{% endif %}" role="navigation">*/
/*     <ul class="g-grid g-toplevel menu-selector" data-mm-id="" data-mm-base="" data-mm-base-level="1">*/
/*         {% for child in item %}*/
/*             {% set active = (child.path|split('/')|first) == (path|split('/')|first) ? ' active' : '' %}*/
/*             <li data-mm-id="{{ child.path }}" data-mm-level="{{ child.level }}"{% if child.type == 'particle' or child.type == 'module' %} class="g-menu-item-{{ child.type }}{{ active }}" data-mm-original-type="{{ child.type }}"{% else %} class="{{ active }}"{% endif %}>*/
/*                 {% include 'menu/item.html.twig' with {'item': child, 'target': 'columns' } %}*/
/*             </li>*/
/*         {% endfor %}*/
/*     </ul>*/
/*     <a class="global-menu-settings" href="{{ gantry.route('menu/edit', id) }}">*/
/*         <i aria-label="Global Menu Settings" class="fa fa-cog"></i>*/
/*     </a>*/
/* </section>*/
/* <div class="column-container" data-g5-menu-columns="">*/
/*     {% if columns %}*/
/*         {% include 'menu/columns.html.twig' with {'item': columns } %}*/
/*     {% endif %}*/
/* </div>*/
/* */
