<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php

class N2Browse
{

    public static function init() {
        static $inited = false;
        if (!$inited) {

            N2Pluggable::addAction('afterApplicationContent', 'N2Browse::load');
            $inited = true;
        }
    }

    public static function load() {
        N2Base::getApplication('system')->getApplicationType('backend')->run(array(
            'useRequest' => false,
            'controller' => 'browse',
            'action'     => 'index'
        ));
    }
}

N2Browse::init();