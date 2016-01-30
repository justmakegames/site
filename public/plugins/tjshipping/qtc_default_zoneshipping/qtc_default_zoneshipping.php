<?php
/**
 *  @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 *  @license    GNU General Public License version 2, or later
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.plugin.plugin' );

require_once(JPATH_SITE.'/plugins/tjshipping/qtc_default_zoneshipping/qtc_default_zoneshipping/qtczoneShipHelper.php');

$lang =  JFactory::getLanguage();
$lang->load('plg_tjshipping_qtc_default_zoneshipping', JPATH_ADMINISTRATOR);

class  plgTjshippingQtc_default_zoneshipping extends JPlugin
{
	/**
	 * @var $_element  string  Should always correspond with the plugin's filename,
	 *                         forcing it to be unique
	 */
    var $_element   = 'qtc_default_zoneshipping';
    //var	$plugDescription = JText::_("PLG_TJSHIPPING_QTC_DEFAULT_ZONESHIPPING_PLUG_DESCRI");

	function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		//Set the language in the class
		$config = JFactory::getConfig();
	}

	// Used to Build List of taxation with respective of component Components
/*	function onTP_GetInfo($config)
	{
		if (!in_array($this->_name,$config))
		{
			return;
		}

		$obj 		= new stdClass;
		$obj->name 	=$this->params->get( 'plugin_name' );
		$obj->id	= $this->_name;
		return $obj;

	}*/

	/**
	 * Checks to make sure that this plugin is the one being triggered by the extension
	 *
	 * @access public
	 * @return $row object row from extension.
	 * @since 2.5
	 */
	function _shipGetInfo( $row )
	{
		$element = $this->_element;
		$success = false;

		if (is_object($row) && !empty($row->element) && $row->element == $element )
		{
			//row$obj 		= new stdClass;
			$row->plugConfigLink 	= "index.php?option=com_plugins&task=plugin.edit&extension_id={$row->extension_id}";
			$row->plugDescription	=  JText::_("PLG_TJSHIPPING_QTC_DEFAULT_ZONESHIPPING_XML_DESCRIPTION");
			return $row;
		}
		return ;

	}
	/**
	 * Method used to display HTML.
	 *
	 * @param   object  $jinput  Joomla's jinput Object.
	 *
	 * @since   1.0
	 * @return   null
	 */
	function _getShipMethodForm($jinput)
	{
		return $html = $this->_shipBuildLayout($jinput, $layout = 'default');
		//print"<pre>asdfasddssdasdas";  print_r($html); die;
	}


	/**
	 * This method handles all ajax related things;
	 *
	 * @param   object  $jinput  Joomla's jinput Object.
	 *
	 * @since   1.0
	 * @return   Json format result.
	 */
	function TjShip_AjaxCallHandler($jinput)
	{
		$post = $jinput->post;
		$qtcshiphelper = new qtcshiphelper;
		$qtczoneShipHelper = new qtczoneShipHelper;
		$ajaxTask = $jinput->get('plugtask');

		if (empty($ajaxTask))
		{
			$ajaxTask = $post->get('plugtask');
		}

		switch ($ajaxTask)
		{
			case "addShipMethRate" : $result = $qtcshiphelper->addShipMethRate($jinput);
			break;

			case "qtcDelshipMethRate" : $result = $qtcshiphelper->qtcDelshipMethRate($jinput);
			break;

			case "updateShipMethRate" : $result = $qtcshiphelper->qtcUpdateShipMethRate($jinput);
			break;

			case "getFieldHtmlForShippingType" :
				$fieldData = $jinput->get('fieldData', array(), "ARRAY");
				$result = $qtczoneShipHelper->getFieldHtmlForShippingType($fieldData);
			break;
		}

		// Return json formatted result
		return $result;
	}

	/**
	 * Shipping form related action will be handled by this function.
	 *
	 * @param   object  $jinput  Joomla's jinput Object.
	 *
	 * @since   1.0
	 * @return   URL param that have to add by component
	 */
	function TjShip_plugActionkHandler($jinput)
	{
		$post = $jinput->post;
 		$plugview = $jinput->get('plugview');
		$qtczoneShipHelper = new qtczoneShipHelper;

		// Plugin view is not found in URL then check in post array.
		if (empty($plugview))
		{
			$plugview = $post->get('plugview');
		}

		$actionDetail = array();
		// Add plugin related params Eg nextview=edit&task=display
		$actionDetail['urlPramStr'] = '';

		// Action status msg
		$actionDetail['statusMsg'] = '';

		if (!empty($plugview))
		{
			// Handle view related action ( save or etc).
			$actionDetail = $qtczoneShipHelper->_viewHandler($jinput, $plugview);
			/*
			switch($plugview)
			{
				case 'createshipmeth':

					$actionDetail['urlPramStr'] = 'plugview=createshipmeth';
					$actionDetail['urlPramStr'] = $qtczoneShipHelper->_viewHandler($jinput);

				break;
				case 'saveshipmethod':
					$actionDetail['urlPramStr'] = 'plugview=createshipmeth';

				break;
			}
			*
			* */
		}

		return $actionDetail;

		//return $html = $this->_shipBuildLayout($jinput, $layout = 'default');
		//print"<pre>asdfasddssdasdas";  print_r($html); die;
	}

	//Builds the layout to be shown, along with hidden fields.
	function TjShip_shipBuildLayout($jinput)
	{
		$qtczoneShipHelper = new qtczoneShipHelper;
		// Get plugview url param value
		$plugLayout = $jinput->get('plugview');

		// Plugin view is not found in URL then check in post array.
		if (empty($plugLayout))
		{
			$plugLayout = $jinput->post->get('plugview','default');
		}

		// Load view
		$shipFormData = $qtczoneShipHelper->_qtcLoadViewData($plugLayout, $jinput);

		// Load the layout & push variables
		ob_start();
        $layout = $this->buildLayoutPath($plugLayout, $jinput);

        include($layout);
        $html = ob_get_contents();
        ob_end_clean();

		return $html;
	}

	/**
	 * This method return array available shipping plugin methods
	 *
	 * @since   1.0
	 * @return   Array of available shipping methods.
	 */
	function TjShip_getAvailableShipMethods($store_id)
	{
		$qtczoneShipHelper = new qtczoneShipHelper;
		return $qtczoneShipHelper->getAvailableShipMethods($store_id);

	}
	/**
	 * This method return shipping methods detail.
	 *
	 * @since   1.0
	 * @return   Array of shipping method detail.
	 */
	function TjShip_getShipMethodDetail($shipMethId)
	{
		$qtczoneShipHelper = new qtczoneShipHelper;
		return $qtczoneShipHelper->getShipMethodDetail($shipMethId);

	}

	function buildLayoutPath($layout = 'default', $jinput)
	{
		$app = JFactory::getApplication();
		$core_file 	= dirname(__FILE__)  . '/' . $this->_name . '/tmpl/' . $layout . '.php';
		// Check for override layout ( Is present )?
		$override		= JPATH_BASE . '/' . 'templates/' . $app->getTemplate() . '/html/plugins/' . $this->_type . '/' . $this->_name . '/' . $layout .'.php';

		if (JFile::exists($override))
		{
			$layoutPath = $override;
		}
		else
		{
			$isAdmin = JFactory::getApplication()->isAdmin();

			if (! $isAdmin)
			{
				$layoutPath =  $core_file;
			}
			else
			{
				$layoutPath		= JPATH_SITE . '/components/com_quick2cart/views_bs2/plugins/tjshipping/qtc_default_zoneshipping/' . $layout .'.php';
			}
		}

		return  $layoutPath;
	}

	/**
	 * Method provides load helper file needed
	 *
	 * @since   1.0
	 * @return   null
	 */
	function _TjloadTaxHelperFiles()
	{
		/*$path = JPATH_SITE . DS . 'components' . DS . 'com_quick2cart' . DS . 'helper.php';
		if (!class_exists('comquick2cartHelper'))
		{
			//require_once $path;
			 JLoader::register('comquick2cartHelper', $path );
			 JLoader::load('comquick2cartHelper');
		}
				// LOAD STORE HELPER
		$path = JPATH_SITE . DS . 'components' . DS . 'com_quick2cart' . DS . 'helpers' . DS . 'storeHelper.php';
		if (!class_exists('storeHelper'))
		{
			//require_once $path;
			 JLoader::register('storeHelper', $path );
			 JLoader::load('storeHelper');
		}*/

		// LOAD product HELPER
		$path = JPATH_SITE . DS . 'components' . DS . 'com_quick2cart' . DS . 'helpers' . DS . 'taxHelper.php';
		if (!class_exists('productHelper'))
		{
			//require_once $path;
			 JLoader::register('taxHelper', $path );
			 JLoader::load('taxHelper');
		}
		//require_once JPATH_SITE . DS . 'components' . DS . 'com_quick2cart' . DS . 'helpers' . DS . 'product.php';

	}

	/**
	 * This method provide aplicable shipping charge detail using for provided shipping method.
	 *
	 * @param   object  $vars  gives billing, shipping, item_id, methodId(unique plug shipping method id) etc.
	 *
	 * @since   1.0
	 * @return  Shipping method charges detail.
	 */
	function TjShip_getShipMethodChargeDetail($vars)
	{
		$qtczoneShipHelper = new qtczoneShipHelper;
		return $qtczoneShipHelper->getShipMethodChargeDetail($vars);
	}
	/**
	 * While placing the order, this method validates shipping charges so that if any one changes the shipping charges from Hidden fields will not affect.
	 *
	 * @param   object  $vars  gives shipping method id, unqiue plugin shecific -rate id (which point to price related table row), shipping cost, etc.
	 *
	 * @since   1.0
	 * @return  Shipping method charges.
	 */
	function TjShip_validateShipCharges($vars)
	{
		$qtczoneShipHelper = new qtczoneShipHelper;
		return $qtczoneShipHelper->qtcValidateShipCharges($vars);
	}

}
