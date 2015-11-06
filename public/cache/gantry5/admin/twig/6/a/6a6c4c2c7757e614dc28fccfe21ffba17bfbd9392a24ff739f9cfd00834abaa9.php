<?php

/* @gantry-admin/partials/header.html.twig */
class __TwigTemplate_69055a8b490a4e076f914aded5734c6267bc323f0def07a70c45cf34f3e7f283 extends Twig_Template
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
        echo "<div class=\"g-grid\">
    <div class=\"g-block\">
        <div class=\"g-content clearfix\">
            <span class=\"theme-title\"><i class=\"fa fa-tint\"></i> ";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_THEME"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "title", array()));
        echo " <small>(v";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "version", array()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "name", array()));
        echo ")</small></span>

            ";
        // line 6
        $context["settings_url"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "settings", array());
        // line 7
        echo "            ";
        $context["settings_key"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "settings_key", array());
        // line 8
        echo "            <ul class=\"float-right\">
                <li ";
        // line 9
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations"), "method"));
        echo "\"><i class=\"fa fa-fw fa-th\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_OUTLINES"), "html", null, true);
        echo "</a>
                </li>
                <li ";
        // line 12
        echo ((((isset($context["location"]) ? $context["location"] : null) == "menu")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu"), "method"));
        echo "\"><i class=\"fa fa-fw fa-list\"></i> <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_MENU"), "html", null, true);
        echo "</span></a>
                </li>
                <li ";
        // line 15
        echo ((((isset($context["location"]) ? $context["location"] : null) == "about")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "about"), "method"));
        echo "\"><i class=\"fa fa-fw fa-question-circle\"></i> <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ABOUT"), "html", null, true);
        echo "</span></a>
                </li>
                <li data-g-extras aria-haspopup=\"true\" aria-expanded=\"false\" role=\"presentation\">
                    <a href=\"#\"><i class=\"fa fa-fw fa-cog\"></i> ";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EXTRAS"), "html", null, true);
        echo " <i class=\"small fa fa-fw fa-chevron-down\"></i></a>
                    <ul data-popover-content class=\"hidden\" tabindex=\"0\">
                        ";
        // line 21
        $context["prod_mode"] = $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PRODUCTION");
        // line 22
        echo "                        ";
        $context["dev_mode"] = $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_DEVELOPMENT");
        // line 23
        echo "                        <li data-g-devprod=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array(0 => (isset($context["dev_mode"]) ? $context["dev_mode"] : null), 1 => (isset($context["prod_mode"]) ? $context["prod_mode"] : null))), "html_attr");
        echo "\">
                            <i class=\"fa fa-fw fa-wrench\"></i> <span class=\"devprod-mode\">";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "global", array()), "production", array())) ? ((isset($context["prod_mode"]) ? $context["prod_mode"] : null)) : ((isset($context["dev_mode"]) ? $context["dev_mode"] : null))), "html", null, true);
        echo "</span>
                            <div class=\"float-right\">
                                <span class=\"enabler\" role=\"checkbox\" aria-checked=\"";
        // line 26
        echo ((($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "global", array()), "production", array()) == "0")) ? ("false") : ("true"));
        echo "\" tabindex=\"0\" aria-label=\"Switches to Production Mode\">
                                <input type=\"hidden\" name=\"production_mode\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "global", array()), "production", array()), "html", null, true);
        echo "\">
                                    <span class=\"toggle\"><span class=\"knob\"></span></span>
                                </span>
                            </div>
                        </li>
                        <li data-g-popover-follow>
                            <a tabindex=\"0\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "cache"), "method"));
        echo "\" data-ajax-action data-ajax-action-method=\"get\" data-ajax-action-indicator=\"li[data-g-extras]\"><i class=\"fa fa-fw fa-recycle\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CLEAR_CACHE"), "html", null, true);
        echo "</a>
                        </li>
                        ";
        // line 35
        if ((isset($context["settings_url"]) ? $context["settings_url"] : null)) {
            // line 36
            echo "                            <li>
                                <a tabindex=\"0\" href=\"";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["settings_url"]) ? $context["settings_url"] : null));
            echo "\" data-settings-key=\"";
            echo twig_escape_filter($this->env, (isset($context["settings_key"]) ? $context["settings_key"] : null));
            echo "\"><i class=\"fa fa-fw fa-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "name", array()), "html", null, true);
            echo "\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PLATFORM_SETTINGS"), "html", null, true);
            echo "</a>
                            </li>
                        ";
        }
        // line 40
        echo "                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 40,  122 => 37,  119 => 36,  117 => 35,  110 => 33,  101 => 27,  97 => 26,  92 => 24,  87 => 23,  84 => 22,  82 => 21,  77 => 19,  69 => 16,  65 => 15,  58 => 13,  54 => 12,  47 => 10,  43 => 9,  40 => 8,  37 => 7,  35 => 6,  24 => 4,  19 => 1,);
    }
}
/* <div class="g-grid">*/
/*     <div class="g-block">*/
/*         <div class="g-content clearfix">*/
/*             <span class="theme-title"><i class="fa fa-tint"></i> {{ 'GANTRY5_PLATFORM_THEME'|trans }}: {{ gantry.theme.title|e }} <small>(v{{ gantry.theme.version }} / {{ gantry.theme.name|e }})</small></span>*/
/* */
/*             {% set settings_url = gantry.platform.settings %}*/
/*             {% set settings_key = gantry.platform.settings_key %}*/
/*             <ul class="float-right">*/
/*                 <li {{ (location == 'configurations') ? 'class="active"' }}>*/
/*                     <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content]" href="{{ gantry.route('configurations')|e }}"><i class="fa fa-fw fa-th"></i> {{ 'GANTRY5_PLATFORM_OUTLINES'|trans }}</a>*/
/*                 </li>*/
/*                 <li {{ (location == 'menu') ? 'class="active"' }}>*/
/*                     <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content]" href="{{ gantry.route('menu')|e }}"><i class="fa fa-fw fa-list"></i> <span>{{ 'GANTRY5_PLATFORM_MENU'|trans }}</span></a>*/
/*                 </li>*/
/*                 <li {{ (location == 'about') ? 'class="active"' }}>*/
/*                     <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content]" href="{{ gantry.route('about')|e }}"><i class="fa fa-fw fa-question-circle"></i> <span>{{ 'GANTRY5_PLATFORM_ABOUT'|trans }}</span></a>*/
/*                 </li>*/
/*                 <li data-g-extras aria-haspopup="true" aria-expanded="false" role="presentation">*/
/*                     <a href="#"><i class="fa fa-fw fa-cog"></i> {{ 'GANTRY5_PLATFORM_EXTRAS'|trans }} <i class="small fa fa-fw fa-chevron-down"></i></a>*/
/*                     <ul data-popover-content class="hidden" tabindex="0">*/
/*                         {% set prod_mode = 'GANTRY5_PLATFORM_PRODUCTION'|trans %}*/
/*                         {% set dev_mode = 'GANTRY5_PLATFORM_DEVELOPMENT'|trans %}*/
/*                         <li data-g-devprod="{{ {0: dev_mode, 1: prod_mode}|json_encode|e('html_attr') }}">*/
/*                             <i class="fa fa-fw fa-wrench"></i> <span class="devprod-mode">{{ gantry.global.production ? prod_mode : dev_mode }}</span>*/
/*                             <div class="float-right">*/
/*                                 <span class="enabler" role="checkbox" aria-checked="{{ gantry.global.production == '0' ? 'false' : 'true'}}" tabindex="0" aria-label="Switches to Production Mode">*/
/*                                 <input type="hidden" name="production_mode" value="{{ gantry.global.production }}">*/
/*                                     <span class="toggle"><span class="knob"></span></span>*/
/*                                 </span>*/
/*                             </div>*/
/*                         </li>*/
/*                         <li data-g-popover-follow>*/
/*                             <a tabindex="0" href="{{ gantry.route('cache')|e }}" data-ajax-action data-ajax-action-method="get" data-ajax-action-indicator="li[data-g-extras]"><i class="fa fa-fw fa-recycle"></i> {{ 'GANTRY5_PLATFORM_CLEAR_CACHE'|trans }}</a>*/
/*                         </li>*/
/*                         {% if settings_url %}*/
/*                             <li>*/
/*                                 <a tabindex="0" href="{{ settings_url|e }}" data-settings-key="{{ settings_key|e }}"><i class="fa fa-fw fa-{{ gantry.platform.name }}"></i> {{ 'GANTRY5_PLATFORM_PLATFORM_SETTINGS'|trans }}</a>*/
/*                             </li>*/
/*                         {% endif %}*/
/*                     </ul>*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
