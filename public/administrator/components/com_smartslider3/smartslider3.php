<?php
if (JFactory::getUser()->authorise('core.manage', 'com_smartslider3')) {
    jimport("nextend2.nextend.joomla.library");
    N2Base::getApplication("smartslider")->getApplicationType('backend')->render(array(
        "controller" => "sliders",
        "action"     => "index"
    ));
    n2_exit();
}else{
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}
