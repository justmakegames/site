<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

if (isset($uid) && $uid) {

	// Get the preview post alias
    $post = EB::post($uid);

	if (isset($layout) && $layout == 'preview') {

		// Add the view to the list of titles
		$title[] = JString::ucwords(JText::_('COM_EASYBLOG_SH404_ROUTER_' . strtoupper($layout)));
		$title[] = ucfirst($post->getAlias());
	}

	shRemoveFromGETVarsList('view');
	shRemoveFromGETVarsList('layout');
	shRemoveFromGETVarsList('uid');
}

if (isset($id) && $id) {
	// Get the category alias
    $post = EB::post($id);

	// For entry links, we do not want to include the /Entry/ portion
	$title[] = ucfirst($post->getAlias());

	shRemoveFromGETVarsList('view');
	shRemoveFromGETVarsList('layout');
	shRemoveFromGETVarsList('id');
}