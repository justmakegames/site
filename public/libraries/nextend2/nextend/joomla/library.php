<?php
if (!defined("N2_PLATFORM_LIBRARY")) define('N2_PLATFORM_LIBRARY', dirname(__FILE__));

define('N2WORDPRESS', 0);
define('N2JOOMLA', 1);
define('N2MAGENTO', 0);
define('N2NATIVE', 0);

if (!defined('N2PRO')) {
    define('N2PRO', 1);
}

require_once N2_PLATFORM_LIBRARY . '/../library/library.php';
N2Base::registerApplication(N2_PLATFORM_LIBRARY . '/../library/applications/system/N2SystemApplicationInfo.php');


function n2AddAssets() {
    if (class_exists('N2AssetsManager', false)) {
        $document = JFactory::getDocument();
        $css      = N2AssetsManager::getCSS(true);

        foreach ($css['url'] AS $url) {
            $document->addStyleSheet($url);
        }
        foreach ($css['files'] AS $file) {
            $document->addStyleSheet(N2Uri::pathToUri($file) . '?' . filemtime($file));
        }

        if (!empty($css['inline'])) {
            $document->addStyleDeclaration($css['inline']);
        }

        $js = N2AssetsManager::getJs(true);

        foreach ($js['url'] AS $url) {
            $document->addScript($url);
        }

        if (!N2Platform::$isAdmin && N2Settings::get('async', '0')) {
            $jsCombined = new N2CacheCombine('js', N2Settings::get('minify-js', '0') ? 'N2MinifierJS::minify' : false);
            foreach ($js['files'] AS $file) {
                if (basename($file) == 'n2.js') {
                    $document->addScript(N2Uri::pathToUri($file) . '?' . filemtime($file));
                } else {
                    $jsCombined->add($file);
                }
            }
            $combinedFile = $jsCombined->make();
            $scripts      = 'nextend.loadScript("' . N2Uri::pathToUri($combinedFile) . '?' . filemtime($combinedFile) . '");';
            $document->addScriptDeclaration('window.n2jQuery.ready(function(){' . $scripts . '});');
        } else {
            if (!N2Platform::$isAdmin && N2Settings::get('combine-js', '0')) {
                $jsCombined = new N2CacheCombine('js', N2Settings::get('minify-js', '0') ? 'N2MinifierJS::minify' : false);
                foreach ($js['files'] AS $file) {
                    $jsCombined->add($file);
                }
                $combinedFile = $jsCombined->make();
                $document->addScript(N2Uri::pathToUri($combinedFile) . '?' . filemtime($combinedFile));
            } else {
                foreach ($js['files'] AS $file) {
                    $document->addScript(N2Uri::pathToUri($file) . '?' . filemtime($file));
                }
            }
        }
        if (!empty($js['inline'])) {
            $document->addScriptDeclaration($js['inline']);
        }

        plgSystemNextendGlobalInline::$globalInline = $js['globalInline'];

        JFactory::getApplication()
                ->registerEvent('onAfterRender', 'plgSystemNextendGlobalInline_onAfterRender');
    }
}

N2Pluggable::addAction('exit', 'n2AddAssets');

class plgSystemNextendGlobalInline extends JPlugin
{

    public static $globalInline = '';

    public static function onAfterRender() {
        if (!empty(self::$globalInline)) {
            $app = JFactory::getApplication();
            if (method_exists($app, 'setBody')) {
                $app->setBody(preg_replace('/<head>/', '<head>' . "\n" . NHtml::script(self::$globalInline) . "\n", $app->getBody(), 1));
            } else {
                // Joomla 2.5 we can set the response in JResponse class
                JResponse::setBody(preg_replace('/<head>/', '<head>' . "\n" . NHtml::script(self::$globalInline) . "\n", JResponse::getBody(), 1));
            }
        }
    }
}

// Joomla 2.5 only supports functions for event
function plgSystemNextendGlobalInline_onAfterRender() {
    plgSystemNextendGlobalInline::onAfterRender();
}