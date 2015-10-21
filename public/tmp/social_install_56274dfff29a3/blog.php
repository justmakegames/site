<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

ES::import('admin:/includes/apps/apps');

class SocialUserAppBlog extends SocialAppItem
{
	public function __construct()
	{
		parent::__construct();
	}

	public function onComponentStart()
	{
		if (!$this->exists()) {
			return;
		}

		$view = $this->input->get('view');

		// Inject easyblog scripts on the page
		if ($view == 'dashboard' || $view == 'profile') {
			EB::init('site');

			$stylesheet = EB::stylesheet('site', 'wireframe');
			$stylesheet->attach();
		}
	}

	public function exists()
	{
		$file = JPATH_ADMINISTRATOR . '/components/com_easyblog/includes/easyblog.php';

		if (!JFile::exists($file)) {
			return false;
		}

		require_once($file);

		return true;
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
		$obj = new stdClass();
		$obj->color = '#FFDB77';
		$obj->icon = 'ies-pencil-2';
		$obj->label = 'APP_USER_BLOG_STREAM_TOOLTIP';

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
	public function onNotificationLoad($item)
	{
		if ($item->type != 'blog') {
			return;
		}

		if (!$this->exists()) {
			$item->title = '';
			return;
		}

		$post = EB::post($item->uid);

		$actor = Foundry::user($item->actor_id);


		$item->content = $post->title;
		$item->image = $post->getImage()? $post->getImage('thumbnail') : '';

		// Set the title of the notification
		if ($item->cmd == 'blog.create') {
			$item->title = JText::sprintf('APP_USER_BLOG_NOTIFICATION_CREATED', $actor->getName());
		}

		// Set the title of the notification
		if ($item->cmd == 'blog.likes') {
			$item->title = JText::sprintf('APP_USER_BLOG_NOTIFICATION_LIKE_POST', $actor->getName());
		}

		// Set the title of the notification
		if ($item->cmd == 'blog.comment') {
			$item->title = JText::sprintf('APP_USER_BLOG_NOTIFICATION_COMMENT_POST', $actor->getName());
		}

		return $item;

	}

	/**
     * Prepares what should appear on user's story form.
     *
     * @since  1.3
     * @access public
     */
    public function onPrepareStoryPanel($story)
    {
    	if (!$this->exists()) {
    		return;
    	}
        // We only allow event creation on dashboard, which means if the story target and current logged in user is different, then we don't show this
        // Empty target is also allowed because it means no target.
        if (!empty($story->target) && $story->target != FD::user()->id) {
            return;
        }

        $params = $this->getParams();

        if (!$params->get('blog_form', true)) {
        	return;
        }

        // Create plugin object
        $plugin = $story->createPlugin('blog', 'panel');

        // check for acl to see if this user has the acl to blog or not
        $acl = EB::acl();
        if (!$acl->get('add_entry')) {
        	return;
        }

        // Get the theme class
        $theme = FD::themes();

        // Get the available blog category
        $model = EB::model('Category');
        $categories = $model->getAllCategories();

        $theme->set('categories', $categories);

        $plugin->button->html = $theme->output('apps/user/blog/story/panel.button');
        $plugin->content->html = $theme->output('apps/user/blog/story/panel.form');

        $script = FD::get('Script');
        $script->set('errorTitle', JText::_('APP_USER_BLOG_INVALID_TITLE'));
        $script->set('errorContent', JText::_('APP_USER_BLOG_INVALID_CONTENT'));
        $plugin->script = $script->output('apps:/user/blog/story');

        return $plugin;
    }

    /**
     * When a user submits a new item on the story, we need to create the blog post
     *
     * @since	5.0
     */
    public function onBeforeStorySave(&$template, &$stream, &$content)
    {
    	if (!$this->exists() || $template->context_type != 'blog') {
    		return;
    	}

    	// Retrieve the post data
    	$title = $this->input->get('blog_title', '', 'default');
    	$content = $this->input->get('blog_content', '', 'default');
    	$category = $this->input->get('blog_categoryId', 0, 'int');

    	if (!$title) {
    		return false;
    	}

    	$author = FD::user();
    	$post = EB::post();

    	$data = new stdClass();
    	$data->title = $title;
    	$data->content = $content;
    	$data->category_id = $category;
    	$data->created_by = $author->id;

    	// Get the current date
    	$current = ES::date();

    	$data->published = 1;
    	$data->created = $current->toSql();
    	$data->modified = $current->toSql();
    	$data->publish_up = $current->toSql();
    	$data->publish_down	= '0000-00-00 00:00:00';
    	$data->frontpage = 1;
		$data->allowcomment = 1;
		$data->subscription = 1;

		$post->create(array('overrideDoctType' => 'legacy'));

        // now let's get the uid
        $data->uid = $post->uid;
        $data->revision_id = $post->revision->id;

        // binding
		$post->bind($data, array());

        $saveOptions = array(
                        'applyDateOffset' => false,
                        'validateData' => false,
                        'useAuthorAsRevisionOwner' => true,
                        'saveFromEasysocialStory' => true
                        );

		$post->save($saveOptions);

		$template->context_type = 'blog';

        $template->context_id = $post->id;

    	return;
    }

	/**
	 * Prepares the stream item
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialStreamItem	The stream object.
	 * @param	bool				Determines if we should respect the privacy
	 */
	public function onPrepareStream(SocialStreamItem &$item, $includePrivacy = true)
	{
		if ($item->context != 'blog') {
			return;
		}

		if ($this->exists() === false) {
			return;
		}

		// Attach our own stylesheet
		$this->getApp()->loadCss();

		// Get the context of the stream item
		$element = $item->context;
		$uid = $item->contextId;

		if ($item->isCluster()) {
			$cluster = $item->getCluster();

			if (!$cluster->canViewItem()) {
				return;
			}
		}

		if (!$item->isCluster()) {
			// Get user's privacy.
			$privacy = $this->my->getPrivacy();

			$validate = $privacy->validate('easyblog.blog.view', $uid, $element, $item->actor->id);

			// Determine if the user can view this current context
			if ($includePrivacy && !$validate) {
				return;
			}

			// Bind the privacy item
			if ($includePrivacy) {
				$item->privacy = $privacy->form($uid, $element, $item->actor->id, 'easyblog.blog.view');
			}
		}

		// Define standard stream looks
		$item->display = SOCIAL_STREAM_DISPLAY_FULL;
		$item->color = '#FFDB77';
		$item->fonticon = 'ies-pencil-2';
		$item->label = JText::_('APP_USER_BLOG_STREAM_TOOLTIP');

		// New blog post
		if ($item->verb == 'create') {
			$this->prepareNewBlogStream($item);
		}

		// Updated blog post
		if($item->verb == 'update') {
			$this->prepareUpdateBlogStream($item);
		}

		// New comment
		if ($item->verb == 'create.comment') {
			$this->prepareNewCommentStream($item);
		}

		// Featured posts
		if ($item->verb == 'featured') {
			$this->prepareFeaturedBlogStream($item);
		}
	}

	/**
	 * Displays the stream item for new blog post
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	private function prepareNewBlogStream(&$item)
	{
		// Load the post
		$post = EB::post($item->contextId);

		if (!$post->id) {
			return;
		}

		if (!$post->getPrimaryCategory()) {
			return;
		}

		// Format the likes for the stream
		$likes = ES::likes();
		$likes->get($item->contextId, 'blog', 'create');
		$item->likes = $likes;

		// Apply comments on the stream
		$url = $post->getExternalPermalink();
		$item->comments = ES::comments($item->contextId, 'blog', 'create', SOCIAL_APPS_GROUP_USER, array('url' => $url));

		// We might want to use some javascript codes.
		EB::init('site');

		// Get app params
		$appParams = $this->getParams();

		// Get the configured alignment for image
		$alignment = 'pull-' . $appParams->get('imagealignment', 'right');

		// Get the content
		$content = $post->getIntro(true);

		$contentLength  = $appParams->get('maxlength');

        if ($contentLength > 0) {
            // truncate the content
            $content = $this->truncateStreamContent($content, $contentLength);
        }

		// Get the cluster
		$cluster = $item->getCluster();

		// Prepare the namespace
		$group = $item->cluster_type ? $item->cluster_type : SOCIAL_TYPE_USER;

		$this->set('alignment', $alignment);
		$this->set('post', $post);
		$this->set('actor', $item->actor);
		$this->set('content', $content);
		$this->set('cluster', $cluster);
		$this->set('cluster_type', $group);

		$titleNamespace = 'streams/' . $group . '/' . $item->verb . '.title';
		$contentNamespace = 'streams/' . $group . '/' . $item->verb . '.content';

		$item->title = parent::display($titleNamespace);
		$item->content = parent::display($contentNamespace);

		// Add image to the og:image
		$item->opengraph->addImage($post->getImage('thumbnail'));
		$item->opengraph->addDescription($content);
	}

	private function prepareFeaturedBlogStream(&$item)
	{
		$post = EB::post($item->contextId);

		if (!$post) {
			return;
		}

		if (!$post->getPrimaryCategory()) {
			return;
		}

		// Format the likes for the stream
		$likes = Foundry::likes();
		$likes->get($item->contextId, 'blog', 'featured');
		$item->likes = $likes;

		$url = EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id, true, null, false, true);

		$item->comments = Foundry::comments($item->contextId, 'blog', 'featured', SOCIAL_APPS_GROUP_USER , array('url' => $url));

		$date = EB::date($post->created);

		$config = EB::config();
		$source = $config->get('integrations_easysocial_stream_newpost_source', 'intro');

		$content = $post->getIntro(true);

		$appParams = $this->getParams();
		$alignment = 'pull-' . $appParams->get('imagealignment', 'right');
		$this->set('alignment' , $alignment);

		$contentLength  = $appParams->get('maxlength');

        if ($contentLength > 0) {
            // truncate the content
            $content = $this->truncateStreamContent($content, $contentLength);
        }

		// See if there's any audio files to process.
		$audios = EB::audio()->getItems($content);

		// Get videos attached in the content
		$video = $this->getVideo($content);

		// Remove videos from the source
		$content = EB::videos()->strip($content);

		// Remove audios from the content
		$content = EB::audio()->strip($content);

		$this->set('video', $video);
		$this->set('audios', $audios);
		$this->set('date', $date);
		$this->set('permalink', $url);
		$this->set('blog', $post);
		$this->set('actor', $item->actor);
		$this->set('content', $content);

		$catUrl = EBR::_('index.php?option=com_easyblog&view=categories&layout=listings&id=' . $post->category_id, true, null, false, true);
		$this->set('categorypermalink', $catUrl);

		$item->title = parent::display('streams/' . $item->verb . '.title');
		$item->content = parent::display('streams/' . $item->verb . '.content');

		// Add image to the og:image
		if ($post->getImage()) {
			$item->opengraph->addImage($post->getImage('frontpage'));
		}

		$item->opengraph->addDescription($content);

	}

	/**
	 * Generates the stream for updated stream item
	 *
	 * @since	1.4
	 * @access	public
	 * @param	string
	 * @return
	 */
	private function prepareUpdateBlogStream(&$item)
	{
		$post = EB::post($item->contextId);

		// Post could be deleted from the site by now.
		if (!$post->id) {
			return;
		}

		if (!$post->getPrimaryCategory()) {
			return;
		}

		// Format the likes for the stream
		$likes = Foundry::likes();
		$likes->get($item->contextId, 'blog', 'update');
		$item->likes = $likes;

		$url = EBR::_( 'index.php?option=com_easyblog&view=entry&id=' . $post->id );

		// Apply comments on the stream
		$item->comments = Foundry::comments($item->contextId, 'blog', 'update', SOCIAL_APPS_GROUP_USER, array('url' => $url));

		// We might want to use some javascript codes.
		EB::init('site');

		$date = EB::date($post->created);

		$config = EB::config();
		$source = $config->get('integrations_easysocial_stream_newpost_source', 'intro');

		$content = $post->getIntro(true);

		$appParams = $this->getParams();
		$alignment = 'pull-' . $appParams->get('imagealignment', 'right');
		$this->set('alignment', $alignment);

		$contentLength  = $appParams->get('maxlength');

        if ($contentLength > 0) {
            // truncate the content
            $content = $this->truncateStreamContent($content, $contentLength);
        }

		// See if there's any audio files to process.
		$audios = EB::audio()->getItems($content);

		// Get videos attached in the content
		$video = $this->getVideo($content);

		// Remove videos from the source
		$content = EB::videos()->strip($content);

		// Remove audios from the content
		$content = EB::audio()->strip($content);

		$catUrl = EBR::_('index.php?option=com_easyblog&view=categories&layout=listings&id=' . $post->category_id, true, null, false, true);
		$this->set('categorypermalink', $catUrl);

		$this->set('video', $video);
		$this->set('audios', $audios);
		$this->set('date', $date);
		$this->set('permalink', $url);
		$this->set('blog', $post);
		$this->set('actor', $item->actor);
		$this->set('content', $content);

		$item->title = parent::display('streams/' . $item->verb . '.title');
		$item->content = parent::display('streams/' . $item->verb . '.content');

		// Add image to the og:image
		if ($post->getImage()) {
			$item->opengraph->addImage($post->getImage('frontpage'));
		}

		$item->opengraph->addDescription($content);
	}

	private function prepareNewCommentStream(&$item)
	{
		$comment = EB::table('Comment');
		$comment->load($item->contextId);

		if (!$comment->post_id) {
			return;
		}

		// Format the likes for the stream
		$likes = Foundry::likes();
		$likes->get($comment->id, 'blog', 'comments');
		$item->likes = $likes;

		$url = EBR::_('index.php?option=com_easyblog&view=entry&id=' . $comment->post_id, true, null, false, true );

		// Apply comments on the stream
		$item->comments = Foundry::comments($item->contextId, 'blog', 'comments', SOCIAL_APPS_GROUP_USER, array('url' => $url));

		$post = EB::post($comment->post_id);

		$date = EB::date($post->created);

		// Parse the bbcode from EasyBlog
		$comment->comment = EB::comment()->parseBBCode($comment->comment);

		$this->set('comment', $comment);
		$this->set('date', $date);
		$this->set('permalink', $url);
		$this->set('blog', $post);
		$this->set('actor', $item->actor);

		$item->title = parent::display('streams/' . $item->verb . '.title');
		$item->content = parent::display('streams/' . $item->verb . '.content');

		$item->opengraph->addDescription($comment->comment);
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
		$ebComment = EB::table('Comment');
		$ebComment->post_id = $comment->uid;
		$ebComment->comment = $comment->comment;
		$ebComment->created_by = $comment->created_by;
		$ebComment->created	= $comment->created;
		$ebComment->modified = $comment->created;
		$ebComment->published = true;

		// Save the comment
		$state = $ebComment->store();

		// Get the blog post
		$post = EB::post($comment->uid);

		$permalink	= EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id, false);

		$options = array(
			'context_type' => 'blog.comment',
			'url' => $permalink,
			'actor_id' => $comment->created_by,
			'uid' => $post->id,
			'aggregate' => false
		);

		if ($comment->created_by != $post->created_by) {
			Foundry::notify('blog.comment', array($post->created_by), false, $options);
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
	public function onAfterLikeSave(&$likes)
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
		$post = EB::post($likes->uid);

		$recipients = array($post->created_by);

		$permalink = EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id, false);

		$options = array(
			// 'title' => $title,
			'context_type' => 'blog.likes',
			'url' => $permalink,
			'actor_id' => $likes->created_by,
			'uid' => $post->id,
			'aggregate' => false
		);

		if ($likes->created_by != $post->created_by) {
			Foundry::notify('blog.likes', array($post->created_by), false, $options);
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
	public function onPrepareActivityLog(SocialStreamItem &$item, $includePrivacy = true)
	{
		if ($this->exists() === false) {
			return;
		}

		if ($item->context != 'blog') {
			return;
		}

		// Stories wouldn't be aggregated
		$actor = $item->actor;
		$permalink = '';

		if ($item->verb == 'create.comment') {
			$comment = EB::table('Comment');
			$comment->load($item->contextId);
			$permalink = EBR::_('index.php?option=com_easyblog&view=entry&id=' . $comment->post_id, true, null, false, true);

			$post = EB::post($comment->post_id);
			$this->set( 'comment', $comment );

		} else {
			$post = EB::post($item->contextId);
			$permalink = EBR::_('index.php?option=com_easyblog&view=entry&id=' . $post->id, true, null, false, true);
		}

		$this->set('actor', $actor);
		$this->set('blog', $post);
		$this->set('permalink', $permalink);

		$item->title = parent::display('logs/title.' . $item->verb);
		$item->content = '';

		if ($includePrivacy) {
			$my = Foundry::user();

			// only activiy log can use stream->uid directly bcos now the uid is holding id from social_stream_item.id;
			$item->privacy = Foundry::privacy($my->id)->form($item->contextId, $item->context, $item->actor->id, 'easyblog.blog.view');
		}

		return true;
	}

	public function onPrivacyChange($data)
	{
		if (!$data) {
			return;
		}

		if ($data->utype != 'blog' || !$data->uid) {
			return;
		}

		if ($this->exists() === false) {
			return;
		}


		$db = Foundry::db();
		$sql = $db->sql();

		$query = 'update `#__easyblog_post` set `access` = ' . $db->Quote($data->value);
		$query .= ' where `id` = ' . $db->Quote($data->uid);

		$sql->clear();
		$sql->raw($query);
		$db->setQuery($sql);
		$db->query();

		return true;
	}

	private function prepareContent(&$content)
	{
		// See if there's any audio files to process.
		$audios = EB::audio()->getItems($content);

		// Get videos attached in the content
		$videos = $this->getVideos($content);
		$video = false;

		if (isset($videos[0])) {
			$video = $videos[0];
		}

		// Remove videos from the source
		$content = EB::videos()->strip( $content );

		// Remove audios from the content
		$content = EB::audio()->strip($content);

		$this->set('video', $video);
		$this->set('audios', $audios);
		$this->set('date', $date);
		$this->set('permalink', $url);
		$this->set('blog', $blog);
		$this->set('actor', $item->actor);
		$this->set('content', $content);

		$catUrl = EBR::_('index.php?option=com_easyblog&view=categories&layout=listings&id=' . $blog->category_id, true, null, false, true);
		$this->set('categorypermalink', $catUrl);

		$item->title = parent::display('streams/' . $item->verb . '.title');
		$item->content = parent::display('streams/' . $item->verb . '.content');
	}

	private function getVideo($content)
	{
		$videos = EB::videos()->getVideoObjects($content);

		if (isset($videos[0])) {
			return $videos[0];
		}

		return false;
	}

	public function onIndexerReIndex(&$itemCount)
	{
		if ($this->exists() === false) {
			return;
		}


		static $rowCount = null;

		$db = Foundry::db();
		$sql = $db->sql();

		$indexer = Foundry::get('Indexer', 'com_easyblog');
		$ebConfig = EB::config();
		$limit = 5;

		if (is_null($rowCount)) {
			$query = 'select count(1) from `#__easyblog_post` as a';
			$query .= ' where not exists ( select b.`uid` from `#__social_indexer` as b where a.`id` = b.`uid` and b.`utype` = ' . $db->Quote( 'blog' ) . ')';
			$query .= ' and a.`published` = ' . $db->Quote(EASYBLOG_POST_PUBLISHED);
			$query .= ' and a.`state` = ' . $db->Quote(EASYBLOG_POST_NORMAL);

			$sql->raw($query);
			$db->setQuery($sql);

			$rowCount = $db->loadResult();
		}

		$itemCount = $itemCount + $rowCount;

		if ($rowCount) {
			$query = 'select * from #__easyblog_post as a';
			$query .= ' where not exists ( select b.`uid` from #__social_indexer as b where a.`id` = b.`uid` and b.`utype` = ' . $db->Quote( 'blog' ) . ')';
			$query .= ' and a.`published` = ' . $db->Quote(EASYBLOG_POST_PUBLISHED);
			$query .= ' and a.`state` = ' . $db->Quote(EASYBLOG_POST_NORMAL);
			$query .= ' order by a.`id` limit ' . $limit;

			$sql->raw($query);
			$db->setQuery($sql);

			$rows = $db->loadObjectList();


			foreach ($rows as $row) {

				$post = EB::post();
				$post->bind($row);


				$template = $indexer->getTemplate();

				// getting the blog content
				$content = $post->intro . $post->content;


				$image = '';

				// @rule: Try to get the blog image.
				if ($post->getImage()) {
					$image = $post->getImage('thumbnail');
				}

				if (empty($image)) {
					// @rule: Match images from blog post
					$pattern = '/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'\s>]*)/i';
					preg_match($pattern, $content, $matches);

					$image = '';

					if ($matches) {
						$image = isset($matches[1])? $matches[1] : '';

						if (JString::stristr($matches[1], 'https://') === false && JString::stristr($matches[1], 'http://') === false && !empty($image)) {
							$image = rtrim(JURI::root(), '/') . '/' . ltrim( $image, '/');
						}
					}
				}

				if (!$image) {
					$image = rtrim(JURI::root(), '/') . '/components/com_easyblog/assets/images/default_facebook.png';
				}

				$content = $post->getContent();

				// @rule: Once the gallery is already processed above, we will need to strip out the gallery contents since it may contain some unwanted codes
				// @2.0: <input class="easyblog-gallery"
				// @3.5: {ebgallery:'name'}
				$content = EB::removeGallery($content);

				// remove all html tags.
				$content = strip_tags($content);

				if (JString::strlen($content) > $ebConfig->get('integrations_easysocial_indexer_newpost_length', 250)) {
					$content = JString::substr($content, 0, $ebConfig->get('integrations_easysocial_indexer_newpost_length', 250));
				}

				// lets include the title as the search snapshot.
				$content = $post->title . ' ' . $content;
				$template->setContent($post->title, $content);

				$url = EBR::_('index.php?option=com_easyblog&view=entry&id='.$post->id);

				if ($url) {
					$url = '/' . ltrim($url, '/');
					$url = str_replace('/administrator/', '/', $url);
				}

				$template->setSource($post->id, 'blog', $post->created_by, $url);

				$template->setThumbnail($image);

				$template->setLastUpdate($post->modified);

				$indexer->index($template);

			}
		}
	}

	 /**
     * Truncate the stream item
     *
     * @since   1.0
     * @access  public
     * @param   SocialStreamItem    The stream object.
     * @param   bool                Determines if we should respect the privacy
     */
    public function truncateStreamContent($content, $contentLength)
    {
        // Get the app params
        $params = $this->getParams();
        $truncateType = $params->get('truncation');

        if ($truncateType == 'chars') {

            // Remove uneccessary html tags to avoid unclosed html tags
            $content = strip_tags($content);

            // Remove blank spaces since the word calculation should not include new lines or blanks.
            $content = trim($content);

            // @task: Let's truncate the content now.
            $content = JString::substr(strip_tags($content), 0, $contentLength) . JText::_('COM_EASYSOCIAL_ELLIPSES');

        } else {

            $tag = false;
            $count = 0;
            $output = '';

            // Remove uneccessary html tags to avoid unclosed html tags
            $content = strip_tags($content);

            $chunks = preg_split("/([\s]+)/", $content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

            foreach($chunks as $piece) {

                if (!$tag || stripos($piece, '>') !== false) {
                    $tag = (bool) (strripos($piece, '>') < strripos($piece, '<'));
                }

                if (!$tag && trim($piece) == '') {
                    $count++;
                }

                if ($count > $contentLength && !$tag) {
                    break;
                }

                $output .= $piece;
            }

            unset($chunks);
            $content = $output . JText::_('COM_EASYSOCIAL_ELLIPSES');
        }


        return $content;
    }

}
