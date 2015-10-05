<?php

/* @gantry-admin/pages/configurations/configurations.html.twig */
class __TwigTemplate_6c4b7418671adfe0b05e58973d682c59bdc5ba6adaa842abf6807f230ecf0d59 extends Twig_Template
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
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/configurations.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"menu-header\">
        <span class=\"float-right\">
            <button class=\"button button-back-to-conf\" tabindex=\"0\" aria-label=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "\"><i class=\"fa fa-fw fa-fw fa-arrow-left\"></i> <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "</span></button>
        </span>
        <h2 class=\"page-title\">
            ";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_OUTLINES"), "html", null, true);
        echo "
            <button data-g-config=\"create\" data-g-config-href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null), 2 => "create"), "method"));
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
        echo "\" aria-label=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
        echo "\" data-g-config-method=\"POST\" class=\"button button-primary\">
                <i class=\"fa fa-fw fa-plus\"></i>
            </button>
            ";
        // line 14
        echo "            ";
        // line 15
        echo "        </h2>
    </div>

    <div id=\"configurations\">
        <ul class=\"g-grid\">
            ";
        // line 21
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "user", array()));
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
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 22
            echo "                <li class=\"card g-block size-1-4";
            echo (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "isDefault", array(0 => $context["name"]), "method")) ? (" outline-is-default") : (""));
            echo "\">
                    ";
            // line 23
            $this->loadTemplate("@gantry-admin/layouts/outline.html.twig", "@gantry-admin/pages/configurations/configurations.html.twig", 23)->display($context);
            // line 24
            echo "                </li>
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
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "            <li class=\"card g-block size-1-4 add-new\">
                <div class=\"page\">
                    <a data-g-config=\"create\" data-g-config-href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null), 2 => "create"), "method"));
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
        echo "\" aria-label=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
        echo "\" data-g-config-method=\"POST\" data-g5-lm-add tabindex=\"0\">
                        <i class=\"fa fa-fw fa-plus\"></i>
                    </a>
                    ";
        // line 32
        echo "                </div>
            </li>
        </ul>

        <h2>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SYSTEM_OUTLINES"), "html", null, true);
        echo "</h2>
        <ul class=\"g-grid\">
            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "system", array()));
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 39
            echo "                ";
            $context["preset"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "layoutPreset", array(0 => $context["name"]), "method");
            // line 40
            echo "                <li class=\"card g-block size-1-4\">
                    <div class=\"page\">
                        <h4>";
            // line 42
            echo twig_escape_filter($this->env, $context["title"], "html", null, true);
            echo " <span class=\"float-right font-small\">(id: ";
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo ")</span></h4>
                        <div class=\"inner-params\">
                            <img src=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc((($this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "image", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "image", array()), "gantry-admin://images/layouts/default.png")) : ("gantry-admin://images/layouts/default.png"))), "html", null, true);
            echo "\" />
                        </div>
                        <div class=\"inner-params\">
                            ";
            // line 54
            echo "                            <div class=\"center\">
                                <a data-title=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT") . " ") . twig_escape_filter($this->env, $context["title"])), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT") . " ") . twig_escape_filter($this->env, $context["title"])), "html", null, true);
            echo "\" data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => $context["name"], 2 => "styles"), "method"));
            echo "\" class=\"button button-primary g-tooltip\">
                                    <i class=\"fa fa-fw fa-pencil\"></i>
                                </a>
                                <button data-title=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE") . " ") . twig_escape_filter($this->env, $context["title"])), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE") . " ") . twig_escape_filter($this->env, $context["title"])), "html", null, true);
            echo "\" data-g-config=\"duplicate\" data-g-config-href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => $context["name"], 2 => "duplicate"), "method"));
            echo "\" data-g-config-method=\"POST\" class=\"button button-secondary g-tooltip\">
                                    <i class=\"fa fa-fw fa-copy\"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "        </ul>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/configurations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 66,  171 => 58,  157 => 55,  154 => 54,  148 => 44,  141 => 42,  137 => 40,  134 => 39,  130 => 38,  125 => 36,  119 => 32,  109 => 28,  105 => 26,  90 => 24,  88 => 23,  83 => 22,  65 => 21,  58 => 15,  56 => 14,  46 => 10,  42 => 9,  34 => 6,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/*     <div class="menu-header">*/
/*         <span class="float-right">*/
/*             <button class="button button-back-to-conf" tabindex="0" aria-label="{{ 'GANTRY5_PLATFORM_BACK_SETUP'|trans }}"><i class="fa fa-fw fa-fw fa-arrow-left"></i> <span>{{ 'GANTRY5_PLATFORM_BACK_SETUP'|trans }}</span></button>*/
/*         </span>*/
/*         <h2 class="page-title">*/
/*             {{ 'GANTRY5_PLATFORM_OUTLINES'|trans }}*/
/*             <button data-g-config="create" data-g-config-href="{{ gantry.route('configurations', name, 'create')|e }}" title="{{ 'GANTRY5_PLATFORM_ADD_NEW_OUTLINE'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_ADD_NEW_OUTLINE'|trans }}" data-g-config-method="POST" class="button button-primary">*/
/*                 <i class="fa fa-fw fa-plus"></i>*/
/*             </button>*/
/*             {# TODO: Adding a new outline should be a two step process: 1. you pick title and Layout, 2. creates it. #}*/
/*             {#<a data-g5-lm-add href="{{ gantry.route('picker/layouts')|e }}" class="button button-primary"><i class="fa fa-fw fa-plus"></i></a>#}*/
/*         </h2>*/
/*     </div>*/
/* */
/*     <div id="configurations">*/
/*         <ul class="g-grid">*/
/*             {# TODO: Need to inject the Base Outline at the top of the list #}*/
/*             {% for name, title in gantry.configurations.user %}*/
/*                 <li class="card g-block size-1-4{{ gantry.configurations.isDefault(name) ? ' outline-is-default' : '' }}">*/
/*                     {% include '@gantry-admin/layouts/outline.html.twig' %}*/
/*                 </li>*/
/*             {% endfor %}*/
/*             <li class="card g-block size-1-4 add-new">*/
/*                 <div class="page">*/
/*                     <a data-g-config="create" data-g-config-href="{{ gantry.route('configurations', name, 'create')|e }}" title="{{ 'GANTRY5_PLATFORM_ADD_NEW_OUTLINE'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_ADD_NEW_OUTLINE'|trans }}" data-g-config-method="POST" data-g5-lm-add tabindex="0">*/
/*                         <i class="fa fa-fw fa-plus"></i>*/
/*                     </a>*/
/*                     {#<a data-g5-lm-add href="{{ gantry.route('picker/layouts')|e }}"><i class="fa fa-fw fa-plus"></i></a>#}*/
/*                 </div>*/
/*             </li>*/
/*         </ul>*/
/* */
/*         <h2>{{ 'GANTRY5_PLATFORM_SYSTEM_OUTLINES'|trans }}</h2>*/
/*         <ul class="g-grid">*/
/*             {% for name, title in gantry.configurations.system %}*/
/*                 {%  set preset = gantry.configurations.layoutPreset(name) %}*/
/*                 <li class="card g-block size-1-4">*/
/*                     <div class="page">*/
/*                         <h4>{{ title }} <span class="float-right font-small">(id: {{ name }})</span></h4>*/
/*                         <div class="inner-params">*/
/*                             <img src="{{ url(preset.image|default('gantry-admin://images/layouts/default.png')) }}" />*/
/*                         </div>*/
/*                         <div class="inner-params">*/
/*                             {#<span class="float-left">*/
/*                                 <a href="{{ gantry.route('configurations', layout)|e }}" class="button">*/
/*                                     <i class="fa fa-fw fa-pencil-square-o"></i>*/
/* */
/*                                 </a>*/
/*                             </span>*/
/*                             <span class="float-right">23 positions</span>#}*/
/*                             <div class="center">*/
/*                                 <a data-title="{{ 'GANTRY5_PLATFORM_EDIT'|trans }}" title="{{ 'GANTRY5_PLATFORM_EDIT'|trans  ~ ' ' ~ title|e }}" aria-label="{{ 'GANTRY5_PLATFORM_EDIT'|trans  ~ ' ' ~ title|e }}" data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', name, 'styles')|e }}" class="button button-primary g-tooltip">*/
/*                                     <i class="fa fa-fw fa-pencil"></i>*/
/*                                 </a>*/
/*                                 <button data-title="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans }}" title="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans  ~ ' ' ~ title|e }}" aria-label="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans  ~ ' ' ~ title|e }}" data-g-config="duplicate" data-g-config-href="{{ gantry.route('configurations', name, 'duplicate')|e }}" data-g-config-method="POST" class="button button-secondary g-tooltip">*/
/*                                     <i class="fa fa-fw fa-copy"></i>*/
/*                                 </button>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*     </div>*/
/* {% endblock %}*/
/* */
