<?php

/* @gantry-admin/partials/navigation.html.twig */
class __TwigTemplate_82d5a1f0e05947b03fc94ff81dd76da96d3d0d7d3c934247886d526e9d21e055 extends Twig_Template
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
    <div class=\"g-block navbar-block\">
        <nav id=\"gantry\">
            ";
        // line 4
        $context["style"] = ((twig_in_filter((isset($context["location"]) ? $context["location"] : null), array(0 => "menu", 1 => "about", 2 => "configurations"))) ? (" style=\"overflow: hidden; height: 0; visibility: hidden;\"") : (""));
        // line 5
        echo "            <section id=\"navbar\"";
        echo (isset($context["style"]) ? $context["style"] : null);
        echo ">
                <ul>
                    ";
        // line 7
        $this->loadTemplate("partials/configuration-selector.html.twig", "@gantry-admin/partials/navigation.html.twig", 7)->display($context);
        // line 8
        echo "                    <li ";
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/styles")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "styles"), "method"));
        echo "\"><i class=\"fa fa-fw fa-adjust\"></i><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_STYLES"), "html", null, true);
        echo "</span></a>
                    </li>
                    <li ";
        // line 11
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/settings")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "settings"), "method"));
        echo "\"><i class=\"fa fa-fw fa-wrench\"></i><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SETTINGS"), "html", null, true);
        echo "</span></a>
                    </li>
                    ";
        // line 14
        if ((((isset($context["configuration"]) ? $context["configuration"] : null) && ((isset($context["configuration"]) ? $context["configuration"] : null) != "default")) ||  !$this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "no_base_layout", array()))) {
            // line 15
            echo "                    <li ";
            echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/layout")) ? ("class=\"active\"") : (""));
            echo ">
                        <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
            // line 16
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "layout"), "method"));
            echo "\"><i class=\"fa fa-fw fa-columns\"></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo "</span></a>
                    </li>
                    ";
        }
        // line 19
        echo "                    ";
        if (((isset($context["configuration"]) ? $context["configuration"] : null) && ((isset($context["configuration"]) ? $context["configuration"] : null) != "default"))) {
            // line 20
            echo "                    <li ";
            echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/assignments")) ? ("class=\"active\"") : (""));
            echo ">
                        <a data-g5-ajaxify data-g5-ajaxify-target=\"[data-g5-content-wrapper]\" data-g5-ajaxify-params=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "assignments"), "method"));
            echo "\"><i class=\"fa fa-fw fa-check-square-o\"></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</span></a>
                    </li>
                    ";
        }
        // line 24
        echo "                </ul>
            </section>
        </nav>
        <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "themes"), "method"), "html", null, true);
        echo "\" aria-hidden=\"true\" tabindex=\"-1\">
            <svg id=\"gantry-logo\" viewBox=\"0 0 81 28\" style=\"background-color:#ffffff00\" version=\"1.1\"
                xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xml:space=\"preserve\"
                x=\"0px\" y=\"0px\" width=\"81px\" height=\"28px\"
            >
                <path d=\"M 81 8.3154 L 81 21.1282 L 80.9604 21.1282 C 80.5835 24.9821 77.2055 28 73.0896 28 L 73.0896 24.8375 C 75.6117 24.8375 77.6642 22.8814 77.6977 20.469 C 76.3986 21.3647 74.811 21.898 73.0896 21.898 C 68.8478 21.898 65.3955 18.6908 65.1997 14.6657 L 65.1809 14.6657 L 65.1809 8.3154 L 68.4728 8.3154 L 68.4728 14.5715 L 68.4909 14.5821 C 68.6382 16.8962 70.6415 18.7355 73.0896 18.7355 C 75.5393 18.7355 77.5461 16.8913 77.6891 14.574 L 77.7064 14.5689 L 77.7064 8.3154 L 81 8.3154 ZM 12.7501 8.3154 L 15.8191 8.3154 L 15.8191 20.4111 C 15.8191 24.6017 12.2791 28 7.9104 28 L 7.9104 24.8375 C 10.4326 24.8375 12.4854 22.8814 12.5186 20.469 C 11.22 21.3647 9.6318 21.898 7.9104 21.898 C 3.5415 21.898 0 18.5006 0 14.3084 C 0 10.1175 3.5415 6.7196 7.9104 6.7196 C 9.7361 6.7196 11.4118 7.3189 12.7501 8.3154 ZM 12.5247 14.3084 C 12.5247 11.8671 10.4533 9.8813 7.9104 9.8813 C 5.3659 9.8813 3.2967 11.8671 3.2967 14.3084 C 3.2967 16.749 5.3659 18.7355 7.9104 18.7355 C 10.4533 18.7355 12.5247 16.749 12.5247 14.3084 ZM 32.3021 14.3084 C 32.3021 14.3456 32.2968 14.3804 32.2965 14.4176 L 32.3021 14.4176 L 32.3021 20.2688 L 29.2791 20.2688 C 27.9331 21.2862 26.2388 21.898 24.3921 21.898 C 20.0231 21.898 16.4821 18.5006 16.4821 14.3084 C 16.4821 10.1175 20.0231 6.7196 24.3921 6.7196 C 28.761 6.7196 32.3021 10.1175 32.3021 14.3084 ZM 29.0059 14.3084 C 29.0059 11.8671 26.9362 9.8813 24.3921 9.8813 C 21.8479 9.8813 19.7774 11.8671 19.7774 14.3084 C 19.7774 16.749 21.8479 18.7355 24.3921 18.7355 C 26.9362 18.7355 29.0059 16.749 29.0059 14.3084 ZM 54.1749 5.1396 L 54.1749 0 L 50.8813 0 L 50.8813 5.1396 L 48.6289 5.1396 L 48.6289 8.2988 L 50.8813 8.2988 L 50.8813 20.2688 L 54.1749 20.2688 L 54.1749 8.2988 L 56.4274 8.2988 L 56.4274 5.1396 L 54.1749 5.1396 ZM 41.3108 6.7196 C 39.5768 6.7196 37.9783 7.2614 36.6745 8.169 L 33.4003 8.169 L 33.4003 20.2688 L 36.6935 20.2688 L 36.6935 14.4176 L 36.7017 14.4176 C 36.7017 14.3804 36.6965 14.3456 36.6965 14.3084 C 36.6965 11.8671 38.7661 9.8813 41.3108 9.8813 C 43.8544 9.8813 45.925 11.8671 45.925 14.3084 C 45.925 14.3456 45.9189 14.3804 45.9189 14.4176 L 45.9267 14.4176 L 45.9267 20.2688 L 49.2212 20.2688 L 49.2212 14.4176 L 49.2151 14.4176 C 49.2151 14.3804 49.2212 14.3456 49.2212 14.3084 C 49.2212 10.1175 45.6792 6.7196 41.3108 6.7196 ZM 56.4274 8.2988 L 56.4274 20.2688 L 59.7202 20.2688 L 59.7202 14.4176 L 59.7287 14.4176 C 59.7287 14.3804 59.7236 14.3456 59.7236 14.3084 C 59.7236 11.8671 61.7933 9.8813 64.3378 9.8813 L 64.3378 6.7196 C 62.5225 6.7196 60.8554 7.3126 59.5203 8.2988 L 56.4274 8.2988 Z\" fill=\"#AAAAAA\"></path>
            </svg>
        </a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 27,  96 => 24,  86 => 21,  81 => 20,  78 => 19,  68 => 16,  63 => 15,  61 => 14,  52 => 12,  48 => 11,  39 => 9,  34 => 8,  32 => 7,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="g-grid">*/
/*     <div class="g-block navbar-block">*/
/*         <nav id="gantry">*/
/*             {% set style = location in ['menu', 'about', 'configurations']  ? ' style="overflow: hidden; height: 0; visibility: hidden;"' : '' %}*/
/*             <section id="navbar"{{ style|raw }}>*/
/*                 <ul>*/
/*                     {% include 'partials/configuration-selector.html.twig' %}*/
/*                     <li {{ (location == 'configurations/styles') ? 'class="active"' }}>*/
/*                         <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', configuration, 'styles')|e }}"><i class="fa fa-fw fa-adjust"></i><span>{{ 'GANTRY5_PLATFORM_STYLES'|trans }}</span></a>*/
/*                     </li>*/
/*                     <li {{ (location == 'configurations/settings') ? 'class="active"' }}>*/
/*                         <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', configuration, 'settings')|e }}"><i class="fa fa-fw fa-wrench"></i><span>{{ 'GANTRY5_PLATFORM_SETTINGS'|trans }}</span></a>*/
/*                     </li>*/
/*                     {% if (configuration and configuration != 'default') or not gantry.platform.no_base_layout %}*/
/*                     <li {{ (location == 'configurations/layout') ? 'class="active"' }}>*/
/*                         <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', configuration, 'layout')|e }}"><i class="fa fa-fw fa-columns"></i><span>{{ 'GANTRY5_PLATFORM_LAYOUT'|trans }}</span></a>*/
/*                     </li>*/
/*                     {% endif %}*/
/*                     {% if configuration and configuration != 'default' %}*/
/*                     <li {{ (location == 'configurations/assignments') ? 'class="active"' }}>*/
/*                         <a data-g5-ajaxify data-g5-ajaxify-target="[data-g5-content-wrapper]" data-g5-ajaxify-params="{{ {"navbar": true}|json_encode|e('html_attr') }}" href="{{ gantry.route('configurations', configuration, 'assignments')|e }}"><i class="fa fa-fw fa-check-square-o"></i><span>{{ 'GANTRY5_PLATFORM_ASSIGNMENTS'|trans }}</span></a>*/
/*                     </li>*/
/*                     {% endif %}*/
/*                 </ul>*/
/*             </section>*/
/*         </nav>*/
/*         <a href="{{ gantry.route('themes') }}" aria-hidden="true" tabindex="-1">*/
/*             <svg id="gantry-logo" viewBox="0 0 81 28" style="background-color:#ffffff00" version="1.1"*/
/*                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"*/
/*                 x="0px" y="0px" width="81px" height="28px"*/
/*             >*/
/*                 <path d="M 81 8.3154 L 81 21.1282 L 80.9604 21.1282 C 80.5835 24.9821 77.2055 28 73.0896 28 L 73.0896 24.8375 C 75.6117 24.8375 77.6642 22.8814 77.6977 20.469 C 76.3986 21.3647 74.811 21.898 73.0896 21.898 C 68.8478 21.898 65.3955 18.6908 65.1997 14.6657 L 65.1809 14.6657 L 65.1809 8.3154 L 68.4728 8.3154 L 68.4728 14.5715 L 68.4909 14.5821 C 68.6382 16.8962 70.6415 18.7355 73.0896 18.7355 C 75.5393 18.7355 77.5461 16.8913 77.6891 14.574 L 77.7064 14.5689 L 77.7064 8.3154 L 81 8.3154 ZM 12.7501 8.3154 L 15.8191 8.3154 L 15.8191 20.4111 C 15.8191 24.6017 12.2791 28 7.9104 28 L 7.9104 24.8375 C 10.4326 24.8375 12.4854 22.8814 12.5186 20.469 C 11.22 21.3647 9.6318 21.898 7.9104 21.898 C 3.5415 21.898 0 18.5006 0 14.3084 C 0 10.1175 3.5415 6.7196 7.9104 6.7196 C 9.7361 6.7196 11.4118 7.3189 12.7501 8.3154 ZM 12.5247 14.3084 C 12.5247 11.8671 10.4533 9.8813 7.9104 9.8813 C 5.3659 9.8813 3.2967 11.8671 3.2967 14.3084 C 3.2967 16.749 5.3659 18.7355 7.9104 18.7355 C 10.4533 18.7355 12.5247 16.749 12.5247 14.3084 ZM 32.3021 14.3084 C 32.3021 14.3456 32.2968 14.3804 32.2965 14.4176 L 32.3021 14.4176 L 32.3021 20.2688 L 29.2791 20.2688 C 27.9331 21.2862 26.2388 21.898 24.3921 21.898 C 20.0231 21.898 16.4821 18.5006 16.4821 14.3084 C 16.4821 10.1175 20.0231 6.7196 24.3921 6.7196 C 28.761 6.7196 32.3021 10.1175 32.3021 14.3084 ZM 29.0059 14.3084 C 29.0059 11.8671 26.9362 9.8813 24.3921 9.8813 C 21.8479 9.8813 19.7774 11.8671 19.7774 14.3084 C 19.7774 16.749 21.8479 18.7355 24.3921 18.7355 C 26.9362 18.7355 29.0059 16.749 29.0059 14.3084 ZM 54.1749 5.1396 L 54.1749 0 L 50.8813 0 L 50.8813 5.1396 L 48.6289 5.1396 L 48.6289 8.2988 L 50.8813 8.2988 L 50.8813 20.2688 L 54.1749 20.2688 L 54.1749 8.2988 L 56.4274 8.2988 L 56.4274 5.1396 L 54.1749 5.1396 ZM 41.3108 6.7196 C 39.5768 6.7196 37.9783 7.2614 36.6745 8.169 L 33.4003 8.169 L 33.4003 20.2688 L 36.6935 20.2688 L 36.6935 14.4176 L 36.7017 14.4176 C 36.7017 14.3804 36.6965 14.3456 36.6965 14.3084 C 36.6965 11.8671 38.7661 9.8813 41.3108 9.8813 C 43.8544 9.8813 45.925 11.8671 45.925 14.3084 C 45.925 14.3456 45.9189 14.3804 45.9189 14.4176 L 45.9267 14.4176 L 45.9267 20.2688 L 49.2212 20.2688 L 49.2212 14.4176 L 49.2151 14.4176 C 49.2151 14.3804 49.2212 14.3456 49.2212 14.3084 C 49.2212 10.1175 45.6792 6.7196 41.3108 6.7196 ZM 56.4274 8.2988 L 56.4274 20.2688 L 59.7202 20.2688 L 59.7202 14.4176 L 59.7287 14.4176 C 59.7287 14.3804 59.7236 14.3456 59.7236 14.3084 C 59.7236 11.8671 61.7933 9.8813 64.3378 9.8813 L 64.3378 6.7196 C 62.5225 6.7196 60.8554 7.3126 59.5203 8.2988 L 56.4274 8.2988 Z" fill="#AAAAAA"></path>*/
/*             </svg>*/
/*         </a>*/
/*     </div>*/
/* </div>*/
/* */
