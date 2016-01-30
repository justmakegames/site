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


class modEasyDiscussSimilarDiscussionsHelper
{

	public static function getSimilarPosts( $postId, $params )
	{
		$db 	= DiscussHelper::getDBO();

		$post = DiscussHelper::getTable( 'Posts' );
		$post->load( $postId );

		$title 		= $post->title;
		$categoryId = $post->category_id;
		$search 	= trim( $title );

		if( empty( $title ) )
			return array();

		$limit = (int) $params->get( 'count', 5 );

		$search = preg_replace("/(?![.=$'â‚-])\p{P}/u", "", $search);

		$numwords 		= explode(' ', $search);
		//$fulltextType 	= ( $numwords <= 2 ) ? ' WITH QUERY EXPANSION' : '';
		$fulltextType 	= ' WITH QUERY EXPANSION';

		// get the total score and count.
		$query = 'select count(a.`id`) as totalcnt , sum( MATCH(a.`title`,a.`content`) AGAINST (' . $db->Quote( $search ) . $fulltextType . ') ) as totalscore';
		$query .= ' FROM `#__discuss_posts` as a';
		$query .= ' WHERE MATCH(a.`title`,a.`content`) AGAINST (' . $db->Quote( $search ) . $fulltextType . ')';
		$query .= ' AND a.`published` = ' . $db->Quote('1');
		$query .= ' AND a.`parent_id` = ' . $db->Quote('0');

		if( $params->get( 'resolved_only', 0 ) )
		{
			$query .= ' AND a.`isresolve` = 1';
		}

		// $query .= ' AND a.`category_id` = ' . $db->Quote( $categoryId );
		$query .= ' and a.`id` != ' . $db->Quote( $postId );

		//echo $query;

		$db->setQuery( $query );
		$totalData = $db->loadObject();

		//var_dump( $totalData );

		$totalScore = $totalData->totalscore;
		$totalItem  = round( $totalData->totalcnt );

		//$db->setQuery( $query );

		$result = array();

		if( $totalItem )
		{
			$date	= DiscussHelper::getDate();

			// now try to get the main topic
			$query	= 'SELECT DATEDIFF('. $db->Quote($date->toMySQL()) . ', a.`created`) as `noofdays`, ';
			$query	.= ' DATEDIFF(' . $db->Quote($date->toMySQL()) . ', a.`created`) as `daydiff`, TIMEDIFF(' . $db->Quote($date->toMySQL()). ', a.`created`) as `timediff`';
			$query .= ', a.`id`,  a.`title`, MATCH(a.`title`,a.`content`) AGAINST (' . $db->Quote( $search ) . $fulltextType . ') AS score';
			$query .= ', b.`id` as `category_id`, b.`title` as `category_name`';

			$query .= ' FROM `#__discuss_posts` as a';
			$query .= ' inner join `#__discuss_category` as b ON a.category_id = b.id';
			$query .= ' WHERE MATCH(a.`title`,a.`content`) AGAINST (' . $db->Quote( $search ) . $fulltextType . ')';
			$query .= ' AND a.`published` = ' . $db->Quote('1');
			$query .= ' AND a.`parent_id` = ' . $db->Quote('0');
			if( $params->get( 'resolved_only', 0 ) )
			{
				$query .= ' AND a.`isresolve` = 1';
			}
			$query .= ' and a.`id` != ' . $db->Quote( $postId );
			$query .= ' ORDER BY score DESC';
			$query .= ' LIMIT ' . $limit;

			// echo $query;
			//exit;

			$db->setQuery( $query );
			$result = $db->loadObjectList();

			for( $i = 0; $i < count( $result ); $i++ )
			{
				$item =& $result[ $i ];

				$score = round( $item->score ) * 100  / $totalScore;
				$item->score = $score;

				//get post duration so far.
				$durationObj = new stdClass();
				$durationObj->daydiff	= $item->daydiff;
				$durationObj->timediff	= $item->timediff;

				$item->content	= EasyDiscussParser::bbcode( $item->content );

				$item->title		= DiscussHelper::wordFilter( $item->title );
				$item->content 	= strip_tags( html_entity_decode( DiscussHelper::wordFilter( $item->content) ) );
				
				$item->duration  	= DiscussHelper::getDurationString($durationObj);
			}
		}

		//var_dump( $result );
		//exit;

		return $result;
	}

}
