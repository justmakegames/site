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
<?php echo $comment; ?><?php if( $readmore ){ ?><span data-es-comment-balance style="display: none;"><?php echo $balance;?></span><span data-es-comment-readmore-<?php echo $uid;?> data-es-comment-readmore>&nbsp;<a href="javascript:void(0);" data-es-comment-readmore><?php echo JText::_( 'COM_EASYSOCIAL_MORE_LINK' ); ?></a></span><?php } ?>