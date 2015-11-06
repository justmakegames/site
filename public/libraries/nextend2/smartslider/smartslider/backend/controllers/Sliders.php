<?php

class N2SmartsliderBackendSlidersController extends N2SmartSliderController
{

    public function initialize() {
        parent::initialize();

        N2Loader::import(array(
            'models.Sliders',
            'models.Slides'
        ), 'smartslider');
    }

    public function actionIndex() {
        N2Loader::import(array(
            'models.Layouts',
            'models.SliderItems'
        ), 'smartslider');

        $this->addView(null);
        $this->render();
    }

    public function actionImportByUpload() {
        if ($this->validatePermission('smartslider_edit')) {
            if (empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                N2Message::error(sprintf(n2_('You were not allowed to upload this file to the server (upload limit %s). Please you this alternative method!'), @ini_get('post_max_size')));

                $this->redirect(array(
                    "sliders/importFromServer"
                ));
            } else if (N2Request::getInt('save')) {
                if ($this->validateToken() && isset($_FILES['slider']) && isset($_FILES['slider']['tmp_name']['import-file'])) {

                    switch ($_FILES['slider']['error']['import-file']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new RuntimeException('No file sent.');
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new RuntimeException('Exceeded filesize limit.');
                        default:
                            throw new RuntimeException('Unknown errors.');
                    }

                    if (N2Filesystem::fileexists($_FILES['slider']['tmp_name']['import-file'])) {

                        $data = new N2Data(N2Request::getVar('slider'));

                        N2Loader::import('libraries.import', 'smartslider');
                        $import   = new N2SmartSliderImport();
                        $sliderId = $import->import($_FILES['slider']['tmp_name']['import-file'], $data->get('image-mode', 'clone'), $data->get('linked-visuals', 0));

                        if ($sliderId !== false) {
                            N2Message::success(n2_('Slider imported.'));
                            $this->redirect(array(
                                "slider/edit",
                                array("sliderid" => $sliderId)
                            ));
                        } else {
                            N2Message::error(n2_('Import error!'));
                            $this->refresh();
                        }
                    } else {
                        N2Message::error(n2_('The imported file is not readable!'));
                        $this->refresh();
                    }


                } else {

                }
            }

            $this->addView('importByUpload');
            $this->render();
        }
    }

    public function actionImportFromServer() {
        if ($this->validatePermission('smartslider_edit')) {


            if (N2Request::getInt('save')) {

                if ($this->validateToken()) {
                    $data = new N2Data(N2Request::getVar('slider'));
                    $file = $data->get('import-file');
                    if (empty($file)) {
                        N2Message::error(n2_('Please select a file!'));
                        $this->refresh();
                    } else {
                        $dir = N2Platform::getPublicDir();
                        if (N2Filesystem::fileexists($dir . '/' . $file)) {
                            N2Loader::import('libraries.import', 'smartslider');
                            $import   = new N2SmartSliderImport();
                            $sliderId = $import->import($dir . '/' . $file, $data->get('image-mode', 'clone'), $data->get('linked-visuals', 0));

                            if ($sliderId !== false) {

                                if ($data->get('delete')) {
                                    @unlink($dir . '/' . $file);
                                }

                                N2Message::success(n2_('Slider imported.'));
                                $this->redirect(array(
                                    "slider/edit",
                                    array("sliderid" => $sliderId)
                                ));
                            } else {
                                N2Message::error(n2_('Import error!'));
                                $this->refresh();
                            }
                        } else {
                            N2Message::error(n2_('The chosen file is missing!'));
                            $this->refresh();
                        }
                    }
                } else {
                    $this->refresh();
                }
            }

            $this->addView('importFromServer');
            $this->render();
        }
    }

    public function actionImportLocal() {
        if ($this->validatePermission('smartslider_edit')) {
            $slider = N2Request::getCmd('slider');
            if (!empty($slider)) {
                $tmpHandle = tmpfile();
                fwrite($tmpHandle, file_get_contents('http://beta.nextendweb.com/sliders/' . $slider . '.ss3'));
                $metaData    = stream_get_meta_data($tmpHandle);
                $tmpFilename = $metaData['uri'];

                N2Loader::import('libraries.import', 'smartslider');
                $import   = new N2SmartSliderImport();
                $sliderId = $import->import($tmpFilename, 'clone', 1);
                fclose($tmpHandle);

                if ($sliderId !== false) {

                    N2Message::success(n2_('Slider imported.'));
                    $this->redirect(array(
                        "slider/edit",
                        array("sliderid" => $sliderId)
                    ));
                } else {
                    N2Message::error(n2_('Import error!'));
                    $this->redirect(array(
                        "sliders/index"
                    ));
                }
            }
        }
    }
}