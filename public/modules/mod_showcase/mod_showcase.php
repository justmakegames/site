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
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.filesystem.file' );
$path	= JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'constants.php';

if( !JFile::exists( $path ) )
{
	return;
}

// Include constants
require_once( $path );
require_once( EBLOG_HELPERS . DIRECTORY_SEPARATOR . 'helper.php' );
require_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helper.php');
require_once(JPATH_ROOT . '/components/com_easyblog/router.php');

EasyBlogHelper::loadHeaders();
JTable::addIncludePath( EBLOG_TABLES );
$document	= JFactory::getDocument();
$document->addStyleSheet( rtrim(JURI::root(), '/') . '/components/com_easyblog/assets/css/module.css' );
$config		= EasyBlogHelper::getConfig();
$posttype = $params->get( 'showposttype' , 'featured' );

$model 	= EasyBlogHelper::getModel( 'Blog' );

if($posttype == 'latest')
{
	if( $params->get( 'catid' ) )
	{
		$categories	= explode( ',' , $params->get( 'catid' ) );

	    $entries	= $model->getBlogsBy( 'category', $categories , 'latest' , $params->get( 'count' ) , EBLOG_FILTER_PUBLISHED, null, true, array(), false, false, false, array(), array(), null, null, false );
	}
	else
	{
	    $entries	= $model->getBlogsBy( '', '', 'latest' , $params->get( 'count' ) , EBLOG_FILTER_PUBLISHED, null, true, array(), false, false, false, array(), array(), null, null, false);
	}
}
else
{
	$category	= explode( ',' , $params->get( 'catid' ) );
	if( $params->get( 'catid' ) == '0' )
	{
		$category	= '';
	}

	$entries	= $model->getFeaturedBlog( $category );
}

// If there's nothing to show at all, don't even display a box.
if( !$entries )
{
	return;
}

$items	= array();

for( $i = 0; $i < count( $entries ); $i++ )
{
	$row		= EasyBlogHelper::getTable( 'Blog' );
	$row->bind( $entries[ $i ] );

	$row->featuredImage	= EasyBlogHelper::getFeaturedImage( $row->intro . $row->content );

	// @rule: Process videos
	$row->intro			= EasyBlogHelper::getHelper( 'Videos' )->strip( $row->intro );
	$row->content		= EasyBlogHelper::getHelper( 'Videos' )->strip( $row->content );

	// @rule: Remove gallery codes
	$row->intro			= EasyBlogHelper::getHelper( 'Gallery' )->strip( $row->intro);
	$row->content		= EasyBlogHelper::getHelper( 'Gallery' )->strip( $row->content);

	// Process jomsocial albums
	$row->intro			= EasyBlogHelper::getHelper( 'Album' )->strip( $row->intro );
	$row->content		= EasyBlogHelper::getHelper( 'Album' )->strip( $row->content );

	//remove zemanta tags
	$row->intro			= EasyBlogHelper::removeZemantaTags( $row->intro );
	$row->content		= EasyBlogHelper::removeZemantaTags( $row->content );

	// Remove adsense codes
	require_once( EBLOG_CLASSES . DIRECTORY_SEPARATOR . 'adsense.php' );
	$row->intro			= EasyBlogGoogleAdsense::stripAdsenseCode( $row->intro );
	$row->content		= EasyBlogGoogleAdsense::stripAdsenseCode( $row->content );

	JTable::addIncludePath( EBLOG_TABLES );
	$author 			= EasyBlogHelper::getTable( 'Profile', 'Table' );
	$author->load( $row->created_by );

	$row->author		= $author;
	$row->date			= EasyBlogDateHelper::toFormat( EasyBlogHelper::getDate( $row->created ) , $config->get('layout_dateformat', '%A, %d %B %Y') );

	$items[]			= $row;
}

// If needed, shuffle the entries
if( $params->get( 'autoshuffle' ) )
{
	shuffle( $items );
}

// Should we display the ratings.
$disabled 	= $params->get( 'enableratings' ) ? false : true;

$contentKey	= $params->get( 'contentfrom' , 'content' );

require( JModuleHelper::getLayoutPath( 'mod_showcase' ) );
