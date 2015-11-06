<?php

/**
 * User: David
 * Date: 2014.06.10.
 * Time: 13:22
 */
class N2SmartsliderBackendHelpController extends N2SmartSliderController
{

    public $layoutName = 'default';

    public function initialize() {
        parent::initialize();

        N2Loader::import(array(
            'models.Sliders',
            'models.Slides'
        ), 'smartslider');
    }

    public function actionIndex() {

        $this->addView("../../inline/_sliders", array(), "sidebar");
        $this->addView("default");
        $this->render();
    }

} 