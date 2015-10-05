<?php

/* ajax/filepicker/subfolders.html.twig */
class __TwigTemplate_66916719dd631145500f11a0001d84a946b4598873036d4b93896d5a069e559e extends Twig_Template
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
        echo "<ul class=\"g-bookmark-folders fa-ul\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["folder"]) ? $context["folder"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["bookmarkFolder"]) {
            // line 3
            echo "        <li data-folder=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($context["bookmarkFolder"]), "html_attr");
            echo "\"";
            echo ((twig_in_filter($this->getAttribute($context["bookmarkFolder"], "pathname", array()), (isset($context["active"]) ? $context["active"] : null))) ? (" class=\"active\"") : (""));
            echo "><i class=\"fa-li fa fa-folder-o\"></i> <span class=\"path\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["bookmarkFolder"], "filename", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["bookmarkFolder"], "filename", array()), "html", null, true);
            echo "</span></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bookmarkFolder'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "ajax/filepicker/subfolders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul class="g-bookmark-folders fa-ul">*/
/*     {% for bookmarkFolder in folder %}*/
/*         <li data-folder="{{ bookmarkFolder|json_encode()|e('html_attr') }}"{{ bookmarkFolder.pathname in active ? ' class="active"' : '' }}><i class="fa-li fa fa-folder-o"></i> <span class="path" title="{{ bookmarkFolder.filename }}">{{ bookmarkFolder.filename }}</span></li>*/
/*     {% endfor %}*/
/* </ul>*/
/* */
