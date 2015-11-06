<?php

/* @particles/menu.html.twig */
class __TwigTemplate_7400785a082693480b88996e0d4a74d39a9ef4439e4eeda6923ccb5d4bb2b6aa extends Twig_Template
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
        try {            // line 2
            $context["menu"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "menu", array()), "instance", array(0 => (isset($context["particle"]) ? $context["particle"] : null)), "method");
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            $context['e'] = $e;
            // line 4
            echo "<div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : null), "getMessage", array()), "html", null, true);
            echo "</div>
";
        }
        // line 6
        echo "
";
        // line 16
        echo "
";
        // line 27
        echo "
";
        // line 36
        echo "
";
        // line 83
        echo "
";
        // line 100
        echo "
";
        // line 108
        echo "
";
        // line 119
        echo "
";
        // line 120
        if ($this->getAttribute($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()), "count", array(), "method")) {
            // line 121
            echo "<nav class=\"g-main-nav\" role=\"navigation\"";
            echo (($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "mobileTarget", array())) ? (" data-g-mobile-target") : (""));
            echo ">
    <ul class=\"g-toplevel\">
        ";
            // line 123
            echo $this->getAttribute($this, "displayItems", array(0 => $this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()), 1 => (isset($context["menu"]) ? $context["menu"] : null), 2 => $context), "method");
            echo "
    </ul>
</nav>
";
        }
    }

    // line 7
    public function getgetCustomWidth($__item__ = null, $__menu__ = null, $__mode__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "mode" => $__mode__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 8
            if ((((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "auto")) : ("auto")) != "auto") &&  !(((isset($context["dropdown_type"]) ? $context["dropdown_type"] : null) == "fullwidth") && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) > 1)))) {
                // line 9
                if (((isset($context["mode"]) ? $context["mode"] : null) == "item")) {
                    // line 10
                    echo "style=\"position: relative;\"";
                } elseif ((                // line 11
(isset($context["mode"]) ? $context["mode"] : null) == "submenu")) {
                    // line 12
                    echo "style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()));
                    echo ";\" data-g-item-width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()));
                    echo "\"";
                }
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 17
    public function getdisplayParticle($__item__ = null, $__context__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "context" => $__context__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 18
            echo "    ";
            if (((null === $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array()), "enabled", array())) || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array()), "enabled", array()))) {
                // line 19
                echo "        ";
                $context["context"] = twig_array_merge((isset($context["context"]) ? $context["context"] : null), array("particle" => $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array())));
                // line 20
                echo "        ";
                $context["classes"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "block", array()), "class", array());
                // line 21
                echo "        <div class=\"menu-item-particle";
                echo twig_escape_filter($this->env, (((isset($context["classes"]) ? $context["classes"] : null)) ? ((" " . (isset($context["classes"]) ? $context["classes"] : null))) : ("")), "html", null, true);
                echo "\">
        ";
                // line 22
                try {
                    $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "particle", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "particle", array())) . ".html.twig")), "@particles/menu.html.twig", 22)->display(                    // line 23
(isset($context["context"]) ? $context["context"] : null));
                } catch (Twig_Error_Loader $e) {
                    // ignore missing template
                }

                // line 24
                echo "        </div>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 28
    public function getdisplayTitle($__item__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 29
            echo "    ";
            if (( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon_only", array()) ||  !($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()) || $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array())))) {
                // line 30
                echo "        <span class=\"g-menu-item-title\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()));
                echo "</span>
        ";
                // line 31
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array())) {
                    // line 32
                    echo "            <span class=\"g-menu-item-subtitle\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array()));
                    echo "</span>
        ";
                }
                // line 34
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 37
    public function getdisplayItem($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 38
            echo "    ";
            $context["SELF"] = $this;
            // line 39
            echo "    ";
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "visible", array())) {
                // line 40
                echo "        ";
                $context["title"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon_only", array())) ? (((" title=\"" . twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()))) . "\"")) : (""));
                // line 41
                echo "        ";
                $context["active"] = (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "isActive", array(0 => (isset($context["item"]) ? $context["item"] : null)), "method")) ? (" active") : (""));
                // line 42
                echo "        ";
                $context["dropdown"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) == 1)) ? ((" g-" . twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getDropdown", array(), "method")))) : (""));
                // line 43
                echo "        ";
                $context["parent"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) ? (" g-parent") : (""));
                // line 44
                echo "        ";
                $context["target"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "target", array()) != "_self")) ? (((" target=\"" . twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "target", array()))) . "\"")) : (""));
                // line 45
                echo "
        <li class=\"g-menu-item g-menu-item-type-";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()));
                echo " g-menu-item-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()));
                if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                    echo (isset($context["parent"]) ? $context["parent"] : null);
                }
                echo (isset($context["active"]) ? $context["active"] : null);
                echo (isset($context["dropdown"]) ? $context["dropdown"] : null);
                echo " ";
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array()) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array()))) {
                    if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                        echo "g-menu-item-link-parent";
                    }
                }
                echo " ";
                echo twig_escape_filter($this->env, _twig_default_filter(twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "class", array())), ""), "html", null, true);
                echo "\"";
                // line 47
                echo $context["SELF"]->getgetCustomWidth((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), "item", (isset($context["dropdown"]) ? $context["dropdown"] : null));
                // line 48
                if ((($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "renderTitles", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "renderTitles", array()), 0)) : (0))) {
                    echo " title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()));
                    echo "\"";
                }
                echo ">
            ";
                // line 49
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    echo "<a class=\"g-menu-item-container";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array())) ? ((" " . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array()))) : ("")), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array()));
                    echo (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "hash", array())) ? (twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "hash", array()))) : (""));
                    echo "\"";
                    echo ((isset($context["title"]) ? $context["title"] : null) . (isset($context["target"]) ? $context["target"] : null));
                    echo ">
            ";
                } else {
                    // line 50
                    echo "<div class=\"g-menu-item-container";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array())) ? ((" " . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array()))) : ("")), "html", null, true);
                    echo "\" data-g-menuparent=\"\">";
                }
                // line 51
                echo "                ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())) {
                    // line 52
                    echo "                    <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())));
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()));
                    echo "\" />
                ";
                } elseif ($this->getAttribute(                // line 53
(isset($context["item"]) ? $context["item"] : null), "icon", array())) {
                    // line 54
                    echo "                    <i class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array()));
                    echo "\"></i>
                ";
                }
                // line 56
                echo "                ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    // line 57
                    echo "                    <span class=\"g-menu-item-content\">
                        ";
                    // line 58
                    echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                    echo "
                    </span>
                    ";
                    // line 60
                    if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array()) &&  !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array()))) {
                        // line 61
                        echo "<span class=\"g-menu-parent-indicator\" data-g-menuparent=\"\"></span>";
                    }
                    // line 63
                    echo "                ";
                } else {
                    // line 64
                    echo "                    ";
                    if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()) == "particle")) {
                        // line 65
                        echo "                        ";
                        echo $context["SELF"]->getdisplayParticle((isset($context["item"]) ? $context["item"] : null), (isset($context["context"]) ? $context["context"] : null));
                        echo "
                    ";
                    } elseif (($this->getAttribute(                    // line 66
(isset($context["item"]) ? $context["item"] : null), "type", array()) == "heading")) {
                        // line 67
                        echo "                        <span class=\"g-nav-header g-menu-item-content\"";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo ">";
                        echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                        echo "</span>
                    ";
                    } else {
                        // line 69
                        echo "                        <span class=\"g-separator g-menu-item-content\"";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo ">";
                        echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                        echo "</span>
                    ";
                    }
                    // line 71
                    echo "                        ";
                    if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) {
                        // line 72
                        echo "<span class=\"g-menu-parent-indicator\"></span>";
                    }
                    // line 74
                    echo "                ";
                }
                // line 75
                echo "            ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    echo "</a>
            ";
                } else {
                    // line 76
                    echo "</div>";
                }
                // line 77
                echo "            ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) {
                    // line 78
                    echo $context["SELF"]->getdisplaySubmenu((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                }
                // line 80
                echo "        </li>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 84
    public function getdisplayContainers($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 85
            echo "    ";
            $context["SELF"] = $this;
            // line 86
            echo "    <div class=\"g-grid\">
        ";
            // line 87
            $context["groups"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getDropdown", array(), "method") == "standard")) ? (array(0 => (isset($context["item"]) ? $context["item"] : null))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "groups", array())));
            // line 88
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
            foreach ($context['_seq'] as $context["column"] => $context["items"]) {
                // line 89
                echo "        <div class=\"g-block ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('toGrid')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "columnWidth", array(0 => $context["column"]), "method"))));
                echo "\">
            <ul class=\"g-sublevel\">
                <li class=\"g-level-";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()));
                echo " g-go-back\">
                    <a class=\"g-menu-item-container\" href=\"#\" data-g-menuparent=\"\"><span>Back</span></a>
                </li>
                ";
                // line 94
                echo $context["SELF"]->getdisplayItems($context["items"], (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
            </ul>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['column'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 101
    public function getdisplayItems($__items__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 102
            echo "    ";
            $context["SELF"] = $this;
            // line 103
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 104
                echo "        ";
                if (($this->getAttribute($context["item"], "level", array()) == 1)) {
                    $context["dropdown_type"] = $this->getAttribute($context["item"], "dropdown", array());
                }
                // line 105
                echo "        ";
                echo $context["SELF"]->getdisplayItem($context["item"], (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 109
    public function getdisplaySubmenu($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 110
            echo "    ";
            $context["SELF"] = $this;
            // line 111
            echo "    ";
            if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                // line 112
                echo "        <ul class=\"g-dropdown g-inactive ";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "gantry", array(), "any", false, true), "config", array(), "any", false, true), "get", array(0 => "styles.menu.animation"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "gantry", array(), "any", false, true), "config", array(), "any", false, true), "get", array(0 => "styles.menu.animation"), "method"), "g-fade")) : ("g-fade")), "html", null, true);
                echo "\"";
                echo $context["SELF"]->getgetCustomWidth((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), "submenu", (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo ">
            <li class=\"g-dropdown-column\">
                ";
                // line 114
                echo $context["SELF"]->getdisplayContainers((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
            </li>
        </ul>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@particles/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  521 => 114,  513 => 112,  510 => 111,  507 => 110,  492 => 109,  474 => 105,  469 => 104,  464 => 103,  461 => 102,  446 => 101,  434 => 98,  424 => 94,  418 => 91,  412 => 89,  407 => 88,  405 => 87,  402 => 86,  399 => 85,  384 => 84,  371 => 80,  368 => 78,  365 => 77,  362 => 76,  356 => 75,  353 => 74,  350 => 72,  347 => 71,  339 => 69,  331 => 67,  329 => 66,  324 => 65,  321 => 64,  318 => 63,  315 => 61,  313 => 60,  308 => 58,  305 => 57,  302 => 56,  296 => 54,  294 => 53,  287 => 52,  284 => 51,  279 => 50,  267 => 49,  259 => 48,  257 => 47,  239 => 46,  236 => 45,  233 => 44,  230 => 43,  227 => 42,  224 => 41,  221 => 40,  218 => 39,  215 => 38,  200 => 37,  188 => 34,  182 => 32,  180 => 31,  175 => 30,  172 => 29,  160 => 28,  147 => 24,  141 => 23,  139 => 22,  134 => 21,  131 => 20,  128 => 19,  125 => 18,  112 => 17,  95 => 12,  93 => 11,  91 => 10,  89 => 9,  87 => 8,  72 => 7,  63 => 123,  57 => 121,  55 => 120,  52 => 119,  49 => 108,  46 => 100,  43 => 83,  40 => 36,  37 => 27,  34 => 16,  31 => 6,  25 => 4,  20 => 2,  19 => 1,);
    }
}
/* {% try %}*/
/* {% set menu = gantry.menu.instance(particle) %}*/
/* {% catch %}*/
/* <div class="alert alert-error">{{ e.getMessage }}</div>*/
/* {% endtry %}*/
/* */
/* {% macro getCustomWidth(item, menu, mode, dropdown_type) -%}*/
/*     {%- if (item.width|default('auto') != 'auto') and not (dropdown_type == 'fullwidth' and item.level > 1) -%}*/
/*         {%- if mode == 'item' -%}*/
/*             style="position: relative;"*/
/*         {%- elseif mode == 'submenu' -%}*/
/*             style="width:{{ item.width|e }};" data-g-item-width="{{ item.width|e }}"*/
/*         {%- endif %}*/
/*     {%- endif %}*/
/* {%- endmacro %}*/
/* */
/* {% macro displayParticle(item, context) %}*/
/*     {% if item.options.particle.enabled is null or item.options.particle.enabled %}*/
/*         {% set context = context|merge({ particle: item.options.particle }) %}*/
/*         {% set classes = item.options.block.class %}*/
/*         <div class="menu-item-particle{{ classes ? ' ' ~ classes }}">*/
/*         {% include ['particles/' ~ item.particle ~ '.html.twig', '@particles/' ~ item.particle ~ '.html.twig']*/
/*         ignore missing with context only %}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% macro displayTitle(item) %}*/
/*     {% if not item.icon_only or not (item.image or item.icon) %}*/
/*         <span class="g-menu-item-title">{{ item.title|e }}</span>*/
/*         {% if item.subtitle %}*/
/*             <span class="g-menu-item-subtitle">{{ item.subtitle|e }}</span>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% macro displayItem(item, menu, context, dropdown_type) %}*/
/*     {% import _self as SELF %}*/
/*     {% if item.visible %}*/
/*         {% set title = item.icon_only ? ' title="' ~ item.title|e ~ '"' %}*/
/*         {% set active = menu.isActive(item) ? ' active' %}*/
/*         {% set dropdown = item.level == 1 ? ' g-' ~ item.getDropdown()|e %}*/
/*         {% set parent = item.children ? ' g-parent' %}*/
/*         {% set target = item.target != '_self' ? ' target="' ~ item.target|e ~ '"' %}*/
/* */
/*         <li class="g-menu-item g-menu-item-type-{{ item.type|e }} g-menu-item-{{ item.id|e }}{% if not item.dropdown_hide %}{{ parent|raw }}{% endif %}{{ active|raw }}{{ dropdown|raw }} {% if item.url and item.children %}{% if not item.dropdown_hide %}g-menu-item-link-parent{% endif %}{% endif %} {{ item.class|e|default('') }}"*/
/*                 {{- SELF.getCustomWidth(item, menu, 'item', dropdown) }}*/
/*                 {%- if particle.renderTitles|default(0) %} title="{{ item.title|e }}"{% endif %}>*/
/*             {% if item.url %}<a class="g-menu-item-container{{ item.anchor_class ? ' ' ~ item.anchor_class }}" href="{{ item.url|e }}{{ item.hash ? item.hash|e : '' }}"{{ (title ~ target)|raw }}>*/
/*             {% else %}<div class="g-menu-item-container{{ item.anchor_class ? ' ' ~ item.anchor_class }}" data-g-menuparent="">{% endif %}*/
/*                 {% if item.image %}*/
/*                     <img src="{{ url(item.image)|e }}" alt="{{ item.title|e }}" />*/
/*                 {% elseif item.icon %}*/
/*                     <i class="{{ item.icon|e }}"></i>*/
/*                 {% endif %}*/
/*                 {% if item.url %}*/
/*                     <span class="g-menu-item-content">*/
/*                         {{ SELF.displayTitle(item) }}*/
/*                     </span>*/
/*                     {% if (item.children) and not item.dropdown_hide -%}*/
/*                         <span class="g-menu-parent-indicator" data-g-menuparent=""></span>*/
/*                     {%- endif %}*/
/*                 {% else %}*/
/*                     {% if item.type == 'particle' %}*/
/*                         {{ SELF.displayParticle(item, context) }}*/
/*                     {% elseif item.type == 'heading' %}*/
/*                         <span class="g-nav-header g-menu-item-content"{{ title|raw }}>{{ SELF.displayTitle(item) }}</span>*/
/*                     {% else %}*/
/*                         <span class="g-separator g-menu-item-content"{{ title|raw }}>{{ SELF.displayTitle(item) }}</span>*/
/*                     {% endif %}*/
/*                         {% if (item.children) -%}*/
/*                             <span class="g-menu-parent-indicator"></span>*/
/*                         {%- endif %}*/
/*                 {% endif %}*/
/*             {% if item.url %}</a>*/
/*             {% else %}</div>{% endif %}*/
/*             {% if (item.children) -%}*/
/*                 {{ SELF.displaySubmenu(item, menu, context, dropdown_type) }}*/
/*             {%- endif %}*/
/*         </li>*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% macro displayContainers(item, menu, context, dropdown_type) %}*/
/*     {% import _self as SELF %}*/
/*     <div class="g-grid">*/
/*         {% set groups = item.getDropdown() == 'standard' ? [item] : item.groups %}*/
/*         {% for column, items in groups %}*/
/*         <div class="g-block {{ item.columnWidth(column)|toGrid|e }}">*/
/*             <ul class="g-sublevel">*/
/*                 <li class="g-level-{{ item.level|e }} g-go-back">*/
/*                     <a class="g-menu-item-container" href="#" data-g-menuparent=""><span>Back</span></a>*/
/*                 </li>*/
/*                 {{ SELF.displayItems(items, menu, context, dropdown_type) }}*/
/*             </ul>*/
/*         </div>*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endmacro %}*/
/* */
/* {% macro displayItems(items, menu, context, dropdown_type) %}*/
/*     {% import _self as SELF %}*/
/*     {% for item in items %}*/
/*         {% if item.level == 1 %}{% set dropdown_type = item.dropdown %}{% endif %}*/
/*         {{ SELF.displayItem(item, menu, context, dropdown_type) }}*/
/*     {% endfor %}*/
/* {% endmacro %}*/
/* */
/* {% macro displaySubmenu(item, menu, context, dropdown_type) %}*/
/*     {% import _self as SELF %}*/
/*     {% if not item.dropdown_hide %}*/
/*         <ul class="g-dropdown g-inactive {{ context.gantry.config.get('styles.menu.animation')|default('g-fade') }}"{{ SELF.getCustomWidth(item, menu, 'submenu', dropdown_type) }}>*/
/*             <li class="g-dropdown-column">*/
/*                 {{ SELF.displayContainers(item, menu, context, dropdown_type) }}*/
/*             </li>*/
/*         </ul>*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% if menu.root.count() %}*/
/* <nav class="g-main-nav" role="navigation"{{ particle.mobileTarget ? ' data-g-mobile-target' : '' }}>*/
/*     <ul class="g-toplevel">*/
/*         {{ _self.displayItems(menu.root, menu, _context) }}*/
/*     </ul>*/
/* </nav>*/
/* {% endif %}*/
/* */
