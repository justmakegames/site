<?php
class N2SSPluginItemIcon extends N2SSPluginItemAbstract
{

    public $_identifier = 'icon';

    protected $priority = 6;

    protected $layerProperties = '{"width":50}';

    public function __construct() {
        $this->_title = n2_x('Icon', 'Slide item');
    }

    public function getTemplate($slider) {

        return '<img src="data:image/svg+xml;base64,{image}" style="display: block;width:{width};height:{height};" />';
    }

    function _renderAdmin($data, $itemId, $slider, $slide) {

        return $this->getHtml($data);
    }

    function _render($data, $itemId, $slider, $slide) {

        return $this->getLink($slide, $data, $this->getHtml($data, $this->getEventAttributes($data, $slider->elementId)));
    }

    private function getHtml($data, $attributes = array()) {
        $svg = $data->get('icon', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="32" height="32"><rect width="100" height="100" data-style="{style}" /></svg>');

        list($color, $alpha) = N2Color::colorToSVG($data->get('color', '00000080'));

        list($width, $height) = (array)N2Parse::parse($data->get('size', '100%|*|auto'));
        $style = 'fill:#' . $color . ';fill-opacity:' . $alpha;
        return NHtml::image('data:image/svg+xml;base64,' . base64_encode(str_replace(array(
                'data-style',
                '{style}'
            ), array(
                'style',
                $style
            ), $svg)), '', $attributes + array(
                'style' => 'display: block;width:' . $width . ';height:' . $height . ';'
            ));
    }

    public function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
    }

    function getValues() {
        return array(
            'icon'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="32" height="32"><rect width="100" height="100" data-style="{style}" /></svg>',
            'color'        => '00000080',
            'size'         => '100%|*|auto',
            'link'         => '#|*|_self',
            'onmouseclick' => '',
            'onmouseenter' => '',
            'onmouseleave' => ''
        );
    }

    public function getFilled($slide, $data) {
        $data->set('icon', $slide->fill($data->get('icon', '')));
        $data->set('link', $slide->fill($data->get('link', '#|*|')));
        return $data;
    }

}

N2Plugin::addPlugin('ssitem', 'N2SSPluginItemIcon');
