<?php
//namespace administrator\components\com_jrealtimeanalytics;
/**  
 * Application install script
 * @package JREALTIMEANALYTICS::administrator::components::com_jrealtimeanalytics 
 * @author Joomla! Extensions Store
 * @copyright (C) 2013 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html   
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' ); 
  
/** 
 * Application install script class
 * @package JREALTIMEANALYTICS::administrator::components::com_jrealtimeanalytics  
 */
class com_jrealtimeanalyticsInstallerScript {
	/*
	 * The release value to be displayed and checked against throughout this file.
	 */
	private $release = '1.0';
	
	/*
	* Find mimimum required joomla version for this extension. It will be read from the version attribute (install tag) in the manifest file
	*/
	private $minimum_joomla_release = '1.6.0';
	
	/*
	 * $parent is the class calling this method.
	 * $type is the type of change (install, update or discover_install, not uninstall).
	 * preflight runs before anything else and while the extracted files are in the uploaded temp folder.
	 * If preflight returns false, Joomla will abort the update and undo everything already done.
	 */
	function preflight($type, $parent) {
	
	}
	
	/*
	 * $parent is the class calling this method.
	 * install runs after the database scripts are executed.
	 * If the extension is new, the install method is run.
	 * If install returns false, Joomla will abort the install and undo everything already done.
	 */
	function install($parent) {
		$database = JFactory::getDBO ();
		echo ('<style type="text/css">div.alert-success, span.step_details {display: none;font-size: 12px;} span.step_details div{margin-top:0 !important;} table.adminform h3{text-align:left;}.installcontainer{max-width: 800px;}</style>');
		echo ('<link rel="stylesheet" type="text/css" href="' . JURI::root ( true ) . '/administrator/components/com_jrealtimeanalytics/css/bootstrap-install.css' . '" />');
		echo ('<script type="text/javascript" src="' . JURI::root ( true ) . '/administrator/components/com_jrealtimeanalytics/js/installer.js' .'"></script>' );
		$lang = JFactory::getLanguage ();
		$lang->load ( 'com_jrealtimeanalytics' );
		$parentParent = $parent->getParent();
		
		// Component installer
		$componentInstaller = JInstaller::getInstance ();
		$pathToPlugin = $componentInstaller->getPath ( 'source' ) . '/plugin';
		$pathToModule = $componentInstaller->getPath ( 'source' ) . '/module';
		
		echo ('<div class="installcontainer">');
		// New plugin installer
		$pluginInstaller = new JInstaller ();
		if (! $pluginInstaller->install ( $pathToPlugin )) {
			echo '<p>' . JText::_( 'COM_JREALTIME_ERROR_INSTALLING_PLUGINS' ) . '</p>';
			// Install failed, rollback changes
			$parentParent->abort(JText::_('COM_JREALTIME_ERROR_INSTALLING_PLUGINS'));
			return false;
		} else {
			$query = "UPDATE #__extensions" . "\n SET enabled = 1" . 
					 "\n WHERE type = 'plugin' AND element = " . $database->Quote ( 'jrealtimeanalytics' ) . 
					 "\n AND folder = " . $database->Quote ( 'system' );
			$database->setQuery ( $query );
			if (! $database->execute ()) {
				echo '<p>' . JText::_( 'COM_JREALTIME_ERROR_PUBLISHING_PLUGIN' ) . '</p>';
			}?>
			<div class="progress">
				<div class="bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
					<span class="step_details"><?php echo JText::_('COM_JREALTIME_OK_INSTALLING_PLUGINS');?></span>
				</div>
			</div>
			<?php 
		}
		
		// New module installer
		$moduleInstaller = new JInstaller ();
		if (! $moduleInstaller->install ( $pathToModule )) {
			echo '<p>' . JText::_ ( 'COM_JREALTIME_ERROR_INSTALLING_MODULE' ) . '</p>';
			// Install failed, rollback changes
			$parentParent->abort(JText::_('COM_JREALTIME_ERROR_INSTALLING_MODULE'));
			return false;
		} else {
			?>
			<div class="progress">
				<div class="bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
					<span class="step_details"><?php echo JText::_('COM_JREALTIME_OK_INSTALLING_MODULE');?></span>
				</div>
			</div>
			<?php 
		}
		?>
		<div class="progress">
			<div class="bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
				<span class="step_details"><?php echo JText::_('COM_JREALTIME_OK_INSTALLING_COMPONENT');?></span>
		  	</div>
		</div>
		
		<div class="alert alert-success"><?php echo JText::_('COM_JREALTIME_ALL_COMPLETED');?></div>
		<?php 
		echo ('</div>');
		
		return true;
	}
	
	/*
	 * $parent is the class calling this method.
	 * update runs after the database scripts are executed.
	 * If the extension exists, then the update method is run.
	 * If this returns false, Joomla will abort the update and undo everything already done.
	 */
	function update($parent) {
		// Execute always SQL install file to get added updates in that file, disregard DBMS messages and Joomla queue for user
		$parentParent = $parent->getParent();
		$parentManifest = $parentParent->getManifest();
		try {
			// Install/update always without error handlingm case legacy JError
			JError::setErrorHandling(E_ALL, 'ignore');
			if (isset($parentManifest->install->sql)) {
				$parentParent->parseSQLFiles($parentManifest->install->sql);
			}
		} catch (Exception $e) {
			// Do nothing for user for Joomla 3.x case, case Exception handling
		}

		// Indifferentemente gestiamo l'installazione del plugin
		$this->install($parent);
	}
	
	/*
	 * $parent is the class calling this method.
	 * $type is the type of change (install, update or discover_install, not uninstall).
	 * postflight is run after the extension is registered in the database.
	 */
	function postflight($type, $parent) { 
		// Preferences general
		$params ['daemonrefresh'] = '4';
		$params ['realtimerefresh'] = '4';
		$params ['maxlifetime_session'] = '8';
		$params ['guestprefix'] = 'Visitor';
		$params ['cpanelstats_period_interval'] = 'day';
		$params ['geolocation_mode'] = 'ip';
		$params ['heatmap_status'] = '1';
		$params ['heatmap_max_valid_width'] = '350';
		$params ['heatmap_max_valid_height'] = '50';

		// Preferences stats report 
		$params ['default_period_interval'] = 'week';
		$params ['landing_stats'] = '1';
		$params ['leaveoff_stats'] = '1';
		$params ['visitsbypage_stats'] = '1';
		$params ['visitsbyuser_stats'] = '1';
		$params ['visitsbyip_stats'] = '1';
		$params ['referral_stats'] = '1';
		$params ['searchkeys_stats'] = '1';
		$params ['xtd_singleuser_stats'] = '0';
		
		// Exclusions
		$params ['ipaddress'] = '';
		$params ['iprange_start'] = '';
		$params ['iprange_end'] = '';
		$params ['iprange_multiple'] = '';
		$params ['daemon_exclusions'] = array('0');
		$params ['groups_exclusions'] = array('0');
		
		// Stats module
		$params ['daily_stats'] = '1';
		$params ['realtime_stats'] = '0';
			
		// Advanced
		$params ['gcenabled'] = '1'; 
 		$params ['probability'] = '20';
 		$params ['gc_serverstats_enabled'] = '0';
 		$params ['gc_serverstats_period'] = '24';
 		$params ['caching'] = '0';
 		$params ['cache_lifetime'] = '60';
 		$params ['offset_type'] = 'joomla';
 		$params ['anonymize_ipaddress'] = '0';
 		$params ['direct_track_extensions'] = array('0');
 		
 		// Report
 		$params ['report_mailfrom'] = '';
 		$params ['report_fromname'] = '';
 		$params ['report_byemail'] = '0';
 		$params ['report_addresses'] = '';
 		$params ['report_format'] = 'emailxls';
 		$params ['report_frequency'] = '7';

 		// JS management
		$params ['noconflict'] = '1';
		$params ['includejquery'] = '1';
		$params ['scripts_loading'] = 'defer';
		$params ['cbnoconflict'] = '1';
		$params ['enable_debug'] = '0';

		// Analytics settings
		$params ['ga_domain'] = '';
		$params ['wm_domain'] = '';
		$params ['ga_api_key'] = '';
		$params ['ga_client_id'] = '';
		$params ['ga_client_secret'] = '';

		// Insert all params settings default first time, merge and insert only new one if any on update, keeping current settings
		if ($type == 'install') {  
			$this->setParams ( $params );  
		} elseif ($type == 'update') {
			// Load and merge existing params, this let add new params default and keep existing settings one
			$db = JFactory::getDbo ();
			$query = $db->getQuery(true);
			$query->select('params');
			$query->from('#__extensions');
			$query->where($db->quoteName('name') . '=' . $db->quote('jrealtimeanalytics'));
			$db->setQuery($query);
			$existingParamsString = $db->loadResult();
			// store the combined new and existing values back as a JSON string
			$existingParams = json_decode ( $existingParamsString, true );
			$updatedParams = array_merge($params, $existingParams);
			
			$this->setParams($updatedParams);
		} 
	}
	
	/*
	 * $parent is the class calling this method
	 * uninstall runs before any other action is taken (file removal or database processing).
	 */
	function uninstall($parent) {
		$database = JFactory::getDBO ();
		$lang = JFactory::getLanguage();
		$lang->load('com_jrealtimeanalytics');
		 
		// Controllo esistenza del plugin
		$query = "SELECT extension_id" .
				 "\n FROM #__extensions" .
				 "\n WHERE type = 'plugin' AND element = " . $database->Quote('jrealtimeanalytics') .
				 "\n AND folder = " . $database->Quote('system');
		$database->setQuery($query);
		$pluginID = $database->loadResult();
		if(!$pluginID) {
			echo '<p>' . JText::_('COM_JREALTIME_PLUGIN_ALREADY_REMOVED') . '</p>';
		} else {
			// Si necessita una nuova istanza dell'installer per il plugin
			$pluginInstaller = new JInstaller ();
			if(!$pluginInstaller->uninstall('plugin', $pluginID)) {
				echo '<p>' . JText::_('COM_JREALTIME_ERROR_UNINSTALLING_PLUGINS') . '</p>';
			} 
		}
		
		// Check if module exists
		$query = "SELECT extension_id" .
				 "\n FROM #__extensions" .
				 "\n WHERE type = 'module' AND element = " . $database->quote('mod_jrealtimeanalytics') .
				 "\n AND client_id = 0";
		$database->setQuery($query);
		$moduleID = $database->loadResult();
		if(!$moduleID) {
			echo '<p>' . JText::_('COM_JREALTIME_MODULE_ALREADY_REMOVED') . '</p>';
		} else {
			// New plugin installer
			$moduleInstaller = new JInstaller ();
			if(!$moduleInstaller->uninstall('module', $moduleID)) {
				echo '<p>' . JText::_('COM_JREALTIME_ERROR_UNINSTALLING_MODULE') . '</p>';
			}
		}
		
		// Processing completo
		return true;
	}
	
	/*
	 * get a variable from the manifest file (actually, from the manifest cache).
	 */
	function getParam($name) {
		$db = JFactory::getDbo ();
		$db->setQuery ( 'SELECT manifest_cache FROM #__extensions WHERE name = "jrealtimeanalytics"' );
		$manifest = json_decode ( $db->loadResult (), true );
		return $manifest [$name];
	}
	
	/*
	 * sets parameter values in the component's row of the extension table
	 */
	function setParams($param_array) {
		if (count ( $param_array ) > 0) { 
			$db = JFactory::getDbo (); 
			// store the combined new and existing values back as a JSON string
			$paramsString = json_encode ( $param_array );
			$db->setQuery ( 'UPDATE #__extensions SET params = ' . $db->quote ( $paramsString ) . ' WHERE name = "jrealtimeanalytics"' );
			$db->execute ();
		}
	}
}