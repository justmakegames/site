<?php
/**
 * @package		EasyDiscuss
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *
 * EasyDiscuss is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');
?>
<div class="discuss-mod recent-replies<?php echo $params->get( 'moduleclass_sfx' ) ?>">
<?php if( $posts ){ ?>
	<div class="list-item">
		<?php foreach( $posts as $post ){ ?>
		<div class="item">
			<div class="story">
				<div class="item-user small">
					<?php if( $params->get( 'show_startedby' ) || $params->get( 'show_avatar' , 1 ) ) { ?>
					<a class="item-avatar float-l" href="<?php echo empty( $post->profile->id ) ? 'javascript:void(0);' : $post->profile->getLink(); ?>">
						<img class="avatar" src="<?php echo $post->profile->getAvatar(); ?>" height="<?php echo $params->get( 'avatar_size', 48 ); ?>" width="<?php echo $params->get( 'avatar_size', 48 ); ?>" />
					</a>
					<?php } ?>
					<a class="item-title bold" href="<?php echo DiscussRouter::_( 'index.php?option=com_easydiscuss&view=post&id=' . $post->id );?>#reply-<?php echo $post->id;?>">
						<?php echo $post->title;?>
					</a>
				</div>
			</div>
			<div class="both"></div>
		</div>
		<?php } ?>
	</div>
<?php } else { ?>
	<div class="no-item">
		<?php echo JText::_('MOD_RECENTREPLIES_NO_ENTRIES'); ?>
	</div>
<?php } ?>
</div>
