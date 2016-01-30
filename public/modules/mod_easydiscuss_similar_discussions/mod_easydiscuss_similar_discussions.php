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

require_once JPATH_ROOT . '/components/com_easydiscuss/helpers/helper.php';
require_once JPATH_ROOT. '/components/com_easydiscuss/helpers/parser.php';
require_once dirname( __FILE__ ) . '/helper.php';
DiscussHelper::getHelper( 'string' );


$view 	= JRequest::getVar( 'view', '');
$postId = JRequest::getVar( 'id', '');

if( $view != 'post' || empty( $postId ) )
{
	return;
}

JFactory::getLanguage()->load( 'com_easydiscuss' , JPATH_ROOT );

$itemid		= DiscussRouter::getItemId('post');
$posts		= modEasyDiscussSimilarDiscussionsHelper::getSimilarPosts( $postId, $params );

$document	= JFactory::getDocument();
DiscussHelper::loadStylesheet("module", "mod_easydiscuss_similar_discussions");

require( JModuleHelper::getLayoutPath( 'mod_easydiscuss_similar_discussions' ) );
