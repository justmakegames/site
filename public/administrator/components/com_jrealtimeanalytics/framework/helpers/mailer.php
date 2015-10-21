<?php
// namespace administrator\components\com_jrealtimeanalytics\framework\helpers;
/**
 *
 * @package JREALTIMEANALYTICS::components::com_jrealtimeanalytics
 * @subpackage framework
 * @subpackage helpers
 * @author Joomla! Extensions Store
 * @copyright (C) 2014 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 *         
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );
jimport ( 'joomla.mail.mail' );

/**
 * Subclassing mailer object to avoid old JError 500 JDocumentError template error.php
 *
 * @package JREALTIMEANALYTICS::components::com_jrealtimeanalytics
 * @subpackage framework
 * @subpackage helpers
 * @since 2.3
 */
class JRealtimeHelpersMailer extends JMail {
	/**
	 * Exception object occurred
	 *
	 * @var Object
	 * @access public
	 */
	public $exception;
	
	/**
	 * Error details occurred
	 *
	 * @var Object
	 * @access public
	 */
	public $errorDetails;
	
	/**
	 * Singleton instance
	 *
	 * @param string $id
	 * @return mixed
	 */
	public static function getInstance($id = 'Joomla') {
		$conf = JFactory::getConfig ();
		
		$smtpauth = ($conf->get ( 'smtpauth' ) == 0) ? null : 1;
		$smtpuser = $conf->get ( 'smtpuser' );
		$smtppass = $conf->get ( 'smtppass' );
		$smtphost = $conf->get ( 'smtphost' );
		$smtpsecure = $conf->get ( 'smtpsecure' );
		$smtpport = $conf->get ( 'smtpport' );
		$mailfrom = $conf->get ( 'mailfrom' );
		$fromname = $conf->get ( 'fromname' );
		$mailer = $conf->get ( 'mailer' );
		
		// Create a JMail object
		$mail = new JRealtimeHelpersMailer ();
		
		// Set default sender without Reply-to
		$mail->SetFrom ( JMailHelper::cleanLine ( $mailfrom ), JMailHelper::cleanLine ( $fromname ), 0 );
		$mail->IsHTML(true);
		
		// Default mailer is to use PHP's mail function
		switch ($mailer) {
			case 'smtp' :
				$mail->useSMTP ( $smtpauth, $smtphost, $smtpuser, $smtppass, $smtpsecure, $smtpport );
				break;
			
			case 'sendmail' :
				$mail->IsSendmail ();
				break;
			
			default :
				$mail->IsMail ();
				break;
		}
		
		if (empty ( self::$instances [$id] )) {
			self::$instances [$id] = $mail;
		}
		
		return self::$instances [$id];
	}
	
	/**
	 * Send an email using Exceptions of PHPMailer
	 *
	 * @access public
	 * @throws RuntimeException
	 * @return boolean
	 */
	public function sendUsingExceptions() {
		if (JFactory::getConfig ()->get ( 'mailonline', 1 )) {
			if (($this->Mailer == 'mail') && ! function_exists ( 'mail' )) {
				return false;
			}
			// Try send now
			try {
				if (! $this->PreSend ()) {
					$this->errorDetails = $this->ErrorInfo;
					return false;
				}
					
				$sent = $this->PostSend ();
				if(!$sent) {
					$this->errorDetails = $this->ErrorInfo;
				}
				return $sent;
			} catch ( phpmailerException $e ) {
				$this->mailHeader = '';
				$this->exception = $e;
				$this->errorDetails = $this->ErrorInfo;
				return false;
			}
		} else {
			JFactory::getApplication ()->enqueueMessage ( JText::_ ( 'JLIB_MAIL_FUNCTION_OFFLINE' ) );
			return false;
		}
	}
}