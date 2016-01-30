<?php
/*
 * @package		mod_easydiscuss_tag_cloud
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

require_once JPATH_ROOT . '/components/com_easydiscuss/helpers/helper.php';
require_once DISCUSS_HELPERS . '/string.php';
require_once dirname( __FILE__ ) . '/helper.php';

$tagcloud			= modEasyDiscussTagCloudHelper::getTagCloud($params);
// $tagitemid			= DiscussRouter::getItemId( 'tags' );

require( JModuleHelper::getLayoutPath('mod_easydiscuss_tag_cloud') );
