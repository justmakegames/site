<?php
/**
 *  @package    Quick2Cart
 *  @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 *  @license    GNU General Public License version 2, or later
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.model');


class quick2cartModelOrders extends JModelLegacy
{
	var $_data;
	var $_total = null;
	var $_pagination = null;
	var $store_id = null;
	var $customer_count = null;


	/* Constructor that retrieves the ID from the request*/
	function __construct()
	{
		parent::__construct();
		$this->siteMainHelper = new comquick2cartHelper;
		global $mainframe, $option;
		$mainframe  = JFactory::getApplication();
		// Get the pagination request variables
		$limit      = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option . 'limitstart', 'limitstart', 0, 'int');
		$this->setState('limit', $limit); // Set the limit variable for query later on
		$this->setState('limitstart', $limitstart);
	}

	function _buildQuery($store_id = 0, $customer_id = 0)
	{
		$db    = JFactory::getDBO();
		// Get the WHERE and ORDER BY clauses for the query
		$where = '';
		$where = $this->_buildContentWhere($store_id, $customer_id);
		$query = "SELECT i.processor, i.amount, i.cdate, i.payee_id, i.status, i.id, i.prefix, i.email, i.currency, u.name, u.username
		 FROM #__kart_orders AS i
		 LEFT JOIN #__users AS u ON u.id = i.payee_id" . $where;

		global $mainframe, $option;
		$mainframe        = JFactory::getApplication();
		$jinput           = $mainframe->input;
		$option           = $jinput->get('option');
		$filter_order     = $mainframe->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'cdate', 'cmd');
		$filter_order_Dir = $mainframe->getUserStateFromRequest($option . 'filter_order_Dir', 'filter_order_Dir', 'desc', 'word');

		if ($filter_order)
		{
			$qry1 = "SHOW COLUMNS FROM #__kart_orders";
			$db->setQuery($qry1);
			$exists1 = $db->loadobjectlist();

			foreach ($exists1 as $key1 => $value1)
			{
				$allowed_fields[] = $value1->Field;
			}

			if (in_array($filter_order, $allowed_fields))
				$query .= " ORDER BY $filter_order $filter_order_Dir";
		}

		return $query;
	}

	function _buildContentWhere($store_id = 0, $customer_id = 0)
	{
		global $mainframe, $option;
		$mainframe = JFactory::getApplication();
		$jinput    = $mainframe->input;
		$option    = $jinput->get('option');
		$layout    = $jinput->get('layout');
		$db        = JFactory::getDBO();

		$filter_search = $mainframe->getUserStateFromRequest($option . 'filter.search', 'filter_search', '', 'string');

		$filter_state = $mainframe->getUserStateFromRequest($option . 'search_list', 'search_list', '', 'string');
		$search       = $mainframe->getUserStateFromRequest($option . 'search_select', 'search_select', '', 'string');

		//For Filter Based on Gateway
		$search_gateway = '';
		$search_gateway = $mainframe->getUserStateFromRequest($option . 'search_gateway', 'search_gateway', '', 'string');
		$search_gateway = JString::strtolower($search_gateway);
		//For Filter Based on Gateway

		$where = array();

		if ($mainframe->getName() == 'site')
		{
			$user = JFactory::getuser();
			if (!empty($store_id))
			{
				$order_ids = $this->getOrderIds($store_id, 1);
				$order_ids = (!empty($order_ids) ? $order_ids : 0);
				$where[]   = "i.id IN ( " . $order_ids . ")";
			}
			elseif (!empty($customer_id))
			{
				if (is_numeric($customer_id))
					$where[] = "i.payee_id = " . $customer_id;
				else
					$where[] = "i.email LIKE '" . $customer_id . "'";
			}
			else
				$where[] = "i.payee_id = " . $user->id;
		}

		// My orders
		if ($layout == 'default')
		{
			$subQuery = "SELECT DISTINCT oi.`order_id` FROM `#__kart_order_item` AS oi";
			if (!empty($search) && $search != -1)
			{
				$subQuery .= ' INNER JOIN `#__kart_orders` AS o ON o.id = oi.order_id';
				$subQuery .= ' WHERE o.user_info_id = ' . $user->id . ' AND o.status = ' . $this->_db->Quote($search);
				$db->setQuery($subQuery);
				$ids = $db->loadColumn();

				if ($ids)
				{
					$ids     = implode(',', $ids);
					$where[] = " i.`id` IN (" . $ids . ")";
				}
				// Else should result in no output so use 0 in where
				else
				{
					$where[] = " i.`id` IN (0)";
				}
			}
		}

		/*
		if ($search_gateway)
		{
		$where[] = " (i.processor LIKE '".$search_gateway."')";
		}*/

		if ($layout == 'mycustomer')
		{
			if ($filter_state)
			{
				$where[] = " UPPER( CONCAT( i.prefix, i.id )) LIKE UPPER('%" . trim($filter_state) . "%')";
			}
		}

		if ($filter_search)
		{
			$where[] = "i.email LIKE '%" . $filter_search . "%'" . "
			OR i.id LIKE '%" . $filter_search . "%'" . "
			OR i.prefix LIKE '%" . $filter_search . "%'" . "
			OR u.name LIKE '%" . $filter_search . "%'" . "
			OR u.username LIKE '%" . $filter_search . "%'";
		}

		return $where = (count($where) ? ' WHERE ' . implode(' AND ', $where) : '');
	}

	function getOrders($store_id = 0, $customer_id = 0)
	{
		if (empty($this->_data))
		{
			$query       = $this->_buildQuery($store_id, $customer_id);
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}

		return $this->_data;
	}


	function getTotal($store_id = 0)
	{
		// Lets load the content if it doesn’t already exist
		if (empty($this->_total))
		{
			$query        = $this->_buildQuery($store_id);
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}

	function getPagination($count = 0, $store_id = 0)
	{
		// Lets load the content if it doesn’t already exist
		if (empty($this->_pagination) || $count) // NOTE :: COUNT PRESENT MEAN->CALLING FROM MYCUSTOMER VIEW
		{
			if (empty($count))
			{
				$count = $this->getTotal($store_id); // use count from of order for my order view
			}
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination($count, $this->getState('limitstart'), $this->getState('limit'));
		}

		return $this->_pagination;
	}

	/* function store start*/
	/**
	@param $store_id :: INTEGER if we are updating store product status

	@return
	if 1 = success
	2= error
	3 = refund order
	4 =  future use
	5 = future use
	6 = for store owner, Dont allow to change status  from S/Cancelled/RF to C
	*/
	function store($store_id = 0)
	{
		/*load language file for plugin frontend*/
		$lang = JFactory::getLanguage();
		//$lang->load('com_quick2cart', JPATH_ADMINISTRATOR);
		$lang->load('com_quick2cart', JPATH_SITE);
		$returnvaule = 1;
		$jinput      = JFactory::getApplication()->input;
		$status = $jinput->get('status');

		$data       = $jinput->post;

		//  For list view
		$orderid         = $data->get('id');
		$notify_chk = $data->get('notify_chk' . '|' . $orderid, '');

		if (!empty($notify_chk))
		{
			$notify_chk = 1;
		}
		else
		{
			$notify_chk = 0;
		}

		// $comment             = $data->get('comment', '', "STRING");

		$add_note_chk = $data->get('add_note_chk' . '|' . $orderid);
		$note         = '';
		$note = $data->get('order_note' . '|' . $orderid, '', "STRING");
		$this->siteMainHelper->updatestatus($orderid, $status, $note, $notify_chk, $store_id);

		if ($status == 'RF')
		{
			$returnvaule = 3;
		}

		// Save order history
		//$result = $this->siteMainHelper->saveOrderHistory($orderid, $jinput->get('status'), $note, $notify_chk);

		if ($orderid && $store_id)
		{
			// Update item status
			$this->siteMainHelper->updatestatus($orderid, $status, $note, $notify_chk, $store_id);

			// Save order history
			$orderItems = $this->getOrderItems($orderid);

			foreach ($orderItems as $oitemId)
			{
				// Save order item status history
				$this->siteMainHelper->saveOrderStatusHistory($orderid, $oitemId, $status, $note, $notify_chk);
			}
		}

		return $returnvaule;
	} //function store ends

	/**
	 * Return order item ids list
	 *
	 * @param   string  $orderid  order_id.
	 *
	 * @since   2.2
	 * @return  list.
	 */
	public function getOrderItems($orderid)
	{
		if ($orderid)
		{
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('order_item_id');
			$query->from('#__kart_order_item AS oi');
			$query->where("oi.order_id= " . $orderid);
			$db->setQuery($query);
			return $orderList = $db->loadColumn();
		}
	}

	function gatewaylist()
	{
		$db    = JFactory::getDBO();
		$query = "SELECT DISTINCT(`processor`) FROM #__kart_orders";
		$db->setQuery($query);
		$gatewaylist = $db->loadObjectList();
		if (!$gatewaylist)
			return 0;
		else
			return $gatewaylist;
	}

	/* Not require in front end.  model copied from backend
	 * function deleteorders($odid)
	 {
	 $odid_str=implode(',',$odid);
	 $query = "DELETE FROM #__kart_orders where id IN (".$odid_str.")";
	 $this->_db->setQuery( $query );
	 if (!$this->_db->execute()) {
	 $this->setError( $this->_db->getErrorMsg() );
	 return false;
	 }
	 $query = "DELETE FROM #__kart_order_item where order_id IN (".$odid_str.")";
	 $this->_db->setQuery( $query );
	 if (!$this->_db->execute()) {
	 $this->setError( $this->_db->getErrorMsg() );
	 return false;
	 }
	 $query = "DELETE FROM #__kart_users where order_id IN (".$odid_str.")";
	 $this->_db->setQuery( $query );
	 if (!$this->_db->execute()) {
	 $this->setError( $this->_db->getErrorMsg() );
	 return false;
	 }

	 //START Q2C Sample development
	 $dispatcher = JDispatcher::getInstance();
	 JPluginHelper::importPlugin('system');
	 $result=$dispatcher->trigger('Onq2cOrderDelete',array($odid));
	 //END Q2C Sample development

	 return true;
	 }*/

	function getOrderIds($store_id, $useorderStatus = 0)
	{
		$db    = JFactory::getDBO();
		$query = "SELECT DISTINCT `order_id` FROM `#__kart_order_item` where `store_id`=" . $store_id;

		// if called for store order view
		if ($useorderStatus == 1)
		{
			global $mainframe;
			$mainframe      = JFactory::getApplication();
			$search_gateway = '';
			$jinput         = $mainframe->input;
			$option         = $jinput->get('option');
			$search         = $mainframe->getUserStateFromRequest($option . 'search_select', 'search_select', '', 'string');

			// filter is enabled
			//if ($search=='P' || $search=='C' || $search=='RF' ||  $search=='S' || $search=='E')
			if (!empty($search) && $search != -1)
			{
				$query = $query . ' AND status = ' . $this->_db->Quote($search);
			}
			else
			{
				// Now all statuses are displaying on store dashboard
				//$query = $query . " AND  ( status = 'P' OR status = 'S' OR status = 'C' OR status = 'RF' OR status = 'E') ";
			}
		}

		$db->setQuery($query);
		$ids = $db->loadColumn();

		return implode(',', $ids);
	}

	function getCustomers($store_id)
	{
		$db    = JFactory::getDBO();
		$query = $this->buildCustomer($store_id);

		if (!empty($query))
		{
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));

			require_once JPATH_SITE . '/components/com_tjfields/helpers/geo.php';
			$tjGeoHelper = TjGeoHelper::getInstance('TjGeoHelper');

			foreach ($this->_data as $item)
			{
				$item->countryName = '';
				$item->countryName = $tjGeoHelper->getCountryNameFromId($item->country_code);
			}

			return $this->_data;
		}
		else
		{
			return;
		}
	}

	function buildCustomer($store_id)
	{
		$db = JFactory::getDBO();
		global $mainframe, $option;
		$mainframe = JFactory::getApplication();
		$jinput    = $mainframe->input;
		$option    = $jinput->get('option');

		$order_ids = $this->getOrderIds($store_id);
		$query     = "";

		if (!empty($order_ids))
		{
			$query = "select * from
			 (SELECT  u.* FROM  `#__kart_orders` AS o
			 LEFT JOIN  `#__kart_users` AS u ON o.`email` = u.`user_email`
			 WHERE u.`address_type` =  'BT'
			 AND o.id=u.order_id
			 AND u.`order_id` IN (" . $order_ids . " )
			 order by u.id  DESC
			) AS newtb ";

			$filter_order     = $mainframe->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'firstname', 'cmd');
			$filter_order_Dir = $mainframe->getUserStateFromRequest($option . 'filter_order_Dir', 'filter_order_Dir', 'desc', 'word');
			$filter_search    = $mainframe->getUserStateFromRequest($option . 'filter.search', 'filter_search', '', 'string');

			// NOTE:: 1. FIND ALL WHERE AND APPEND TO QUERY
			if (!empty($filter_search))
			{
				$where = " WHERE ((`firstname` LIKE \"%" . $filter_search . "%\") OR (`lastname` LIKE \"%" . $filter_search . "%\"))";
				$query .= $where;
			}

			// NOTE:: 2. USE GROUP BY IF ANY
			$groupby = " group by newtb.user_email ";
			$query .= $groupby;

			// NOTE:: 3. USE FILTER
			if ($filter_order)
			{
				$comquick2cartHelper = new comquick2cartHelper;
				$allowed_fields      = $comquick2cartHelper->getColumns('#__kart_users');

				if (in_array($filter_order, $allowed_fields))
				{
					$query .= " ORDER BY " . $filter_order . ' ' . $filter_order_Dir;
				}
			}
		}

		return $query;
	}

	function getCustomerTotal($store_id)
	{
		$query = $this->buildCustomer($store_id);

		if (!empty($query))
			return $this->customer_count = $this->_getListCount($query);
		else
			return;
	}

	/**
	This function get all product list and and its final price against store_id,order_id
	*/
	function getStore_items($storeids, $orderid)
	{
		$db    = JFactory::getDBO();
		$query = "SELECT `order_item_name`,`product_final_price` from `#__kart_order_item` where `store_id`=" . $storeids . " AND order_id=" . $orderid;
		$db->setQuery($query);

		return $result = $db->loadObjectList();
	}
	// end of class

	function getStore_product_price($storeids, $orderid)
	{
		$db    = JFactory::getDBO();
		$query = "SELECT SUM(`product_final_price`) AS store_items_price from `#__kart_order_item` where `store_id`=" . $storeids . " AND order_id=" . $orderid;
		$db->setQuery($query);

		return $result = $db->loadResult();
	}

	function getstoreId()
	{
		$user  = JFactory::getUser();
		$db    = JFactory::getDBO();
		$query = "select id from `#__kart_store` where `owner`=" . $user->id;
		$db    = $db->setQuery($query);

		return $storeid = $db->loadResult($query);
	}
	/**
	 * Changes Get order history
	 *
	 * @param   integer  $order_id  order_id.
	 * @param   integer  $store_id  store_id.
	 *
	 * @return  result.
	 *
	 * @since   1.6
	 */
	public function getOrderHistory($order_id, $store_id)
	{
		if (!empty($order_id))
		{
			$query = $this->_db->getQuery(true);
			$query->select("oh.*,i.name");
			$query->from($this->_db->quoteName('#__kart_orders_history') . ' AS oh');
			$query->join('INNER', "#__kart_order_item AS oi ON oh.order_item_id = oi.order_item_id");
			$query->join('INNER', "#__kart_items AS i ON i.item_id = oi.item_id");
			$query->where("oh.order_id = " . $order_id);

			if (!empty($store_id))
			{
				$query->where("oi.store_id = " . $store_id);
			}

			$query->order("oh.order_item_id ASC");
			$query->order("oh.mdate  ASC");

			$this->_db->setQuery($query);
			return $result = $this->_db->loadObjectList();
		}

		return false;
	}
}
