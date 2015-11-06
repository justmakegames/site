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
<div class="app-blog<?php echo (!$posts) ? ' is-empty' : ''; ?>" data-blog>
	<div class="es-filterbar">
		<div class="h5 pull-left filterbar-title"><?php echo JText::_('APP_USER_BLOG_MANAGE_BLOG_POSTS'); ?></div>

		<?php if ($this->my->id == $user->id) { ?>
		<a class="btn btn-es-primary btn-sm pull-right" href="<?php echo EBR::_('index.php?option=com_easyblog&view=composer&tmpl=component');?>" data-eb-composer><?php echo JText::_('APP_USER_BLOG_NEW_POST_BUTTON'); ?></a>
		<?php } ?>
	</div>

	<?php if ($posts) { ?>
	<ul class="list-unstyled blog-list" data-blog-lists>
		<?php if ($posts) { ?>
			<?php foreach ($posts as $post){ ?>
				<?php echo $this->loadTemplate('themes:/apps/user/blog/profile/item', array('post' => $post, 'appParams' => $appParams)); ?>
			<?php } ?>
		<?php } ?>
	</ul>
	<hr />
	<div class="clearfix">
		<span class="pull-right">
			<a href="<?php echo EBR::_( 'index.php?option=com_easyblog&view=blogger&layout=listings&id=' . $user->id );?>">
				<?php echo JText::sprintf( 'APP_BLOG_VIEW_ALL_BLOG_POSTS_FROM_USER', $user->getName()); ?>
				<i class="ies-arrow-right-2 ies-small ml-5"></i>
			</a>
		</span>
	</div>
	<?php } else { ?>
	<div class="empty center">
		<i class="ies-list-2"></i>
		<?php echo $user->getName();?> <?php echo JText::_('APP_BLOG_PROFILE_NO_BLOG_POSTS_CURRENTLY'); ?>
	</div>
	<?php } ?>

</div>
