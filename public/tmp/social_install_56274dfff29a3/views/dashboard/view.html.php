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
defined( '_JEXEC' ) or die( 'Unauthorized Access' );

/**
 * Dashboard view for Notes app.
 *
 * @since	1.0
 * @access	public
 */
class BlogViewDashboard extends SocialAppsView
{
	/**
	 * Displays the application output in the canvas.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	int		The user id that is currently being viewed.
	 */
	public function display($userId = null , $docType = null)
	{
		// Check if EasyBlog really exists on the site
		$file = JPATH_ADMINISTRATOR . '/components/com_easyblog/includes/easyblog.php';

		if (!JFile::exists($file)) {
			echo JText::_( 'APP_BLOG_EASYBLOG_NOT_INSTALLED' );
			return;
		}

		require_once($file);

		// Load foundry into the headers.
		EB::init('site');

        $stylesheet = EB::stylesheet('site', 'wireframe');
        $stylesheet->attach();
		
		// Get the blog model
		$model = EB::model('Blog');

		// Get list of blog posts created by the user on the site.
		$items = $model->getBlogsBy('blogger', $userId);

		$posts = array();
		
		foreach ($items as $post) {
			$posts[] = EB::post($post->id);
		}

		$this->set('posts', $posts);

		echo parent::display('dashboard/default');
	}
}
