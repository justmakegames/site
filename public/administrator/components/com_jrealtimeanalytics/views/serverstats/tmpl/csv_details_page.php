<?php
/** 
 * @package JREALTIMEANALYTICS::SERVERSTATS::administrator::components::com_jrealtimeanalytics
 * @subpackage views
 * @subpackage serverstats
 * @subpackage tmpl
 * @author Joomla! Extensions Store
 * @copyright (C) 2013 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html 
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

// CSV format
$delimiter = ';';
$enclosure = '"';
$singleRow = PHP_EOL;
$doubleRow = PHP_EOL . PHP_EOL;
$reportStartDelimiter = '__';
$reportDelimiter = '_________________';
$titlesDelimiter = '-';

// Open out stream
$outputStream = fopen ( "php://output", "w" );

// STATS DETAILS
fputcsv ( $outputStream, array (
		$reportStartDelimiter . JText::sprintf ( 'COM_JREALTIME_SERVERSTATS_PAGES_DETAILS', $this->detailData [0]->visitedpage ) . $reportDelimiter 
), $delimiter, $enclosure );
echo $singleRow;

fputcsv ( $outputStream, array (
		$titlesDelimiter . JText::_ ( 'COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_VISITEDUSERS' ) . $titlesDelimiter,
		$titlesDelimiter . JText::_ ( 'COM_JREALTIME_SERVERSTATS_VISIT_LIFE' ) . $titlesDelimiter,
		$titlesDelimiter . JText::_ ( 'COM_JREALTIME_SERVERSTATS_USERS_DETAILS_LASTVISIT' ) . $titlesDelimiter 
), $delimiter, $enclosure );

$totalTime = 0;
$totalAverageTime = 0;
$counter = 0;
foreach ( $this->detailData as $userDetail ) :
	fputcsv ( $outputStream, array (
			$userDetail->customer_name,
			gmdate ( 'H:i:s', $userDetail->impulse * $this->daemonRefresh ),
			date ( 'Y-m-d H:i:s', $userDetail->visit_timestamp ) 
	), $delimiter, $enclosure );
	$counter ++;
	$totalTime += $userDetail->impulse * $this->daemonRefresh;
	$totalAverageTime = $totalTime / $counter;
endforeach;
echo $doubleRow;

fputcsv ( $outputStream, array (
		$titlesDelimiter . JText::_ ( 'COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_TOTALDURATION' ) . $titlesDelimiter,
		$titlesDelimiter . JText::_ ( 'COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_AVERAGEDURATION' ) . $titlesDelimiter 
), $delimiter, $enclosure );

fputcsv ( $outputStream, array (
		gmdate ( 'H:i:s', $totalTime ),
		gmdate ( 'H:i:s', $totalAverageTime ) 
), $delimiter, $enclosure );