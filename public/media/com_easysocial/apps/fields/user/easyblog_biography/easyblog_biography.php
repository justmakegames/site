<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2012 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );

// Include the fields library
Foundry::import( 'admin:/includes/fields/dependencies' );

$file 	= JPATH_ROOT . '/components/com_easyblog/helpers/helper.php';

if( JFile::exists( $file ) )
{
	require_once( $file );
}

/**
 * Field application for Joomla full name.
 *
 * @since	1.0
 * @author	Adelene Tea <adelene@stackideas.com>
 */
class SocialFieldsUserEasyblog_biography extends SocialFieldItem
{
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

		return true;
	}

	/**
	 * Displays the field input for user when they register their account.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array		The post data.
	 * @param	SocialTableRegistration
	 * @return	string	The html output.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onRegister( &$post , &$registration )
	{
		if (!$this->exists()) {
			return;
		}

		// Check for errors
		$error		= $registration->getErrors( $this->inputName );

		$value 		= isset( $post[ $this->inputName ] ) ? $post[ $this->inputName ] : '';

		// Set errors.
		$this->set( 'error', $error );
		$this->set( 'value', $this->escape( $value ) );

		return $this->display();
	}

	/**
	 * Determines whether there's any errors in the submission in the registration form.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array 	The post data.
	 * @return	bool	Determines if the system should proceed or throw errors.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onRegisterValidate( &$post )
	{
		if (!$this->exists()) {
			return;
		}

		$bio	 	= !empty( $post[$this->inputName] ) ? $post[$this->inputName] : '';

		return $this->validateField($bio);
	}

	/**
	 * Executes after a user's registration is saved.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array 	The post data.
	 * @return	bool	Determines if the system should proceed or throw errors.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onRegisterAfterSave( &$post, &$user )
	{
		if (!$this->exists()) {
			return;
		}

		// We do not need to validate against reconfirm here
		$bio	 	= !empty( $post[$this->inputName] ) ? $post[$this->inputName] : '';

		// Store the biography field
		$this->saveBiography($user->id, $bio);

		// Remove the data from $post to prevent description saving in fields table
		unset( $post[$this->inputName] );

		return true;
	}

	/**
	 * Responsible to output the html codes that is displayed to
	 * a user when they edit their profile.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialUser		The user that is being edited.
	 * @return
	 */
	public function onEdit( &$post, &$user, $errors )
	{
		if (!$this->exists()) {
			return;
		}

		$profile 	= $this->getEasyBlogProfile($user);

		$value 		= !empty($post[$this->inputName]) ? $post[$this->inputName] : $profile->biography;

		// Get errors
		$error		= $this->getError( $errors );

		$this->set('value', $value);
		$this->set('error', $error );

		return $this->display();
	}

	/**
	 * Validates the field when the user edits their profile.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array 	The posted data.
	 * @return	bool	Determines if the system should proceed or throw errors.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onEditValidate( &$post )
	{
		if (!$this->exists()) {
			return;
		}

		$bio	 	= !empty( $post[$this->inputName] ) ? $post[$this->inputName] : '';

		return $this->validateField( $bio );
	}

	/**
	 * Executes before a user's edit is saved.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array 	The post data.
	 * @return	bool	Determines if the system should proceed or throw errors.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onEditAfterSave( &$post, &$user )
	{
		if (!$this->exists()) {
			return;
		}

		// We do not need to validate against reconfirm here
		$bio	 	= !empty( $post[$this->inputName] ) ? $post[$this->inputName] : '';

		// Store the biography field
		$this->saveBiography($user->id, $bio);

		// Remove the data from $post to prevent description saving in fields table
		unset( $post[$this->inputName] );

		return true;
	}

	/**
	 * Allows caller to save the user's biography
	 *
	 * @since	1.2
	 * @access	public
	 * @param	int 	The user's id.
	 * @param	string	The biography text
	 * @return
	 */
	private function saveBiography($id, $biography)
	{
		if (!$this->exists()) {
			return;
		}

		$db = Foundry::db();
		$sql = $db->sql();

		// reason to do Quote is to escape the single quote double quotes from content. raw() method seem not able to detect.
		$query = "update `#__easyblog_users` set `biography` = '". $db->Quote($biography) . "' where `id` = '$id'";
		$sql->raw( $query );

		$db->setQuery( $sql );
		$db->query();

		return true;
	}

	/**
	 * Responsible to output the html codes that is displayed to
	 * a user when their profile is viewed.
	 *
	 * @since	1.0
	 * @access	public
	 */
	public function onDisplay( $user )
	{
		if (!$this->exists()) {
			return;
		}

		$profile = $this->getEasyBlogProfile( $user );

		// Push variables into theme.
		$this->set( 'value'	, $this->escape( $profile->description ) );

		return $this->display();
	}

	/**
	 * Validates the custom field
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	private function validateField( $bio )
	{
		if (!$this->exists()) {
			return;
		}

		// Verify that the field are not empty
		if( empty( $bio ) && $this->isRequired() )
		{
			$this->setError( JText::_( 'PLG_FIELDS_USER_EASYBLOG_BIO_EMPTY' ) );

			return false;
		}

		return true;
	}

	/**
	 * Returns the profile object in EasyBlog
	 *
	 * @since	1.0
	 * @access	public
	 * @param	SocialUser	The user's object
	 * @return	EasyBlogProfileTable
	 */
	private function getEasyBlogProfile( $user )
	{
		if (!$this->exists()) {
			return;
		}

		$blogProfile	= EasyBlogHelper::getTable( 'Profile' );
		$blogProfile->load( $user->id );

		return $blogProfile;
	}

	/**
	 * Displays the sample html codes when the field is added into the profile.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array
	 * @return	string	The html output.
	 *
	 * @author	Adelene Tea <adelene@stackideas.com>
	 */
	public function onSample()
	{
		return $this->display();
	}
}
