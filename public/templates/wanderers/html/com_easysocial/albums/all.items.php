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
<?php if( !empty( $albums ) ){ ?>
		
	<?php foreach( $albums as $album ){ ?>
		<div class="col-md-6">
			<?php echo $lib->renderItem( array(
				'layout' => 'row',
				'view'	=> 'all',
				'album'	=> $album,
				'limit' => 6,
				'canUpload'    => false,
				'showToolbar'  => false,
				'showInfo'     => true,
				'showStats'    => true,
				'showPhotos'   => true,
				'showResponse' => false,
				'showTags'     => true,
				'showForm'     => false,
				'showLoadMore' => false,
				'showViewButton' => false,
				'photoItem'    => array(
					'showForm' => false,
					'showInfo' => false,
					'showStats' => false,
					'showToolbar' => false
				)
			)); ?>
		</div>
	<?php } ?>
		
<?php } ?>

<div class="mt-20 text-center es-pagination">
	<?php echo $pagination->getListFooter( 'site' );?>
</div>

<?php if( !$albums ){ ?>
<div class="content-hint no-albums-hint">
	<?php echo JText::_("COM_EASYSOCIAL_NO_ALBUM_AVAILABLE"); ?>

	<div>
		<a class="btn btn-es-primary btn-large" href="<?php echo FRoute::albums( array( 'layout' => 'form' , 'uid' => $this->my->id , 'type' => SOCIAL_TYPE_USER ) );?>"><?php echo JText::_( 'COM_EASYSOCIAL_ALBUMS_CREATE_ALBUM'); ?></a>
	</div>
</div>
<?php } ?>

<i class="loading-indicator fd-small"></i>

<?php echo $this->render( 'module' , 'es-albums-after-contents' ); ?>