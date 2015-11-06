<?php

class N2Platform
{

    public static $isAdmin = false;

    public static $hasPosts = true, $isJoomla = false, $isWordpress = false, $isMagento = false, $isNative = false;

    public static $name;

    public static function init() {
        self::$isJoomla = JVERSION;
        if (JFactory::getApplication()->isAdmin()) {
            self::$isAdmin = true;
        }
    }

    public static function getPlatform() {
        return 'joomla';
    }

    public static function getPlatformName() {
        return 'Joomla';
    }

    public static function getDate() {
        return JFactory::getDate()->toSql();
    }

    public static function getTime() {
        return JFactory::getDate()->toUnix();
    }

    public static function getPublicDir() {
        return JPATH_SITE . '/media';
    }

    public static function adminHideCSS() {
        echo '
            /*
            Joomla 3
            */

            .navbar{
                display: none;
            }

            .container-fluid{
                padding: 0;
            }

            .admin #content{
                margin: 0;
            }

            /**
            Joomla 2.5
            */
            body,
            #element-box,
            div#element-box div.m{
              margin: 0;
              padding: 0;
            }
            #border-top,
            #header-box{
                display: none;
            }

            #content-box{
              border: 0;
              width: 100%;
            }

            #element-box div.m{
                border: 0;
                background: transparent;
            }
        ';
    }

}

N2Platform::init();
