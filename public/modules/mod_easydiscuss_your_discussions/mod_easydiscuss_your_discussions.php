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

$path	= JPATH_ROOT . '/components/com_easydiscuss/helpers/helper.php';

jimport( 'joomla.filesystem.file' );

if( !JFile::exists( $path ) )
{
	return;
}

require_once( $path );
// require_once (dirname(__FILE__) . '/helper.php');
DiscussHelper::loadStylesheet("module", "mod_easydiscuss_your_discussions");

$my = JFactory::getUser();
$config = DiscussHelper::getConfig();

$profile		= DiscussHelper::getTable( 'Profile' );
$profile->load( $my->id );

$postsModel		= DiscussHelper::getModel( 'Posts' );

$count = $params->get( 'count', 5 );

$posts		= array();
$posts		= $postsModel->getPostsBy( 'user' , $profile->id, 'latest', '0', '', '', $count );
$posts		= DiscussHelper::formatPost( $posts );


if( !empty($posts) ){

	$posts = Discusshelper::getPostStatusAndTypes( $posts );

	// foreach( $posts as $post )
	// { 

	// 	// Translate post status from integer to string
	// 	switch( $post->post_status )
	// 	{
	// 		case '0':
	// 			$post->post_status = '';
	// 			break;
	// 		case '1':
	// 			$post->post_status = JText::_( 'COM_EASYDISCUSS_POST_STATUS_ON_HOLD' );
	// 			break;
	// 		case '2':
	// 			$post->post_status = JText::_( 'COM_EASYDISCUSS_POST_STATUS_ACCEPTED' );
	// 			break;
	// 		case '3':
	// 			$post->post_status = JText::_( 'COM_EASYDISCUSS_POST_STATUS_WORKING_ON' );
	// 			break;
	// 		case '4':
	// 			$post->post_status = JText::_( 'COM_EASYDISCUSS_POST_STATUS_REJECT' );
	// 			break;
	// 		default:
	// 			$post->post_status = '';
	// 			break;
	// 	}


		
	// 	$alias = $post->post_type;
	// 	$modelPostTypes = DiscussHelper::getModel( 'Post_types' );

	// 	// Get each post's post status title
	// 	$title = $modelPostTypes->getTitle( $alias );
	// 	$post->post_type = $title;

	// 	// Get each post's post status suffix
	// 	$suffix = $modelPostTypes->getSuffix( $alias );
	// 	$post->suffix = $suffix;
	// }
}

require( JModuleHelper::getLayoutPath( 'mod_easydiscuss_your_discussions' ) );



