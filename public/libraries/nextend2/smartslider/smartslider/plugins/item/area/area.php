<?php
N2Loader::import('libraries.plugins.N2SliderItemAbstract', 'smartslider');

class N2SSPluginItemArea extends N2SSPluginItemAbstract
{

    public $_identifier = 'area';

    protected $priority = 100;

    protected $layerProperties = '{"width":150,"height":150}';

    public function __construct() {
        $this->_title = n2_x('Area', 'Slide item');
    }

    public function getTemplate($slider) {

        return '<span style="display:block;width:{width};height:{height};background-color:{colora};opacity:{opacity};border:{borderWidth} solid {borderColora};border-radius:{borderRadius};-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"></span>';
    }

    function _renderAdmin($data, $itemId, $slider, $slide) {
        return $this->getHtml($data);
    }

    function _render($data, $itemId, $slider, $slide) {

        return $this->getLink($slide, $data, $this->getHtml($data, $this->getEventAttributes($data, $slider->elementId)), array(
            'style' => 'display: block; width:100%;height:100%;'
        ));
    }

    private function getHtml($data, $attributes = array()) {
        $width  = '100%';
        $height = '100%';

        $_width = $data->get('width');
        if (!empty($_width)) {
            $width = $_width . 'px';
        }

        $_height = $data->get('height');
        if (!empty($_height)) {
            $height = $_height . 'px';
        }

        list($hex, $rgba) = N2Color::colorToCss($data->get('color'));
        $borderWidth = max(0, intval($data->get('borderWidth')));

        list($borderHex, $borderRgba) = N2Color::colorToCss($data->get('borderColor'));
        $borderRadius = max(0, intval($data->get('borderRadius')));

        return NHtml::tag('span', $attributes + array(
                'style' => 'display:block;width:' . $width . ';height:' . $height . ';background-color:#' . $hex . ';background-color:' . $rgba . ';border:' . $borderWidth . 'px solid #' . $borderHex . ';border:' . $borderWidth . 'px solid ' . $borderRgba . ';border-radius:' . $borderRadius . 'px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'
            ));
    }

    public function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
    }

    function getValues() {
        return array(
            'width'        => '',
            'height'       => '',
            'color'        => '000000ff',
            'borderWidth'  => 0,
            'borderColor'  => 'ffffff1f',
            'borderRadius' => 0,
            'link'         => '#|*|_self',
            'onmouseclick' => '',
            'onmouseenter' => '',
            'onmouseleave' => ''
        );
    }
}

N2Plugin::addPlugin('ssitem', 'N2SSPluginItemArea');
