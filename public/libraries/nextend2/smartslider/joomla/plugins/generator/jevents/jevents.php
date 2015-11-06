<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorJEvents extends N2PluginBase
{

    public static $group = 'jevents';
    public static $groupLabel = 'JEvents';

    function onGeneratorList(&$group, &$list) {
        $installed = N2Filesystem::existsFile(JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_virtuemart' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'config.php');
        $url       = 'http://extensions.joomla.org/extension/jevents';

        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) {
            $list[self::$group] = array();
        }

        $list[self::$group]['events'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Events'), $this->getPath() . 'events')
                                                       ->setInstalled($installed)
                                                       ->setUrl($url)
                                                       ->setType('event');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorJEvents');
