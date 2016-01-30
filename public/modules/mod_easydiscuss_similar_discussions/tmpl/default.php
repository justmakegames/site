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
<div class="ed-similar-discussions dc-mod discuss-mod <?php echo $params->get( 'moduleclass_sfx' ) ?>">
<?php if( $posts ){ ?>
	<div class="list-item">
		<?php foreach( $posts as $post ){ ?>

		<?php
		$post_title		= (JString::strlen( $post->title ) > $params->get( 'max_title', 50 ))? JString::substr( $post->title, 0, $params->get( 'max_title', 50 )) . '...' : $post->title;
		?>
		<div class="item">
			<div class="dc-mod-hd">
				<div class="discuss-post-title">
					<a class="item-title" href="<?php echo DiscussRouter::getPostRoute( $post->id );?>">
						<?php echo $post->title; ?>
					</a>
				</div>
			</div>

			<div class="dc-mod-bd">
				<div class="discuss-category small">
					<i class="edy-icon-category"></i> - <a href="<?php echo DiscussRouter::getCategoryRoute( $post->category_id ); ?>"> <?php echo $post->category_name; ?></a>
				</div>
				<div class="discuss-date small">
					<i class="edy-icon-clock"></i> <?php echo $post->duration; ?>
				</div>
			</div><!-- bd -->
		</div>
		<?php } ?>
	</div>
<?php } else { ?>
	<div class="no-item">
		<?php echo JText::_('MOD_EASYDISCUSS_SIMILAR_DISCUSSIONS_NO_ENTRIES'); ?>
	</div>
<?php } ?>
</div>
