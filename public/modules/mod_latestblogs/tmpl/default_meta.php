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
<!-- Blog post actions -->
<?php if( $params->get( 'showcommentcount' , 0 ) || $params->get( 'showhits' , 0 ) ){ ?>
<div class="mod-post-meta small">
	<?php if($params->get('showcommentcount', 0)) : ?>
	<span class="post-comments">
		<a href="<?php echo $url;?>"><?php echo JText::_( 'MOD_LATESTBLOGS_COMMENTS' ); ?> (<?php echo $post->commentCount;?>)</a>
	</span>
	<?php endif; ?>

	<?php if( $params->get( 'showhits' , true ) ): ?>
	<span class="post-hit">
		<a href="<?php echo $url;?>"><?php echo JText::_( 'MOD_LATESTBLOGS_HITS' );?> (<?php echo $post->hits;?>)</a>
	</span>
	<?php endif; ?>

</div>
<?php } ?>

<?php if( $params->get( 'showavatar', true ) || $params->get( 'showauthor' ) || $params->get( 'showdate' , true ) ) { ?>
<div class="mod-post-author at-bottom">
	
	<?php if( $params->get( 'showavatar', true ) ) { ?>
	<a href="<?php echo $post->author->getProfileLink( $itemId ); ?>" class="mod-avatar">
		<img src="<?php echo $post->author->getAvatar();?>" width="30" class="avatar" />
	</a>
	<?php } ?>

	<?php $source = $post->source == '' ? '' : '_' . $post->source; ?>
	<?php require( JModuleHelper::getLayoutPath('mod_latestblogs', 'source' . $source  ) ); ?>

</div>
<?php } ?>