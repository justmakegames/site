<?php

class  N2SmartSliderLayer
{

    private $slider, $slide, $item;

    /**
     * @param $slider N2SmartSliderAbstract
     * @param $slide  N2SmartSliderSlide
     */
    public function __construct($slider, $slide) {
        $this->slider = $slider;
        $this->slide  = $slide;
        $this->item   = new N2SmartSliderItem($slider, $slide);
    }

    public function render($layer) {

        $innerHTML = '';
        for ($i = 0; $i < count($layer['items']); $i++) {
            $innerHTML .= $this->item->render($layer['items'][$i]);
        }
        unset($layer['items']);

        $cropStyle = $layer['crop'];

        if ($this->slider->isAdmin) {
            if ($layer['crop'] == 'auto') {
                $cropStyle = 'hidden';
            }
        }

        if ($layer['crop'] == 'mask') {
            $cropStyle = 'hidden';
            $innerHTML = NHtml::tag('div', array('class' => 'n2-ss-layer-mask'), $innerHTML);
        } else if (!$this->slider->isAdmin && $layer['parallax'] > 0) {
            $innerHTML = NHtml::tag('div', array(
                'class' => 'n2-ss-layer-parallax'
            ), $innerHTML);
        }

        if (!isset($layer['align'])) {
            $layer['align'] = 'left';
        }

        if (!isset($layer['valign'])) {
            $layer['valign'] = 'top';
        }

        if (!isset($layer['responsiveposition'])) {
            $layer['responsiveposition'] = 1;
        }

        if (!isset($layer['responsivesize'])) {
            $layer['responsivesize'] = 1;
        }


        $style = '';
        /*if (isset($layer['adaptivefont']) && $layer['adaptivefont']) {
            $style .= 'font-size: ' . $this->slider->fontSize . 'px;';
        }*/
        if (isset($layer['inneralign'])) {
            $style .= 'text-align: ' . $layer['inneralign'];
        }


        $attributes = array(
            'class'           => 'n2-ss-layer',
            'style'           => $layer['style'] . ';overflow:' . $cropStyle . ';' . $style,
            'data-animations' => base64_encode(json_encode($layer['animations']))
        );
        unset($layer['style']);
        unset($layer['animations']);

        if (!$this->slider->isAdmin && $layer['parallax'] < 1) {
            unset($layer['parallax']);
        }

        foreach ($layer AS $k => $data) {
            $attributes['data-' . $k] = $data;
        }
        return NHtml::tag('div', $attributes, $innerHTML);
    }

    public function getFilled($layer) {
        $items = array();
        for ($i = 0; $i < count($layer['items']); $i++) {
            $items [] = $this->item->getFilled($layer['items'][$i]);
        }
        $layer['items'] = $items;
        return $layer;
    }

    /**
     * @param N2SmartSliderExport      $export
     * @param                          $rawLayers
     */
    public static function prepareExport($export, $rawLayers) {
        $layers = json_decode($rawLayers, true);
        foreach ($layers AS $layer) {

            foreach ($layer['items'] AS $item) {
                N2SmartSliderItem::prepareExport($export, $item);
            }
        }
    }

    /**
     * @param N2SmartSliderImport      $import
     * @param                          $rawLayers
     *
     * @return mixed|string|void
     */
    public static function prepareImport($import, $rawLayers) {
        $layers = json_decode($rawLayers, true);
        for ($i = 0; $i < count($layers); $i++) {
            for ($j = 0; $j < count($layers[$i]['items']); $j++) {
                $layers[$i]['items'][$j] = N2SmartSliderItem::prepareImport($import, $layers[$i]['items'][$j]);
            }
        }
        return json_encode($layers);
    }
}