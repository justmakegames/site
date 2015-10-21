<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2012 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
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
class BlogViewProfile extends SocialAppsView
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
			echo JText::_('APP_BLOG_EASYBLOG_NOT_INSTALLED');
			return;
		}

		require_once($file);

		// Get the user params
		$params = $this->getUserParams($userId);

		// Get the app params
		$appParams = $this->app->getParams();

		// Get the blog model
		$total = (int) $params->get('total', $appParams->get('total', 5));

		// Get list of blog posts created by the user on the site.
		$model = EB::model('Blog');
		$posts = $model->getBlogsBy('blogger', $userId, '', $total);
		$posts = EB::formatter('list', $posts);

		if ($posts) {
			for ($i = 0; $i < count($posts); $i++) {
				$blog =& $posts[$i];

				// replacing <img src='images/' to <img src="/images/"
				$blog->intro = str_replace( 'src="images', 'src="/images', $blog->intro);
				$blog->content = str_replace( 'src="images', 'src="/images', $blog->content);

				$blog->intro = str_replace( "src='images", "src='/images", $blog->intro);
				$blog->content = str_replace( "src='images", "src='/images", $blog->content);
			}
		}

		$user = Foundry::user($userId);

		$this->set('user', $user);
		$this->set('posts', $posts);
		$this->set('appParams', $appParams);

		echo parent::display('profile/default');
	}
}
