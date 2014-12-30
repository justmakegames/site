<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

Foundry::import( 'admin:/includes/apps/apps' );

/**
 * Friends application for EasySocial.
 *
 * @since	1.0
 * @author	Mark Lee <mark@stackideas.com>
 */
class SocialUserAppBlog extends SocialAppItem
{
	/**
	 * Class constructor.
	 *
	 * @since	1.0
	 * @access	public
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function exists()
	{
		$file 	= JPATH_ROOT . '/components/com_easyblog/helpers/helper.php';

		if( !JFile::exists( $file ) )
		{
			return false;
		}

		require_once( $file );
		require_once(JPATH_ROOT . '/components/com_easyblog/router.php');

		return true;
	}

	public function onIndexerReIndex( &$itemCount )
	{
		if( $this->exists() === false )
		{
			return;
		}


		static $rowCount = null;

		$db 		= Foundry::db();
		$sql 		= $db->sql();

		$indexer 	= Foundry::get( 'Indexer', 'com_easyblog' );
		$ebConfig 	= EasyBlogHelper::getConfig();
		$limit 		= 5;

		if( is_null( $rowCount ) )
		{
			$query = 'select count(1) from `#__easyblog_post` as a';
			$query .= ' where not exists ( select b.`uid` from `#__social_indexer` as b where a.`id` = b.`uid` and b.`utype` = ' . $db->Quote( 'blog' ) . ')';
			$query .= ' and a.`published` = ' . $db->Quote('1');

			$sql->raw( $query );
			$db->setQuery( $sql );

			$rowCount = $db->loadResult();
		}

		$itemCount = $itemCount + $rowCount;

		if( $rowCount )
		{
			$query = 'select * from #__easyblog_post as a';
			$query .= ' where not exists ( select b.`uid` from #__social_indexer as b where a.`id` = b.`uid` and b.`utype` = ' . $db->Quote( 'blog' ) . ')';
			$query .= ' and a.published = ' . $db->Quote('1');
			$query .= ' order by a.`id` limit ' . $limit;


			$sql->raw( $query );
			$db->setQuery( $sql );

			$rows = $db->loadObjectList();


			foreach( $rows as $row )
			{

				$blog 	= EasyBlogHelper::getTable( 'Blog' );
				$blog->bind( $row );


				$template 	= $indexer->getTemplate();

				// getting the blog content
				$content 	= $blog->intro . $blog->content;


				$image 		= '';

				// @rule: Try to get the blog image.
				if( $blog->getImage() )
				{
					$image 	= $blog->getImage()->getSource( 'thumbnail' );
				}

				if( empty( $image ) )
				{
					// @rule: Match images from blog post
					$pattern	= '/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'\s>]*)/i';
					preg_match( $pattern , $content , $matches );

					$image		= '';

					if( $matches )
					{
						$image		= isset( $matches[1] ) ? $matches[1] : '';

						if( JString::stristr( $matches[1], 'https://' ) === false && JString::stristr( $matches[1], 'http://' ) === false && !empty( $image ) )
						{
							$image	= rtrim(JURI::root(), '/') . '/' . ltrim( $image, '/');
						}
					}
				}

				if(! $image )
				{
					$image = rtrim( JURI::root() , '/' ) . '/components/com_easyblog/assets/images/default_facebook.png';
				}

				// @task: Strip out video tags
				$content		= EasyBlogHelper::getHelper( 'Videos' )->strip( $content );

				// @task: Strip out audio tags
				$content		= EasyBlogHelper::getHelper( 'Audio' )->strip( $content );

				// @task: Strip out gallery tags
				$content		= EasyBlogHelper::getHelper( 'Gallery' )->strip( $content );

				// @task: Strip out album tags
				$content		= EasyBlogHelper::getHelper( 'Album' )->strip( $content );

				// @rule: Once the gallery is already processed above, we will need to strip out the gallery contents since it may contain some unwanted codes
				// @2.0: <input class="easyblog-gallery"
				// @3.5: {ebgallery:'name'}
				$content		= EasyBlogHelper::removeGallery( $content );

				// remove all html tags.
				$content    = strip_tags( $content );

				if( JString::strlen( $content ) > $ebConfig->get( 'integrations_easysocial_indexer_newpost_length', 250 ) )
				{
					$content = JString::substr( $content, 0, $ebConfig->get( 'integrations_easysocial_indexer_newpost_length', 250 ) );
				}

				// lets include the title as the search snapshot.
				$content = $blog->title . ' ' . $content;
				$template->setContent( $blog->title, $content );

				$url = EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id='.$blog->id);

				if( $url )
				{
					$url 	= '/' . ltrim( $url , '/' );
					$url 	= str_replace('/administrator/', '/', $url );
				}

				$template->setSource($blog->id, 'blog', $blog->created_by, $url);

				$template->setThumbnail( $image );

				$template->setLastUpdate( $blog->modified );

				$indexer->index( $template );

			}
		}

	}

	/**
	 * Responsible to return the favicon object
	 *
	 * @since	1.2
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function getFavIcon()
	{
		$obj 			= new stdClass();
		$obj->color		= '#FFDB77';
		$obj->icon 		= 'ies-pencil-2';
		$obj->label 	= 'APP_USER_BLOG_STREAM_TOOLTIP';

		return $obj;
	}

	/**
	 * Renders the notification item in EasySocial
	 *
	 * @since	1.2
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function onNotificationLoad( $item )
	{
		if( $item->type != 'blog' )
		{
			return;
		}

		if( !$this->exists() )
		{
			$item->title 	= '';
			return;
		}

		// Set the title of the notification
		if( $item->cmd == 'blog.create' )
		{
			// Load up the blog object
			$blog 		= EasyBlogHelper::getTable( 'Blog' );
			$blog->load( $item->uid );

			$actor 		= Foundry::user( $item->actor_id );
			$image 		= $blog->getImage() ? $blog->getImage()->getSource( 'thumbnail' ) : '';

			$item->title 	= JText::sprintf( 'APP_USER_BLOG_NOTIFICATION_CREATED' , $actor->getName() );
			$item->content 	= $blog->title;
			$item->image 	= $image;

			return $item;
		}

		// Set the title of the notification
		if( $item->cmd == 'blog.likes' )
		{
			// Load up the blog object
			$blog 		= EasyBlogHelper::getTable( 'Blog' );
			$blog->load( $item->uid );

			$actor 		= Foundry::user( $item->actor_id );
			$image 		= $blog->getImage() ? $blog->getImage()->getSource( 'thumbnail' ) : '';

			$item->title 	= JText::sprintf( 'APP_USER_BLOG_NOTIFICATION_LIKE_POST' , $actor->getName() );
			$item->content 	= $blog->title;
			$item->image 	= $image;

			return $item;
		}

		// Set the title of the notification
		if( $item->cmd == 'blog.comment' )
		{
			// Load up the blog object
			$blog 		= EasyBlogHelper::getTable( 'Blog' );
			$blog->load( $item->uid );

			$actor 		= Foundry::user( $item->actor_id );
			$image 		= $blog->getImage() ? $blog->getImage()->getSource( 'thumbnail' ) : '';

			$item->title 	= JText::sprintf( 'APP_USER_BLOG_NOTIFICATION_COMMENT_POST' , $actor->getName() );
			$item->content 	= $blog->title;
			$item->image 	= $image;

			return $item;
		}

	}

	/**
	 * Prepares the stream item
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialStreamItem	The stream object.
	 * @param	bool				Determines if we should respect the privacy
	 */
	public function onPrepareStream( SocialStreamItem &$item, $includePrivacy = true )
	{
		if( $item->context != 'blog' )
		{
			return;
		}

		if( $this->exists() === false )
		{
			return;
		}

		// Attach our own stylesheet
		$this->getApp()->loadCss();

		$element	= $item->context;
		$uid     	= $item->contextId;

		// Get current logged in user.
		$my         = Foundry::user();

		// Get user's privacy.
		$privacy 	= Foundry::privacy( $my->id );

		if( $includePrivacy )
		{
			// Determine if the user can view this current context
			if( !$privacy->validate( 'easyblog.blog.view' , $uid, $element , $item->actor->id ) )
			{
				return;
			}
		}

		// Define standard stream looks
		$item->display 	= SOCIAL_STREAM_DISPLAY_FULL;
		$item->color 	= '#FFDB77';
		$item->fonticon	= 'ies-pencil-2';
		$item->label 	= JText::_('APP_USER_BLOG_STREAM_TOOLTIP');

		// New blog post
		if( $item->verb == 'create' )
		{
			$this->prepareNewBlogStream( $item );
		}

		// Updated blog post
		if( $item->verb == 'update' )
		{
			$this->prepareUpdateBlogStream( $item );
		}

		// New comment
		if( $item->verb == 'create.comment' )
		{
			$this->prepareNewCommentStream( $item );
		}

		// Featured posts
		if( $item->verb == 'featured' )
		{
			$this->prepareFeaturedBlogStream( $item );
		}


		if( $includePrivacy )
		{
			$item->privacy 	= $privacy->form( $uid, $element, $item->actor->id, 'easyblog.blog.view' );
		}

		// it seems like some post the content might cause the xhtml format to failed when pass to fb sharer.
		// To be safe, just use normal html format.
		$sharing = Foundry::get( 'Sharing', array( 'url' => FRoute::stream( array( 'layout' => 'item', 'id' => $item->uid, 'external' => true) ), 'display' => 'dialog', 'text' => JText::_( 'COM_EASYSOCIAL_STREAM_SOCIAL' ) , 'css' => 'fd-small' ) );
		$item->sharing = $sharing;

	}

	private function formatBlogContent($blog) 
	{
		$content = '';

		$config = EasyBlogHelper::getConfig();
		$source = $config->get('integrations_easysocial_stream_newpost_source' , 'intro');

		// @rule: Before anything get's processed we need to format all the microblog posts first.
		if(!empty($blog->source))
		{
			EasyBlogHelper::formatMicroBlog($blog);
		}

		$content = '';
		if ($source == 'intro') {
			$content = isset($blog->intro) && !empty($blog->intro) ? $blog->intro : $blog->content;
		} else {
			$content = isset($blog->content) && !empty($blog->content) ? $blog->content : $blog->intro;
		}

		// if still empty when reach this point, means someting very wrong.
		// Just get all intro and content.
		if (!$content){
			$content = $blog->intro . $blog->content;
		}

		$content = $this->truncateContent($content);

		return $content;
	}	

	private function prepareFeaturedBlogStream( &$item )
	{
		$blog 	= EasyBlogHelper::getTable( 'Blog' );
		$blog->load( $item->contextId );

		// Format the likes for the stream
		$likes 			= Foundry::likes();
		$likes->get($item->contextId, 'blog', 'featured' );
		$item->likes	= $likes;

		//$url 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $blog->id );
		$url 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $blog->id, true, null, false, true );

		$comments			= Foundry::comments( $item->contextId , 'blog', 'featured', SOCIAL_APPS_GROUP_USER , array( 'url' => $url ) );
		$item->comments 	= $comments;

		$date 	= EasyBlogHelper::getDate( $blog->created );

		//formatting content
		$content 	= $this->formatBlogContent($blog);

		$appParams	= $this->getParams();
		$alignment 	= 'pull-' . $appParams->get( 'imagealignment', 'right' );
		$this->set( 'alignment'		, $alignment );


		// See if there's any audio files to process.
		$audios 	= EasyBlogHelper::getHelper( 'Audio' )->getHTMLArray( $content );

		// Get videos attached in the content
		$video		= $this->getVideo( $content );

		// Remove videos from the source
		$content 	= EasyBlogHelper::getHelper( 'Videos' )->strip( $content );

		// Remove audios from the content
		$content	= EasyBlogHelper::getHelper( 'Audio' )->strip( $content );

		$this->set( 'video'		, $video );
		$this->set( 'audios'	, $audios );
		$this->set( 'date'		, $date );
		$this->set( 'permalink' , $url );
		$this->set( 'blog'		, $blog );
		$this->set( 'actor' 	, $item->actor );
		$this->set( 'content'	, $content );

		$catUrl = EasyBlogRouter::_( 'index.php?option=com_easyblog&view=categories&layout=listings&id=' . $blog->category_id, true, null, false, true );
		$this->set( 'categorypermalink'	, $catUrl );

		$item->title	= parent::display( 'streams/' . $item->verb . '.title' );
		$item->content	= parent::display( 'streams/' . $item->verb . '.content' );

		$item->opengraph->addDescription( $content );

	}

	private function prepareUpdateBlogStream( &$item )
	{
		$blog 	= EasyBlogHelper::getTable( 'Blog' );
		$blog->load( $item->contextId );

		// Format the likes for the stream
		$likes 			= Foundry::likes();
		$likes->get($item->contextId, 'blog', 'update');
		$item->likes	= $likes;

		$url 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $blog->id );

		// Apply comments on the stream
		$url 		= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $item->contextId );
		$comments 	= Foundry::comments( $item->contextId, 'blog', 'update', SOCIAL_APPS_GROUP_USER , array( 'url' => $url ) );

		$item->comments 	= $comments;

		// We might want to use some javascript codes.
		EasyBlogHelper::loadHeaders();

		$date 		= EasyBlogHelper::getDate( $blog->created );

		//formatting content
		$content 	= $this->formatBlogContent($blog);

		$appParams	= $this->getParams();
		$alignment 	= 'pull-' . $appParams->get( 'imagealignment', 'right' );
		$this->set( 'alignment'		, $alignment );

		// See if there's any audio files to process.
		$audios 	= EasyBlogHelper::getHelper( 'Audio' )->getHTMLArray( $content );

		// Get videos attached in the content
		$video		= $this->getVideo( $content );

		// Remove videos from the source
		$content 	= EasyBlogHelper::getHelper( 'Videos' )->strip( $content );

		// Remove audios from the content
		$content	= EasyBlogHelper::getHelper( 'Audio' )->strip( $content );


		$this->set( 'video'		, $video );
		$this->set( 'audios'	, $audios );
		$this->set( 'date'		, $date );
		$this->set( 'permalink' , $url );
		$this->set( 'blog'		, $blog );
		$this->set( 'actor' 	, $item->actor );
		$this->set( 'content'	, $content );

		$catUrl = EasyBlogRouter::_( 'index.php?option=com_easyblog&view=categories&layout=listings&id=' . $blog->category_id, true, null, false, true );
		$this->set( 'categorypermalink'	, $catUrl );		

		$item->title	= parent::display( 'streams/' . $item->verb . '.title' );
		$item->content	= parent::display( 'streams/' . $item->verb . '.content' );

		$item->opengraph->addDescription( $content );
	}

	/**
	 * Displays the stream item for new blog post
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	private function prepareNewBlogStream( &$item )
	{
		$blog 	= EasyBlogHelper::getTable( 'Blog' );
		$blog->load( $item->contextId );

		// Format the likes for the stream
		$likes 			= Foundry::likes();
		$likes->get($item->contextId, 'blog', 'create');
		$item->likes	= $likes;

		$url		= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $blog->id, true, null, false, true );

		// Apply comments on the stream
		$comments 	= Foundry::comments( $item->contextId , 'blog', 'create', SOCIAL_APPS_GROUP_USER , array( 'url' => $url ) );

		$item->comments 	= $comments;

		// We might want to use some javascript codes.
		EasyBlogHelper::loadHeaders();

		$date 		= EasyBlogHelper::getDate( $blog->created );

		$config 	= EasyBlogHelper::getConfig();
		$source 	= $config->get( 'integrations_easysocial_stream_newpost_source' , 'intro' );

		//formatting content
		$content 	= $this->formatBlogContent($blog);

		$appParams	= $this->getParams();
		$alignment 	= 'pull-' . $appParams->get( 'imagealignment', 'right' );
		$this->set( 'alignment'		, $alignment );

		// See if there's any audio files to process.
		$audios 	= EasyBlogHelper::getHelper( 'Audio' )->getHTMLArray( $content );

		// Get videos attached in the content
		$video		= $this->getVideo( $content );

		// Remove videos from the source
		$content 	= EasyBlogHelper::getHelper( 'Videos' )->strip( $content );

		// Remove audios from the content
		$content	= EasyBlogHelper::getHelper( 'Audio' )->strip( $content );

		$this->set( 'video'		, $video );
		$this->set( 'audios'	, $audios );
		$this->set( 'date'		, $date );
		$this->set( 'permalink' , $url );
		$this->set( 'blog'		, $blog );
		$this->set( 'actor' 	, $item->actor );
		$this->set( 'content'	, $content );

		$catUrl 		= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=categories&layout=listings&id=' . $blog->category_id, true, null, false, true );
		$this->set( 'categorypermalink'	, $catUrl );


		$item->title	= parent::display( 'streams/' . $item->verb . '.title' );
		$item->content	= parent::display( 'streams/' . $item->verb . '.content' );

		$item->opengraph->addDescription( $content );
	}

	private function prepareNewCommentStream( &$item )
	{
		$comment 	= EasyBlogHelper::getTable( 'Comment' );
		$comment->load( $item->contextId );

		// Format the likes for the stream
		$likes 			= Foundry::likes();
		$likes->get($comment->id, 'blog', 'comments');
		$item->likes	= $likes;

		$url 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $comment->post_id, true, null, false, true );


		// Apply comments on the stream
		$comments			= Foundry::comments( $item->contextId , 'blog', 'comments', SOCIAL_APPS_GROUP_USER , array( 'url' => $url ) );
		$item->comments 	= $comments;

		$blog 	= EasyBlogHelper::getTable( 'Blog' );
		$blog->load( $comment->post_id );

		$date 	= EasyBlogHelper::getDate( $blog->created );

		// Parse the bbcode from EasyBlog
		$comment->comment 	= EasyBlogHelper::getHelper( 'Comment' )->parseBBCode( $comment->comment );

		// Get the params
		$params = $this->getParams();

		$truncateLength = $params->get('maxlength');

		$this->set('truncateLength', $truncateLength);
		$this->set( 'comment'	, $comment );
		$this->set( 'date'		, $date );
		$this->set( 'permalink' , $url );
		$this->set( 'blog'	, $blog );
		$this->set( 'actor' , $item->actor );

		$item->title	= parent::display( 'streams/' . $item->verb . '.title' );
		$item->content	= parent::display( 'streams/' . $item->verb . '.content' );

		$item->opengraph->addDescription( $comment->comment );
	}

	public function truncateContent( $content )
	{
		// Get the app params
		static $maxLength = null;
		$appParams	= $this->getParams();


		if( is_null( $maxLength ) )
		{
			$maxLength 	= $appParams->get( 'maxlength', 0 );
		}

		if( $maxLength )
		{

			$truncateType = $appParams->get( 'truncation', 'chars' );

			// Remove uneccessary html tags to avoid unclosed html tags
			$content 	= JString::str_ireplace( '&nbsp;', '', $content );
			$content	= strip_tags( $content );

			// Remove blank spaces since the word calculation should not include new lines or blanks.
			$content	= trim( $content );

			// @task: Let's truncate the content now.
			switch( $truncateType )
			{
				case 'words':

					$tag		= false;
					$count		= 0;
					$output		= '';

					$chunks		= preg_split("/([\s]+)/", $content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

					foreach($chunks as $piece)
					{

						if( !$tag || stripos($piece, '>') !== false )
						{
							$tag = (bool) (strripos($piece, '>') < strripos($piece, '<'));
						}

						if( !$tag && trim($piece) == '' )
						{
							$count++;
						}

						if( $count > $maxLength && !$tag )
						{
							break;
						}

						$output .= $piece;
					}

					unset($chunks);
					$content	= $output;

					break;
				case 'chars':
				default:
					$content	= JString::substr( $content , 0 , $maxLength);
					break;
			}
		}

		return $content;
	}

	/**
	 * Triggered before comments notify subscribers
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialTableComments	The comment object
	 * @return
	 */
	public function onAfterCommentSave( &$comment )
	{
		$allowed = array('blog.user.create', 'blog.user.update', 'blog.user.create.comment', 'blog.user.featured');

		if (!in_array($comment->element, $allowed) || !$this->exists()) {
			return;
		}

		// When a comment is posted in the stream, we also want to move it to EasyBlog's comment table.
		$ebComment				= EasyBlogHelper::getTable('Comment');
		$ebComment->post_id		= $comment->uid;
		$ebComment->comment		= $comment->comment;
		$ebComment->created_by	= $comment->created_by;
		$ebComment->created		= $comment->created;
		$ebComment->modified	= $comment->created;
		$ebComment->published	= true;

		// Save the comment
		$state = $ebComment->store();

		// Get the blog post
		$blog = EasyBlogHelper::getTable('Blog');
		$blog->load($comment->uid);

		$permalink	= EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id=' . $blog->id, false);

		$options = array(
			'context_type' => 'blog.comment',
			'url' => $permalink,
			'actor_id' => $comment->created_by,
			'uid' => $blog->id,
			'aggregate' => false
		);

		if ($comment->created_by != $blog->created_by) {
			Foundry::notify('blog.comment', array($blog->created_by), false, $options);
		}
	}

	/**
	 * event onLiked on story
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$params		A standard object with key / value binding.
	 *
	 * @return	none
	 */
	public function onAfterLikeSave( &$likes )
	{
		$allowed = array('blog.user.create', 'blog.user.update', 'blog.user.create.comment', 'blog.user.featured');

		if (!in_array($likes->type, $allowed) || !$this->exists()) {
			return;
		}

		$segments = explode('.', $likes->type);

		$element = array_shift($segments);
		$group = array_shift($segments);
		$verb = implode('.', $segments);

		// Get the owner of the blog post
		$blog 			= EasyBlogHelper::getTable('Blog');
		$blog->load( $likes->uid );

		$recipients 	= array($blog->created_by);

		// $title 		= JText::sprintf('APP_BLOG_NOTIFICATIONS_LIKE_BLOG', $blog->title);
		$permalink	= EasyBlogRouter::_('index.php?option=com_easyblog&view=entry&id=' . $blog->id, false);

		$options = array(
			// 'title' => $title,
			'context_type' => 'blog.likes',
			'url' => $permalink,
			'actor_id' => $likes->created_by,
			'uid' => $blog->id,
			'aggregate' => false
		);

		if ($likes->created_by != $blog->created_by) {
			Foundry::notify('blog.likes', array($blog->created_by), false, $options);
		}

		// Do we want to notify participants?
		// $recipients = $this->getStreamNotificationTargets($likes->uid, $element, $group, $verb, array(), array($blog->created_by, $likes->created_by));
	}

	/**
	 * Prepares the activity log
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialStreamItem	The stream object.
	 * @param	bool				Determines if we should respect the privacy
	 */
	public function onPrepareActivityLog( SocialStreamItem &$item, $includePrivacy = true )
	{
		if ($this->exists() === false) {
			return;
		}

		if ($item->context != 'blog') {
			return;
		}

		// Stories wouldn't be aggregated
		$actor 			= $item->actor;
		$permalink 	= '';
		$blog 		= EasyBlogHelper::getTable( 'Blog' );


		if ($item->verb == 'create.comment') {
			$comment 	= EasyBlogHelper::getTable( 'Comment' );
			$comment->load( $item->contextId );

			$permalink 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $comment->post_id, true, null, false, true );

			$blog->load( $comment->post_id );

			$this->set( 'comment', $comment );
		} else {
			$blog->load( $item->contextId );

			$permalink 			= EasyBlogRouter::_( 'index.php?option=com_easyblog&view=entry&id=' . $blog->id, true, null, false, true );
		}

		$this->set( 'actor', $actor );
		$this->set( 'blog', $blog );
		$this->set( 'permalink', $permalink );

		$item->title 		= parent::display( 'logs/title.' . $item->verb );
		$item->content	= '';

		if( $includePrivacy )
		{
			$my         = Foundry::user();

			// only activiy log can use stream->uid directly bcos now the uid is holding id from social_stream_item.id;
			$item->privacy = Foundry::privacy( $my->id )->form( $item->contextId, $item->context, $item->actor->id, 'easyblog.blog.view' );
		}

		return true;
	}

	public function onPrivacyChange( $data )
	{

		if( !$data )
		{
			return;
		}

		if( $data->utype != 'blog' || !$data->uid )
			return;

		if( $this->exists() === false )
		{
			return;
		}


		$db 	= Foundry::db();
		$sql 	= $db->sql();

		$query = 'update `#__easyblog_post` set `private` = ' . $db->Quote( $data->value );
		$query .= ' where `id` = ' . $db->Quote( $data->uid );

		$sql->clear();
		$sql->raw( $query );
		$db->setQuery( $sql );
		$db->query();

		return true;
	}

	private function prepareContent( &$content )
	{
		// See if there's any audio files to process.
		$audios 	= EasyBlogHelper::getHelper( 'Audio' )->getHTMLArray( $content );

		// Get videos attached in the content
		$videos 	= $this->getVideos( $content );
		$video 		= false;

		if( isset( $videos[ 0 ] ) )
		{
			$video	= $videos[ 0 ];
		}

		// Remove videos from the source
		$content 	= EasyBlogHelper::getHelper( 'Videos' )->strip( $content );

		// Remove audios from the content
		$content	= EasyBlogHelper::getHelper( 'Audio' )->strip( $content );

		$this->set( 'video'		, $video );
		$this->set( 'audios'	, $audios );
		$this->set( 'date'		, $date );
		$this->set( 'permalink' , $url );
		$this->set( 'blog'		, $blog );
		$this->set( 'actor' 	, $item->actor );
		$this->set( 'content'	, $content );

		$catUrl = EasyBlogRouter::_( 'index.php?option=com_easyblog&view=categories&layout=listings&id=' . $blog->category_id, true, null, false, true );
		$this->set( 'categorypermalink'	, $catUrl );


		$item->title	= parent::display( 'streams/' . $item->verb . '.title' );
		$item->content	= parent::display( 'streams/' . $item->verb . '.content' );
	}

	private function getVideo( $content )
	{
		$videos 	= EasyBlogHelper::getHelper( 'Videos' )->getVideoObjects( $content );

		if( isset( $videos[ 0 ] ) )
		{
			return $videos[ 0 ];
		}

		return false;
	}
}
