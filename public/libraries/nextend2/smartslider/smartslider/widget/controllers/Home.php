<?php

class N2SmartSliderWidgetHomeController extends N2Controller
{

    public function initialize() {
        parent::initialize();

        N2Loader::import(array(
            'models.Sliders',
            'models.Slides'
        ), 'smartslider');

    }

    public function actionIndex() {
        $this->addView("index", array(
            "module" => $this->module,
            "params" => $this->moduleParams
        ), "content");
        $this->render();
    }

    public function actionJoomla($sliderid, $usage) {
        $this->addView("joomla", array(
            "sliderid" => $sliderid,
            "usage"    => $usage
        ), "content");

        $this->render();

        n2AddAssets();
    }

    public function actionWordpress($sliderid, $usage) {
        $this->addView("wordpress", array(
            "sliderid" => $sliderid,
            "usage"    => $usage
        ), "content");
        $this->render();
    }

    public function actionMagento($sliderid, $usage) {
        $this->addView("magento", array(
            "sliderid" => $sliderid,
            "usage"    => $usage
        ), "content");
        $this->render();
    }

} 