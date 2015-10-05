<?php

/* @gantry-admin/ajax/filepicker.html.twig */
class __TwigTemplate_fd1100f6ff448d6941d7e92f407399b4ff7041db518901db77dc39383aa9774c extends Twig_Template
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
        echo "<div class=\"g-particles-header filepicker-header settings-block clearfix\">
    ";
        // line 3
        echo "    <div class=\"float-right files-mode\">
        <div class=\"file-mode active\" data-files-mode=\"thumbnails\"><i class=\"fa fa-th-large\"></i></div>
        <div class=\"file-mode\" data-files-mode=\"list\"><i class=\"fa fa-th-list\"></i></div>
    </div>
</div>
<div class=\"g-particles-main icons-wrapper g-grid\">
    <div class=\"folders g-block size-30\">
        <ul class=\"g-bookmarks\">
            ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["bookmarks"]) ? $context["bookmarks"] : null));
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
        foreach ($context['_seq'] as $context["index"] => $context["bookmark"]) {
            // line 12
            echo "                <li class=\"g-bookmark";
            echo ((twig_in_filter($context["index"], (isset($context["active"]) ? $context["active"] : null))) ? (" selected") : (""));
            echo "\">
                    <span class=\"g-bookmark-title\" title=\"";
            // line 13
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo " <i class=\"g-bookmark-collapse fa fa-fw fa-minus\"></i></span>
                    <ul class=\"g-folders fa-ul\">
                        ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["bookmark"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["folder"]) {
                // line 16
                echo "                            <li";
                echo ((twig_in_filter($context["folder"], (isset($context["active"]) ? $context["active"] : null))) ? (" class=\"selected active\"") : (""));
                echo " data-folder=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(array("pathname" => $context["folder"])), "html_attr");
                echo "\"><i class=\"fa-li fa fa-folder-o\"></i> <span class=\"path\" title=\"";
                echo twig_escape_filter($this->env, $context["folder"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["folder"], "html", null, true);
                echo "</span></li>
                            ";
                // line 17
                $this->loadTemplate("ajax/filepicker/subfolders.html.twig", "@gantry-admin/ajax/filepicker.html.twig", 17)->display(array_merge($context, array("folder" => $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), $context["index"]), $context["folder"]), "active" => (isset($context["active"]) ? $context["active"] : null))));
                // line 18
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "                    </ul>
                </li>
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
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['bookmark'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            ";
        // line 25
        echo "        </ul>
    </div>
    <div class=\"g-files g-block g-filemode-thumbnails\">
        ";
        // line 28
        $this->loadTemplate("ajax/filepicker/files.html.twig", "@gantry-admin/ajax/filepicker.html.twig", 28)->display(array_merge($context, array("files" => (isset($context["files"]) ? $context["files"] : null), "value" => (isset($context["value"]) ? $context["value"] : null))));
        // line 29
        echo "    </div>
</div>
";
        // line 32
        echo "<div class=\"g-particles-footer settings-block clearfix\">
    <div class=\"float-left footer-upload-info font-small\">
        Upload files by Drag & Drop or by <a href=\"#\" data-upload>selecting them</a>. <br/>
        Current filters: ";
        // line 35
        echo (((isset($context["filter"]) ? $context["filter"] : null)) ? ((("<code>" . (isset($context["filter"]) ? $context["filter"] : null)) . "</code>")) : ("<strong>No Filter</strong>"));
        echo "
    </div>
    <div class=\"float-right\">
        <button href=\"#\" class=\"button button-primary\" data-select>";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo "</button>
        <button href=\"#\" class=\"button g5-dialog-close\">";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/ajax/filepicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 39,  145 => 38,  139 => 35,  134 => 32,  130 => 29,  128 => 28,  123 => 25,  121 => 22,  105 => 19,  91 => 18,  89 => 17,  78 => 16,  61 => 15,  54 => 13,  49 => 12,  32 => 11,  22 => 3,  19 => 1,);
    }
}
/* <div class="g-particles-header filepicker-header settings-block clearfix">*/
/*     {#{{ active|join(', ') }}#}*/
/*     <div class="float-right files-mode">*/
/*         <div class="file-mode active" data-files-mode="thumbnails"><i class="fa fa-th-large"></i></div>*/
/*         <div class="file-mode" data-files-mode="list"><i class="fa fa-th-list"></i></div>*/
/*     </div>*/
/* </div>*/
/* <div class="g-particles-main icons-wrapper g-grid">*/
/*     <div class="folders g-block size-30">*/
/*         <ul class="g-bookmarks">*/
/*             {% for index,bookmark in bookmarks %}*/
/*                 <li class="g-bookmark{{ (index in active) ? ' selected' : '' }}">*/
/*                     <span class="g-bookmark-title" title="{{ index }}">{{ index }} <i class="g-bookmark-collapse fa fa-fw fa-minus"></i></span>*/
/*                     <ul class="g-folders fa-ul">*/
/*                         {% for folder in bookmark %}*/
/*                             <li{{ (folder in active) ? ' class="selected active"' : '' }} data-folder="{{ {pathname: folder}|json_encode|e('html_attr') }}"><i class="fa-li fa fa-folder-o"></i> <span class="path" title="{{ folder }}">{{ folder }}</span></li>*/
/*                             {% include 'ajax/filepicker/subfolders.html.twig' with {'folder': attribute(attribute(folders, index), folder), 'active': active } %}*/
/*                         {% endfor %}*/
/*                     </ul>*/
/*                 </li>*/
/*             {% endfor %}*/
/*             {#{% for index,folder in folders %}*/
/*                 <li data-folder="{{ folder|json_encode()|e('html_attr') }}">{{ folder.filename }}</li>*/
/*             {% endfor %}#}*/
/*         </ul>*/
/*     </div>*/
/*     <div class="g-files g-block g-filemode-thumbnails">*/
/*         {% include 'ajax/filepicker/files.html.twig' with {'files': files, 'value': value } %}*/
/*     </div>*/
/* </div>*/
/* {#<div class="g-breadcrumbs">{{ base }}</div>#}*/
/* <div class="g-particles-footer settings-block clearfix">*/
/*     <div class="float-left footer-upload-info font-small">*/
/*         Upload files by Drag & Drop or by <a href="#" data-upload>selecting them</a>. <br/>*/
/*         Current filters: {{ filter ? ('<code>' ~ filter ~ '</code>')|raw : ('<strong>No Filter</strong>')|raw }}*/
/*     </div>*/
/*     <div class="float-right">*/
/*         <button href="#" class="button button-primary" data-select>{{ 'GANTRY5_PLATFORM_SELECT'|trans }}</button>*/
/*         <button href="#" class="button g5-dialog-close">{{ 'GANTRY5_PLATFORM_CANCEL'|trans }}</button>*/
/*     </div>*/
/* </div>*/
/* */
