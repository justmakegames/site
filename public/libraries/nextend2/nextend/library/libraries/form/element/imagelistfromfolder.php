<?php
N2Loader::import('libraries.form.element.imagelist');

class N2ElementImageListFromFolder extends N2ElementImageList
{

    function setFolder() {
        $this->_folder = N2Filesystem::translate(dirname($this->_form->_xmlfile) . '/' . N2XmlHelper::getAttribute($this->_xml, 'folder') . '/');
    }
}
