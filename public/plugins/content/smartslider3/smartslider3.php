<?php
defined('_JEXEC') or die;

class PlgContentSmartSlider3 extends JPlugin
{

    public function onContentPrepare($context, &$article, &$params, $page = 0) {
        // Don't run this plugin when the content is being indexed
        if ($context == 'com_finder.indexer') {
            return true;
        }

        // Simple performance check to determine whether bot should process further
        if (strpos($article->text, 'smartslider3[') === false) {
            return true;
        }


        $article->text = preg_replace_callback('/smartslider3\[([0-9]+)\]/', 'PlgContentSmartSlider3::prepare', $article->text);

    }

    public static function prepare($matches) {
        ob_start();
        nextend_smartslider3($matches[1]);
        return ob_get_clean();
    }
}
