<?php

class N2ElementTrial extends N2Element
{

    function fetchElement() {

        /*
        $image = N2XmlHelper::getAttribute($this->_xml, 'src');

        if (N2Platform::$isWordpress) {
            $imagewp = N2XmlHelper::getAttribute($this->_xml, 'wpsrc');
            if ($imagewp) {
                $image = $imagewp;
            }
        }

        return "<a href='http://www.nextendweb.com/smart-slider#pricing' target='_blank'><img src='" . $image . "' /></a>";
        */
        return 'trial';
    }
}
