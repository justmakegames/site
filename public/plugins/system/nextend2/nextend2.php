<?php
jimport('joomla.plugin.plugin');

class plgSystemNextend2 extends JPlugin
{

    /*
    Artisteer jQuery fix
    */
    function onAfterDispatch() {
        if (class_exists('Artx', true)) {
            Artx::load("Artx_Page");
            if (isset(ArtxPage::$inlineScripts)) ArtxPage::$inlineScripts[] = '<script type="text/javascript">if(typeof jQuery != "undefined") window.artxJQuery = jQuery;</script>';
        }
    }
}