<?php
N2Loader::import('libraries.link.link');

class N2LinkNextSlide
{

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            $attributes['onclick'] = "n2(this).closest('.n2-ss-slider').data('ss').next(); return false";
        }
        return '#';
    }
}

class N2LinkPreviousSlide
{

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            $attributes['onclick'] = "n2(this).closest('.n2-ss-slider').data('ss').next(); return false";
        }
        return '#';
    }
}

class N2LinkGoToSlide
{

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            $attributes['onclick'] = "n2(this).closest('.n2-ss-slider').data('ss').slide(" . intval($argument) . "); return false";
        }
        return '#';
    }
}

class N2LinkSlideEvent
{

    public static function parse($argument, &$attributes, $isEditor = false) {
        if (!$isEditor) {
            $attributes['onclick'] = "n2(this).closest('.n2-ss-slide,.n2-ss-static-slide').triggerHandler('" . $argument . "'); return false";
        }
        return '#';
    }
}