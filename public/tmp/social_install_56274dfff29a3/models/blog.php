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

Foundry::import( 'admin:/includes/model' );

class BlogModel extends EasySocialModel
{
	/**
	 * Retrieves a list of tasks created by a particular user.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	int		$userId		The user's / creator's id.
	 *
	 * @return	Array				A list of notes item.
	 */
	public function getItems( $userId )
	{
		$model = EB::model('Blog');

		$result = $model->getBlogsBy('blogger', $userId);

		// Format the blog post
		$result = EB::formatter('entry', $result);

		return $result;
	}

}
