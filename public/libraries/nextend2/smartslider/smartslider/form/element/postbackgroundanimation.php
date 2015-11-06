<?php
N2Form::importElement('hidden');
N2Loader::import('libraries.postbackgroundanimation.manager', 'smartslider');

class N2ElementPostBackgroundAnimation extends N2ElementHidden
{

    public $_tooltip = true;

    function fetchElement() {

        N2JS::addInline('new NextendElementPostAnimationManager("' . $this->_id . '", "postbackgroundanimationManager");');

        return NHtml::tag('div', array(
                'class' => 'n2-form-element-option-chooser n2-border-radius'
            ), parent::fetchElement() . NHtml::tag('input', array(
                'type'     => 'text',
                'class'    => 'n2-h5',
                'style'    => 'width: 130px;' . N2XmlHelper::getAttribute($this->_xml, 'css'),
                'disabled' => 'disabled'
            ), false) . NHtml::tag('a', array(
                'href'  => '#',
                'class' => 'n2-form-element-clear'
            ), NHtml::tag('i', array('class' => 'n2-i n2-it n2-i-empty n2-i-grey-opacity'), '')) . NHtml::tag('a', array(
                'href'  => '#',
                'class' => 'n2-form-element-button n2-h5 n2-uc'
            ), n2_('Animations')));
    }
}
