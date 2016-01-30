<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php

N2Loader::import('libraries.form.element.text');

class N2ElementDribbbleToken extends N2ElementText
{

    function fetchElement() {

        N2JS::addInline('new NextendElementDribbbleToken("' . $this->_id . '", "' . N2Base::getApplication('smartslider')->router->createAjaxUrl(array(
                "generator/getAuthUrl",
                array(
                    'group' => N2Request::getVar('group'),
                    'type'  => N2Request::getVar('type')
                )
            )) . '", "' . N2Base::getApplication('smartslider')->router->createUrl(array(
                "generator/finishauth",
                array(
                    'group' => 'dribbble'
                )
            )) . '")');

        return parent::fetchElement();
    }

    protected function post() {
        return '<a id="' . $this->_id . '_button" class="n2-form-element-button n2-h5 n2-uc" href="#">' . n2_('Request token') . '</a>';
    }
}


