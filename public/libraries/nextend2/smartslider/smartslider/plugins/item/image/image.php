<?php

N2Loader::import('libraries.plugins.N2SliderItemAbstract', 'smartslider');

class N2SSPluginItemImage extends N2SSPluginItemAbstract
{

    var $_identifier = 'image';

    protected $priority = 1;

    protected $layerProperties = '{"width":200}';

    private static $style = '';

    public function __construct() {
        $this->_title = n2_x('Image', 'Slide item');
    }

    private static function initDefaultStyle() {
        static $inited = false;
        if (!$inited) {
            $res = N2StorageSectionAdmin::get('smartslider', 'default', 'item-image-style');
            if (is_array($res)) {
                self::$style = $res['value'];
            }
            if (is_numeric(self::$style)) {
                N2StyleRenderer::preLoad(self::$style);
            }
            $inited = true;
        }
    }

    public static function onSmartsliderDefaultSettings(&$settings) {
        self::initDefaultStyle();
        $settings['style'][] = '<param name="item-image-style" type="style" previewmode="box" label="Item - Image" default="' . self::$style . '" />';
    }

    function getTemplate($slider) {
        $html = NHtml::openTag("div", array(
            'class' => '{styleclass}',
            'style' => 'overflow:hidden;'
        ));
        $html .= NHtml::openTag("a", array(
            "href"    => "{url}",
            "onclick" => 'return false;',
            "style"   => "display: block;background: none !important;"
        ));

        $html .= '<img src="{image}" style="display: block; max-width: 100%;width:{width};height:{height};" class="{cssclass}">';

        $html .= NHtml::closeTag("a");
        $html .= NHtml::closeTag("div");

        return $html;
    }

    function _render($data, $itemId, $slider, $slide) {
        return $this->getHtml($data, $itemId, $slider, $slide, $this->getEventAttributes($data, $slider->elementId));
    }

    function _renderAdmin($data, $itemId, $slider, $slide) {
        return $this->getHtml($data, $itemId, $slider, $slide);
    }

    private function getHtml($data, $id, $slider, $slide, $attributes = array()) {

        $size = (array)N2Parse::parse($data->get('size', ''));
        if (!isset($size[0])) $size[0] = 'auto';
        if (!isset($size[1])) $size[1] = 'auto';


        $style = N2StyleRenderer::render($data->get('style'), 'heading', $slider->elementId, 'div#' . $slider->elementId . ' ');
        return NHtml::tag("div", array(
            "class" => $style,
            'style' => 'overflow:hidden;'
        ), $this->getLink($slide, $data, NHtml::image(N2ImageHelper::fixed($slide->fill($data->get('image', ''))), htmlspecialchars($slide->fill($data->get('alt', ''))), $attributes + array(
                "id"    => $id,
                "style" => "display: block; max-width: 100%; width: {$size[0]};height: {$size[1]};",
                "class" => $data->get('cssclass', ''),
                "title" => htmlspecialchars($slide->fill($data->get('title', '')))
            ))));
    }

    function getValues() {
        self::initDefaultStyle();
        return array(
            'image'        => '$system$/images/placeholder/image.svg',
            'alt'          => n2_('Image is not available'),
            'title'        => '',
            'link'         => '#|*|_self',
            'size'         => '100%|*|auto',
            'style'        => self::$style,
            'cssclass'     => '',
            'onmouseenter' => '',
            'onmouseclick' => '',
            'onmouseleave' => ''
        );
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
    }

    public function getFilled($slide, $data) {
        $data->set('image', $slide->fill($data->get('image', '')));
        $data->set('alt', $slide->fill($data->get('alt', '')));
        $data->set('title', $slide->fill($data->get('title', '')));
        $data->set('link', $slide->fill($data->get('link', '#|*|')));
        return $data;
    }

    public function prepareExport($export, $data) {
        $export->addImage($data->get('image'));
        $export->addVisual($data->get('style'));
    }

    public function prepareImport($import, $data) {
        $data->set('image', $import->fixImage($data->get('image')));
        $data->set('style', $import->fixSection($data->get('style')));
        return $data;
    }
}

N2Plugin::addPlugin('ssitem', 'N2SSPluginItemImage');

N2Pluggable::addAction('smartsliderDefault', 'N2SSPluginItemImage::onSmartsliderDefaultSettings');