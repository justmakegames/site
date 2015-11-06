<?php
$sliderId = intval($params->get('slider'));

jimport("nextend2.nextend.joomla.library");

N2Base::getApplication("smartslider")->getApplicationType('widget')->render(array(
    "controller" => 'home',
    "action"     => 'joomla',
    "useRequest" => false
), array(
    $sliderId,
    'Module - #' . $module->id
));