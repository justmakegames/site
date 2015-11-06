<?php

class N2SmartsliderApplicationInfo extends N2ApplicationInfo
{

    public function __construct() {
        $this->path      = dirname(__FILE__);
        $this->assetPath = realpath(dirname(__FILE__) . "/../media");
        parent::__construct();
    }

    public function isPublic() {
        return true;
    }

    public function getName() {
        return 'smartslider';
    }

    public function getLabel() {
        return 'Smart Slider';
    }

    public function getInstance() {
        require_once $this->path . NDS . "N2SmartsliderApplication.php";
        return new N2SmartSliderApplication($this);
    }

    public function getPathKey() {
        return '$ss$';
    }

    public function onNextendBaseReady() {
        parent::onNextendBaseReady();

        require_once dirname(__FILE__) . '/libraries/storage.php';
    }

    public function assetsBackend() {
        static $once;
        if ($once != null) {
            return;
        }
        $once = true;

        $path = $this->getAssetsPath();

        N2CSS::addFile($path . "/admin/css/smartslider.css", 'smartslider-backend');

        foreach (glob($path . "/admin/js/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/element/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }

        N2Localization::addJS(array(
            'Insert',
            'Insert variable',
            'Choose the group',
            'Choose the variable',
            'Result',
            'Filter',
            'No',
            'Clean HTML',
            'Remove HTML',
            'Split',
            'Chars',
            'Words',
            'Start',
            'Length',
            'Find image',
            'Index'
        ));
        foreach (glob($path . "/admin/js/generator/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/generator/element/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/item/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/item/parser/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/layer/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }
        foreach (glob($path . "/admin/js/timeline/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-backend');
        }

        N2Form::$documentation = 'http://beta.nextendweb.com/documentation/' . ucfirst(N2Platform::getPlatform()) . (N2SSPRO ? 'Pro' : '') . '.php';
        N2JS::addInline('NextendModalDocumentation.url="' . N2Form::$documentation . '";');
    }

    public function assetsFrontend() {
        N2JS::addInline('window.N2SSPRO=' . N2SSPRO . ';', true);

        $path = $this->getAssetsPath();

        foreach (glob($path . "/js/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
        foreach (glob($path . "/js/animation/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
        foreach (glob($path . "/js/controls/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
        foreach (glob($path . "/js/layers/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
        foreach (glob($path . "/js/responsive/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
        foreach (glob($path . "/js/item/*.js") AS $file) {
            N2JS::addFile($file, 'smartslider-frontend');
        }
    }
}

return new N2SmartsliderApplicationInfo();