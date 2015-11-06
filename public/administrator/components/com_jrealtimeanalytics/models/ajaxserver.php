<?php
//namespace components\com_jrealtimeanalytics\models; 
/** 
 * @package JREALTIMEANALYTICS::AJAXSERVER::components::com_jrealtimeanalytics 
 * @subpackage models
 * @author Joomla! Extensions Store
 * @copyright (C)2014 Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html  
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');

/**
 * Ajax Server model responsibilities
 *
 * @package JREALTIMEANALYTICS::AJAXSERVER::components::com_jrealtimeanalytics  
 * @subpackage models
 * @since 2.0
 */
interface IAjaxserverModel {
	public function loadAjaxEntity($id, $param, $DIModels) ;
}

/** 
 * Classe che gestisce il recupero dei dati per il POST HTTP
 * @package JREALTIMEANALYTICS::AJAXSERVER::components::com_jrealtimeanalytics  
 * @subpackage models
 * @since 1.0
 */
class JRealtimeModelAjaxserver extends JRealtimeModel implements IAjaxserverModel {

	/**
	 * Mimic an entities list, as ajax calls arrive are redirected to loadEntity public responsibility to get handled
	 * by specific subtask. Responses are returned to controller and encoded from view over HTTP to JS client
	 * 
	 * @access public 
	 * @param string $id Rappresenta l'op da eseguire tra le private properties
	 * @param mixed $param Parametri da passare al private handler
	 * @param Object[]& $DIModels
	 * @return Object& $utenteSelezionato
	 */
	public function loadAjaxEntity($id, $param , $DIModels) {
		//Delega la private functions delegata dalla richiesta sulla entity
		$response = $this->$id($param, $DIModels);

		return $response;
	}
}
