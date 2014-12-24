<?php
/**
 * @package		EasyBlog
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *
 * EasyBlog is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');
?>
<?php if( $params->get( 'enableratings' ) )
{
	$disabled = false;
}
else
{
	$disabled = true;
}?>
<div class="ezb-mod ezblog-relatedpost<?php echo $params->get( 'moduleclass_sfx' ) ?>">

	<!-- Entries -->
	<?php if( $posts ){ ?>
	<div class="ezb-mod">
		<?php foreach( $posts as $post ){ ?>
			<?php
				$itemId = modRelatedPostHelper::_getMenuItemId($post, $params);
				$url 	= EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id=' . $post->id . $itemId );

				$posterURL	= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=blogger&layout=listings&id=' . $post->author->id . $itemId );
				$posterName	= $post->author->getName();
			?>
			<div class="mod-item">

				<?php if( $params->get( 'photo_show') ){ ?>
					<?php if( $post->getImage() ){ ?>
						<div class="mod-post-image align-<?php echo $params->get( 'alignment' , 'default' );?>">
							<a href="<?php echo $url; ?>"><img src="<?php echo $post->getImage()->getSource('module');?>" /></a>
						</div>
					<?php } else { ?>
						<!-- Legacy for older style -->
						<?php if( $post->media ){ ?>
						<div class="mod-post-image align-<?php echo $params->get( 'alignment' , 'default' );?>">
							<a href="<?php echo $url; ?>"><?php echo $post->media;?></a>
						</div>
						<?php }  ?>
					<?php } ?>
				<?php } ?>

				<div class="mod-post-title">
					<a href="<?php echo $url; ?>"><?php echo $post->title;?></a>
				</div>

				<?php if( $params->get( 'showcategory') ){ ?>
				<div class="mod-post-type">
					<a href="<?php echo EasyBlogRouter::_( 'index.php?option=com_easyblog&view=categories&layout=listings&id=' . $post->category_id . $itemId );?>"><?php echo $post->getCategoryName();?></a>
				</div>
				<?php } ?>

				<?php if( $params->get( 'showintro' , '-1' ) != '-1' ){ ?>
				<div class="mod-post-content clearfix">

					<?php if( $post->protect ){ ?>
						<?php echo  $post->content; ?>
					<?php } else { ?>
						<?php echo $post->summary;?>
					<?php } ?>

					<?php if( $params->get( 'showreadmore' , true ) && ( !empty( $post->intro) && !empty($post->content) ) ){ ?>
					<div class="mod-post-more">
						<a href="<?php echo $url; ?>"><?php echo JText::_('MOD_EASYBLOGRELATED_READMORE'); ?></a>
					</div>
					<?php } ?>

				</div>
				<?php } ?>

				<?php if( $params->get( 'showratings', true ) && $post->showRating ): ?>
				<div class="mod-post-rating blog-rating small"><?php echo EasyBlogHelper::getHelper( 'ratings' )->getHTML( $post->id , 'entry' , JText::_( 'MOD_EASYBLOGRELATED_RATEBLOG' ) , 'mod-relatedpost-' . $post->id , $disabled);?></div>
				<?php endif; ?>

				<!-- Blog post actions -->
				<?php if( $params->get( 'showcommentcount' , 0 ) || $params->get( 'showhits' , 0 ) || $params->get( 'showreadmore' , true ) ){ ?>
				<div class="mod-post-meta small">
					<?php if($params->get('showcommentcount', 0)) : ?>
					<span class="post-comments">
						<a href="<?php echo $url;?>"><?php echo JText::_( 'MOD_EASYBLOGRELATED_COMMENTS' ); ?> (<?php echo $post->commentCount;?>)</a>
					</span>
					<?php endif; ?>

					<?php if( $params->get( 'showhits' , true ) ): ?>
					<span class="post-hit">
						<a href="<?php echo $url;?>"><?php echo JText::_( 'MOD_EASYBLOGRELATED_HITS' );?> (<?php echo $post->hits;?>)</a>
					</span>
					<?php endif; ?>

				</div>
				<?php } ?>

				<?php if( $params->get( 'showavatar', true ) || $params->get( 'showauthor' ) || $params->get( 'showdate' , true ) ) { ?>
				<div class="mod-post-author at-bottom">

					<?php if( $params->get( 'showavatar', true ) ) { ?>
					<a href="<?php echo EasyBlogRouter::_('index.php?option=com_easyblog&view=blogger&layout=listings&id=' . $post->author->id . $itemId ); ?>" class="mod-avatar">
						<img src="<?php echo $post->author->getAvatar();?>" width="30" class="avatar" />
					</a>
					<?php } ?>

					<?php $source = $post->source == '' ? '' : '_' . $post->source; ?>
					<?php require( JModuleHelper::getLayoutPath('mod_easyblogrelatedpost', 'source' . $source  ) ); ?>

				</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>

	<?php } else { ?>
			<?php echo JText::_( 'MOD_EASYBLOGRELATED_NO_POST'); ?>
	<?php } ?>
</div>
