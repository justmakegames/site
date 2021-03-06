<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );

class KunenaPrivateEasySocial extends KunenaPrivate
{
	protected $loaded = false;
	protected $params = null;

	public function __construct($params)
	{
		$this->params = $params;

		// Process scripts
		$page 	= FD::page();
		$page->processScripts();

		// Process styling
		$doc 		= FD::document();
		$doc->init();
	}

	protected function getOnClick( $userid )
	{
		$userid 	= (int) $userid;

		return ' data-es-conversations-compose data-es-conversations-id="' . $userid . '"';
	}

	protected function getURL($userid)
	{
		return "javascript:void(0)";
	}

	public function getInboxLink( $text )
	{

		if( !$text )
		{
			$text 	= JText::_( 'COM_KUNENA_PMS_INBOX' );
		}

		$url 	= $this->getInboxURL();

		return '<a href="' . $url . '" rel="follow">' . $text . '</a>';
	}

	public function getInboxURL()
	{
		return FRoute::conversations();
	}
}
