<?php

N2Loader::import('libraries.plugins.N2SliderItemAbstract', 'smartslider');

class N2SSPluginItemVimeo extends N2SSPluginItemAbstract
{

    var $_identifier = 'vimeo';

    protected $priority = 20;

    protected $layerProperties = '{"width":300,"height":180}';

    public function __construct() {
        $this->_title = n2_x('Vimeo', 'Slide item');
    }

    function getTemplate($slider) {
        return NHtml::tag('div', array(
            "style" => 'width: 100%; height: 100%; min-height: 50px; background: url({image}) no-repeat 50% 50%; background-size: cover;'
        ));
    }

    function _render($data, $itemId, $slider, $slide) {

        $data->set("vimeocode", preg_replace('/\D/', '', $slide->fill($data->get("vimeourl"))));
        $data->set("videoplay", $this->parseEventCode($data->get('videoplay', ''), $slider->elementId));
        $data->set("videopause", $this->parseEventCode($data->get('videopause', ''), $slider->elementId));
        $data->set("videoend", $this->parseEventCode($data->get('videoend', ''), $slider->elementId));

        $style = '';

        $hasImage = 0;
        $image    = $data->get('image');
        if (!empty($image)) {
            $style    = 'cursor:pointer; background: url(' . N2ImageHelper::fixed($data->get('image')) . ') no-repeat 50% 50%; background-size: cover';
            $hasImage = 1;
        }

        N2JS::addInline('window["' . $slider->elementId . '"].ready(function() {
                var vimeo = new NextendSmartSliderVimeoItem(this, "' . $itemId . '", "' . $slider->elementId . '", ' . $data->toJSON() . ', ' . $hasImage . ');
            });
        ');

        return NHtml::tag('div', array(
            'id'    => $itemId,
            'style' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;' . $style
        ));
    }

    function _renderAdmin($data, $itemId, $slider, $slide) {
        return NHtml::tag('div', array(
            "style" => 'width: 100%; height: 100%; background: url(' . N2ImageHelper::fixed($data->getIfEmpty('image', '$system$/images/placeholder/video.svg')) . ') no-repeat 50% 50%; background-size: cover;'
        ));
    }

    function getValues() {
        return array(
            'vimeourl' => '75251217',
            'image'    => '$system$/images/placeholder/video.svg',
            'center'   => 0,
            'autoplay' => 0,
            'title'    => 1,
            'byline'   => 1,
            'portrait' => 0,
            'color'    => '00adef',
            'loop'     => 0,
            'videoplay'    => '',
            'videopause'   => '',
            'videoend'     => ''
        );
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
    }

    public function getFilled($slide, $data) {
        $data->set('vimeourl', $slide->fill($data->get('vimeourl', '')));
        return $data;
    }
}

N2Plugin::addPlugin('ssitem', 'N2SSPluginItemVimeo');