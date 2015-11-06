<?php
// namespace administrator\components\com_jrealtimeanalytics\models;
/**
 *
 * @package JREALTIMEANALYTICS::OVERVIEW::administrator::components::com_jrealtimeanalytics
 * @subpackage models
 * @author Joomla! Extensions Store
 * @copyright (C) 2014 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * Sources model concrete implementation <<testable_behavior>>
 *
 * @package JREALTIMEANALYTICS::OVERVIEW::administrator::components::com_jrealtimeanalytics
 * @subpackage models
 * @since 2.4
 */
class JRealtimeModelOverlook extends JRealtimeModel {
	/**
	 * Process rawdata -> processeddata
	 *
	 * @access protected
	 * @return array
	 */
	public function getData() {
		// Initialization
		$processedData = array();
		
		// Set interval for DatePeriod
		$interval = 'R11/' . $this->getState ('statsYear') . '-02-01T00:00:00Z/P1M';
		$periods = new DatePeriod($interval);
	
		// Set start date
		$currentInitialDate = new DateTime($this->getState ('statsYear') . '-01-01');
		$currentDate = strtotime($currentInitialDate->format('Y-m-d'));
	
		foreach ($periods as $period) {
			// Store for post processing
			$previousDate = $currentDate;
			$currentDate = strtotime($period->format('Y-m-d'));

			// Fetch data from DB if not injected and filter by MySql period with SUM
			$query = "SELECT COUNT(*) AS numpages," .
					"\n COUNT(DISTINCT(" . $this->_db->quoteName('session_id_person') . ")) AS numvisits" .
					"\n FROM #__realtimeanalytics_serverstats" .
					"\n WHERE " . $this->_db->quoteName('visit_timestamp') .
					"\n BETWEEN " . $this->_db->quote($previousDate) .
					"\n AND "  . $this->_db->quote($currentDate);
			try {
				$this->_db->setQuery($query);
				$chunk = $this->_db->loadRow();
				if($this->_db->getErrorNum()) {
					throw new JRealtimeException($this->_db->getErrorMsg(), 'error');
				}
				$orderMonthIndex = strftime('%B', $previousDate);
					
				// Assign to processed data array
				$processedData[$orderMonthIndex] = $chunk;
			} catch ( JRealtimeException $e ) {
				$this->app->enqueueMessage ( $e->getMessage (), $e->getErrorLevel () );
				$result = array ();
				break;
			} catch ( Exception $e ) {
				$jRealtimeException = new JRealtimeException ( $e->getMessage (), 'error' );
				$this->app->enqueueMessage ( $jRealtimeException->getMessage (), $jRealtimeException->getErrorLevel () );
				$result = array ();
				break;
			}
				
		}
	
		// No errors detected during processing
		return $processedData;
	}
	
	/**
	 * Return select lists used as filter for editEntity
	 *
	 * @access public
	 * @param Object $record
	 * @return array
	 */
	public function getLists($record = null) {
		$lists = array();
	
		// Supported graph theme
		$themes = array();
		$themes[] = JHTML::_('select.option', 'Universal', 'Universal');
		$themes[] = JHTML::_('select.option', 'Aqua', 'Aqua');
		$themes[] = JHTML::_('select.option', 'Orange', 'Orange');
		$themes[] = JHTML::_('select.option', 'Pastel', 'Pastel');
		$themes[] = JHTML::_('select.option', 'Rose', 'Rose');
		$themes[] = JHTML::_('select.option', 'Softy', 'Softy');
		$themes[] = JHTML::_('select.option', 'Vivid', 'Vivid');
	
		$lists ['graphTheme'] = JHTML::_ ( 'select.genericlist', $themes, 'graphtheme', 'onchange="Joomla.submitform();"', 'value', 'text', $this->getState('graphTheme', 'Universal'));
	
		// Year select list
		$lists ['statsYear'] = JHTML::_('select.integerlist', 2012, 2038, 1, 'stats_year', 'onchange="Joomla.submitform();"', $this->getState('statsYear', date('Y')));
		
		return $lists;
	}
	
	/**
	 * Return select lists used as filter for listEntities
	 *
	 * @access public
	 * @return array
	 */
	public function getFilters() {
		$filters = array();
		
		return $filters;
	}
}