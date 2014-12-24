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

$path	= JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'modules.php';

jimport( 'joomla.filesystem.file' );

if( !JFile::exists( $path ) )
{
	return;
}

$view 	= JRequest::getVar( 'view' );
$id 	= JRequest::getVar( 'id' );

// We do not want to display anything other than the entry view.
if( $view != 'entry' || !$id )
{
	return;
}

// @task: Include main helper file.
require_once( $path );

// @task: Include module's helper file.
require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helper.php' );

// @task: Render headers.
EasyBlogHelper::loadModuleCss();
EasyBlogHelper::loadHeaders();

// @task: Load component's language file.
JFactory::getLanguage()->load( 'com_easyblog' , JPATH_ROOT );
JFactory::getLanguage()->load( 'mod_easyblogrelatedpost' , JPATH_ROOT );

// Some custom properties that the user can define in the back end.
$my 		= JFactory::getUser();
$config		= EasyBlogHelper::getConfig();
$textcount 	= $params->get( 'textcount' , 200 );
$count		= $params->get( 'count' , 5 );
$posts 		= modRelatedPostHelper::getData( $params, $id, $count );

require( JModuleHelper::getLayoutPath( 'mod_easyblogrelatedpost' ) );

