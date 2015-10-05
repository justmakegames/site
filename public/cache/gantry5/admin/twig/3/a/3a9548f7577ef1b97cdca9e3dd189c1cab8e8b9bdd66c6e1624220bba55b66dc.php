<?php

/* @gantry-admin/pages/configurations/layouts/edit.html.twig */
class __TwigTemplate_a5b2966cba6485ebbcb2f05512aa9e3f11fd0c6eeab3fe54cdd93cc12a054266 extends Twig_Template
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
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/layouts/edit.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        if ((((isset($context["configuration"]) ? $context["configuration"] : null) == "default") && $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "no_base_layout", array()))) {
            // line 5
            echo "
<h2 class=\"page-title\">";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo "</h2>
<p>";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BASE_LAYOUT_DESC"), "html", null, true);
            echo "</p>

";
        } else {
            // line 10
            echo "
<div class=\"g-grid\" data-lm-container>
    <div class=\"g-block sidebar-block particles-sidebar-block\">
        <h2 class=\"page-title\">
            <span class=\"title\">";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PARTICLES"), "html", null, true);
            echo "</span>
        </h2>
        <div class=\"g5-lm-particles-picker\">
            <div class=\"search settings-block\">
                <input type=\"text\" placeholder=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
            echo "\" role=\"search\"/>
                <i class=\"fa fa-fw fa-search\"></i>
            </div>
            <div class=\"particles-container\">
                ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["particles"]) ? $context["particles"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["list"]) {
                // line 23
                echo "                    ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["key"]));
                echo "
                    <ul>
                    ";
                // line 25
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["list"]);
                foreach ($context['_seq'] as $context["type"] => $context["particle"]) {
                    // line 26
                    echo "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["particle"]);
                    foreach ($context['_seq'] as $context["item_key"] => $context["item"]) {
                        // line 27
                        echo "                            <li class=\"g5-lm-particle-";
                        echo twig_escape_filter($this->env, $context["type"]);
                        echo "\"
                                data-lm-blocktype=\"";
                        // line 28
                        echo twig_escape_filter($this->env, $context["type"]);
                        echo "\"
                                data-lm-subtype=\"";
                        // line 29
                        echo twig_escape_filter($this->env, $context["item_key"]);
                        echo "\"
                                ";
                        // line 30
                        if ( !$this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("particles." . $context["item_key"]) . ".enabled"), 1 => true), "method")) {
                            echo "data-lm-disabled data-lm-nodrag title=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PARTICLE_DISABLED"), "html", null, true);
                            echo "\"";
                        }
                        echo ">
                                ";
                        // line 31
                        echo twig_escape_filter($this->env, $context["item"]);
                        echo "
                            </li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['item_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 34
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['type'], $context['particle'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 35
                echo "                    </ul>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['list'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "            </div>
        </div>
    </div>
    <div class=\"g-block main-block\">
        <span class=\"float-right\">
            ";
            // line 44
            echo "            <button href=\"#\" class=\"button\" role=\"button\" data-lm-switcher=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => (isset($context["switcher_url"]) ? $context["switcher_url"] : null)), "method"));
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LOAD"), "html", null, true);
            echo " Preset\"><i class=\"fa fa-fw fa-code-fork\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LOAD"), "html", null, true);
            echo "</span></button>
            <button href=\"#\" class=\"button\" role=\"button\" data-lm-clear aria-label=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CLEAR"), "html", null, true);
            echo " Layout\"><i class=\"fa fa-fw fa-trash-o\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CLEAR"), "html", null, true);
            echo "</span></button>
            <button href=\"#\" class=\"button button-primary button-save\" role=\"button\" data-save=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-check\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "</span></button>
        </span>
        <h2 class=\"page-title layout-title\">
            <span class=\"title\">";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo " <small>(";
            echo twig_escape_filter($this->env, ((array_key_exists("preset_title", $context)) ? (_twig_default_filter((isset($context["preset_title"]) ? $context["preset_title"] : null), "Unknown")) : ("Unknown")), "html", null, true);
            echo ")</small></span>
        </h2>

        <div class=\"lm-newblocks clearfix\" data-lm-blocktypes>
            ";
            // line 54
            echo "            <span class=\"float-right\">
                <button data-lm-back href=\"#\" class=\"button disabled\"><i class=\"fa fa-fw fa-arrow-left\"></i> ";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNDO"), "html", null, true);
            echo "</button>
                ";
            // line 57
            echo "                <button data-lm-forward href=\"#\" class=\"button disabled\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_REDO"), "html", null, true);
            echo " <i class=\"fa fa-fw fa-arrow-right\"></i></button>
            </span>
        </div>
        <div id=\"page\">
            <div class=\"lm-blocks\" data-lm-page=\"";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["page_id"]) ? $context["page_id"] : null));
            echo "\" data-lm-preset=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["preset"]) ? $context["preset"] : null)), "html_attr");
            echo "\" data-lm-root=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["layout"]) ? $context["layout"] : null)), "html_attr");
            echo "\"></div>
            ";
            // line 62
            if (twig_test_empty((isset($context["layout"]) ? $context["layout"] : null))) {
                // line 63
                echo "            <div id=\"lm-no-layout\">
                <div class=\"card full-width\">
                    <h4>";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_NO_LAYOUT"), "html", null, true);
                echo "</h4>
                    <div class=\"inner-params\">
                        ";
                // line 67
                echo $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_NO_LAYOUT_DESC");
                echo "
                    </div>
                </div>
            </div>
            ";
            }
            // line 72
            echo "
            <div class=\"g-footer-actions\">
            <span class=\"float-right\">
                <a href=\"#\" class=\"button\" data-lm-switcher=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => (isset($context["switcher_url"]) ? $context["switcher_url"] : null)), "method"));
            echo "\"><i class=\"fa fa-fw fa-code-fork\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LOAD"), "html", null, true);
            echo "</span></a>
                <a href=\"#\" class=\"button\" data-lm-clear><i class=\"fa fa-fw fa-trash-o\"></i> <span>";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CLEAR"), "html", null, true);
            echo "</span></a>
                <a href=\"#\" class=\"button button-primary button-save\" data-save=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-check\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "</span></a>
            </span>
            </div>
        </div>
    </div>

    <div id=\"trash\" data-lm-eraseblock><div class=\"trash-zone\">&times;</div><span>";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DROP_DELETE"), "html", null, true);
            echo "</span></div>
";
        }
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/layouts/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 83,  227 => 77,  223 => 76,  217 => 75,  212 => 72,  204 => 67,  199 => 65,  195 => 63,  193 => 62,  185 => 61,  177 => 57,  173 => 55,  170 => 54,  161 => 49,  151 => 46,  145 => 45,  136 => 44,  129 => 37,  122 => 35,  116 => 34,  107 => 31,  99 => 30,  95 => 29,  91 => 28,  86 => 27,  81 => 26,  77 => 25,  71 => 23,  67 => 22,  58 => 18,  51 => 14,  45 => 10,  39 => 7,  35 => 6,  32 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/* {% if configuration == 'default' and gantry.platform.no_base_layout %}*/
/* */
/* <h2 class="page-title">{{ 'GANTRY5_PLATFORM_LAYOUT'|trans }}</h2>*/
/* <p>{{ 'GANTRY5_PLATFORM_BASE_LAYOUT_DESC'|trans }}</p>*/
/* */
/* {% else %}*/
/* */
/* <div class="g-grid" data-lm-container>*/
/*     <div class="g-block sidebar-block particles-sidebar-block">*/
/*         <h2 class="page-title">*/
/*             <span class="title">{{ 'GANTRY5_PLATFORM_PARTICLES'|trans }}</span>*/
/*         </h2>*/
/*         <div class="g5-lm-particles-picker">*/
/*             <div class="search settings-block">*/
/*                 <input type="text" placeholder="{{ 'GANTRY5_PLATFORM_FILTER_ELI'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_FILTER_ELI'|trans }}" role="search"/>*/
/*                 <i class="fa fa-fw fa-search"></i>*/
/*             </div>*/
/*             <div class="particles-container">*/
/*                 {% for key, list in particles %}*/
/*                     {{ key|capitalize|e }}*/
/*                     <ul>*/
/*                     {% for type, particle in list %}*/
/*                         {% for item_key, item in particle %}*/
/*                             <li class="g5-lm-particle-{{ type|e }}"*/
/*                                 data-lm-blocktype="{{ type|e }}"*/
/*                                 data-lm-subtype="{{ item_key|e }}"*/
/*                                 {% if not gantry.config.get('particles.' ~ item_key ~ '.enabled', true) %}data-lm-disabled data-lm-nodrag title="{{ 'GANTRY5_PLATFORM_PARTICLE_DISABLED'|trans }}"{% endif %}>*/
/*                                 {{ item|e }}*/
/*                             </li>*/
/*                         {%  endfor %}*/
/*                     {% endfor %}*/
/*                     </ul>*/
/*                 {% endfor %}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div class="g-block main-block">*/
/*         <span class="float-right">*/
/*             {#<a href="#" class="button"><i class="fa fa-fw fa-sign-in"></i> <span>{{ 'GANTRY5_PLATFORM_IMPORT'|trans }}</span></a>*/
/*             <a href="#" class="button"><i class="fa fa-fw fa-sign-out"></i> <span>{{ 'GANTRY5_PLATFORM_EXPORT'|trans }}</span></a>#}*/
/*             <button href="#" class="button" role="button" data-lm-switcher="{{ gantry.route(switcher_url)|e }}" aria-label="{{ 'GANTRY5_PLATFORM_LOAD'|trans }} Preset"><i class="fa fa-fw fa-code-fork"></i> <span>{{ 'GANTRY5_PLATFORM_LOAD'|trans }}</span></button>*/
/*             <button href="#" class="button" role="button" data-lm-clear aria-label="{{ 'GANTRY5_PLATFORM_CLEAR'|trans }} Layout"><i class="fa fa-fw fa-trash-o"></i> <span>{{ 'GANTRY5_PLATFORM_CLEAR'|trans }}</span></button>*/
/*             <button href="#" class="button button-primary button-save" role="button" data-save="{{ 'GANTRY5_PLATFORM_LAYOUT'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_SAVE_LAYOUT'|trans }}"><i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_LAYOUT'|trans }}</span></button>*/
/*         </span>*/
/*         <h2 class="page-title layout-title">*/
/*             <span class="title">{{ 'GANTRY5_PLATFORM_LAYOUT'|trans }} <small>({{ preset_title|default('Unknown') }})</small></span>*/
/*         </h2>*/
/* */
/*         <div class="lm-newblocks clearfix" data-lm-blocktypes>*/
/*             {#<a class="button" href="{{ gantry.route('picker/particles')|e }}" data-lm-addparticle><i class="fa fa-plus"></i> <span>{{ 'GANTRY5_PLATFORM_NEW_PARTICLE'|trans }}</span></a>#}*/
/*             <span class="float-right">*/
/*                 <button data-lm-back href="#" class="button disabled"><i class="fa fa-fw fa-arrow-left"></i> {{ 'GANTRY5_PLATFORM_UNDO'|trans }}</button>*/
/*                 {#<a href="#" class="button"><i class="fa fa-fw fa-history"></i> <span>{{ 'GANTRY5_PLATFORM_HISTORY'|trans }}</span></a>#}*/
/*                 <button data-lm-forward href="#" class="button disabled">{{ 'GANTRY5_PLATFORM_REDO'|trans }} <i class="fa fa-fw fa-arrow-right"></i></button>*/
/*             </span>*/
/*         </div>*/
/*         <div id="page">*/
/*             <div class="lm-blocks" data-lm-page="{{ page_id|e }}" data-lm-preset="{{ preset|json_encode|e('html_attr') }}" data-lm-root="{{ layout|json_encode|e('html_attr') }}"></div>*/
/*             {% if layout is empty %}*/
/*             <div id="lm-no-layout">*/
/*                 <div class="card full-width">*/
/*                     <h4>{{ 'GANTRY5_PLATFORM_NO_LAYOUT'|trans }}</h4>*/
/*                     <div class="inner-params">*/
/*                         {{ 'GANTRY5_PLATFORM_NO_LAYOUT_DESC'|trans|raw }}*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             {% endif %}*/
/* */
/*             <div class="g-footer-actions">*/
/*             <span class="float-right">*/
/*                 <a href="#" class="button" data-lm-switcher="{{ gantry.route(switcher_url)|e }}"><i class="fa fa-fw fa-code-fork"></i> <span>{{ 'GANTRY5_PLATFORM_LOAD'|trans }}</span></a>*/
/*                 <a href="#" class="button" data-lm-clear><i class="fa fa-fw fa-trash-o"></i> <span>{{ 'GANTRY5_PLATFORM_CLEAR'|trans }}</span></a>*/
/*                 <a href="#" class="button button-primary button-save" data-save="{{ 'GANTRY5_PLATFORM_LAYOUT'|trans }}"><i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_LAYOUT'|trans }}</span></a>*/
/*             </span>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div id="trash" data-lm-eraseblock><div class="trash-zone">&times;</div><span>{{ 'GANTRY5_PLATFORM_DROP_DELETE'|trans }}</span></div>*/
/* {% endif %}*/
/* {% endblock %}*/
/* */
