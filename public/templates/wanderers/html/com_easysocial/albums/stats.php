<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2013 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );
?>
<div data-album-stats class="es-media-stats">
	<div class="es-media-stat stat-likes">
		<!-- <b><?php echo JText::_("COM_EASYSOCIAL_MEDIA_STAT_LIKES"); ?></b> -->
		<i class="fa fa-heart"><span data-album-like-count><?php echo $album->getLikesCount();?></span></i>
	</div>
	<div class="es-media-stat stat-comments">
		<!-- <b><?php echo JText::_("COM_EASYSOCIAL_MEDIA_STAT_COMMENTS"); ?></b> -->
		<i class="fa fa-comment"><span data-album-comment-count><?php echo $album->getCommentsCount();?></span></i>
	</div>
	<div class="es-media-stat stat-tag">
		<!-- <b><?php echo JText::_("COM_EASYSOCIAL_MEDIA_STAT_TAGS"); ?></b> -->
		<i class="fa fa-tag"><span data-album-tag-count><?php echo $album->getTagsCount();?></span></i>
	</div>
</div>