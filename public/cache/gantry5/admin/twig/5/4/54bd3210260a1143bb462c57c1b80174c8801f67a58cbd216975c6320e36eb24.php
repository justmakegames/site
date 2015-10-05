<?php

/* @gantry-admin/layouts/outline.html.twig */
class __TwigTemplate_58a7a5923022afb73309a152e9292d95eebb37bb71d306dd745d78bfd043ec76 extends Twig_Template
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
        $context["preset"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "layoutPreset", array(0 => (isset($context["name"]) ? $context["name"] : null)), "method");
        // line 2
        echo "
<div id=\"outline-";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"page\">
    <h4 class=\"g-tooltip\" data-title=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null));
        echo "\">
        <span data-g-config-href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null), 2 => "rename"), "method"));
        echo "\" data-g-config-method=\"post\" data-title-editable=\"";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null));
        echo "\" class=\"title\">";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null));
        echo "</span> <i class=\"fa fa-fw fa-pencil font-small\" tabindex=\"0\" aria-label=\"";
        echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE"), array("%s" => twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null)))), "html", null, true);
        echo "\" data-title-edit=\"\"></i>
        <span class=\"float-right font-small\">(id: ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo ")</span>
    </h4>
    <div class=\"inner-params\">
        <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc((($this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "image", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "image", array()), "gantry-admin://images/layouts/default.png")) : ("gantry-admin://images/layouts/default.png"))), "html", null, true);
        echo "\" />
    </div>
    <div class=\"inner-params\">
        <div class=\"center outline-actions\">
            <a data-title=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT"), "html", null, true);
        echo "\" role=\"button\" aria-label=\"";
        echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EDIT") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
        echo "\" data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null), 2 => "styles"), "method"));
        echo "\" class=\"button button-primary g-tooltip\">
                <i class=\"fa fa-fw fa-pencil\"></i>
            </a>
            <button data-title=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE"), "html", null, true);
        echo "\" aria-label=\"";
        echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DUPLICATE") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
        echo "\" data-g-config=\"duplicate\" data-g-config-href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null), 2 => "duplicate"), "method"));
        echo "\" data-g-config-method=\"POST\" class=\"button button-secondary g-tooltip\">
                <i class=\"fa fa-fw fa-copy\"></i>
            </button>
            ";
        // line 19
        if ((((isset($context["name"]) ? $context["name"] : null) != "default") && $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "configurations", array()), "canDelete", array(0 => (isset($context["name"]) ? $context["name"] : null)), "method"))) {
            // line 20
            echo "            <button data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DELETE"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DELETE") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DELETE") . " ") . twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null))), "html", null, true);
            echo "\" data-g-config=\"delete\" data-g-config-href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["name"]) ? $context["name"] : null)), "method"));
            echo "\" data-g-config-method=\"DELETE\" class=\"button red g-tooltip\">
                <i class=\"fa fa-fw fa-trash-o\"></i>
            </button>
            ";
        }
        // line 24
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/layouts/outline.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 24,  83 => 20,  81 => 19,  69 => 16,  55 => 13,  48 => 9,  42 => 6,  32 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {%  set preset = gantry.configurations.layoutPreset(name) %}*/
/* */
/* <div id="outline-{{ name }}" class="page">*/
/*     <h4 class="g-tooltip" data-title="{{ title|e }}">*/
/*         <span data-g-config-href="{{ gantry.route('configurations', name, 'rename')|e }}" data-g-config-method="post" data-title-editable="{{ title|e }}" class="title">{{ title|e }}</span> <i class="fa fa-fw fa-pencil font-small" tabindex="0" aria-label="{{ 'GANTRY5_PLATFORM_EDIT_TITLE'|trans|replace({'%s': title|e}) }}" data-title-edit=""></i>*/
/*         <span class="float-right font-small">(id: {{ name }})</span>*/
/*     </h4>*/
/*     <div class="inner-params">*/
/*         <img src="{{ url(preset.image|default('gantry-admin://images/layouts/default.png')) }}" />*/
/*     </div>*/
/*     <div class="inner-params">*/
/*         <div class="center outline-actions">*/
/*             <a data-title="{{ 'GANTRY5_PLATFORM_EDIT'|trans }}" role="button" aria-label="{{ 'GANTRY5_PLATFORM_EDIT'|trans ~ ' ' ~ title|e }}" title="{{ 'GANTRY5_PLATFORM_EDIT'|trans ~ ' ' ~ title|e }}" data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', name, 'styles')|e }}" class="button button-primary g-tooltip">*/
/*                 <i class="fa fa-fw fa-pencil"></i>*/
/*             </a>*/
/*             <button data-title="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans ~ ' ' ~ title|e }}" title="{{ 'GANTRY5_PLATFORM_DUPLICATE'|trans ~ ' ' ~ title|e }}" data-g-config="duplicate" data-g-config-href="{{ gantry.route('configurations', name, 'duplicate')|e }}" data-g-config-method="POST" class="button button-secondary g-tooltip">*/
/*                 <i class="fa fa-fw fa-copy"></i>*/
/*             </button>*/
/*             {% if name != 'default' and gantry.configurations.canDelete(name) %}*/
/*             <button data-title="{{ 'GANTRY5_PLATFORM_DELETE'|trans }}" title="{{ 'GANTRY5_PLATFORM_DELETE'|trans  ~ ' ' ~ title|e }}" aria-label="{{ 'GANTRY5_PLATFORM_DELETE'|trans  ~ ' ' ~ title|e }}" data-g-config="delete" data-g-config-href="{{ gantry.route('configurations', name)|e }}" data-g-config-method="DELETE" class="button red g-tooltip">*/
/*                 <i class="fa fa-fw fa-trash-o"></i>*/
/*             </button>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
