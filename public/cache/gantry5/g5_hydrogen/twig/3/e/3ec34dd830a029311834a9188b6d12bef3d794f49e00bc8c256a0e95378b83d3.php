<?php

/* @nucleus/page.html.twig */
class __TwigTemplate_86a51238305111ad104035c416fa9bb16be97a85f0c0052961343a1b9a1ea91e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'page_head' => array($this, 'block_page_head'),
            'content' => array($this, 'block_content'),
            'page_offcanvas' => array($this, 'block_page_offcanvas'),
            'page_layout' => array($this, 'block_page_layout'),
            'page_top' => array($this, 'block_page_top'),
            'page_bottom' => array($this, 'block_page_bottom'),
            'page_footer' => array($this, 'block_page_footer'),
            'page' => array($this, 'block_page'),
            'page_body' => array($this, 'block_page_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "setLayout", array(), "method");
        // line 3
        ob_start();
        // line 4
        echo "    ";
        $this->displayBlock('page_head', $context, $blocks);
        $context["page_head"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 9
        ob_start();
        // line 10
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "hasContent", array(), "method")) {
            // line 11
            echo "        ";
            $this->displayBlock('content', $context, $blocks);
            // line 13
            echo "    ";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 16
        $context["offcanvas"] = null;
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "segments", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            if (($this->getAttribute($context["segment"], "type", array()) == "offcanvas")) {
                // line 18
                $context["offcanvas"] = $context["segment"];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        ob_start();
        // line 22
        echo "    ";
        $this->displayBlock('page_offcanvas', $context, $blocks);
        $context["page_offcanvas"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        $context["page_offcanvas"] = ((trim((isset($context["page_offcanvas"]) ? $context["page_offcanvas"] : null))) ? (trim((isset($context["page_offcanvas"]) ? $context["page_offcanvas"] : null))) : (""));
        // line 30
        $context["offcanvas_position"] = (((isset($context["page_offcanvas"]) ? $context["page_offcanvas"] : null)) ? ((($this->getAttribute($this->getAttribute((isset($context["offcanvas"]) ? $context["offcanvas"] : null), "attributes", array(), "any", false, true), "position", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["offcanvas"]) ? $context["offcanvas"] : null), "attributes", array(), "any", false, true), "position", array()), "g-offcanvas-left")) : ("g-offcanvas-left"))) : (""));
        // line 32
        ob_start();
        // line 33
        echo "    ";
        $this->displayBlock('page_layout', $context, $blocks);
        $context["page_layout"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 40
        ob_start();
        // line 41
        echo "    ";
        $this->displayBlock('page_top', $context, $blocks);
        $context["page_top"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 45
        ob_start();
        // line 46
        echo "    ";
        $this->displayBlock('page_bottom', $context, $blocks);
        $context["page_bottom"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 50
        ob_start();
        // line 51
        echo "    ";
        $this->displayBlock('page_footer', $context, $blocks);
        $context["page_footer"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 56
        $this->displayBlock('page', $context, $blocks);
        // line 78
        $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "finalize", array(), "method");
    }

    // line 4
    public function block_page_head($context, array $blocks = array())
    {
        // line 5
        $this->loadTemplate("partials/page_head.html.twig", "@nucleus/page.html.twig", 5)->display($context);
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "        ";
    }

    // line 22
    public function block_page_offcanvas($context, array $blocks = array())
    {
        // line 23
        echo "        ";
        if ((isset($context["offcanvas"]) ? $context["offcanvas"] : null)) {
            // line 24
            echo "            ";
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute((isset($context["offcanvas"]) ? $context["offcanvas"] : null), "type", array())) . ".html.twig"), "@nucleus/page.html.twig", 24)->display(array_merge($context, array("segment" => (isset($context["offcanvas"]) ? $context["offcanvas"] : null))));
        }
        // line 26
        echo "    ";
    }

    // line 33
    public function block_page_layout($context, array $blocks = array())
    {
        // line 34
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "segments", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            if (($this->getAttribute($context["segment"], "type", array()) != "offcanvas")) {
                // line 35
                echo "        ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/page.html.twig", 35)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
                // line 36
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    ";
    }

    // line 41
    public function block_page_top($context, array $blocks = array())
    {
        // line 42
        echo "    ";
    }

    // line 46
    public function block_page_bottom($context, array $blocks = array())
    {
        // line 47
        echo "    ";
    }

    // line 51
    public function block_page_footer($context, array $blocks = array())
    {
        // line 52
        echo "        ";
        echo twig_join_filter($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "scripts", array(0 => "footer"), "method"), "
    ");
        echo "
    ";
    }

    // line 56
    public function block_page($context, array $blocks = array())
    {
        // line 57
        echo "<!DOCTYPE ";
        echo (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array(), "any", false, true), "doctype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array(), "any", false, true), "doctype", array()), "html")) : ("html"));
        echo ">
<html";
        // line 58
        echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array()), "htmlAttributes", array());
        echo ">
    ";
        // line 59
        echo (isset($context["page_head"]) ? $context["page_head"] : null);
        echo "
    ";
        // line 60
        $this->displayBlock('page_body', $context, $blocks);
        // line 75
        echo "
</html>
";
    }

    // line 60
    public function block_page_body($context, array $blocks = array())
    {
        // line 61
        echo "<body";
        echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array()), "bodyAttributes", array(0 => array("class" => array(0 => (isset($context["offcanvas_position"]) ? $context["offcanvas_position"] : null), 1 => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "page", array()), "preset", array()), 2 => ("g-style-" . $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "preset", array()))))), "method");
        echo ">
        ";
        // line 62
        echo (isset($context["page_offcanvas"]) ? $context["page_offcanvas"] : null);
        echo "
        <div id=\"g-page-surround\">
            ";
        // line 64
        if (trim((isset($context["page_offcanvas"]) ? $context["page_offcanvas"] : null))) {
            // line 65
            echo "            <div class=\"g-offcanvas-hide g-offcanvas-toggle\" data-offcanvas-toggle><i class=\"fa fa-fw fa-bars\"></i></div>
            ";
        }
        // line 67
        echo "            ";
        echo (isset($context["page_top"]) ? $context["page_top"] : null);
        echo "
            ";
        // line 68
        echo (isset($context["page_layout"]) ? $context["page_layout"] : null);
        echo "
            ";
        // line 69
        echo (isset($context["page_bottom"]) ? $context["page_bottom"] : null);
        echo "
        </div>
        <script type=\"text/javascript\" src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc("gantry-assets://js/main.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 72
        echo (isset($context["page_footer"]) ? $context["page_footer"] : null);
        echo "
    </body>";
    }

    public function getTemplateName()
    {
        return "@nucleus/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 72,  244 => 71,  239 => 69,  235 => 68,  230 => 67,  226 => 65,  224 => 64,  219 => 62,  214 => 61,  211 => 60,  205 => 75,  203 => 60,  199 => 59,  195 => 58,  190 => 57,  187 => 56,  179 => 52,  176 => 51,  172 => 47,  169 => 46,  165 => 42,  162 => 41,  158 => 37,  148 => 36,  145 => 35,  133 => 34,  130 => 33,  126 => 26,  122 => 24,  119 => 23,  116 => 22,  112 => 12,  109 => 11,  105 => 5,  102 => 4,  98 => 78,  96 => 56,  92 => 51,  90 => 50,  86 => 46,  84 => 45,  80 => 41,  78 => 40,  74 => 33,  72 => 32,  70 => 30,  68 => 29,  64 => 22,  62 => 21,  55 => 18,  50 => 17,  48 => 16,  44 => 13,  41 => 11,  38 => 10,  36 => 9,  32 => 4,  30 => 3,  28 => 1,);
    }
}
/* {%- do gantry.theme.setLayout() -%}*/
/* */
/* {%- set page_head %}*/
/*     {% block page_head -%}*/
/*         {% include 'partials/page_head.html.twig' %}*/
/*     {%- endblock %}*/
/* {% endset -%}*/
/* */
/* {%- set content %}*/
/*     {% if gantry.theme.hasContent() %}*/
/*         {% block content %}*/
/*         {% endblock %}*/
/*     {% endif %}*/
/* {% endset -%}*/
/* */
/* {%- set offcanvas = null -%}*/
/* {%- for segment in gantry.theme.segments if segment.type == 'offcanvas' %}*/
/*     {%- set offcanvas = segment -%}*/
/* {% endfor -%}*/
/* */
/* {%- set page_offcanvas %}*/
/*     {% block page_offcanvas %}*/
/*         {% if offcanvas %}*/
/*             {% include '@nucleus/layout/' ~ offcanvas.type ~ '.html.twig' with { 'segment': offcanvas } -%}*/
/*         {% endif %}*/
/*     {% endblock %}*/
/* {% endset %}*/
/* */
/* {%- set page_offcanvas = page_offcanvas|trim ?: '' %}*/
/* {%- set offcanvas_position = page_offcanvas ? offcanvas.attributes.position|default('g-offcanvas-left') : '' -%}*/
/* */
/* {%- set page_layout %}*/
/*     {% block page_layout %}*/
/*     {% for segment in gantry.theme.segments if segment.type != 'offcanvas' %}*/
/*         {% include '@nucleus/layout/' ~ segment.type ~ '.html.twig' with { 'segments': segment.children } %}*/
/*     {% endfor %}*/
/*     {% endblock %}*/
/* {% endset -%}*/
/* */
/* {%- set page_top %}*/
/*     {% block page_top %}*/
/*     {% endblock %}*/
/* {% endset -%}*/
/* */
/* {%- set page_bottom %}*/
/*     {% block page_bottom %}*/
/*     {% endblock %}*/
/* {% endset -%}*/
/* */
/* {%- set page_footer %}*/
/*     {% block page_footer %}*/
/*         {{ gantry.scripts('footer')|join("\n    ")|raw }}*/
/*     {% endblock %}*/
/* {% endset -%}*/
/* */
/* {%- block page -%}*/
/* <!DOCTYPE {{ gantry.page.doctype|default('html')|raw }}>*/
/* <html{{ gantry.page.htmlAttributes|raw }}>*/
/*     {{ page_head|raw }}*/
/*     {% block page_body -%}*/
/*     <body{{ gantry.page.bodyAttributes({'class': [offcanvas_position, gantry.page.preset, 'g-style-' ~ gantry.theme.preset]})|raw }}>*/
/*         {{ page_offcanvas|raw }}*/
/*         <div id="g-page-surround">*/
/*             {% if page_offcanvas|trim %}*/
/*             <div class="g-offcanvas-hide g-offcanvas-toggle" data-offcanvas-toggle><i class="fa fa-fw fa-bars"></i></div>*/
/*             {% endif %}*/
/*             {{ page_top|raw }}*/
/*             {{ page_layout|raw }}*/
/*             {{ page_bottom|raw }}*/
/*         </div>*/
/*         <script type="text/javascript" src="{{ url('gantry-assets://js/main.js') }}"></script>*/
/*         {{ page_footer|raw }}*/
/*     </body>*/
/*     {%- endblock %}*/
/* */
/* </html>*/
/* {% endblock -%}*/
/* {% do gantry.platform.finalize() -%}*/
/* */
