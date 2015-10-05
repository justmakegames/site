<?php

/* @gantry-admin//pages/menu/menu.html.twig */
class __TwigTemplate_185f55533a09bbe6ace3c636d4fb60bee8756c022010a7bb59b417a0cc2767ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'gantry' => array($this, 'block_gantry'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin//pages/menu/menu.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu", 1 => (isset($context["id"]) ? $context["id"] : null)), "method"), "html", null, true);
        echo "\" data-mm-container>
    <div class=\"menu-header\">
        <span class=\"float-right\">
            <button class=\"button button-back-to-conf\"><i class=\"fa fa-fw fa-arrow-left\"></i> <span>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "</span></button>
            <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_MENU"), "html", null, true);
        echo "\"><i class=\"fa fa-fw fa-check\"></i> <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_MENU"), "html", null, true);
        echo "</span></button>
        </span>
        <h2 class=\"page-title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_MENU_EDITOR"), "html", null, true);
        echo "</h2>
        <select placeholder=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT_ELI"), "html", null, true);
        echo "\" data-selectize-ajaxify data-selectize data-g5-ajaxify-target=\"[data-g5-content]\" class=\"menu-select-wrap\">
            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu_name"]) {
            // line 13
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["menu_name"]);
            echo "\"
                    ";
            // line 14
            if (((isset($context["id"]) ? $context["id"] : null) == $context["menu_name"])) {
                echo "selected=\"selected\"";
            }
            // line 15
            echo "                    data-data=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("url" => $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu", 1 => $context["menu_name"]), "method"))), "html_attr");
            echo "\">
                ";
            // line 16
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["menu_name"]));
            echo ((((isset($context["default_menu"]) ? $context["default_menu"] : null) == $context["menu_name"])) ? (" ★") : (""));
            echo "
            </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        </select>
    </div>

    <div class=\"g5-mm-particles-picker\">
        <ul class=\"g-menu-addblock\">
            <li data-mm-blocktype=\"module\" data-mm-id=\"__module\"><span class=\"menu-item\"><i class=\"fa fa-fw fa-arrows-alt\"></i> <span class=\"title\">";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_MODULE"), "html", null, true);
        echo "</span></span> <a class=\"config-cog\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/select/module"), "method"), "html", null, true);
        echo "\"><i aria-label=\"Menu Module Item Settings\" class=\"fa fa-cog\"></i></a></li>
            <li data-mm-blocktype=\"particle\" data-mm-id=\"__particle\"><span class=\"menu-item\"><i class=\"fa fa-fw fa-arrows-alt\"></i> <span class=\"title\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PARTICLE"), "html", null, true);
        echo "</span></span></span> <a class=\"config-cog\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/select/particle"), "method"), "html", null, true);
        echo "\"><i aria-label=\"Menu Particle Item Settings\" class=\"fa fa-cog\"></i></a></li>
        </ul>
    </div>
    <div id=\"menu-editor\"
         data-menu-ordering=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "ordering", array())), "html_attr");
        echo "\"
         data-menu-items=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "items", array())), "html_attr");
        echo "\"
         data-menu-settings=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "settings", array())), "html_attr");
        echo "\">
        ";
        // line 32
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "items", array()))) {
            // line 33
            echo "            ";
            $this->loadTemplate("menu/base.html.twig", "@gantry-admin//pages/menu/menu.html.twig", 33)->display(array_merge($context, array("item" => $this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()))));
            // line 34
            echo "        ";
        } else {
            // line 35
            echo "            ";
            $this->loadTemplate("menu/empty.html.twig", "@gantry-admin//pages/menu/menu.html.twig", 35)->display(array_merge($context, array("item" => $this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()))));
            // line 36
            echo "        ";
        }
        // line 37
        echo "    </div>

    <div id=\"trash\" data-mm-eraseparticle><div class=\"trash-zone\">&times;</div><span>";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DROP_DELETE"), "html", null, true);
        echo "</span></div>
</form>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin//pages/menu/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 39,  132 => 37,  129 => 36,  126 => 35,  123 => 34,  120 => 33,  118 => 32,  114 => 31,  110 => 30,  106 => 29,  97 => 25,  91 => 24,  84 => 19,  74 => 16,  69 => 15,  65 => 14,  60 => 13,  56 => 12,  52 => 11,  48 => 10,  41 => 8,  37 => 7,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/* <form method="post" action="{{ gantry.route('menu', id) }}" data-mm-container>*/
/*     <div class="menu-header">*/
/*         <span class="float-right">*/
/*             <button class="button button-back-to-conf"><i class="fa fa-fw fa-arrow-left"></i> <span>{{ 'GANTRY5_PLATFORM_BACK_SETUP'|trans }}</span></button>*/
/*             <button type="submit" class="button button-primary button-save" data-save="{{ 'GANTRY5_PLATFORM_MENU'|trans }}"><i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_MENU'|trans }}</span></button>*/
/*         </span>*/
/*         <h2 class="page-title">{{ 'GANTRY5_PLATFORM_MENU_EDITOR'|trans }}</h2>*/
/*         <select placeholder="{{ 'GANTRY5_PLATFORM_SELECT_ELI'|trans }}" data-selectize-ajaxify data-selectize data-g5-ajaxify-target="[data-g5-content]" class="menu-select-wrap">*/
/*             {% for menu_name in menus %}*/
/*             <option value="{{ menu_name|e }}"*/
/*                     {% if id == menu_name %}selected="selected"{% endif %}*/
/*                     data-data="{{ {url: gantry.route('menu', menu_name)}|json_encode|e('html_attr') }}">*/
/*                 {{ menu_name|capitalize|e }}{{ default_menu == menu_name ? ' ★' : '' }}*/
/*             </option>*/
/*             {% endfor %}*/
/*         </select>*/
/*     </div>*/
/* */
/*     <div class="g5-mm-particles-picker">*/
/*         <ul class="g-menu-addblock">*/
/*             <li data-mm-blocktype="module" data-mm-id="__module"><span class="menu-item"><i class="fa fa-fw fa-arrows-alt"></i> <span class="title">{{ 'GANTRY5_PLATFORM_MODULE'|trans }}</span></span> <a class="config-cog" href="{{ gantry.route('menu/select/module') }}"><i aria-label="Menu Module Item Settings" class="fa fa-cog"></i></a></li>*/
/*             <li data-mm-blocktype="particle" data-mm-id="__particle"><span class="menu-item"><i class="fa fa-fw fa-arrows-alt"></i> <span class="title">{{ 'GANTRY5_PLATFORM_PARTICLE'|trans }}</span></span></span> <a class="config-cog" href="{{ gantry.route('menu/select/particle') }}"><i aria-label="Menu Particle Item Settings" class="fa fa-cog"></i></a></li>*/
/*         </ul>*/
/*     </div>*/
/*     <div id="menu-editor"*/
/*          data-menu-ordering="{{ menu.ordering|json_encode|escape('html_attr') }}"*/
/*          data-menu-items="{{ menu.items|json_encode|escape('html_attr') }}"*/
/*          data-menu-settings="{{ menu.settings|json_encode|escape('html_attr') }}">*/
/*         {% if menu.items|length %}*/
/*             {% include 'menu/base.html.twig' with {'item': menu.root} %}*/
/*         {% else %}*/
/*             {% include 'menu/empty.html.twig' with {'item': menu.root} %}*/
/*         {% endif %}*/
/*     </div>*/
/* */
/*     <div id="trash" data-mm-eraseparticle><div class="trash-zone">&times;</div><span>{{ 'GANTRY5_PLATFORM_DROP_DELETE'|trans }}</span></div>*/
/* </form>*/
/* {% endblock %}*/
/* */
