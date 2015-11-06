<?php

class N2SmartSliderItem
{

    public static $i = array();

    public $slider, $slide;

    /**
     * @var N2SSPluginItemAbstract[]
     */
    private static $items = array();

    private static function _load() {
        static $loaded;
        if (!$loaded) {
            N2Plugin::callPlugin('ssitem', 'onNextendSliderItemShortcode', array(&self::$items));
            $loaded = true;
        }
    }

    /**
     * @param $slider N2SmartSliderAbstract
     * @param $slide  N2SmartSliderSlide
     */
    public function __construct($slider, $slide) {
        self::_load();

        $this->slider = $slider;
        $this->slide  = $slide;

        if (!isset(self::$i[$slider->elementId])) {
            self::$i[$slider->elementId] = 0;
        }

    }

    public function render($item) {
        $type = $item['type'];
        if (isset(self::$items[$type])) {
            $data = new N2Data($item['values']);
            self::$i[$this->slider->elementId]++;


            $itemId = $this->slider->elementId . 'item' . self::$i[$this->slider->elementId];
            /**
             * @var N2SSPluginItemAbstract
             */
            if ($this->slider->isAdmin) {
                return self::$items[$type]->renderAdmin($data, $itemId, $this->slider, $this->slide);
            }

            return self::$items[$type]->render($data, $itemId, $this->slider, $this->slide);
        }

        return '';
    }

    public function getFilled($item) {
        $type = $item['type'];
        if (isset(self::$items[$type])) {
            $item['values'] = self::$items[$type]->getFilled($this->slide, new N2Data($item['values']))->toArray();
        }
        return $item;
    }

    /**
     * @param N2SmartSliderExport $export
     * @param                          $item
     */
    public static function prepareExport($export, $item) {
        self::_load();
        $type = $item['type'];
        if (isset(self::$items[$type])) {
            self::$items[$type]->prepareExport($export, new N2Data($item['values']));
        }
    }

    /**
     * @param N2SmartSliderImport $import
     * @param                          $item
     *
     * @return mixed
     */
    public static function prepareImport($import, $item) {
        self::_load();
        $type = $item['type'];
        if (isset(self::$items[$type])) {
            $item['values'] = self::$items[$type]->prepareImport($import, new N2Data($item['values']))->toArray();
        }
        return $item;
    }
}