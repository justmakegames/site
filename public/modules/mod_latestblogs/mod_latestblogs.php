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

$path	= JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php';
$path	= JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'modules.php';

jimport( 'joomla.filesystem.file' );

if( !JFile::exists( $path ) )
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


$my 				= JFactory::getUser();
$config         	= EasyBlogHelper::getConfig();
$textcount 			= $params->get( 'textcount' , 200 );
$filterType 		= $params->get( 'type' );

$teamId                 = '';
$posts              	= '';
$categoryTotalPostCnt   = 0;
$category               = null;
$tagTotalPostCnt   		= 0;
$tag                    = null;
$itemId                 = '';

switch($filterType)
{
	case '1' :
	    // by blogger
		$bloggerIds    = $params->get('bloggerlist','');

		if( empty($bloggerIds) )
		{
		    echo JText::_('MOD_LATESTBLOGS_SELECT_BLOGGER');
		    return;
		}


	    $posts = modLatestBlogsHelper::getPostByBlogger($params);
	    break;
	case '2' :
		// by category
		$categoryId    = $params->get('cid','');

		if(empty($categoryId))
		{
		    echo JText::_('MOD_LATESTBLOGS_SELECT_CATEGORY');
		    return;
		}

		$category		= EasyBlogHelper::getTable( 'Category', 'Table' );
		$category->load($categoryId);

	    if($category->private != '0' && $my->id == 0)
	    {
	        $privacy = $category->checkPrivacy();
	        if(! $privacy->allowed )
	        {
		        echo JText::_('MOD_LATESTBLOGS_CATEGORY_IS_CURRENTLY_SET_TO_PRIVATE');
				return;
			}
	    }

		$catIds     = array();
		$catIds[]   = $category->id;

		if( $params->get( 'includesubcategory', 0 ) )
		{
			$category->childs = null;
			EasyBlogHelper::buildNestedCategories($category->id, $category , false , true );
			EasyBlogHelper::accessNestedCategoriesId($category, $catIds);
		}

		$posts = modLatestBlogsHelper::getLatestPost($params, $catIds, 'category');
		if( count( $posts ) > 0 && $params->get('showccount',''))
		{
		    $categoryTotalPostCnt   = modLatestBlogsHelper::getCategoryTotalPost( $catIds );
		}

	    break;
	case '3' :

	    $tagId  = $params->get('tagid','');

		if(empty($tagId))
		{
		    echo JText::_('MOD_LATESTBLOGS_SELECT_TAG');
		    return;
		}

		$tag		= EasyBlogHelper::getTable( 'Tag' , 'Table' );
		$tag->load( $tagId );

		$posts   = modLatestBlogsHelper::getLatestPost($params, $tagId, 'tag');

		if( count( $posts ) > 0 && $params->get('showtcount','') )
		{
		    $tagTotalPostCnt   = $tag->getPostCount();
		}

		// by tag
	    break;
	case '4':
		$teamId	= $params->get( 'tid' );

		if(empty($teamId))
		{
		    echo JText::_('MOD_LATESTBLOGS_SELECT_TEAM');
		    return;
		}

		$team		= EasyBlogHelper::getTable( 'Teamblog', 'Table' );
		$team->load($teamId);

		$gid				= EasyBlogHelper::getUserGids();
		$isMember   		= $team->isMember($my->id, $gid);
		$team->isMember    	= $isMember;

		if($team->access == '1' && empty($team->isMember))
		{
			$posts = array();
		}
		else
		{
			$posts	= modLatestBlogsHelper::getLatestPost( $params , $teamId , 'team' );
		}

		break;
	case '5':

		// Dynamic loading of author.
		$view 	= JRequest::getVar( 'view' );

		if( $view != 'entry' )
		{
			return;
		}

		$id 	= JRequest::getInt( 'id' );
		$blog 	= EasyBlogHelper::getTable( 'Blog' );
		$blog->load( $id );

	    if( !$blog->created_by )
	    {
	    	return;
	    }

	    $posts = modLatestBlogsHelper::getPostByBlogger( $params , modLatestBlogsHelper::_getBloggers( $params , $blog->created_by ) );

		break;
	case '0' :
	default:
	    // by latest
		$posts = modLatestBlogsHelper::getLatestPost($params);
	    break;
}

require( JModuleHelper::getLayoutPath( 'mod_latestblogs' ) );

