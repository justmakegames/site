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
defined('_JEXEC') or die('Restricted access');

class modRecentRepliesHelper
{
	public static function getData( $params )
	{
		$db		= DiscussHelper::getDBO();
		$limit	= (int) $params->get( 'count', 10 );
		$catid	= intval($params->get( 'category', 0));
		$catfil	= (int) $params->get( 'category_option', 0 );

		if ($limit == 0)
		{
			$limit = '';
		} else {
			$limit = ' LIMIT 0,' . $limit;
		}

		if (!$catfil || $catid == 0)
		{
			$catid = '';
		} else
		{
			$catid = ' AND a.`category_id` = '.$db->quote($catid) . ' ';
		}

		$query	= 'SELECT a.*, a.`title` AS `post_title`';
		$query	.= ' FROM ' . $db->nameQuote( '#__discuss_posts' ) . ' AS a';
		$query	.= ' LEFT JOIN ' . $db->nameQuote( '#__discuss_posts' ) . ' AS b';
		$query 	.= '	ON b.' . $db->nameQuote( 'parent_id' ) . '= a.' . $db->nameQuote( 'id' );
		$query 	.= '	AND b.' . $db->nameQuote( 'published' ) . '=' . $db->Quote( 1 );
		$query 	.= ' WHERE a.' . $db->nameQuote( 'published' ) . '=' . $db->Quote( 1 );
		$query	.= ' AND a.' . $db->nameQuote( 'parent_id' ) . '=' . $db->Quote( 0 );
		$query 	.= $catid;
		$query 	.= ' GROUP BY a.' . $db->nameQuote( 'id' );
		$query	.= ' ORDER BY a.' . $db->nameQuote( 'replied' ) . ' DESC';
		$query	.= $limit;

		$db->setQuery( $query );

		$result	= $db->loadObjectList();


		if( !$result )
		{
			return false;
		}

		$posts	= array();
		foreach( $result as $row )
		{
			// Get the last replier for the particular post.
			$db	= DiscussHelper::getDBO();
			$query = 'SELECT `user_id` FROM #__discuss_posts WHERE ' . $db->nameQuote('parent_id') . ' = ' . $db->Quote($row->id) . ' ORDER BY '  . $db->nameQuote('created') . ' DESC LIMIT 1';
			$db->setQuery( $query );
			$result = $db->loadObject();

			if( $result )
			{
				$row->user_id	= $result->user_id;
			}

			$profile	= DiscussHelper::getTable( 'Profile' );
			$profile->load( $row->user_id );

			$row->profile	= $profile;
			$row->content	= EasyDiscussParser::bbcode( $row->content );

			$row->title		= DiscussHelper::wordFilter( $row->post_title );
			$row->content	= DiscussHelper::wordFilter( $row->content );

			$posts[]		= $row;
		}

		// Append profile objects to the result
		return $posts;
	}
}
