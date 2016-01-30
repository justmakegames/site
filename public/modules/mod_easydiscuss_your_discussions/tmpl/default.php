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
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div id="ed-your-discussions" class="dc-mod <?php echo $params->get( 'moduleclass_sfx' ) ?>">
	<div class="list-item">
		<?php if( !empty($posts) ){ ?>
			<?php foreach( $posts as $post ){ ?>
				<?php
					$readCss = '';
					if( $profile->id != 0)
					{
						$readCss = 	( $profile->isRead( $post->id ) || $post->legacy ) ? ' is-read' : ' is-unread';
					}
					$isRecent = ( $post->isnew ) ? ' is-recent' : '';
				?>
				<div class="item <?php echo empty($post->post_type)? '' : 'is-post_type' ?> <?php echo empty($post->post_status)? '' : 'is-post_status' ?> <?php echo $post->islock ? ' is-locked' : '';?><?php echo $post->isresolve ? ' is-resolved' : '';?><?php echo $post->isFeatured ? ' is-featured' : '';?> <?php echo $readCss . $isRecent; ?><?php echo isset( $favourites ) ? ' is-favourited' : '';?>">

					<div class="dc-mod-hd">
						<div class="discuss-post-title">
							<span class="postType label label-warning label-post_type<?php echo $post->suffix; ?>" ><?php echo $post->post_type ?></span>
							<a class="item-title" href="<?php echo DiscussRouter::getPostRoute( $post->id );?>">
								<?php echo $post->title; ?>
							</a>
						</div>
						<div class="dc-discuss-status">
							<span class="label label-info label-post_status"><?php echo $post->post_status; ?></span>
							<span class="label label-unread"><?php echo JText::_( 'MOD_EASYDISCUSS_UNREAD' );?></span>

							<div class="discuss-status">
								<i class="edy-icon-locked edy-state" rel="ed-tooltip" data-placement="top" data-original-title="Locked"></i>
								<i class="edy-icon-resolved edy-state" rel="ed-tooltip" data-placement="top" data-original-title="Resolved"></i>
								<i class="edy-icon-featured edy-state" rel="ed-tooltip" data-placement="top" data-original-title="Featured"></i>
								<i class="edy-icon-favorited edy-state" rel="ed-tooltip" data-placement="top" data-original-title="Favorited"></i>
							</div>

						</div>
					</div>

					<div class="dc-mod-bd">
						<div class="discuss-category small">
							<i class="edy-icon-category"></i> - <a href="<?php echo DiscussRouter::getCategoryRoute( $post->category_id ); ?>"> <?php echo $post->category; ?></a>
						</div>
						<div class="discuss-date small">
							<i class="edy-icon-clock"></i> <?php echo $post->duration; ?>
						</div>
					</div><!-- bd -->

					<div class="dc-mod-ft">
						<div class="discuss-statistic small">

							<a href="<?php echo DiscussRouter::getPostRoute( $post->id );?>" rel="ed-tooltip" data-original-title="<?php echo JText::_( 'MOD_EASYDISCUSS_STAT_TOTAL_REPLIES' , true );?>">
								<i class="edy-icon-replies"></i> <?php echo $post->totalreplies;?>
							</a>
							<a href="<?php echo DiscussRouter::getPostRoute( $post->id );?>" rel="ed-tooltip" data-original-title="<?php echo JText::_( 'MOD_EASYDISCUSS_STAT_TOTAL_HITS' , true );?>">
								<i class="edy-icon-views"></i> <?php echo $post->hits; ?>
							</a>
							<a href="<?php echo DiscussRouter::getPostRoute( $post->id );?>" rel="ed-tooltip" data-original-title="<?php echo JText::_( 'MOD_EASYDISCUSS_STAT_TOTAL_FAVOURITES' , true ); ?>">
								<i class="edy-icon-favors"></i> <?php echo $post->totalFavourites ?>
							</a>
							<a href="<?php echo DiscussRouter::getPostRoute( $post->id );?>" rel="ed-tooltip" data-original-title="<?php echo JText::_( 'MOD_EASYDISCUSS_STAT_TOTAL_VOTES' , true ); ?>">
								<i class="edy-icon-votes"></i> <?php echo $post->sum_totalvote; ?>
							</a>

						</div><!-- discuss-statistic -->

						<time datetime="<?php echo $post->replied; ?>"></time>

						<div class="discuss-last-replied small">
							<?php if( isset( $post->reply ) ){ ?>
								<?php if( $post->reply->id ){ ?>
								<?php if( $config->get( 'layout_avatar' ) ) { ?>
									<a href="<?php echo $post->reply->getLink();?>" class="pull-left ml-5" title="<?php echo $post->reply->getName(); ?>">
										<img src="<?php echo $post->reply->getAvatar();?>" alt="<?php echo DiscussHelper::getHelper( 'String' )->escape( $post->reply->getName() );?>" />
									</a>
									<?php } ?>
								<?php } else { ?>
									<?php echo $post->reply->poster_name; ?>
								<?php } ?>

								<?php $lastReply = DiscussHelper::getModel( 'Posts' )->getLastReply( $post->id ); ?>
								<a class="ml-5" href="<?php echo DiscussRouter::getPostRoute( $post->id ) . '#' . JText::_('MOD_EASYDISCUSS_REPLY_PERMALINK') . '-' . $lastReply->id;?>" title="<?php echo JText::_('MOD_EASYDISCUSS_VIEW_LAST_REPLY'); ?>"><?php echo JText::_( 'MOD_EASYDISCUSS_VIEW_LAST_REPLY' );?></a>

							<?php } ?>
						</div>
					</div><!-- ft -->

				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
