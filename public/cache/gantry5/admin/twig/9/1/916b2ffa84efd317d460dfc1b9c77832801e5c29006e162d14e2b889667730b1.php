<?php

/* @gantry-admin/pages/configurations/settings/settings.html.twig */
class __TwigTemplate_9fde5ff4cc60ebafc764337bc751b38d8754e65a8ef84c06c634e60934050ccb extends Twig_Template
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
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/settings/settings.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["stored_data"] = $this->env->getExtension('GantryTwig')->jsonDecodeFilter(_twig_default_filter($this->env->getExtension('GantryTwig')->getCookie("g5-collapsed"), "{}"));
        // line 5
        echo "    <div id=\"settings\">
        <form method=\"post\">
            <div data-set-page=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["page_id"]) ? $context["page_id"] : null), "html", null, true);
        echo "\" data-set-root=\"\">
                <span class=\"float-right\">
                    <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SETTINGS"), "html", null, true);
        echo "\">
                    <i class=\"fa fa-fw fa-check\"></i> <span>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_SETTINGS"), "html", null, true);
        echo "</span></button>
                </span>
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["particles"]) ? $context["particles"] : null));
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
        foreach ($context['_seq'] as $context["group"] => $context["list"]) {
            // line 13
            echo "                    <h2 class=\"page-title\">
                        <span class=\"title\">";
            // line 14
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SETTINGS"), "html", null, true);
            echo "</span>
                    </h2>

                    <div class=\"g-filter-actions\">
                        <div class=\"g-panel-filters\" data-g-global-filter=\"\">
                            <div class=\"search settings-block\">
                                <input type=\"text\" data-g-collapse-filter placeholder=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
            echo "...\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
            echo "...\" role=\"search\" />
                                <i class=\"fa fa-fw fa-search\"></i>
                            </div>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"true\"><i class=\"fa fa-fw fa-toggle-up\"></i> ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_COLLAPSE_ALL"), "html", null, true);
            echo "</button>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"false\"><i class=\"fa fa-fw fa-toggle-down\"></i> ";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EXPAND_ALL"), "html", null, true);
            echo "</button>
                        </div>
                    </div>

                    <div class=\"cards-wrapper g-grid\">
                        ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["list"]);
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
            foreach ($context['_seq'] as $context["id"] => $context["particle"]) {
                // line 30
                echo "                            ";
                if ( !$this->getAttribute($context["particle"], "hidden", array())) {
                    // line 31
                    echo "                                ";
                    $context["prefix"] = (("particles." . $context["id"]) . ".");
                    // line 32
                    echo "                                ";
                    $context["collapsed"] = ($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "collapsed", array()) || $this->getAttribute((isset($context["stored_data"]) ? $context["stored_data"] : null), (isset($context["prefix"]) ? $context["prefix"] : null)));
                    // line 33
                    echo "                                ";
                    $context["labels"] = array("collapse" => $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_COLLAPSE"), "expand" => $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_EXPAND"));
                    // line 34
                    echo "                                <div class=\"card settings-block";
                    echo (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (" g-collapsed") : (""));
                    echo "\">
                                    <h4 data-g-collapse=\"";
                    // line 35
                    echo twig_escape_filter($this->env, twig_jsonencode_filter(twig_array_merge((isset($context["labels"]) ? $context["labels"] : null), array("collapsed" => (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (true) : (false)), "id" => (isset($context["prefix"]) ? $context["prefix"] : null), "target" => "~ .inner-params"))), "html_attr");
                    echo "\" data-g-collapse-id=\"";
                    echo twig_escape_filter($this->env, (isset($context["prefix"]) ? $context["prefix"] : null), "html", null, true);
                    echo "\"";
                    echo (((isset($context["overrideable"]) ? $context["overrideable"] : null)) ? (" class=\"card-overrideable\"") : (""));
                    echo ">
                                        <span class=\"g-collapse g-tooltip\" data-title=\"";
                    // line 36
                    echo twig_escape_filter($this->env, (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "expand", array())) : ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "collapse", array()))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw  fa-caret-up\"></i></span>
                                        <span class=\"g-title\">";
                    // line 37
                    echo twig_escape_filter($this->env, $this->getAttribute($context["particle"], "name", array()), "html", null, true);
                    echo "</span>
                                        <input type=\"hidden\" name=\"particles[";
                    // line 38
                    echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                    echo "]\"/>
                                        ";
                    // line 39
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "fields", array()), "enabled", array())) {
                        // line 40
                        echo "                                            ";
                        $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/settings/settings.html.twig", 40)->display(array_merge($context, array("default" => true, "scope" => (isset($context["prefix"]) ? $context["prefix"] : null), "name" => "enabled", "field" => $this->getAttribute($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "fields", array()), "enabled", array()), "value" => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => ((isset($context["prefix"]) ? $context["prefix"] : null) . "enabled")), "method"))));
                        // line 41
                        echo "
                                            ";
                        // line 42
                        if ((isset($context["overrideable"]) ? $context["overrideable"] : null)) {
                            // line 43
                            echo "                                                ";
                            $this->loadTemplate("forms/override.html.twig", "@gantry-admin/pages/configurations/settings/settings.html.twig", 43)->display(array_merge($context, array("scope" => (isset($context["prefix"]) ? $context["prefix"] : null), "name" => "enabled", "field" => array("label" => (("Enabled of the " . $this->getAttribute($context["particle"], "name", array())) . " Particle")))));
                            // line 44
                            echo "                                            ";
                        }
                        // line 45
                        echo "                                        ";
                    }
                    // line 46
                    echo "                                    </h4>

                                    <div class=\"inner-params\">
                                        ";
                    // line 49
                    $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/settings/settings.html.twig", 49)->display(array_merge($context, array("ignore_not_overrideable" => true, "overrideable" => (isset($context["overrideable"]) ? $context["overrideable"] : null), "blueprints" => $this->getAttribute($context["particle"], "form", array()), "skip" => array(0 => "enabled"), "data" => $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "prefix" => (isset($context["prefix"]) ? $context["prefix"] : null))));
                    // line 50
                    echo "                                    </div>
                                </div>
                            ";
                }
                // line 53
                echo "                        ";
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
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['particle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "                    </div>
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
        unset($context['_seq'], $context['_iterated'], $context['group'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "
                <div class=\"g-footer-actions\">
                    <span class=\"float-right\">
                        <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SETTINGS"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-fw fa-check\"></i> <span>";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_SETTINGS"), "html", null, true);
        echo "</span></button>
                    </span>
                </div>
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/settings/settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 60,  225 => 59,  220 => 56,  205 => 54,  191 => 53,  186 => 50,  184 => 49,  179 => 46,  176 => 45,  173 => 44,  170 => 43,  168 => 42,  165 => 41,  162 => 40,  160 => 39,  156 => 38,  152 => 37,  148 => 36,  140 => 35,  135 => 34,  132 => 33,  129 => 32,  126 => 31,  123 => 30,  106 => 29,  98 => 24,  94 => 23,  82 => 20,  71 => 14,  68 => 13,  51 => 12,  46 => 10,  42 => 9,  37 => 7,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/*     {% set stored_data = get_cookie('g5-collapsed')|default('{}')|json_decode %}*/
/*     <div id="settings">*/
/*         <form method="post">*/
/*             <div data-set-page="{{ page_id }}" data-set-root="">*/
/*                 <span class="float-right">*/
/*                     <button type="submit" class="button button-primary button-save" data-save="{{ 'GANTRY5_PLATFORM_SETTINGS'|trans }}">*/
/*                     <i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_SETTINGS'|trans }}</span></button>*/
/*                 </span>*/
/*                 {% for group, list in particles %}*/
/*                     <h2 class="page-title">*/
/*                         <span class="title">{{ group|capitalize }} {{ 'GANTRY5_PLATFORM_SETTINGS'|trans }}</span>*/
/*                     </h2>*/
/* */
/*                     <div class="g-filter-actions">*/
/*                         <div class="g-panel-filters" data-g-global-filter="">*/
/*                             <div class="search settings-block">*/
/*                                 <input type="text" data-g-collapse-filter placeholder="{{ 'GANTRY5_PLATFORM_FILTER'|trans }} {{ group|capitalize }}..." aria-label="{{ 'GANTRY5_PLATFORM_FILTER'|trans }} {{ group|capitalize }}..." role="search" />*/
/*                                 <i class="fa fa-fw fa-search"></i>*/
/*                             </div>*/
/*                             <button class="button" type="button" data-g-collapse-all="true"><i class="fa fa-fw fa-toggle-up"></i> {{ 'GANTRY5_PLATFORM_COLLAPSE_ALL'|trans }}</button>*/
/*                             <button class="button" type="button" data-g-collapse-all="false"><i class="fa fa-fw fa-toggle-down"></i> {{ 'GANTRY5_PLATFORM_EXPAND_ALL'|trans }}</button>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="cards-wrapper g-grid">*/
/*                         {% for id, particle in list %}*/
/*                             {% if not particle.hidden %}*/
/*                                 {% set prefix = 'particles.' ~ id ~ '.' %}*/
/*                                 {% set collapsed = particle.form.collapsed or attribute(stored_data, prefix) %}*/
/*                                 {% set labels = {collapse: 'GANTRY5_PLATFORM_COLLAPSE'|trans, expand: 'GANTRY5_PLATFORM_EXPAND'|trans} %}*/
/*                                 <div class="card settings-block{{ collapsed ? ' g-collapsed' : '' }}">*/
/*                                     <h4 data-g-collapse="{{ labels|merge({collapsed: collapsed ? true : false, id: prefix, target: '~ .inner-params' })|json_encode|e('html_attr') }}" data-g-collapse-id="{{ prefix }}"{{ overrideable ? ' class="card-overrideable"' : '' }}>*/
/*                                         <span class="g-collapse g-tooltip" data-title="{{ collapsed ? labels.expand : labels.collapse }}"><i class="fa fa-fw  fa-caret-up"></i></span>*/
/*                                         <span class="g-title">{{ particle.name }}</span>*/
/*                                         <input type="hidden" name="particles[{{ id }}]"/>*/
/*                                         {% if particle.form.fields.enabled %}*/
/*                                             {% include 'forms/fields/enable/enable.html.twig' with {'default': true, 'scope': prefix, 'name': 'enabled', 'field': particle.form.fields.enabled, 'value': gantry.config.get(prefix ~ 'enabled')} %}*/
/* */
/*                                             {% if overrideable %}*/
/*                                                 {% include 'forms/override.html.twig' with {'scope': prefix, 'name': 'enabled', 'field': {'label': 'Enabled of the ' ~ particle.name ~ ' Particle' }} %}*/
/*                                             {% endif %}*/
/*                                         {% endif %}*/
/*                                     </h4>*/
/* */
/*                                     <div class="inner-params">*/
/*                                         {% include 'forms/fields.html.twig' with {'ignore_not_overrideable': true, 'overrideable': overrideable, 'blueprints': particle.form, skip: ['enabled'], data: gantry.config, "prefix": prefix} %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                     </div>*/
/*                 {% endfor %}*/
/* */
/*                 <div class="g-footer-actions">*/
/*                     <span class="float-right">*/
/*                         <button type="submit" class="button button-primary button-save" data-save="{{ 'GANTRY5_PLATFORM_SETTINGS'|trans }}">*/
/*                             <i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_SETTINGS'|trans }}</span></button>*/
/*                     </span>*/
/*                 </div>*/
/*             </div>*/
/*         </form>*/
/*     </div>*/
/* {% endblock %}*/
/* */
