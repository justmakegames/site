<?php

/* ajax/filepicker/files.html.twig */
class __TwigTemplate_e311fdd34e34e18c19510b85c8cb6dfb3935f537e8159daf541210bef7340496 extends Twig_Template
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
        // line 21
        echo "
<ul class=\"g-list-labels\">
    <li>
        <span class=\"g-file-name\">";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_NAME"), "html", null, true);
        echo "</span>
        <span class=\"g-file-size\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SIZE"), "html", null, true);
        echo "</span>
        <span class=\"g-file-mtime\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_LATEST_MODIFIED"), "html", null, true);
        echo "</span>
    </li>
</ul>
<ul>
    ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
        foreach ($context['_seq'] as $context["index"] => $context["file"]) {
            // line 31
            echo "        <li data-file=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($context["file"]), "html_attr");
            echo "\" data-file-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "pathname", array()));
            echo "\"";
            echo ((($this->getAttribute($context["file"], "pathname", array()) == (isset($context["value"]) ? $context["value"] : null))) ? (" class=\"selected\"") : (""));
            echo ">
            ";
            // line 32
            if ($this->getAttribute($context["file"], "isInCustom", array())) {
                // line 33
                echo "                <span class=\"g-file-delete\" data-g-file-delete data-dz-remove><i class=\"fa fa-fw fa-trash-o\"></i></span>
            ";
            }
            // line 35
            echo "            ";
            if ($this->getAttribute($context["file"], "isImage", array())) {
                // line 36
                echo "                <div class=\"g-thumb g-image g-image-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "extension", array()), "html", null, true);
                echo "\">
                    <div style=\"background-image: url('";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["file"], "pathname", array())), "html", null, true);
                echo "')\"></div>
                </div>
            ";
            } else {
                // line 40
                echo "                <div class=\"g-thumb\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "extension", array()), "html", null, true);
                echo "</div>
            ";
            }
            // line 42
            echo "
            <span class=\"g-file-name\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "filename", array()), "html", null, true);
            echo "</span>
            <span class=\"g-file-size\">";
            // line 44
            echo $this->getAttribute($this, "bytesToSize", array(0 => $this->getAttribute($context["file"], "size", array())), "method");
            echo "</span>
            <span class=\"g-file-mtime\">";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["file"], "mtime", array()), "j M o"), "html", null, true);
            echo "</span>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
    ";
        // line 49
        if ((twig_length_filter($this->env, (isset($context["files"]) ? $context["files"] : null)) == 0)) {
            // line 50
            echo "        <li class=\"no-files-found\"><h2>Folder is Empty</h2></li>
    ";
        }
        // line 52
        echo "</ul>
";
    }

    // line 1
    public function getbytesToSize($__bytes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "bytes" => $__bytes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            ob_start();
            // line 3
            echo "        ";
            $context["kilobyte"] = 1024;
            // line 4
            echo "        ";
            $context["megabyte"] = ((isset($context["kilobyte"]) ? $context["kilobyte"] : null) * 1024);
            // line 5
            echo "        ";
            $context["gigabyte"] = ((isset($context["megabyte"]) ? $context["megabyte"] : null) * 1024);
            // line 6
            echo "        ";
            $context["terabyte"] = ((isset($context["gigabyte"]) ? $context["gigabyte"] : null) * 1024);
            // line 7
            echo "
        ";
            // line 8
            if (((isset($context["bytes"]) ? $context["bytes"] : null) < (isset($context["kilobyte"]) ? $context["kilobyte"] : null))) {
                // line 9
                echo "            ";
                echo twig_escape_filter($this->env, ((isset($context["bytes"]) ? $context["bytes"] : null) . " B"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 10
(isset($context["bytes"]) ? $context["bytes"] : null) < (isset($context["megabyte"]) ? $context["megabyte"] : null))) {
                // line 11
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, ((isset($context["bytes"]) ? $context["bytes"] : null) / (isset($context["kilobyte"]) ? $context["kilobyte"] : null)), 2, ".") . " KB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 12
(isset($context["bytes"]) ? $context["bytes"] : null) < (isset($context["gigabyte"]) ? $context["gigabyte"] : null))) {
                // line 13
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, ((isset($context["bytes"]) ? $context["bytes"] : null) / (isset($context["megabyte"]) ? $context["megabyte"] : null)), 2, ".") . " MB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 14
(isset($context["bytes"]) ? $context["bytes"] : null) < (isset($context["terabyte"]) ? $context["terabyte"] : null))) {
                // line 15
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, ((isset($context["bytes"]) ? $context["bytes"] : null) / (isset($context["gigabyte"]) ? $context["gigabyte"] : null)), 2, ".") . " GB"), "html", null, true);
                echo "
        ";
            } else {
                // line 17
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, ((isset($context["bytes"]) ? $context["bytes"] : null) / (isset($context["terabyte"]) ? $context["terabyte"] : null)), 2, ".") . " TB"), "html", null, true);
                echo "
        ";
            }
            // line 19
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "ajax/filepicker/files.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 19,  170 => 17,  164 => 15,  162 => 14,  157 => 13,  155 => 12,  150 => 11,  148 => 10,  143 => 9,  141 => 8,  138 => 7,  135 => 6,  132 => 5,  129 => 4,  126 => 3,  124 => 2,  112 => 1,  107 => 52,  103 => 50,  101 => 49,  98 => 48,  89 => 45,  85 => 44,  81 => 43,  78 => 42,  72 => 40,  66 => 37,  61 => 36,  58 => 35,  54 => 33,  52 => 32,  43 => 31,  39 => 30,  32 => 26,  28 => 25,  24 => 24,  19 => 21,);
    }
}
/* {% macro bytesToSize(bytes) -%}*/
/*     {% spaceless %}*/
/*         {% set kilobyte = 1024 %}*/
/*         {% set megabyte = kilobyte * 1024 %}*/
/*         {% set gigabyte = megabyte * 1024 %}*/
/*         {% set terabyte = gigabyte * 1024 %}*/
/* */
/*         {% if bytes < kilobyte %}*/
/*             {{ bytes ~ ' B' }}*/
/*         {% elseif bytes < megabyte %}*/
/*             {{ (bytes / kilobyte)|number_format(2, '.') ~ ' KB' }}*/
/*         {% elseif bytes < gigabyte %}*/
/*             {{ (bytes / megabyte)|number_format(2, '.') ~ ' MB' }}*/
/*         {% elseif bytes < terabyte %}*/
/*             {{ (bytes / gigabyte)|number_format(2, '.') ~ ' GB' }}*/
/*         {% else %}*/
/*             {{ (bytes / terabyte)|number_format(2, '.') ~ ' TB' }}*/
/*         {% endif %}*/
/*     {% endspaceless %}*/
/* {%- endmacro %}*/
/* */
/* <ul class="g-list-labels">*/
/*     <li>*/
/*         <span class="g-file-name">{{ 'GANTRY5_PLATFORM_NAME'|trans }}</span>*/
/*         <span class="g-file-size">{{ 'GANTRY5_PLATFORM_SIZE'|trans }}</span>*/
/*         <span class="g-file-mtime">{{ 'GANTRY5_PLATFORM_LATEST_MODIFIED'|trans }}</span>*/
/*     </li>*/
/* </ul>*/
/* <ul>*/
/*     {% for index,file in files %}*/
/*         <li data-file="{{ file|json_encode()|e('html_attr') }}" data-file-url="{{ file.pathname|e }}"{{ file.pathname == value ? ' class="selected"' : '' }}>*/
/*             {% if file.isInCustom %}*/
/*                 <span class="g-file-delete" data-g-file-delete data-dz-remove><i class="fa fa-fw fa-trash-o"></i></span>*/
/*             {% endif %}*/
/*             {% if file.isImage %}*/
/*                 <div class="g-thumb g-image g-image-{{ file.extension }}">*/
/*                     <div style="background-image: url('{{ url(file.pathname) }}')"></div>*/
/*                 </div>*/
/*             {% else %}*/
/*                 <div class="g-thumb">{{ file.extension }}</div>*/
/*             {% endif %}*/
/* */
/*             <span class="g-file-name">{{ file.filename }}</span>*/
/*             <span class="g-file-size">{{ _self.bytesToSize(file.size) }}</span>*/
/*             <span class="g-file-mtime">{{ file.mtime|date('j M o') }}</span>*/
/*         </li>*/
/*     {% endfor %}*/
/* */
/*     {% if files|length == 0 %}*/
/*         <li class="no-files-found"><h2>Folder is Empty</h2></li>*/
/*     {% endif %}*/
/* </ul>*/
/* */
