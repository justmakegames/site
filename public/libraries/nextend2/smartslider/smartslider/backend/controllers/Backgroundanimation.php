<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php
N2Loader::import('helpers.controllers.VisualManager', 'system.backend');

class N2SmartSliderBackendBackgroundAnimationController extends N2SystemBackendVisualManagerController
{

    protected $type = 'backgroundanimation';

    public function __construct($appType, $defaultParams) {
        $this->logoText = n2_('Background animation');
        parent::__construct($appType, $defaultParams);
    }

    protected function loadModel() {

        N2Loader::import(array(
            'models.' . $this->type
        ), 'smartslider');
    }

    public function getModel() {
        return new N2SmartSliderBackgroundAnimationModel();
    }

}