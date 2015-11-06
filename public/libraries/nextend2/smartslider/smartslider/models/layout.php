<?php

N2Loader::import(array(
    'libraries.layout.storage'
), 'smartslider');


class N2SmartSliderLayoutModel extends N2SystemVisualModel
{

    public $type = 'layout';

    public function __construct($tableName = null) {

        parent::__construct($tableName);
        $this->storage = N2Base::getApplication('smartslider')->storage;
    }

    protected function getPath() {
        return dirname(__FILE__);
    }
}