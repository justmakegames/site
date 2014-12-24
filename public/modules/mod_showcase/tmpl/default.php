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
<script type="text/javascript">
EasyBlog.require()
.script( 'featured' )
.done(function( $ ){

	$( '.showcaseModule' ).implement( EasyBlog.Controller.Featured.Scroller ,
	{
		autorotate : {
			enabled :  <?php echo $params->get( 'autorotate' ) == '0' ? 'false' : 'true';?>,
			interval: <?php echo $params->get( 'autorotate_seconds' );?>
		},
		"{slider}"				: '.mod-showcase-list',
		"{sliderNavigation}"	: '.showcase-navi .showcase-a a'
	},
	function(){

	});

var items 		= $('.showcase-item'),
	maxHeight 	= 0;

	$.each(items, function(i, item) {
		var itemHeight = $(item).height();
		
		maxHeight = itemHeight > maxHeight ? itemHeight : maxHeight;
	});

	$('.slider-holder').height(maxHeight);
});
</script>
<div id="mod_showcase" class="ezb-mod showcaseModule mod_showcase<?php echo $params->get( 'moduleclass_sfx' ) ?>">
	<div class="showcase-slider">
		<div class="slider-holder">
			<ul class="mod-showcase-list" style="left: 0px;">
			<?php
			$i	= 1;
			foreach( $items as $item )  {

				$menuItemId = modShowCaseHelper::_getMenuItemId($item, $params);

			?>
				<li id="mod-showcase-wrapper-<?php echo $i;?>" class="showcase-item<?php echo $i == 1 ? ' item-show' : '';?>">
					<?php if( $item->getImage() ){ ?>
						<div class="showcase-image">
							<a href="<?php echo EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $item->id . $menuItemId );?>"><img src="<?php echo $item->getImage()->getSource( 'featured' );?>" /></a>

							<?php if( $posttype == 'featured'){ ?>
							<span class="featured-tag pabs"></span>
							<?php } ?>
						</div>
					<?php } else if ( $item->featuredImage ){ ?>
						<div class="showcase-image">
							<a href="<?php echo EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $item->id . $menuItemId );?>"><?php echo $item->featuredImage;?></a>

							<?php if( $posttype == 'featured'){ ?>
							<span class="featured-tag pabs"></span>
							<?php } ?>
						</div>
					<?php } ?>

					<div class="showcase-meta<?php echo ( !$item->featuredImage ) ? ' showcase-meta-full' : '';?>">
						<h2 class="showcase-title">
							<a href="<?php echo EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $item->id . $menuItemId );?>"><?php echo $item->title;?></a>
						</h2>
						<p class="showcase-content">
							<?php
							$type	= $params->get( 'contentfrom' );

							if( !empty($item->$type ) )
							{
								echo JString::substr( strip_tags( $item->$type ) , 0 , $params->get( 'textlimit' , 200 ) ) . ' ...';
							}
							else
							{
								// Type is empty, get the appropriate contents.
								$type	= empty( $item->intro ) ? 'content' : 'intro';

								echo JString::substr( strip_tags( $item->$type ) , 0 , $params->get( 'textlimit' , 200 ) ) . ' ...';
							}
						?>
						</p>

						<?php if( $params->get( 'showreadmore' , true )){ ?>
						<div class="showcase-readmore">
							<a href="<?php echo EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id='.$item->id.$menuItemId); ?>"  class="showcase-button">
								<span><?php echo JText::_('MOD_SHOWCASE_READ_MORE'); ?></span>
							</a>
						</div>
						<?php } ?>

						<?php if( $params->get( 'showratings' , true )){ ?>
						<div class="showcase-blog-rating">
							<?php echo EasyBlogHelper::getHelper( 'ratings' )->getHTML( $item->id , EBLOG_RATINGS_TYPE_ENTRY , JText::_( 'MOD_SHOWCASE_RATE_BLOG_ENTRY') , 'mod-showcase-' . $item->id . '-ratings' , $disabled); ?>
						</div>
						<?php } ?>


						<!--SHOWCASE AUTHOR-->
						<div class="showcase-author">
							<?php if( $params->get( 'authoravatar', true )){ ?>
							<a href="<?php echo EasyBlogRouter::_('index.php?option=com_easyblog&view=blogger&layout=listings&id='.$item->created_by.$menuItemId);; ?>" class="mod-avatar">
								<img src="<?php echo $item->author->getAvatar(); ?>" width="50" height="50" class="avatar" />
							</a>
							<?php } ?>
							<div>
								<?php if( $params->get( 'contentauthor', true )){ ?>
								<?php echo JText::_('MOD_SHOWCASE_BY'); ?><a href="<?php echo EasyBlogRouter::_('index.php?option=com_easyblog&view=blogger&layout=listings&id='.$item->created_by.$menuItemId);; ?>"><?php echo $item->author->getName(); ?></a><br />
								<?php } ?>
								<?php if( $params->get( 'contentdate', true )){ ?>
								<div class="small"><?php echo $item->date; ?></div>
								<?php } ?>
							</div>
						</div>

					</div>
					<div class="clear"></div>
				</li>
			<?php
				$i++;
			}
			?>
			</ul>
		</div>
		<a href="<?php echo EasyBlogRouter::_('index.php?option=com_easyblog&view='.$posttype.$menuItemId); ?>" class="showcase-more"><?php echo JText::_('MOD_SHOWCASE_VIEW_MORE_'.$posttype);?></a>
		<div class="showcase-navi">
			<div class="showcase-a">
				<?php for( $i = 1; $i <= count( $entries ); $i++ ){ ?><a class="slider-navi-<?php echo $i;?> item<?php echo $i == 1 ? ' active' : '';?>" href="javascript:void(0);" data-slider="<?php echo $i;?>"><span><?php echo $i;?></span></a><?php } ?>
			</div>
		</div>
	</div>
</div>
