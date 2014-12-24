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

require_once(JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'tags.php');
require_once(JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php');

jimport('joomla.system.file');
jimport('joomla.system.folder');

class modRelatedPostHelper
{
	public static function getData( &$params , $id, $count = 0 )
	{
		$model 		= EasyBlogHelper::getModel( 'Blog' );
		$entries	= $model->getRelatedBlog( $id, $count );
		$entries 	= self::processItems( $entries , $params );

		return $entries;
	}

	function _getMenuItemId( $post, &$params)
	{
		$itemId                 = '';
		$routeTypeCategory		= false;
		$routeTypeBlogger		= false;
		$routeTypeTag			= false;

		$routingType            = $params->get( 'routingtype', 'default' );

		if( $routingType != 'default' )
		{
			switch ($routingType)
			{
				case 'menuitem':
					$itemId					= $params->get( 'menuitemid' ) ? '&Itemid=' . $params->get( 'menuitemid' ) : '';
					break;
				case 'category':
					$routeTypeCategory  = true;
					break;
				case 'blogger':
					$routeTypeBlogger  = true;
					break;
				case 'tag':
					$routeTypeTag  = true;
					break;
				default:
					break;
			}
		}

		if( $routeTypeCategory )
		{
			$xid    = EasyBlogRouter::getItemIdByCategories( $post->category_id );
		}
		else if($routeTypeBlogger)
		{
			$xid    = EasyBlogRouter::getItemIdByBlogger( $post->created_by );
		}
		else if($routeTypeTag)
		{
			$tags	= modRelatedPostHelper::_getPostTagIds( $post->id );
			if( $tags !== false )
			{
				foreach( $tags as $tag )
				{
					$xid    = EasyBlogRouter::getItemIdByTag( $tag );
					if( $xid !== false )
						break;
				}
			}
		}

		if( !empty( $xid ) )
		{
			// lets do it, do it, do it, lets override the item id!
			$itemId = '&Itemid=' . $xid;
		}

		return $itemId;
	}

	function _getPostTagIds( $postId )
	{
		static $tags	= null;

		if( ! isset($tags[$postId]) )
		{
			$db = EasyBlogHelper::db();

			$query  = 'select `tag_id` from `#__easyblog_post_tag` where `post_id` = ' . $db->Quote($postId);
			$db->setQuery($query);

			$result = $db->loadResultArray();

			if( count($result) <= 0 )
				$tags[$postId] = false;
			else
				$tags[$postId] = $result;

		}

		return $tags[$postId];
	}

	public static function processItems( $posts, &$params )
	{
	    $config			= EasyBlogHelper::getConfig();

		$result         = array();

		for($i = 0; $i < count($posts); $i++ )
		{
			$data 	=& $posts[$i];
			$row 	= EasyBlogHelper::getTable( 'Blog', 'Table' );
			$row->bind( $data );

			// @rule: Before anything get's processed we need to format all the microblog posts first.
			if( !empty( $row->source ) )
			{
				EasyBlogHelper::formatMicroblog( $row );
			}

			$row->commentCount 	= EasyBlogHelper::getCommentCount($row->id);

			JTable::addIncludePath( EBLOG_TABLES );
			$author 			= EasyBlogHelper::getTable( 'Profile', 'Table' );
			$row->author		= $author->load( $row->created_by );
			$row->date			= EasyBlogDateHelper::toFormat( EasyBlogHelper::getDate( $row->created ) , $params->get( 'dateformat' , '%d %B %Y' ) );

			$requireVerification = false;
			if($config->get('main_password_protect', true) && !empty($row->blogpassword))
			{
				$row->title	= JText::sprintf('COM_EASYBLOG_PASSWORD_PROTECTED_BLOG_TITLE', $row->title);
				$requireVerification = true;
			}


			$row->media = '';
			$isImage    = $row->getImage();
			if( empty( $row->source ) && empty( $isImage ) )
			{
				$size   = '';
				$photoWSize  = $params->get('photo_width', 0);
				$photoHSize  = $params->get('photo_height', 0);

				if( !empty( $photoWSize ) && !empty( $photoHSize ) )
					$size       = array('width' => $photoWSize, 'height' => $photoHSize );

				$row->media = EasyBlogModulesHelper::getMedia( $row , $params, $size );
			}

			if($requireVerification && !EasyBlogHelper::verifyBlogPassword($row->blogpassword, $row->id))
			{
				$itemId			= modRelatedPostHelper::_getMenuItemId($row, $params);

				$theme = new CodeThemes();
				$theme->set('id', $row->id);
				$theme->set('return', base64_encode(EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id='.$row->id . $itemId ) ) );
				$row->intro			= $theme->fetch( 'blog.protected.php' );
				$row->content		= $row->intro;
				$row->showRating	= false;
				$row->protect		= true;
			}
			else
			{
				$row->intro			= EasyBlogHelper::getHelper( 'Videos' )->strip( $row->intro);
				$row->content		= EasyBlogHelper::getHelper( 'Videos' )->strip( $row->content);

				$row->intro			= EasyBlogHelper::getHelper( 'Gallery' )->strip( $row->intro);
				$row->content		= EasyBlogHelper::getHelper( 'Gallery' )->strip( $row->content);

				// Process jomsocial albums
				$row->intro			= EasyBlogHelper::getHelper( 'Album' )->strip( $row->intro );
				$row->content		= EasyBlogHelper::getHelper( 'Album' )->strip( $row->content );

				// @rule: Process audio files.
				$row->intro			= EasyBlogHelper::getHelper( 'Audio' )->strip( $row->intro );
				$row->content		= EasyBlogHelper::getHelper( 'Audio' )->strip( $row->content );


				$row->showRating	= true;
				$row->protect		= false;
			}

			if( $params->get( 'striptags') )
			{
				$row->intro			= strip_tags( $row->intro );
				$row->content		= strip_tags( $row->content );
			}

			// Determine what content to use
			$summary	= '';

			if( $params->get( 'showintro' ) == '0' && !empty( $row->intro ) )
			{
				$summary	= $row->intro;
			}
			else
			{
				$summary	= $row->content;

				// Module might configure the contents to be read from the main content. If the content has no read more,
				// we need to be intelligent enough to get from the intro.
				if( empty( $summary ) )
				{
					$summary	= $row->intro;
				}
			}

			if( $params->get( 'textcount') != 0 && JString::strlen( strip_tags( $summary ) ) > $params->get( 'textcount' ) )
			{
				$row->summary	= JString::substr( strip_tags( $summary ) , 0 , $params->get( 'textcount' ) ) . '...';
			}
			else
			{
				$row->summary	= $summary;
			}

			$result[]   = $row;
		}

		return $result;
	}
}
