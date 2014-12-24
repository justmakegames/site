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


class KunenaProfileEasySocial extends KunenaProfile
{
	protected $params = null;

	public function __construct($params)
	{
		$this->params = $params;
	}

	public function getUserListURL($action='', $xhtml = true)
	{
		$config = KunenaFactory::getConfig();
		$my = JFactory::getUser();

		if ($config->userlist_allowed == 1 && $my->guest) {
			return false;
		}

		return FRoute::users(array(), $xhtml);
	}

	public function getProfileURL($userid, $task='', $xhtml = true)
	{
		if ($userid) {
			$user 	= FD::user($userid);
			$alias 	= $user->getAlias();
		} else {
			$alias 	= $userid;
		}

		$options = array('id' => $alias);

		if ($task) {
			$options['layout'] = $task;
		}

		$url = FRoute::profile($options, $xhtml);

		return $url;
	}

	public function _getTopHits($limit=0)
	{
	}

	public function showProfile($view, &$params) 
	{
		$userid = $view->profile->userid;

		$user = FD::user($userid);

		$gender = $user->getFieldData('GENDER');

		if (!empty($gender)) {
			$view->profile->gender = $gender;
		}

		$birthday = $user->getFieldData('BIRTHDAY');

		if (!empty($birthday) && isset($birthday['date'])) {

			$birthday = FD::date($birthday['date']);

			$view->profile->birthdate = $birthday->format('Y-m-d');
		}
	}

	public function getEditProfileURL($userid, $xhtml = true)
	{
		$options = array('layout' => 'edit');
		$url = FRoute::profile($options, $xhtml);

		return $url;
	}
}
