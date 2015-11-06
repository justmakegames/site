<?php


class N2SmartsliderBackendSlidersView extends N2ViewBase
{

    public function _import() {

        $nextendURL  = 'http://www.nextendweb.com/demo/smartslider2/';
        $imagesToUrl = array(//'Movie_3D.png' => $nextendURL . 'widget/movie-2d-3d'
        );

        $freePath = NEXTEND_SMARTSLIDER_ASSETS . '/admin/smart/free/';
        if (N2Filesystem::existsFolder($freePath)) {
            $frees = N2Filesystem::files($freePath);
            foreach ($frees as $free) {
                if (pathinfo($free, PATHINFO_EXTENSION) == 'png') $this->_importThumbnails($freePath . $free, $free, $imagesToUrl);
            }
        }
        $fullPath = NEXTEND_SMARTSLIDER_ASSETS . '/admin/smart/full/';
        if (N2Filesystem::existsFolder($fullPath)) {
            $fulls = N2Filesystem::files($fullPath);
            foreach ($fulls as $full) {
                if (pathinfo($full, PATHINFO_EXTENSION) == 'png') $this->_importThumbnails($fullPath . $full, $full, $imagesToUrl, true);
            }
        }
    
    }

    public function _importThumbnails($path, $filename, $imagesToUrl, $full = false) {

        $button = NHtml::link(n2_("Import"), $this->appType->router->createUrl(array(
            "sliders/importlocal",
            array(
                "full"   => ($full ? 1 : 0),
                "slider" => substr($filename, 0, -4)
            )
        )), array(
            "class" => "n2-button n2-button-small n2-button-blue n2-uc n2-h5"
        ));

        $buttonHTML = NHtml::tag("td", array('class' => 'n2-box-button'), $button);


        $attr = array();
        if (isset($imagesToUrl[$filename])) {
            $attr['onclick'] = 'window.open("' . $imagesToUrl[$filename] . '", "_blank");';
            $attr['style']   = 'cursor: pointer;';
        }
        echo NHtml::tag('div', array('class' => 'n2-box'), NHtml::image(N2Uri::pathToUri($path), '', $attr) . NHtml::tag("div", array('class' => 'n2-box-placeholder'), NHtml::tag("table", array(), NHtml::tag("tr", array(), $buttonHTML))));

    }

    public function renderImportByUploadForm() {

        N2SmartsliderSlidersModel::renderImportByUploadForm();
    }

    public function renderImportFromServerForm() {

        N2SmartsliderSlidersModel::renderImportFromServerForm();
    }
} 