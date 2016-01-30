<?php
/**
 * @version    SVN: <svn_id>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

/**
 * This file define the icon set for admin views
 * */
// No direct access.
defined('_JEXEC') or die();

// Check if icon set is already defined or not
if (!defined('Q2C_ICON_IS_DEFINED_CEHCK'))
{
		define('Q2C_ICON_IS_DEFINED_CEHCK', "YES");
		define('Q2C_ICON_WHITECOLOR', "icon-white");
		define('Q2C_ICON_TRASH', "icon-trash");
		define('Q2C_ICON_ENVELOPE', "icon-envelope");
		define('Q2C_ICON_ARROW_RIGHT', "icon-arrow-right");
		define('Q2C_ICON_ARROW_CHEVRON_RIGH', "icon-chevron-right");
		define('Q2C_ICON_ARROW_CHEVRON_LEFT', "icon-chevron-left");
		define('QTC_ICON_SEARCH', "icon-search");
		define('Q2C_TOOLBAR_ICON_SETTINGS', "icon-cog");
		define('QTC_ICON_PUBLISH', "icon-remove-circle");

	// Define constants
	if (JVERSION < '3.0')
	{


		define('Q2C_ICON_HOME', " icon-home");
		define('QTC_ICON_CHECKMARK', "icon-publish icon-ok-sign");
		define('QTC_ICON_MINUS', " icon-minus");
		define('QTC_ICON_PLUS', " icon-plus-sign");
		define('QTC_ICON_EDIT', " icon-edit");
		define('QTC_ICON_CART', " icon-white icon-shopping-cart");
		define('QTC_ICON_BACK', " icon-arrow-left");
		define('QTC_ICON_REMOVE', " icon-remove");
		define('QTC_ICON_LIST', " icon-list");


		/* Define toolbar icon classes : according to joomla version*/
		define('Q2C_TOOLBAR_ICON_CART', "icon-shopping-cart");
	}
	else
	{
		// Icon constants.
		define('Q2C_ICON_HOME', " icon-home");
		define('QTC_ICON_CHECKMARK', " icon-publish icon-ok-sign");
		define('QTC_ICON_MINUS', " icon-minus-2	");
		define('QTC_ICON_PLUS', " icon-plus-2");
		define('QTC_ICON_EDIT', " icon-apply icon-pencil-2 icon-edit"); // icon-pencil-2 // icon-edit

		// Removed qtc_icon-shopping-cart
		define('QTC_ICON_CART', " icon-cart");
		define('QTC_ICON_BACK', " icon-arrow-left-2");
		define('QTC_ICON_REMOVE', " icon-remove");
		define('QTC_ICON_LIST', " icon-list");

		// For Toolbar: for jooomla 3
		define('Q2C_TOOLBAR_ICON_CART', "icon-cart ");
	}
}
