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
<?php if( $this->my->id != $currentUser->id ){ ?>
	<!-- Include cover section -->
	<?php echo $this->loadTemplate( 'site/profile/mini.header' , array( 'user' => $currentUser ) ); ?>
<?php } ?>

<div class="es-followers" data-followers>
	<div class="row">
		<a href="javascript:void(0);" class="btn btn-block btn-es-inverse btn-sidebar-toggle" data-sidebar-toggle>
			<i class="ies-grid-view ies-small mr-5"></i> 
			<?php echo JText::_( 'COM_EASYSOCIAL_SIDEBAR_TOGGLE' );?>
		</a>
		<div class="col-md-3" data-sidebar>
			<?php echo $this->render( 'module' , 'es-followers-sidebar-top' ); ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<b><?php echo JText::_( 'COM_EASYSOCIAL_FOLLOWERS_SIDEBAR_TITLE' );?></b>
				</div>

				<div class="panel-body">
					<ul class="panel-menu">
						<li class="follower-filter<?php echo $active == 'followers' ? ' active' : '';?>"
							data-followers-filter
							data-followers-filter-type="followers"
							data-followers-filter-title="<?php echo JText::_( 'COM_EASYSOCIAL_PAGE_TITLE_FOLLOWERS' );?>"
							data-followers-filter-id="<?php echo $user->id;?>"
							data-followers-filter-url="<?php echo $filterFollowers;?>"
						>
							<a href="javascript:void(0);">
								<?php echo JText::_( 'COM_EASYSOCIAL_FOLLOWERS_FOLLOWERS' );?>
								<b data-followers-count><?php echo $totalFollowers;?></b>
							</a>
						</li>

						<li class="follower-filter<?php echo $active == 'following' ? ' active' : '';?>"
							data-followers-filter
							data-followers-filter-type="following"
							data-followers-filter-title="<?php echo JText::_( 'COM_EASYSOCIAL_PAGE_TITLE_FOLLOWING' );?>"
							data-followers-filter-id="<?php echo $user->id;?>"
							data-followers-filter-url="<?php echo $filterFollowing;?>"
						>
							<a href="javascript:void(0);" class="<?php echo $active == 'following' ? ' active' : '';?>">
								<?php echo JText::_( 'COM_EASYSOCIAL_FOLLOWERS_FOLLOWING' );?>
								<b data-following-count><?php echo $totalFollowing;?></b>
							</a>
						</li>

					</ul>
				</div>
			</div>

			<?php echo $this->render( 'module' , 'es-followers-sidebar-bottom' ); ?>
		</div>

		<div class="col-md-9">
			<?php echo $this->render( 'module' , 'es-followers-before-contents' ); ?>
			<?php echo $this->loadTemplate( 'site/followers/default.items' , array( 'active' => $active ,  'users' => $users , 'currentUser' => $currentUser ) ); ?>
			<?php echo $this->render( 'module' , 'es-followers-after-contents' ); ?>
		</div>
	</div>
</div>
