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
?>
<div class="app-blog" data-blog>
	<div class="es-filterbar">
		<div class="h5 pull-left filterbar-title"><?php echo JText::_('APP_USER_BLOG_MANAGE_BLOG_POSTS'); ?></div>

		<a class="btn btn-es-primary btn-sm pull-right" href="<?php echo EBR::_('index.php?option=com_easyblog&view=composer&tmpl=component');?>" data-eb-composer><?php echo JText::_('APP_USER_BLOG_NEW_POST_BUTTON'); ?></a>
	</div>

	<div class="app-contents<?php echo !$posts ? ' is-empty' : '';?>" data-app-contents>
		<p class="app-info">
			<?php echo JText::_( 'APP_USER_BLOG_DASHBOARD_INFO' ); ?>
		</p>

		<div class="app-contents-data">
			<ul class="list-unstyled blog-list" data-blog-lists>
				<?php if ($posts) { ?>
					<?php foreach ($posts as $post) { ?>
						<?php echo $this->loadTemplate('themes:/apps/user/blog/dashboard/item', array('post' => $post)); ?>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
		
		<div class="empty">
			<i class="ies-database"></i>
			<?php echo JText::_( 'APP_USER_BLOG_NO_POSTS_YET' ); ?>
		</div>
	</div>
</div>
