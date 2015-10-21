<?php 
//namespace modules\mod_jrealtimeanalytics
/**
 * @package JREALTIMEANALYTICS::modules
 * @subpackage mod_jrealtimeanalytics
 * @author Joomla! Extensions Store
 * @copyright (C) 2013 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 */
defined ( '_JEXEC' ) or die ();

// Include the login functions only once
require_once __DIR__ . '/helper.php';

// Load component translations
$jLang = JFactory::getLanguage ();
$jLang->load ( 'com_jrealtimeanalytics', JPATH_ROOT . '/components/com_jrealtimeanalytics', 'en-GB', true, true );
if ($jLang->getTag () != 'en-GB') {
	$jLang->load ( 'com_jrealtimeanalytics', JPATH_SITE, null, true, false );
	$jLang->load ( 'com_jrealtimeanalytics', JPATH_ROOT . '/components/com_jrealtimeanalytics', null, true, false );
}

// Get component params
$cParams = JComponentHelper::getParams('com_jrealtimeanalytics');

// Include component model
require_once JPATH_ADMINISTRATOR . '/components/com_jrealtimeanalytics/framework/exception/exception.php';
require_once JPATH_ADMINISTRATOR . '/components/com_jrealtimeanalytics/framework/model/model.php';

// Instantiate model
JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_jrealtimeanalytics/models', 'JRealtimeModel');
$serverStatsModel = JModelLegacy::getInstance('Serverstats', 'JRealtimeModel');

// Set a default daily based period for stats
$startPeriod = $endPeriod = date ( "Y-m-d" );
$serverStatsModel->setState('fromPeriod', $startPeriod);
$serverStatsModel->setState('toPeriod', $endPeriod); 

$statsData = ModJRealtimeAnalyticsHelper::getData($cParams, $serverStatsModel);

$layout = $params->get ( 'layout', 'default' );

// Add stylesheet
$doc = JFactory::getDocument();
$doc->addStyleSheet(JUri::base(true) . '/modules/mod_jrealtimeanalytics/assets/style.css');

require JModuleHelper::getLayoutPath ( 'mod_jrealtimeanalytics', $layout );
