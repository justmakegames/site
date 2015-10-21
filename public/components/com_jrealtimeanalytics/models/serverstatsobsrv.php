<?php
// namespace components\com_jrealtimeanalytics\models;
/**
 *
 * @package JREALTIMEANALYTICS::SERVERSTATS::components::com_jrealtimeanalytics
 * @subpackage models
 * @author Joomla! Extensions Store
 * @copyright (C) 2013 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * Serverstats class frontend implementation <<testable_behavior>>
 * 
 * @package JREALTIMEANALYTICS::REALSTATS::components::com_jrealtimeanalytics
 * @subpackage models
 * @since 2.0
 */
class JRealtimeModelServerstatsObsrv extends JRealtimeModelObserver {
	/**
	 * Session ID utente in refresh
	 *
	 * @var Object&
	 * @access private
	 */
	private $session;
	
	/**
	 * Component config
	 *
	 * @access private
	 * @var Object &
	 */
	private $config;
	
	/**
	 * Pagina visitata in tracking
	 *
	 * @var string
	 * @access private
	 */
	private $visitedPage;
	
	/**
	 * Allowed direct tracking extensions
	 *
	 * @var string
	 * @access private
	 */
	private $allowedDirectTrackExtensions;
	
	/**
	 * Ottiene la nowpage visitata dall'utente nel tracking corrente in dispatch
	 *
	 * @access protected
	 * @return string
	 */
	protected function getVisitedPage() {
		// Get current user page
		$visitedUserPage = $this->app->input->post->getString ('nowpage', null);
		
		// Do url decoding
		$visitedUserPage = urldecode($visitedUserPage);
		
		return $visitedUserPage;
	}
	
	/**
	 * Ottiene l'header HTTP Accept/Language per lo storing
	 * della nazionalità dell'utente
	 *
	 * @access protected
	 * @return string
	 */
	protected function getLocationHeader() {
		$code = null;
		// IP based geolocation by default
		$IPAddress = $_SERVER['REMOTE_ADDR'];
		$webServiceResponse = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $IPAddress);
		if($webServiceResponse) {
			$decodedResponse = json_decode($webServiceResponse);
			$code = $decodedResponse->geoplugin_countryCode;
		}
		
		// Browser header based geolocation, by param or fallback
		if(($this->config->get('geolocation_mode', 'ip') == 'browser') || !$code || ($code == 'XX')) {
			$chunkHttpAcceptHeader = $_SERVER ['HTTP_ACCEPT_LANGUAGE'];
			// Patch per header HTTP Internet Explorer
			if (strlen ( $chunkHttpAcceptHeader ) > 2) {
				$spliced = explode ( '-', $chunkHttpAcceptHeader );
				$code = substr ( $spliced [1], 0, 2 );
			} else {
				$code = $chunkHttpAcceptHeader;
			}
		}
		return strtoupper ( $code );
	}
	
	/**
	 * Ottiene il browser in uso dall'utente
	 *
	 * @access protected
	 * @return string
	 */
	protected function getBrowser() {
		$browserName = 'N/A';
		$browsers = array (
				'firefox'=>'firefox',
				'msie'=>'msie',
				'trident'=>'msie',
				'opr'=>'opera',
				'opera'=>'opera',
				'chrome'=>'chrome',
				'safari'=>'safari',
				'mozilla'=>'mozilla',
				'seamonkey'=>'seamonkey',
				'konqueror'=>'konqueror',
				'netscape'=>'netscape',
				'gecko'=>'gecko',
				'navigator'=>'navigator',
				'mosaic'=>'mosaic',
				'lynx'=>'lynx',
				'amaya'=>'amaya',
				'omniweb'=>'omniweb',
				'avant'=>'avant',
				'camino'=>'camino',
				'flock'=>'flock',
				'aol'=>'aol',
				'android'=>'android'
		);
		
		if (isset ( $_SERVER ['HTTP_USER_AGENT'] )) {
			$browser ['useragent'] = $_SERVER ['HTTP_USER_AGENT'];
			$user_agent = strtolower ( $browser ['useragent'] );
			foreach ( $browsers as $_browser=>$userBrowser ) {
				if (preg_match ( "/($_browser)[\/ ]?([0-9.]*)/i", $user_agent, $match )) {
					if ($browsers[$match [1]] == 'msie') {
						$browsers[$match [1]] = 'Internet Explorer';
					}
					$browserName = ucfirst ( $browsers[$match [1]] );
					break;
				}
			}
		}
		return $browserName;
	}
	
	/**
	 * Ottiene il sistema operativo in uso dall'utente a partire dalla string HTTP_USER_AGENT di fallback
	 *
	 * @access protected
	 * @return string
	 */
	protected function getOS() {
		$userAgentString = $_SERVER ['HTTP_USER_AGENT'];
		$oses = array (
				'Windows 311' => 'Win16',
				'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
				'Windows ME' => '(Windows 98)|(Win 9x 4.90)|(Windows ME)',
				'Windows 98' => '(Windows 98)|(Win98)',
				'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
				'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
				'Windows Server2003' => '(Windows NT 5.2)',
				'Windows Vista' => '(Windows NT 6.0)',
				'Windows 7' => '(Windows NT 6.1)',
				'Windows 8' => '(Windows NT 6.2)',
				'Windows 8' => '(Windows NT 6.3)',
				'Windows NT' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
				'OpenBSD' => 'OpenBSD',
				'SunOS' => 'SunOS',
				'Ubuntu' => 'Ubuntu',
				'Android' => 'Android',
				'Linux' => '(Linux)|(X11)',
				'iPhone' => 'iPhone',
				'iPad' => 'iPad',
				'MacOS' => '(Mac_PowerPC)|(Macintosh)',
				'QNX' => 'QNX',
				'BeOS' => 'BeOS',
				'OS2' => 'OS/2',
				'SearchBot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)' 
		);
		
		foreach ( $oses as $os => $pattern ) {
			if (preg_match ( '/' . $pattern . '/i', $userAgentString )) {
				return $os;
			}
		}
		return 'N/A';
	}
	
	/**
	 * Get info from user referrer site, must be different from current landing site
	 *
	 * @access protected
	 * @return mixed If some exceptions occur return an Exception object otherwise boolean true
	 */
	protected function setReferral() {
		// Try to recover HTTP_REFERER header if sent from browser
		$referral = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
		
		// Referral found
		if(trim($referral)) {
			// Ensure the referrer is external to current target site, must be accepted only real referral
			// Get JUri instance for referral url
			$isValidReferral = false;
			$uriReferral = JUri::getInstance($referral);
			$hostReferral = $uriReferral->toString(array('scheme', 'host', 'port'));
			
			// Get JUri instance for current site page visited
			$uriCurrentpage = JUri::getInstance();
			$baseCurrentPage = $uriCurrentpage->base();
			
			// Ensure that referral is valid AKA external to this current site, otherwise skip tracking and return
			if (stripos($baseCurrentPage, $hostReferral) === 0 && !empty($hostReferral)) {
				return true;
			}
			
			try {
				$query = "INSERT INTO" . $this->_db->quoteName('#__realtimeanalytics_referral') .
						 "\n (" . $this->_db->quoteName('referral') . "," .
						 "\n " . $this->_db->quoteName('record_date') . "," .
						 "\n " . $this->_db->quoteName('ip') . ")" .
						 "\n VALUES ( " . $this->_db->quote($referral) . ", " .
						 $this->_db->quote(date('Y-m-d')) . ", " .
						 $this->_db->quote($_SERVER['REMOTE_ADDR']) . " )";
				$this->_db->setQuery($query)->execute();
				if($this->_db->getErrorNum()) {
					throw new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_INSERTING_REFERRAL', $this->_db->getErrorMsg()), 'error', 'Server stats');
				}
			} catch (JRealtimeException $e) {
				return $e;
			} catch (Exception $e) {
				$jrealtimeException = new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_INSERTING_REFERRAL', $e->getMessage()), 'error', 'Server stats');
				return $jrealtimeException;
			}
		}
		
		return true;
	}
	
	/**
	 * Set phrase searched by user on frontent, both for old search and com_finder smart search
	 * All is managed by system plugin and observers notification
	 *
	 * @access protected
	 * @param string $phrase The phrase searched keyword to store/increment
	 * @return mixed If some exceptions occur return an Exception object otherwise boolean true
	 */
	protected function setPhrase($phrase) {
		// Referral found
		if(trim($phrase)) {
			try {
				$query = "INSERT INTO" . $this->_db->quoteName('#__realtimeanalytics_searches') .
						 "\n (" . $this->_db->quoteName('phrase') . "," .
						 "\n " . $this->_db->quoteName('record_date') . ")" .
						 "\n VALUES ( " . $this->_db->quote($phrase) . ", " . $this->_db->quote(date('Y-m-d')) . " )";
				$this->_db->setQuery($query)->execute();
				if($this->_db->getErrorNum()) {
					throw new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_INSERTING_PHRASE', $this->_db->getErrorMsg()), 'error', 'Server stats');
				}
			} catch (JRealtimeException $e) {
				return $e;
			} catch (Exception $e) {
				$jrealtimeException = new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_INSERTING_PHRASE', $e->getMessage()), 'error', 'Server stats');
				return $jrealtimeException;
			}
		}
	
		return true;
	}
	
	/**
	 * Metodo di interfaccia pubblica per lo storing dei dati server stats
	 * nel tracking per il dispatch corrente
	 *
	 * @param IObservableModel $subject
	 * @access public
	 * @return mixed If some exceptions occur return an Exception object otherwise boolean true
	 */
	public function update(IObservableModel $subject) {
		// Skip additional tracking
		$skip = true;
		$option = $this->app->input->getCmd('option');
		
		// Current subject Observable object
		$this->subject = $subject;
		
		// Execute only on initialize or on some allowed extensions
		if(!$this->subject->getState('initialize') && !in_array($option, $this->allowedDirectTrackExtensions, true)) {
			return true;
		}
		
		// Is this a direct tracking for allowed extensions?
		if(in_array($option, $this->allowedDirectTrackExtensions, true)) {
			$this->app->input->post->set('nowpage', JUri::getInstance()->current());
			$user = JFactory::getUser();
			$userName = $user->name;
			if (! $userName) {
				$userName = JRealtimeHelpersUsers::generateRandomGuestNameSuffix ( $this->session->session_id, $this->config );
			}
			$this->subject->setState('username', $userName);
			$this->subject->setState('userid', $user->id);
			$skip = false;
		}
		
		// Execute only on notification by plugin entrypoint observable on search tasks both for old and smart search
		if($phrase = $this->subject->getState('searchdispatch')) {
			$this->setPhrase($phrase);
			if($skip) {
				return true;
			}
		}
		
		// Execute only on notification by plugin entrypoint observable
		if($this->subject->getState('appdispatch')) {
			$this->setReferral();
			if($skip) {
				return true;
			}
		}
		
		// Current or generated user name
		$userName = $this->subject->getState('username');
		$userid = $this->subject->getState('userid');
		
		// Inserting dei dati recuperati dalla dispatch dell'utente
		$table = new stdClass ();
		// Info stats recover
		$table->session_id_person = $this->session->session_id;
		$table->user_id_person = $userid;
		$table->customer_name = $userName;
		$table->visitdate = date ( 'Y-m-d' );
		$table->visit_timestamp = time ();
		$table->visitedpage = $this->getVisitedPage ();
		$table->geolocation = $this->getLocationHeader ();
		$table->ip = $_SERVER ['REMOTE_ADDR'];
		$table->browser = $this->getBrowser ();
		$table->os = isset($_SERVER ['OS']) ? $_SERVER ['OS'] : $this->getOS ();
		
		try {
			// Test primario primary key esistente che evita errori DBMS inserimento chiave primaria esistente
			$query = $this->_db->getQuery ( true );
			$query->select ( $this->_db->quoteName ( "session_id_person" ) )
				  ->from ( $this->_db->quoteName ( "#__realtimeanalytics_serverstats" ) )
				  ->where ( $this->_db->quoteName ( "session_id_person" ) . " = " . $this->_db->quote ( $table->session_id_person ) )
				  ->where ( $this->_db->quoteName ( "visitdate" ) . " = " . $this->_db->quote ( $table->visitdate ) )
				  ->where ( $this->_db->quoteName ( "visitedpage" ) . " = " . $this->_db->quote ( $table->visitedpage ) );
			
			// Set the query and execute the insert.
			$this->_db->setQuery ( $query );
			$exists = ( bool ) $this->_db->loadResult ();
			if($this->_db->getErrorNum()) {
				throw new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_READING_EXISTING_STAT', $this->_db->getErrorMsg()), 'error', 'Server stats');
			}
			
			if (! $exists) {
				// Primary key not exists on DB table, so go ahead and insert a new record, it's the first time that today this visitor surf this page
				$this->_db->insertObject ( '#__realtimeanalytics_serverstats', $table );
				if($this->_db->getErrorNum()) {
					throw new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_INSERTING_NEWSTAT', $this->_db->getErrorMsg()), 'error', 'Server stats');
				}
			} else {
				// Make only an update for the user name if it was the case that user has been logged in, p.key restricted only to session id
				$tableOnlyName = new stdClass ();
				$tableOnlyName->session_id_person = $this->session->session_id;
				$tableOnlyName->customer_name = $userName;
				$tableOnlyName->user_id_person = $userid;
				return $this->_db->updateObject ( '#__realtimeanalytics_serverstats', $tableOnlyName, 'session_id_person' );
			}
		} catch (JRealtimeException $e) {
			return $e;
		
		} catch (Exception $e) {
			$jrealtimeException = new JRealtimeException(JText::sprintf('COM_JREALTIME_ERROR_ONDATABASE_SERVERSTATS', $e->getMessage()), 'error', 'Server stats');
			return $jrealtimeException;
		}
		
		return true;
	}
	
	/**
	 * Class constructor
	 * 
	 * @access public
	 * @return Object&
	 */
	public function __construct($config = array()) {
		$this->session = $config ['sessiontable'];
		$this->config = JComponentHelper::getParams ( 'com_jrealtimeanalytics' );
		
		$this->allowedDirectTrackExtensions = $this->config->get('direct_track_extensions', array('0'));
		
		parent::__construct ( $config );
	}
} 