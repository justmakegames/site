<?php
/**
 * @version    SVN: <svn_id>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access.
defined('_JEXEC') or die();

/**
 * This file define the icon set for admin view
 * */

$qtcParams = JComponentHelper::getParams('com_quick2cart');
$currentBSViews = $qtcParams->get('currentBSViews', "bs3");
$icon_color = " icon-white ";

if (version_compare(JVERSION, '3.0', 'lt'))
{
	$icon_color = '';
}
// Check if icon set is already defined or not
if (!defined('Q2C_ICON_IS_DEFINED_CEHCK'))
{
	if ($currentBSViews == "bs2")
	{
		define('Q2C_ICON_WHITECOLOR', "icon-white");
		define('Q2C_ICON_TRASH', "icon-trash");
		define('Q2C_ICON_ENVELOPE', "icon-envelope");
		define('Q2C_ICON_ARROW_RIGHT', "icon-arrow-right");
		define('Q2C_ICON_ARROW_CHEVRON_RIGH', "icon-chevron-right");
		define('Q2C_ICON_ARROW_CHEVRON_LEFT', "icon-chevron-left");
		define('QTC_ICON_SEARCH', "icon-search");
		define('Q2C_TOOLBAR_ICON_SETTINGS', "icon-cog");
		define('QTC_ICON_PUBLISH', "icon-remove-circle");
		define('QTC_ICON_REFRESH', "icon-refresh");
		define('QTC_ICON_USER', "icon-user");

		/* J2.5.x */
		if (JVERSION < '3.0')
		{
			define('Q2C_ICON_HOME', " icon-home");

			// Icon-publish
			define('QTC_ICON_CHECKMARK', " icon-ok-sign");
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
			define('Q2C_ICON_HOME', " icon-home");

			// Icon-publish
			define('QTC_ICON_CHECKMARK', " icon-ok-sign");
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

		define('Q2C_ICON_RIGHT_HAND', "icon-hand-right");

			// For Toolbar
		define('Q2C_TOOLBAR_ICON_HOME', Q2C_ICON_HOME);
		define('Q2C_TOOLBAR_ICON_LIST', QTC_ICON_LIST);
		define('Q2C_TOOLBAR_ICON_PLUS', QTC_ICON_PLUS);
		define('Q2C_TOOLBAR_ICON_USERS', "icon-user");
		define('Q2C_TOOLBAR_ICON_COUPONS', "icon-gift");
		define('Q2C_TOOLBAR_ICON_PAYOUTS', "icon-briefcase");
	}
	elseif ($currentBSViews == "bs3")
	{
		define('Q2C_ICON_WHITECOLOR', "");

		// FOR 3.X AND BOOTSTRAP3
		define('Q2C_ICON_TRASH', " glyphicon glyphicon-trash ");
		define('Q2C_ICON_ENVELOPE', " glyphicon glyphicon-envelope ");
		define('Q2C_ICON_ARROW_RIGHT', "glyphicon glyphicon-arrow-right");
		define('Q2C_ICON_ARROW_CHEVRON_RIGH', "glyphicon glyphicon-chevron-right");
		define('Q2C_ICON_ARROW_CHEVRON_LEFT', "glyphicon glyphicon-chevron-left");
		define('Q2C_TOOLBAR_ICON_SETTINGS', "glyphicon glyphicon-cog");
		define('QTC_ICON_PUBLISH', "glyphicon glyphicon-remove-circle");

		define('Q2C_ICON_HOME', "glyphicon glyphicon-home");
		define('QTC_ICON_CHECKMARK', "glyphicon glyphicon-ok");
		define('QTC_ICON_MINUS', "glyphicon glyphicon-minus");
		define('QTC_ICON_PLUS', "glyphicon glyphicon-plus");
		define('QTC_ICON_EDIT', "glyphicon glyphicon-pencil");
		define('QTC_ICON_CART', "glyphicon glyphicon-shopping-cart");
		define('QTC_ICON_BACK', "glyphicon glyphicon-arrow-left");
		define('QTC_ICON_REMOVE', "glyphicon glyphicon-remove");
		define('QTC_ICON_LIST', " glyphicon glyphicon-list");
		define('QTC_ICON_SEARCH', "glyphicon glyphicon-search");
		define('Q2C_ICON_RIGHT_HAND', "glyphicon glyphicon-hand-right");
		define('QTC_ICON_REFRESH', "glyphicon glyphicon-refresh");
		define('QTC_ICON_USER', "glyphicon glyphicon-user");

		// For Toolbar
		define('Q2C_TOOLBAR_ICON_HOME', Q2C_ICON_HOME);
		define('Q2C_TOOLBAR_ICON_LIST', QTC_ICON_LIST);
		define('Q2C_TOOLBAR_ICON_PLUS', QTC_ICON_PLUS);
		define('Q2C_TOOLBAR_ICON_CART', "glyphicon glyphicon-shopping-cart ");
		define('Q2C_TOOLBAR_ICON_USERS', "glyphicon glyphicon-user");
		define('Q2C_TOOLBAR_ICON_COUPONS', "glyphicon glyphicon-gift");
		define('Q2C_TOOLBAR_ICON_PAYOUTS', "glyphicon glyphicon-briefcase");
	}
}
