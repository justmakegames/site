<?php
jimport('joomla.plugin.plugin');

class plgSystemNextendSmartslider3 extends JPlugin
{

    function onInitN2Library() {
        N2Base::registerApplication(JPATH_SITE . DIRECTORY_SEPARATOR . "libraries" . DIRECTORY_SEPARATOR . 'nextend2/smartslider/smartslider/N2SmartsliderApplicationInfo.php');
    }

}

function nextend_smartslider3($sliderId, $usage = 'Used in PHP') {
    jimport("nextend2.nextend.joomla.library");

    N2Base::getApplication("smartslider")->getApplicationType('widget')->render(array(
        "controller" => 'home',
        "action"     => 'joomla',
        "useRequest" => false
    ), array(
        $sliderId,
        $usage
    ));
}