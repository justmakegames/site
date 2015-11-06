<?php

N2Loader::import('libraries.parse.parse');

abstract class N2SSPluginItemAbstract extends N2PluginBase
{

    public $_identifier = 'identifier';

    public $_title = '';

    protected $layerProperties = '{}';

    protected $priority = 1;

    protected $isEditor = false;

    public function onNextendSliderItemList(&$list) {
        $slider                   = N2Base::getApplication('smartslider')
                                          ->get('sliderManager')
                                          ->getSlider();
        $list[$this->_identifier] = array(
            $this->_title,
            $this->getTemplate($slider),
            $this->getPrefilledTemplate($slider),
            json_encode($this->getValues()),
            $this->getPath(),
            $this->layerProperties,
            $this->priority
        );
    }

    public function onNextendSliderItemShortcode(&$list) {
        $list[$this->_identifier] = $this;
    }

    /**
     * Here comes the HTML source of the item. {param_name} are identifier for the parameters in the configuration.xml params(linked with the parameter name).
     * Parser.js may define custom variables for this.
     *
     * @param $slider N2SmartSliderAbstract
     *
     * @return string
     */
    public function getTemplate($slider) {
        return "{nothing}";
    }

    /**
     * @param $data
     * @param $id
     * @param $slider N2SmartSliderAbstract
     * @param $slide
     *
     * @return string
     */
    public function render($data, $id, $slider, $slide) {
        return $this->_render($data, $id, $slider, $slide);
    }

    public function renderAdmin($data, $id, $slider, $slide) {
        $this->isEditor = true;

        $json = $data->toJson();
        return NHtml::tag("div", array(
            "class"           => "n2-ss-item n2-ss-item-" . $this->_identifier,
            "data-item"       => $this->_identifier,
            "data-itemvalues" => $json
        ), $this->_renderAdmin($data, $id, $slider, $slide));
    }

    /**
     * @param $data
     * @param $itemId
     * @param $slider N2SmartSliderAbstract
     * @param $slide  N2SmartSliderSlide
     *
     * @return string
     */
    public function _render($data, $itemId, $slider, $slide) {
        return $this->getTemplate($slider);
    }

    /**
     * @param $data
     * @param $itemId
     * @param $slider N2SmartSliderAbstract
     * @param $slide  N2SmartSliderSlide
     *
     * @return string
     */
    public function _renderAdmin($data, $itemId, $slider, $slide) {
        return $this->getTemplate($slider);
    }

    /*
     * Set default values into the template
     */
    public function getPrefilledTemplate($slider) {
        $html = $this->getTemplate($slider);
        foreach ($this->getValues() AS $k => $v) {
            $html = str_replace('{' . $k . '}', $v, $html);
        }
        return $html;
    }

    /*
     * Default values, which will be parsed by JS on the admin for default values. It should contain only the fields from the configuration.xml.
     */
    public function getValues() {
        return array(
            'nothing' => 'Abstract'
        );
    }

    public function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
    }

    public static function sortItems(&$items) {
        uasort($items, 'N2SSPluginItemAbstract::compareItems');
    }

    public static function compareItems($a, $b) {
        return ($a[6] < $b[6]) ? -1 : 1;
    }

    protected function getEventAttributes($data, $elementId) {
        $attributes = array();
        $click      = $this->parseEventCode($data->get('onmouseclick', ''), $elementId);
        $enter      = $this->parseEventCode($data->get('onmouseenter', ''), $elementId);
        $leave      = $this->parseEventCode($data->get('onmouseleave', ''), $elementId);
        if (!empty($click)) {
            $attributes['data-click'] = htmlspecialchars($click);
        }
        if (!empty($enter)) {
            $attributes['data-enter'] = htmlspecialchars($enter);
        }
        if (!empty($leave)) {
            $attributes['data-leave'] = htmlspecialchars($leave);
        }
        return $attributes;
    }

    protected function parseEventCode($code, $elementId) {
        if (preg_match('/^[a-zA-Z0-9_-]+$/', $code)) {
            if (is_numeric($code)) {
                $code = "window['" . $elementId . "'].changeTo(" . ($code - 1) . ");";
            } else if ($code == 'next') {
                $code = "window['" . $elementId . "'].next();";
            } else if ($code == 'previous') {
                $code = "window['" . $elementId . "'].previous();";
            } else {
                $code = "n2(this).closest('.n2-ss-slide,.n2-ss-static-slide').triggerHandler('" . $code . "');";
            }
        }
        return $code;
    }

    protected function getLink($slide, $data, $content, $attributes = array(), $renderEmpty = false) {

        N2Loader::import('libraries.link.link');

        list($link, $target) = (array)N2Parse::parse($data->get('link', '#|*|'));
        if (!$target) {
            $target = '';
        }

        if ($link != '#' || $renderEmpty === true) {
            $link = N2LinkParser::parse($slide->fill($link), $attributes, $this->isEditor);
            return NHtml::link($content, $link, $attributes + array(
                    "target" => $target
                ));
        }
        return $content;
    }

    /**
     * @param $slide N2SmartSliderSlide
     * @param $data  N2Data
     *
     * @return N2Data
     */
    public function getFilled($slide, $data) {
        return $data;
    }

    /**
     * @param N2SmartSliderExport      $export
     * @param                          $data
     */
    public function prepareExport($export, $data) {
    }

    /**
     * @param N2SmartSliderImport $import
     * @param N2Data              $data
     *
     * @return N2Data
     */
    public function prepareImport($import, $data) {
        return $data;
    }
}