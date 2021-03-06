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
<li class="blog-item clearfix" data-blog-list-item>
	<div class="clearfix">
		<h5 class="pull-left">
			<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>"><?php echo $post->title; ?></a>
		</h5>

		<?php if ($post->created_by == $this->my->id) { ?>
		<span class="blog-actions btn-group pull-right">
			<a href="javascript:void(0);" data-foundry-toggle="dropdown" class="dropdown-toggle_ btn btn-dropdown">
				<i class="icon-es-dropdown"></i>
			</a>
			<ul class="dropdown-menu dropdown-menu-user messageDropDown">
				<li>
					<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=dashboard&layout=write&blogid=' . $post->id);?>"><?php echo JText::_('APP_USER_BLOG_EDIT_POST');?></a>
				</li>
				<li>
					<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>"><?php echo JText::_('APP_USER_BLOG_DELETE_POST');?></a>
				</li>
			</ul>
		</span>
		<?php } ?>
	</div>

	<div class="blog-item-meta clearfix">
		<div class="pull-left">
		<?php foreach ($post->getCategories() as $category) { ?>
			<?php echo JText::sprintf('APP_USER_BLOG_POSTED_IN_META', '<a href="' . EBR::_('index.php?option=com_easyblog&view=categories&layout=listings&id=' . $category->id) . '">' . $category->title . '</a>'); ?>
			&middot;
		<?php } ?>
		</div>

		<div class="pull-right">
			<i class="icon-es-calendar"></i>
			<span class="small"><?php echo $this->html('string.date', $post->created, JText::_('DATE_FORMAT_LC1')); ?></span>
		</div>
	</div>

	<hr />
	<div class="blog-text clearfix">

		<?php if ($post->image) { ?>
		<a href="<?php echo $post->getPermalink();?>">
			<img src="<?php echo $post->getImage('thumbnail');?>" align="right" class="blog-image" alt="<?php echo $this->html('string.escape', $post->title);?>" />
		</a>
		<?php } ?>

		<?php echo $post->getIntro('', true, 'all', $appParams->get('profile_maxlength')); ?>
	</div>

	<div class="blog-item-actions row-fluid mt-15">

		<div class="blog-item-actions-comment pull-left small">
			<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>#comments">
				<i class="ies-comments-3 ies-small"></i> <?php echo $post->getTotalComments();?> <?php echo JText::_('APP_USER_BLOG_COMMENTS'); ?>
			</a>
		</div>

		<div class="blog-item-actions-readmore pull-right small">
			<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>"><?php echo JText::_('APP_USER_BLOG_CONTINUE_READING'); ?> &rarr;</a>
		</div>
	</div>

</li>
