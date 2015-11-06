<?php
$action = N2Request::getCmd('nextendaction', 'default');


$settings = array(
    'default'      => array(
        'title' => n2_('General settings'),
        'url'   => array("settings/default")
    ),
    'itemDefaults' => array(
        'title' => n2_('Item defaults'),
        'url'   => array("settings/itemDefaults")
    )
);
$settings['aviary'] = array(
    'title'       => n2_('Adobe Creative SDK - Aviary'),
    'url'         => '#',
    'linkOptions' => array(
        'onclick' => 'NextendModalSetting.show("' . n2_('Adobe Creative SDK - Aviary') . '", "' . N2Base::getApplication('system')->getApplicationType('backend')->router->createUrl(array(
                "settings/aviary",
                array('layout' => 'modal')
            )) . '"); return false;'
    )
);


N2Plugin::callPlugin('ssgenerator', 'onSmartSliderConfigurationList', array(&$settings));

$dl = array();

foreach ($settings AS $id => $setting) {
    $linkOptions         = isset($setting['linkOptions']) ? $setting['linkOptions'] : array();
    $linkOptions['href'] = $this->appType->router->createUrl($setting['url']);
    $dl[]                = array(
        'title'       => $setting['title'],
        'class'       => ($action == $id ? 'n2-active ' : ''),
        'linkOptions' => $linkOptions
    );
}

echo $this->widget->init("definitionlist", array(
    "dl" => $dl
));