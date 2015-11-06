<?php
if(N2SSPRO) {
    N2Loader::import('libraries.plugins.N2SliderItemAbstract', 'smartslider');
    N2Loader::import('libraries.image.color');

    class N2SSPluginItemCaption extends N2SSPluginItemAbstract
    {

        var $_identifier = 'caption';

        protected $priority = 7;

        protected $layerProperties = '{"left":0,"top":0,"width":"200px"}';

        private static $fontTitle = 1003;
        private static $font = 1003;

        public function __construct() {
            $this->_title = n2_x('Caption', 'Slide item');
        }

        private static function initDefaultFont() {
            static $inited = false;
            if (!$inited) {
                $res = N2StorageSectionAdmin::get('smartslider', 'default', 'item-caption-font-title');
                if (is_array($res)) {
                    self::$fontTitle = $res['value'];
                }
                if (is_numeric(self::$fontTitle)) {
                    N2FontRenderer::preLoad(self::$fontTitle);
                }
                $res = N2StorageSectionAdmin::get('smartslider', 'default', 'item-caption-font');
                if (is_array($res)) {
                    self::$font = $res['value'];
                }
                if (is_numeric(self::$font)) {
                    N2FontRenderer::preLoad(self::$font);
                }
                $inited = true;
            }
        }

        public static function onSmartsliderDefaultSettings(&$settings) {
            self::initDefaultFont();
            $settings['font'][] = '<param name="item-caption-font-title" type="font" previewmode="paragraph" label="' . n2_('Item') . ' - ' . n2_('Caption') . ' - ' . n2_('Title') . '" default="' . self::$fontTitle . '" />';
            $settings['font'][] = '<param name="item-caption-font" type="font" previewmode="paragraph" label="' . n2_('Item') . ' - ' . n2_('Caption') . ' - ' . n2_('Description') . '" default="' . self::$font . '" />';
        }

        function getTemplate($slider) {

            $this->loadResources($slider);

            $html = NHtml::openTag("div", array(
                "id"    => '{uid}',
                "class" => "n2-ss-item-caption"
            ));

            $html .= NHtml::openTag("a", array(
                "href"    => '#',
                "onclick" => "return false;"
            ));

            $html .= NHtml::image('{image}');

            $html .= NHtml::openTag("div", array(
                "class" => "n2-ss-item-caption-content",
                "style" => "background: #{colorhex}; background: {colora};"
            ));

            $html .= NHtml::tag("h4", array("class" => '{fonttitleclass}'), "{content}");


            $html .= NHtml::tag("p", array("class" => '{fontclass}'), "{description}");


            $html .= NHtml::closeTag("div");

            $html .= NHtml::scriptTemplate($this->getJs($slider->elementId, "{uid}"));

            $html .= NHtml::closeTag("a");

            $html .= NHtml::closeTag("div");

            return $html;
        }

        function getJs($sliderId, $id) {
            return '
        if(typeof window.ssitemmarker == "undefined"){
            new NextendSmartSliderCaptionItem(window["' . $sliderId . '"], "' . $id . '", "{mode}", "{direction}", {scale});
        }';
        }

        function _render($data, $id, $slider, $items) {
            return $this->getHtml($data, $id, $slider, $items, false, $this->getEventAttributes($data, $slider->elementId));
        }

        function _renderAdmin($data, $id, $slider, $items) {
            return $this->getHtml($data, $id, $slider, $items, true);
        }

        private function getHtml($data, $id, $slider, $slide, $isAdmin = false, $attributes = array()) {

            $this->loadResources($slider);

            list($mode, $direction, $scale) = N2Parse::parse($data->get('animation', 'Simple|*|left|*|0'));
            $slider->features->addInitCallback('new NextendSmartSliderCaptionItem(arguments[0], "' . $id . '", "' . $mode . '", "' . $direction . '", ' . intval($scale) . ');');

            $html = NHtml::image(N2ImageHelper::fixed($slide->fill($data->get('image', ''))), htmlspecialchars($slide->fill($data->get('alt', ''))));

            list($hex, $rgba) = N2Color::colorToCss($data->get('color', '00000080'));
            $html .= NHtml::openTag("div", $attributes + array(
                    "class" => "n2-ss-item-caption-content",
                    "style" => "background:#{$hex}; background: {$rgba};"
                ));

            $title = $slide->fill($data->get('content', ''));
            if ($title != '') {
                $fontTitle = N2FontRenderer::render($data->get('fonttitle'), 'paragraph', $slider->elementId, 'div#' . $slider->elementId . ' ', $slider->fontSize);
                $html .= NHtml::tag("h4", array("class" => $fontTitle), $title);
            }

            $description = $slide->fill($data->get('description', ''));
            if ($description != '') {
                $font = N2FontRenderer::render($data->get('font'), 'paragraph', $slider->elementId, 'div#' . $slider->elementId . ' ', $slider->fontSize);
                $html .= NHtml::tag("p", array("class" => $font), $description);
            }

            $html .= NHtml::closeTag("div");

            $linkAttributes = array();
            if ($isAdmin) {
                $linkAttributes['onclick'] = 'return false;';
            }

            return NHtml::tag("div", array(
                "id"    => $id,
                "class" => "n2-ss-item-caption"
            ), $this->getLink($slide, $data, $html, $linkAttributes));
        }

        private function loadResources($slider) {
            N2LESS::addFile(N2Filesystem::translate($this->getPath() . "/caption.less"), $slider->cacheId, array(
                "sliderid" => $slider->elementId
            ), NEXTEND_SMARTSLIDER_ASSETS . '/less' . NDS);
        }

        function getValues() {
            self::initDefaultFont();
            return array(
                'animation'          => 'Simple|*|left|*|0',
                'image'              => '$system$/images/placeholder/image.svg',
                'alt'                => n2_('Image not available'),
                'link'               => '#|*|_self',
                'content'            => n2_('Caption'),
                'description'        => '',
                'fonttitle'          => self::$fontTitle,
                'font'               => self::$font,
                'color'              => '00000080',
                'customcaptionclass' => '',
                'onmouseclick'       => '',
                'onmouseenter'       => '',
                'onmouseleave'       => ''
            );
        }

        function getPath() {
            return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->_identifier . DIRECTORY_SEPARATOR;
        }

        public function getFilled($slide, $data) {
            $data->set('image', $slide->fill($data->get('image', '')));
            $data->set('alt', $slide->fill($data->get('alt', '')));
            $data->set('content', $slide->fill($data->get('content', '')));
            $data->set('description', $slide->fill($data->get('description', '')));
            $data->set('link', $slide->fill($data->get('link', '#|*|')));
            return $data;
        }

        public function prepareExport($export, $data) {
            $export->addImage($data->get('image'));
            $export->addVisual($data->get('font'));
            $export->addVisual($data->get('fonttitle'));
        }

        public function prepareImport($import, $data) {
            $data->set('image', $import->fixImage($data->get('image')));
            $data->set('font', $import->fixSection($data->get('font')));
            $data->set('fonttitle', $import->fixSection($data->get('fonttitle')));
            return $data;
        }
    }

    N2Plugin::addPlugin('ssitem', 'N2SSPluginItemCaption');

    N2Pluggable::addAction('smartsliderDefault', 'N2SSPluginItemCaption::onSmartsliderDefaultSettings');
} //N2SSPRO