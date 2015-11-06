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
<li class="blog-item" data-blog-list-item>

	<div class="clearfix">
		<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>" class="blog-title"><?php echo $post->title; ?></a>

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
	</div>

	<div class="blog-item-meta">
		<span>
			<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id);?>#comments">
				<i class="ies-comments-3 ies-small"></i> <?php echo $post->getTotalComments();?> <?php echo JText::_( 'APP_USER_BLOG_COMMENTS' ); ?>
			</a>
		</span>
		&middot;
		<?php foreach ($post->getCategories() as $category) { ?>
		<span> 
			<a href="<?php echo EBR::_('index.php?option=com_easyblog&view=categories&layout=listings&id=' . $category->id);?>"><?php echo $category->title;?></a>
		</span>
		&middot;
		<?php } ?>
		<span>
			<i class="ies-calendar ies-small"></i> <?php echo $this->html('string.date', $post->created, JText::_('DATE_FORMAT_LC1')); ?>
		</span>
	</div>
</li>
