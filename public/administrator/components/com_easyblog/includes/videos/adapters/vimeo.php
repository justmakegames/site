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

class EasyBlogVideoVimeo
{
	private function getCode( $url )
	{
		preg_match( '/vimeo.com\/(.*)/is' , $url , $matches );

		if( !empty( $matches ) )
		{
			return $matches[1];
		}

		return false;
	}

	public function getEmbedHTML( $url , $width , $height )
	{
		$code	= $this->getCode( $url );

		if( $code )
		{
			return '<div class="video-container"><iframe src="http://player.vimeo.com/video/' . $code . '" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe></div>';
		}
		return false;
	}
}