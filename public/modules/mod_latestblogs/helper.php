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

require_once( JPATH_ROOT . '/components/com_easyblog/models/tags.php' );
require_once( JPATH_ROOT . '/components/com_easyblog/helpers/helper.php' );
require_once(EBLOG_CLASSES . '/easysimpleimage.php' );
require_once( EBLOG_HELPERS . '/date.php' );

jimport('joomla.system.file');
jimport('joomla.system.folder');

class modLatestBlogsHelper
{
	public static function getPostByBlogger( &$params , $bloggers = array() )
	{
		$db 			= EasyBlogHelper::db();
		$config			= EasyBlogHelper::getConfig();

		if( empty( $bloggers ) || !$bloggers )
		{
			$bloggers		= modLatestBlogsHelper::_getBloggers($params);
		}

		if(! empty($bloggers))
		{
		    for($i = 0; $i < count($bloggers); $i++)
		    {
		        $row    	=& $bloggers[$i];

		        $bloggerId  = $row->id;

			    $profile		= EasyBlogHelper::getTable( 'Profile', 'Table' );
				$row->details   =& $profile->load($row->id);

				if($row->postcount > 0)
				{
					$row->posts = modLatestBlogsHelper::getLatestPost($params, $bloggerId, 'blogger');
				}
				else
				{
		            $row->posts = array();
				}

		    }//end foreach
		}

		return $bloggers;
	}

	public static function getLatestPost(&$params, $id = null, $type = 'latest')
	{
		$db 			= EasyBlogHelper::db();
		$config			= EasyBlogHelper::getConfig();
		$count			= (int) $params->get( 'count' , 0 );

		$model 			= EasyBlogHelper::getModel( 'Blog' );

		$posts  = '';

		$sort 	= $params->get( 'sortby' , 'latest' ) == 'latest' ? 'latest' : 'modified';

		switch( $type )
		{
		    case 'blogger':
		    	$posts = $model->getBlogsBy('blogger', $id, $sort , $count , EBLOG_FILTER_PUBLISHED, null, false);
		    	break;
		    case 'category':
		    	$posts = $model->getBlogsBy('category', $id, $sort , $count , EBLOG_FILTER_PUBLISHED, null, false);
		    	break;
		    case 'tag':
		    	$posts	= $model->getTaggedBlogs( $id, $count );
		    	break;
		    case 'team':
		    	$posts	= $model->getBlogsBy( 'teamblog' , $id , $sort , $count , EBLOG_FILTER_PUBLISHED , null , false );
		    	break;
		    case 'latest':
		    default:
				if( $params->get( 'usefeatured' ) )
				{
					$posts = $model->getFeaturedBlog( array() , $count );
				}
				else
				{
					$categories	= EasyBlogHelper::getCategoryInclusion( $params->get( 'catid' ) );
					$catIds     = array();

					if( !empty( $categories ) )
					{
						if( !is_array( $categories ) )
						{
							$categories	= array($categories);
						}

						foreach($categories as $item)
						{
							$category   = new stdClass();
							$category->id   = trim( $item );

							$catIds[]   = $category->id;

							if( $params->get( 'includesubcategory', 0 ) )
							{
								$category->childs = null;
								EasyBlogHelper::buildNestedCategories($category->id, $category , false , true );
								EasyBlogHelper::accessNestedCategoriesId($category, $catIds);
							}
						}

						$catIds     = array_unique( $catIds );
					}

					$cid		= $catIds;

					if( !empty( $cid ) )
					{
						$type 	= 'category';
					}

					$posts		= $model->getBlogsBy( $type , $cid , 'latest' , $count , EBLOG_FILTER_PUBLISHED, null, false , array() , false , false , true , array() , $cid );
				}
				break;
		}

		if(count($posts) > 0)
		{
            $posts  = modLatestBlogsHelper::_processItems( $posts, $params );
		}

		return $posts;
	}

	public static function _getMenuItemId( $post, &$params)
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
			$tags	= modLatestBlogsHelper::_getPostTagIds( $post->id );
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

	public static function _getPostTagIds( $postId )
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

	public static function _processItems( $posts, &$params )
	{
	    $config			= EasyBlogHelper::getConfig();
		$app			= JFactory::getApplication();
		$appParams		= $app->getParams('com_easyblog');
		$limitstart		= JRequest::getVar('limitstart', 0, '', 'int');

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
			$author->load( $row->created_by );
			$row->author		= $author;
			$row->date			= EasyBlogDateHelper::toFormat( EasyBlogDateHelper::getDate($row->created) , $params->get( 'dateformat' , '%d %B %Y' ) );

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
				$itemId			= modLatestBlogsHelper::_getMenuItemId($row, $params);

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

			// // @trigger: onPrepareContent / onContentPrepare
			$row->text 			= ( $params->get( 'showintro' ) == '0' && !empty( $row->intro ) ) ? $row->intro : $row->content;
			EasyBlogHelper::triggerEvent( 'prepareContent' , $row , $appParams , $limitstart );
			if( $params->get( 'showintro' ) == '0' && !empty( $row->intro ) )
			{
				$row->intro	  = $row->text;
			}
			else
			{
				$row->content = $row->text;
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

	public static function _getBloggers( &$params , $bloggerList = '' )
	{
		$mainframe	= JFactory::getApplication();
		$db         = EasyBlogHelper::db();

		$my 		= JFactory::getUser();

		$bloggerListType    = $params->get('bloggerlisttype','');

		if( empty( $bloggerList ) || !$bloggerList )
		{
			$bloggerList    = $params->get('bloggerlist','');
		}

		$bloggers       = explode(',', $bloggerList);
		$arrBloggers    = '';

		for($i = 0; $i < count($bloggers); $i++)
		{
		    $blogger    = $bloggers[$i];
		    $blogger 	= trim($blogger);

		    if(is_numeric($blogger))
		    {
		        $arrBloggers[]  = $blogger;
		    }
		}

		$exQuery    = '';
		if($bloggerListType=='include')
		{
			if(count($arrBloggers) <= 1)
			{
			    $exQuery	= ' where a.id = ' . $db->Quote($arrBloggers[0]);
			}
			else
			{
			    $exQuery	= ' where a.id NOT IN (' . implode(',', $arrBloggers) . ')';
			}
		}else
		{
			if(count($arrBloggers) <= 1)
			{
			    $exQuery	= ' where a.id <> ' . $db->Quote($arrBloggers[0]);
			}
			else
			{
			    $exQuery	= ' where a.id NOT IN (' . implode(',', $arrBloggers) . ')';
			}
		}



		$query	= 'select a.`id`, count(c.`id`) as `postcount`';
		$query	.= ' from `#__easyblog_users` as a';
		$query	.= '   inner join `#__users` as b';
		$query	.= '     on a.`id` = b.`id`';
		$query	.= '   left join `#__easyblog_post` as c';
		$query	.= '     on c.`created_by` = a.`id`';
		$query	.= '     and c.`published` = ' . $db->Quote('1');
		$query	.= '     and c.`issitewide` = ' . $db->Quote('1');
		if(empty($my->id))
			$query	.= '     and c.`private` = ' . $db->Quote('0');
		$query	.= $exQuery;
		$query	.= ' group by a.`id`';

		$db->setQuery($query);
		$result = $db->loadObjectList();

		return $result;
	}

    public static function getCategoryTotalPost( $categoryId )
    {
		if( !class_exists( 'EasyBlogModelCategory' ) )
		{
			jimport( 'joomla.application.component.model' );
			JLoader::import( 'category' , EBLOG_ROOT . DIRECTORY_SEPARATOR . 'models' );
		}

		$model 	= EasyBlogHelper::getModel( 'Category' );
		$total = $model->getTotalPostCount( $categoryId );

		return $total;
    }
}
