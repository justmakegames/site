<?php

class N2LinkParser
{

    public static function parse($url, &$attributes, $isEditor = false) {
        if ($url == '#' || $isEditor) {
            $attributes['onclick'] = "return false;";
        }

        preg_match('/^([a-zA-Z]+)\[(.*)]$/', $url, $matches);
        if (!empty($matches)) {
            $class = 'N2Link' . $matches[1];
            if (class_exists($class, false)) {
                $url = call_user_func_array(array(
                    $class,
                    'parse'
                ), array(
                    $matches[2],
                    &$attributes,
                    $isEditor
                ));
            }
        }
        return $url;
    }
}
class N2LinkLightbox
{

    private static function init() {
        static $inited = false;
        if (!$inited) {

            N2JS::addInline('
        $("a[n2-lightbox-urls], div[n2-lightbox-urls]").each(function(){
            var el = $(this);
            var group = el.data("litebox-group"),
                parts = el.attr("n2-lightbox-urls").split(",");
            for(var i = 0; i < parts.length; i++){
                $("body").append("<a href=\""+parts[i]+"\" data-litebox-group=\""+group+"\" style=\"display:none;\"></a>");
            }
        });
        $("a[n2-lightbox], div[n2-lightbox]").liteBox({
            callbackBeforeOpen: function(e){
                this.$element.trigger("mediaStarted", this);
            },
            callbackAfterClose: function(){
                this.$element.trigger("mediaEnded", this);
            }
        });');
            $inited = true;
        }
    }

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            self::init();
            $attributes['onclick']     = "return false;";
            $attributes['n2-lightbox'] = '';

            $urls     = explode(',', $argument);
            $argument = N2ImageHelper::fixed(array_shift($urls));
            if (count($urls)) {
                if (intval($urls[count($urls) - 1]) > 0) {
                    $attributes['data-autoplay'] = intval(array_pop($urls));
                }
                for ($i = 0; $i < count($urls); $i++) {
                    $urls[$i] = N2ImageHelper::fixed($urls[$i]);
                }
                $attributes['n2-lightbox-urls']   = implode(',', $urls);
                $attributes['data-litebox-group'] = md5(uniqid(mt_rand(), true));
            }
        }
        return $argument;
    }
}


class N2LinkScrollTo
{

    private static function init() {
        static $inited = false;
        if (!$inited) {
            N2JS::addInline('
            window.n2Scroll = {
                to: function(top){
                    n2("html, body").animate({ scrollTop: top }, 400);
                },
                top: function(){
                    n2Scroll.to(0);
                },
                bottom: function(){
                    n2Scroll.to(n2(document).height() - n2(window).height());
                },
                before: function(el){
                    n2Scroll.to(el.offset().top - n2(window).height());
                },
                after: function(el){
                    n2Scroll.to(el.offset().top + el.height());
                },
                next: function(el, selector){
                    var els = n2(selector),
                        nextI = -1;
                    els.each(function(i, slider){
                        if(el.is(slider) || n2.contains(slider, el)){
                            nextI = i + 1;
                            return false;
                        }
                    });
                    if(nextI != -1 && nextI <= els.length){
                        n2Scroll.element(els.eq(nextI));
                    }
                },
                previous: function(el, selector){
                    var els = n2(selector),
                        prevI = -1;
                    els.each(function(i, slider){
                        if(el.is(slider) || n2.contains(slider, el)){
                            prevI = i - 1;
                            return false;
                        }
                    });
                    if(prevI >= 0){
                        n2Scroll.element(els.eq(prevI));
                    }
                },
                element: function(selector){
                    n2Scroll.to(n2(selector).offset().top);
                }
            };');
            $inited = true;
        }
    }

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            self::init();
            switch ($argument) {
                case 'top':
                case 'bottom':
                    $onclick = 'n2Scroll.' . $argument . '();';
                    break;
                case 'beforeSlider':
                    $onclick = 'n2Scroll.before(n2(this).closest(".n2-ss-slider").addBack());';
                    break;
                case 'afterSlider':
                    $onclick = 'n2Scroll.after(n2(this).closest(".n2-ss-slider").addBack());';
                    break;
                case 'nextSlider':
                    $onclick = 'n2Scroll.next(n2(this), ".n2-ss-slider");';
                    break;
                case 'previousSlider':
                    $onclick = 'n2Scroll.prev(n2(this), ".n2-ss-slider");';
                    break;
                default:
                    $onclick = 'n2Scroll.selector("' . $argument . '");';
                    break;
            }
            $attributes['onclick'] = $onclick . "return false;";
        }
        return '#';
    }
}