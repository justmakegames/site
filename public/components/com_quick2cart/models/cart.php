<?php
/**
 *  @package    Quick2Cart
 *  @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 *  @license    GNU General Public License version 2, or later
 */
defined('_JEXEC') or die();
jimport('joomla.application.component.model');

class Quick2cartModelcart extends JModelLegacy
{
	// Instad of this use product helers funtion

	public function getAttributes($itemid)
	{
		$db = JFactory::getDBO();
		$query = "SELECT itemattribute_id,itemattribute_name,`attribute_compulsary`,`attributeFieldType` FROM #__kart_itemattributes WHERE item_id=" . $itemid. " ORDER BY  `itemattribute_id` ASC";
		$this->_db->setQuery($query);
		$result = $this->_db->loadobjectList();
		return $result;
	}
	/* @prams $itemid:: item-id from kart_item table
	 * @return price of PRODUCT ACCORDING TO CURRENCY
	 * */
	//
	public function getPrice($itemid, $return_disc = 0, $getOriginalPrice = 0)
	{
		$db = JFactory::getDBO();
		$comquick2cartHelper = new comquick2cartHelper;
		$currency = $comquick2cartHelper->getCurrencySession();
		/*	if(!$currency) //if set in session
		{
		$params = JComponentHelper::getParams('com_quick2cart');
		$currencies=$params->get('addcurrency');
		$currencies=explode(',',$currencies);
		$currkeys=array_keys($currencies); //make array of currency keys
		$currency=$currkeys[0];
		}*/
		//$Quick2cartModelcart =  new Quick2cartModelcart;
		$params = JComponentHelper::getParams('com_quick2cart');
		//$itemid =$Quick2cartModelcart->getitemid($pid,$client);
		$query = "SELECT ";

		if ($params->get('usedisc') && $return_disc == 1)
		{
			$query.= " discount_price , ";
		}
		else
		if ($params->get('usedisc') && $getOriginalPrice == 0)
		{
			$query.= " CASE WHEN ( (discount_price IS NOT NULL ) AND  ( discount_price != 0 )) THEN discount_price
				ELSE price
				END as ";
		}
		$query.= " price
		FROM #__kart_base_currency
		WHERE item_id = " . (int)$itemid . " AND currency='$currency'";
		$db->setQuery($query);

		if ($params->get('usedisc') && $return_disc == 1) $result = $db->loadAssoc();
		else $result = $db->loadAssoc();
		return $result;
	}

	public function getitemid($product_id = 0, $client, $sku = '')
	{
		$db = JFactory::getDBO();

		if (!empty($sku))
		{
			$query = "SELECT `item_id` FROM `#__kart_items`  where parent='" . $client . "' AND sku='" . $sku . "'";
		}
		else
		{
			$query = "SELECT `item_id` FROM `#__kart_items`  where `product_id`=" . (int)$product_id . " AND parent='$client'";
		}
		$db->setQuery($query);
		$result = $db->loadResult();
		return $result;
	}

	public function getitemidAndState($product_id = 0, $client)
	{
		$db = JFactory::getDBO();
		$query = "SELECT `item_id`,`state` FROM `#__kart_items`  where `product_id`=" . (int)$product_id . " AND parent='$client'";
		$db->setQuery($query);
		$result = $db->loadAssoc();
		return $result;
	}
	/*This method return product details from kart _items,_kart_itemattributes,_kart_itemattributeoptions
	 * */

	public function getProd($item_obj)
	{
		$comquick2cartHelper = new comquick2cartHelper;
		$currency = $comquick2cartHelper->getCurrencySession();
		$Quick2cartModelcart = new Quick2cartModelcart;

		if (empty($item_obj['item_id']))
		{
			$item_id = $Quick2cartModelcart->getitemid($item_obj["id"], $item_obj['parent']);
		}
		else
		{
			$item_id = $item_obj['item_id'];
		}

		//	 $query = "SELECT parent,product_id,name,price FROM #__kart_items WHERE product_id = ".(int) $item_obj["id"]." AND parent='".$item_obj['parent']."'";
		$itemid_rec = $this->getItemRec($item_id);
		$params = JComponentHelper::getParams('com_quick2cart');
		$query = "SELECT kc.id as base_currency_id,kc.item_id,";

		if ($params->get('usedisc'))
		{
			$query.= " CASE WHEN kc.discount_price IS NOT NULL THEN kc.discount_price
				ELSE kc.price
				END as price, ";
		}
		else
		{
			$query.= " kc.price, ";
		}
		// removed parent and product_id
		$query.= " ki.name
		FROM #__kart_items AS ki
		LEFT JOIN  `#__kart_base_currency` AS kc
		ON  `ki`.`item_id` =  `kc`.`item_id`
		WHERE ki.`item_id` =" . $itemid_rec->item_id . "
		AND kc.currency = '" . $currency . "'"; // AND ki.parent='".$item_obj['parent']."'";
		$this->_db->setQuery($query);
		$item_result = $this->_db->loadAssoc();

		//$pid=(int) $item_obj["id"]; //product_id
		$item_result['price'] = $item_result['price'];
		$item_result["count"] = $item_obj["count"]; // input to this f()
		$final_result[] = $item_result;
		// IF product has attributes

		if ($item_obj['options'])
		{
			//$query = "SELECT * FROM #__kart_itemattributeoptions WHERE itemattributeoption_id IN (".$item_obj['options'].")";//old query
			$query = "
			SELECT 	ko.itemattributeoption_id,ko.itemattribute_id,ko.itemattributeoption_name,ko.itemattributeoption_code,ko.itemattributeoption_prefix,ko.ordering,
			 currency as optioncurrency,price as optionprice
			 FROM #__kart_itemattributeoptions as ko
			 LEFT JOIN #__kart_option_currency as kc
			 ON  `ko`.`itemattributeoption_id`=`kc`.`itemattributeoption_id`
			 WHERE ko.itemattributeoption_id IN (" . $item_obj['options'] . ") AND currency='" . $currency . "'";
			$this->_db->setQuery($query);
			$options_result = $this->_db->loadAssocList();
			$item_options = array();

			foreach ($options_result as $options_result)
			{
				$item_options_arr[] = $options_result['itemattribute_id'];

				foreach ($options_result as $k => $v)
				{
					$item_options[$options_result['itemattribute_id']][$k] = $v;
				}
			}

			$itemattribute_ids = implode(",", $item_options_arr);
			$final_result[] = $item_options;
			$query = "SELECT * FROM #__kart_itemattributes WHERE itemattribute_id IN (" . $itemattribute_ids . ")";
			$this->_db->setQuery($query);
			$item_attri = $this->_db->loadAssocList();
			$final_result[] = $item_attri;
		}

		return $final_result;
	}

	public function makeCart()
	{
		$user = JFactory::getUser();
		$row = new stdClass;

		if ($user->id) $row->user_id = $user->id;
		else $row->user_id = 0;
		$cart = $this->getCartId(); // return cart_id with current session

		if ($cart) /*if cart exists EXCEPT LAST UPDATED ENTRY  del all entry against user_id */

		{

			if ($user->id)
			{
				$query = "Select cart_id FROM #__kart_cart WHERE user_id='$user->id' ORDER BY last_updated DESC";
				$this->_db->setQuery($query);
				$cart_ids = $this->_db->loadColumn();

				if (!empty($cart_ids))
				{
					$cart = $cart_ids[0];
					unset($cart_ids[0]);

					if (!empty($cart_ids))
					{
						$cart_ids_str = implode(',', $cart_ids);
						$query = "DELETE FROM #__kart_cart WHERE cart_id IN ($cart_ids_str)";
						$this->_db->setQuery($query);
						$this->_db->execute();
						$query = "DELETE FROM #__kart_cartitems WHERE cart_id IN ($cart_ids_str)";
						$this->_db->setQuery($query);
						$this->_db->execute();
					}
				}
			}
			$row->cart_id = $cart;
			$row->last_updated = date("Y-m-d H:i:s");

			if (!$this->_db->updateObject('#__kart_cart', $row, 'cart_id'))
			{
				echo $this->_db->stderr();
				return false;
			}
		}
		else
		{ /* if "not logged" in and "not cart entry" with oldsession(checked in getcartid ::called before if)*/
			$session = JFactory::getSession();
			$session_id = $session->getId();
			$row->session_id = $session_id;

			if (!$this->_db->insertObject('#__kart_cart', $row, 'cart_id'))
			{
				echo $this->_db->stderr();
				return false;
			}
		}
		return $row->cart_id;
	}
	/*This method  set session/update session
	 * if user logged in and oldsession is set UPDATE cart record against session.
	 * ELSE IF user NOT logged in
	 * 			then set session
	 * Finally fetch cartid depending upon userid or session_id
	 * */

	public function getCartId()
	{
		$db = JFactory::getDBO(); //@TODO ask ashwin about this
		$user = JFactory::getUser();
		$session = JFactory::getSession();
		$session_id = $session->getId();

		if ($user->id)
		{
			$where = "user_id='$user->id'";
			$old_sessionid = $session->get('old_sessionid');

			if (!empty($old_sessionid))
			{
				//			updateuserCart($old_sessionid);
				$db = JFactory::getDBO(); //@TODO ask ashwin about this

				//Quick2cartModelcart::delUser_idCartDetails($user->id);
				$row = new stdClass;
				$row->session_id = $old_sessionid;
				$row->user_id = $user->id; //intval(JUserHelper::getUserId($user['username']));
				$row->last_updated = date("Y-m-d H:i:s");

				if (!$db->updateObject('#__kart_cart', $row, 'session_id'))
				{
					echo $db->stderr();
					return false;
				}
			}
		}
		else
		{
			$session->set('old_sessionid', $session_id); /*store the old session for after user login use*/
			$where = "session_id='$session_id'";
		}
		$query = "Select cart_id FROM #__kart_cart WHERE $where order by cart_id DESC";
		$db->setQuery($query);
		$cart_id = $db->loadResult();
		return $cart_id;
	}
	/**
	 * $getOriginalPrice is set then product original price will be considered in calculation
	 *
	 */

	public function getCartitems($getOriginalPrice = 0)
	{
		$comquick2cartHelper = new comquick2cartHelper;
		$currency = $comquick2cartHelper->getCurrencySession();
		$db = JFactory::getDBO(); //@TODO ask ashwin about this
		$Quick2cartModelcart = new Quick2cartModelcart;
		$cart_id = $Quick2cartModelcart->getCartId();

		if (!isset($cart_id)) return;
		$query = "Select k.cart_item_id as id, 	k.cart_id,k.store_id,i.sku,
					k.order_item_name as title,	k.user_info_id,
					k.cdate,						k.mdate,
					k.product_quantity as qty, 		k.product_attribute_names as options,
					k.item_id, k.product_item_price,k.product_attributes_price,k.product_final_price,k.original_price,k. params,currency,
					k.product_attributes
		 FROM #__kart_cartitems as k,#__kart_items as i
		 WHERE k.item_id=i.item_id and k.cart_id='$cart_id' order by k.`store_id`";
		$db->setQuery($query);
		$cart = $db->loadAssocList();

		foreach ($cart as $key => $rec)
		{
			$cart[$key]['seller_id'] = JFactory::getUser()->id; //@TODO fetch store owner from items table

			// task 1 fetch item price
			$pricearray = "";
			$return_disc = 0;
			$prod_price = $Quick2cartModelcart->getPrice($rec['item_id'], $return_disc, $getOriginalPrice);
			$cart[$key]['amt'] = $prod_price['price']; //product_item_price as amt

			// task 2 attribute price

			if (isset($rec['product_attributes']) && $rec['product_attributes'])
			{
				$totop_price = $Quick2cartModelcart->getCurrPriceFromBaseCurrencyOption($rec['product_attributes']);
				$cart[$key]['opt_amt'] = $totop_price; // product_attributes_price as opt_amt*/

			}
			else
			{
				$cart[$key]['opt_amt'] = 0; // product_attributes_price as opt_amt*/

			}
			// task 3 calculate total m price
			$cart[$key]['tamt'] = ((float)$cart[$key]['amt'] + (float)$cart[$key]['opt_amt']) * (float)$cart[$key]['qty']; //product_final_price as tamt

			//  synchronize new item price and its related in cart_item table
			$cart_item = new stdClass;
			$cart_item->cart_item_id = $cart[$key]['id']; //as id
			$cart_item->product_quantity = $cart[$key]['qty'];
			$cart_item->product_item_price = $cart[$key]['amt'];
			$cart_item->product_attributes_price = $cart[$key]['opt_amt'];

			if (!empty($rec['params']))
			{
				$params = json_decode($rec['params'], true);
				JLoader::import('cartcheckout', JPATH_SITE . DS . 'components' . DS . 'com_quick2cart' . DS . 'models');
				$Quick2cartModelcartcheckout = new Quick2cartModelcartcheckout();

				if (!empty($params['coupon_code']))
				{
					$coupon = $Quick2cartModelcartcheckout->getcoupon($params['coupon_code']);
					$coupon = $coupon ? $coupon : array();

					if (isset($coupon) && $coupon) // if user entered code is matched with dDb coupon code

					{

						if (in_array($cart[$key]['item_id'], $coupon[0]->item_id))
						{
							$camt = - 1;
							$cart[$key]['original_price'] = $cart[$key]['tamt'];
							$cart_item->original_price = $cart[$key]['original_price'];
							$coupon[0]->cop_code = $params['coupon_code'];

							if ($coupon[0]->val_type == 1) $cval = ($coupon[0]->value / 100) * $cart[$key]['tamt'];
							else
							{
								$cval = $coupon[0]->value;
								$cval = $cval * $cart[$key]['qty']; /*multiply cop disc with qty*/
							}
							$camt = $cart[$key]['tamt'] - $cval;

							if ($camt <= 0)
							{
								$camt = 0;
							}
							$cart[$key]['tamt'] = (!($camt == - 1)) ? $camt : $cart[$key]['tamt'];
						}
					}
				}
			}
			$cart_item->product_final_price = $cart[$key]['tamt'];
			$cart_item->currency = $comquick2cartHelper->getCurrencySession();
			$db = JFactory::getDBO();

			if ($cart_item->product_item_price != $cart[$key]['product_item_price'] || $cart_item->product_attributes_price != $cart[$key]['product_attributes_price'] || $cart_item->product_final_price != $cart[$key]['product_final_price'] || $cart_item->currency != $cart[$key]['currency'])
			{

				if (!$db->updateObject('#__kart_cartitems', $cart_item, "cart_item_id"))
				{
					echo $this->_db->stderr();
					return -1;
				}
			}
		}
		return $cart;
	} // end of getCartitems()

	public function empty_cart()
	{
		$c_id = $this->getCartId();
		$query = "Select cart_item_id FROM #__kart_cartitems WHERE cart_id=" . (int)$c_id;
		$this->_db->setQuery($query);
		$items_id = $this->_db->loadResult();
		$query = "DELETE FROM #__kart_cartitemattributes WHERE cart_item_id=" . (int)$items_id;
		$this->_db->setQuery($query);
		$this->_db->execute();
		$query = "DELETE FROM #__kart_cartitems WHERE cart_id=" . (int)$c_id;
		$this->_db->setQuery($query);
		$this->_db->execute();
	}

	public function remove_cart($id)
	{
		$db = JFactory::getDBO();
		//GET CART ITEMS
		$query = "Select * FROM #__kart_cartitems WHERE `cart_item_id`=" . (int)$id;
		$db->setQuery($query);
		$cart['cartitem'] = $db->loadAssoc();
		//GET CART ITEMS ATTRIBUTE DETAILS
		$query = "Select * FROM #__kart_cartitemattributes WHERE cart_item_id=" . (int)$id;
		$db->setQuery($query);
		$cart['cartitemattributes'] = $db->loadAssocList();
		$query = "DELETE FROM #__kart_cartitems WHERE cart_item_id=" . (int)$id;
		$db->setQuery($query);
		$db->execute();
		$query = "DELETE FROM #__kart_cartitemattributes WHERE cart_item_id=" . (int)$id;
		$db->setQuery($query);
		$db->execute();
		//START Q2C Sample development
		$dispatcher = JDispatcher::getInstance();
		JPluginHelper::importPlugin('system');
		$result = $dispatcher->trigger('OnAfterq2cRemovefromCart', array(
			$cart
		)); //Call the plugin and get the result

		//END Q2C Sample development

	}
	/**
	 * Update Product Attribute & Quantity
	 */

	public function update_cart($item_ids, $item_qty)
	{
		$db = JFactory::getDBO();
		$user = JFactory::getUser();

		foreach ($item_ids as $k => $cartitem)
		{
			$query = "Select product_item_price, product_attributes_price FROM #__kart_cartitems WHERE cart_item_id='$cartitem' ";
			$db->setQuery($query);
			list($product_item_price, $product_attributes_price) = $this->_db->loadRow();
			//$product_item_price = $product_item_price + $product_attributes_price;
			$items = new stdClass;
			$items->cart_item_id = $cartitem;
			$items->product_quantity = $item_qty[$k];
			//$items->product_final_price =  $product_item_price * $item_qty[$k];

			if (!$db->updateObject('#__kart_cartitems', $items, "cart_item_id"))
			{
				echo $db->stderr();
				return false;
			}
		}
		return true;
	}

	public function isProdFromSameStore($cartId, $currItemStoreId)
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('c.store_id');
		$query->from('#__kart_cartitems AS c');
		$query->where('c.cart_id=' . $cartId);
		$db->setQuery($query);
		$storelist = $db->loadColumn();
		// Cart doesn't have items.

		if (empty($storelist))
		{
			return true;
		}
		// If from same store

		if (in_array($currItemStoreId, $storelist))
		{
			return true;
		}
		// Add msg
		JFactory::getApplication()->enqueueMessage(JText::_('COM_QUICK2CART_SINGLE_STORE_CKOUT_ALLOWED'));

		return false;
	}

	/**
	 * This method check whether user bought the product or not.
	 *
	 * @param   integer  $c_id          cart id.
	 * @param   array    $cartitem      items detail 0=> array of basic info,1=>selection option info. 2=> attribute info.
	 * @param   integer  $cart_item_id  cart item id while updating the cart from checkout view.
	 *
	 * @since   2.2.2
	 *
	 * @return   boolean true or false.
	 */
	public function putCartitem($c_id, $cartitem, $cart_item_id = '')
	{
		$comquick2cartHelper = new comquick2cartHelper;
		$params = JComponentHelper::getParams('com_quick2cart');
		$item_details = $cartitem[0];

		// Option details size->big,medium
		$item_options = (isset($cartitem[1])) ? $cartitem[1] : null;

		// Attribute details
		$item_attris = (isset($cartitem[2])) ? $cartitem[2] : null;

		if (!$c_id)
		{
			$c_id = $this->getCartId();
		}

		// Get current item store id.
		$currItemStoreId = $comquick2cartHelper->getSoreID($item_details['item_id']);
		$singleStoreCkout = $params->get('singleStoreCkout', 0);

		if ($singleStoreCkout)
		{
			$status = $this->isProdFromSameStore($c_id, $currItemStoreId);
			// If not from same store.

			if (!$status)
			{
				return 2;
			}
		}

		$timestamp = date("Y-m-d H:i:s");
		$opt_price = 0;
		$opt = $opt_ids = '';
		$matchAttr = 1;

		// Product has attributes.
		if ($item_attris)
		{
			foreach ($item_attris as $item_attri)
			{
				$item_option = $item_options[$item_attri['itemattribute_id']];
				$opt .= $item_attri['itemattribute_name'] . ": " . $item_option['itemattributeoption_name'] . ",";
				$opt_ids.= $item_option['itemattributeoption_id'] . ",";

				if ($item_option['itemattributeoption_prefix'] == '+')
				{
					$opt_price+= $item_option['optionprice'];
				}
				elseif ($item_option['itemattributeoption_prefix'] == '-')
				{
					$opt_price-= $item_option['optionprice'];
				}
			}

			// Trim last comma,
			//$opt_ids = rtrim($opt_ids, ',');
		}

		$query = "Select cart_item_id,item_id,product_quantity
		 FROM #__kart_cartitems WHERE cart_id=" . (int)$c_id . " AND item_id=" . $item_details['item_id'] . " AND product_attributes='" . $opt_ids . "' AND `product_attribute_names` = '" . $opt . "'";
		$this->_db->setQuery($query);
		$cart = $this->_db->loadAssoc();
//~ $cart = $this->_db->loadAssocList();
//~ print"<pre>"; print_r($cartitem);
//~ print"<pre>"; print_r($cart); die;
		$final_price = $item_details['price'] + $opt_price;
		$items = new stdClass;
		$items->product_final_price = $item_details['count'] * $final_price;
		$items->product_item_price = $item_details['price'];
		$items->product_attributes = $opt_ids;
		$items->product_attribute_names = $opt;
		$items->product_attributes_price = $opt_price;
		$items->mdate = $timestamp;
		$items->currency = $comquick2cartHelper->getCurrencySession();
		$items->store_id = $comquick2cartHelper->getSoreID($item_details['item_id']); // getting store id from item_id

		//~ if (!empty($params))
		//~ {
			//~ $items->params = $params;
		//~ }

		/* if #__kart_cartitems contain entry then update .if cart contain item then  update// check  present  same && all attr same  */

		if ($cart['cart_item_id'] && $cart['item_id'] == $item_details['item_id'])
		{
			//~ print"<pre>"; print $cart_item_id;
			//~ print"<pre>"; print_r($cart);
			//~ print"<pre>"; print_r($item_details);
			//~ die;

			// Just clicking on refresh button
			if ($cart_item_id && $cart['cart_item_id'] == $cart_item_id)
			{
				$final_qty = $item_details['count'];
			}
			else
			{
				$final_qty = $cart['product_quantity'] + $item_details['count'];
			}

			$minmax = $comquick2cartHelper->getMinMax($item_details['item_id']);
			// not equal to nulll,0 etc

			if (!empty($minmax['min_quantity']) && !empty($minmax['max_quantity']))
			{
				if ($final_qty < $minmax['min_quantity'] || $final_qty > $minmax['max_quantity'] || $cart['product_quantity'] < 1)
				{
					return JText::sprintf('COM_QUICK2CART_MIN_MAX_ERROR_SUD_BE_INRANGE', $minmax['min_quantity'], $minmax['max_quantity']);
					"";
				}
			}

			$slabquantity = $item_details['count'] % $minmax['slab'];

			if ($slabquantity != 0)
			{
				return JText::sprintf('COM_QUICK2CART_QUANTITY_SHOULD_BE_MULI_OF_SLAB', $minmax['slab']);
			}

			$items->product_quantity = $final_qty;
			$items->cart_item_id = $cart['cart_item_id'];
			$items->product_final_price = $items->product_quantity * $final_price;

			if (!$this->_db->updateObject('#__kart_cartitems', $items, "cart_item_id"))
			{
				echo $this->_db->stderr();

				return -1;
			}

			// If updating from the checkout view then delete current cart entry.
			// If just updated cart entry and update cart entry is same then don't delete the entry. (in case of qty update)
			if (!empty($cart_item_id) && $cart_item_id != $items->cart_item_id)
			{
				$this->remove_cart($cart_item_id);
			}
		}
		else
		{
			// Else add update while updating the cart
			$minmax = $comquick2cartHelper->getMinMax($item_details['item_id']);

			if (!empty($minmax['min_quantity']) && !empty($minmax['max_quantity']))
			{
				if ($item_details['count'] < $minmax['min_quantity'] || $item_details['count'] > $minmax['max_quantity'])
				{
					return JText::sprintf('COM_QUICK2CART_MIN_MAX_ERROR_SUD_BE_INRANGE', $minmax['min_quantity'], $minmax['max_quantity']);
					"";
				}
			}

			$slabquantity = $item_details['count'] % $minmax['slab'];

			if ($slabquantity != 0)
			{
				return JText::sprintf('COM_QUICK2CART_QUANTITY_SHOULD_BE_MULI_OF_SLAB', $minmax['slab']);
			}

			$items->cart_id = $c_id;
			$items->item_id = $item_details['item_id'];
			$items->product_quantity = $item_details['count'];
			$items->order_item_name = $item_details['name'];
			$items->cdate = $timestamp;
			$dbAction = 'insertObject';
			$action = 'insert';

			if (!empty($cart_item_id))
			{
				// Primary key = cart_item_id
				$items->cart_item_id = $cart_item_id;
				$dbAction = 'updateObject';
				$action = 'update';
			}

			if (!$this->_db->$dbAction('#__kart_cartitems', $items, 'cart_item_id'))
			{
				echo $this->_db->stderr();

				return -1;
			}

			$insertOrUpdateRowId = $items->cart_item_id;

			if ($item_options)
			{
				$this->addEntryInCartItemAttributes($item_options, $insertOrUpdateRowId, $action);
				//~ foreach ($item_options as $item_option)
				//~ {
					//~ $items_opt = new stdClass;
					//~ $items_opt->cart_item_id = $items->cart_item_id;
					//~ $items_opt->itemattributeoption_id = $item_option['itemattributeoption_id'];
					//~ $items_opt->cartitemattribute_name = $item_option['itemattributeoption_name'];
					//~ $items_opt->cartitemattribute_price = $item_option['optionprice'];
					//~ $items_opt->cartitemattribute_prefix = $item_option['itemattributeoption_prefix'];
//~
					//~ if (!$this->_db->insertObject('#__kart_cartitemattributes', $items_opt, 'cartitemattribute_id'))
					//~ {
						//~ echo $this->_db->stderr();
//~
						//~ return -1;
					//~ }
				//~ }
			}
		}

		return 1;
	}

	/**
	 * This function add or update cart attribute entry.
	 *
	 * @param   array    $item_options         attributes detail array
	 * @param   string   $insertOrUpdateRowId  cart item id (also used while updating attribute from cartcheckout view.)
	 *
	 * @return  html.
	 *
	 * @since   1.6
	 */
	public function addEntryInCartItemAttributes($item_options, $cart_item_id, $action = 'insert')
	{
		$db = JFactory::getDBO();
		$dbAttOpts = array();

		// If update
		if ($action == 'update')
		{
			// Get Existing cartitemattribute_id (primary key) and option id
			$query = $db->getQuery(true)
						->select('cartitemattribute_id,itemattributeoption_id')
						->from('#__kart_cartitemattributes AS cia');
			$query->where('cia.cart_item_id=' . $cart_item_id);
			$db->setQuery($query);
			$dbAttOpts = $db->loadObjectList('itemattributeoption_id');
		}

		foreach ($item_options as $item_option)
		{
			$items_opt = new stdClass;
			$dbAction = 'insertObject';

			// Update cart action.
			if ($action == 'update')
			{
				$key = $item_option['itemattributeoption_id'];

				// Check whether option already present in fetched attr option list
				if(isset($dbAttOpts[$key]))
				{
					$dbAction = 'updateObject';

					// For update, set primary key(cartitemattribute_id) of table
					$items_opt->cartitemattribute_id = $dbAttOpts[$key]->cartitemattribute_id;
					unset($dbAttOpts[$key]);
				}
			}

			$items_opt->cart_item_id = $cart_item_id;
			$items_opt->itemattributeoption_id = $item_option['itemattributeoption_id'];
			$items_opt->cartitemattribute_name = $item_option['itemattributeoption_name'];
			$items_opt->cartitemattribute_price = $item_option['optionprice'];
			$items_opt->cartitemattribute_prefix = $item_option['itemattributeoption_prefix'];

			if (!$db->$dbAction('#__kart_cartitemattributes', $items_opt, 'cartitemattribute_id'))
			{
				echo $db->stderr();

				return -1;
			}

		}

		// Delete all older remaining/changed cart attribute option entry
		if (!empty($dbAttOpts))
		{
			foreach ($dbAttOpts as $attopt)
			{
				if (!empty($attopt->cartitemattribute_id))
				{
					try
					{
						$query = $db->getQuery(true)->delete('#__kart_cartitemattributes')->where('cartitemattribute_id =' . $attopt->cartitemattribute_id);

						$db->setQuery($query);
						$db->execute();
					}
					catch (RuntimeException $e)
					{
						$this->setError($e->getMessage());
						throw new Exception($this->_db->getErrorMsg());
					}
				}
			}
		}

	}

	public function syncCartCurrency($oldcurr, $newcurr)
	{
		// @TODO MODIFICATION NEEDED
		$db = JFactory::getDBO();

		$cart_id = $this->getCartId();
		$query = "select * from #__kart_cartitems where cart_id=" . (int)$cart_id;
		$db->setQuery($query);
		$result = $db->loadAssocList();
		$params = JComponentHelper::getParams('com_quick2cart');

		foreach ($result as $key => $rec)
		{
			$pid = $rec['product_id'];
			$qnt = $rec['product_quantity'];
			$query = "SELECT ";

			if ($params->get('usedisc'))
			{
				$query.= " CASE WHEN discount_price IS NOT NULL THEN discount_price
						ELSE price
						END as ";
			}

		 	$query.= " price
				FROM #__kart_base_currency WHERE item_id = " . (int)$pid . " AND currency='$newcurr'";
			$db->setQuery($query);
			$price = $db->loadAssocList();
			$newprice = $price[0]['price'];
			$items = new stdClass;
			$items->cart_item_id = $rec['cart_item_id'];
			$items->cart_id = $cart_id;
			$items->product_item_price = $newprice;
			$items->product_final_price = (int)$qnt * (float)$newprice;

			if (!$db->updateObject('#__kart_cartitems', $items, 'cart_item_id'))
			{
				echo $db->stderr();
				echo "Error in updating kart_option_currency";
				return false;
			}
		}

		return true;
	}
	/* Accept product and return itemid rec contain  item_id, parent, name,product_id
	 * @param $ITEMID:: itemid from kart_items table
	 * @return Array::$result;
	 * */

	public function getItemRec($item_id)
	{
		$q = "SELECT  item_id,stock,slab,min_quantity,max_quantity,store_id,category,images,video_link,description,name,state,`parent`,`product_id`,featured, `metadesc`, `metakey`,`item_length`, `item_width`, `item_height`, `item_length_class_id`, `item_weight`, `item_weight_class_id`, `shipProfileId`
				FROM  `#__kart_items`
				WHERE `item_id`=" . $item_id;
		$this->_db->setQuery($q);
		$result = $this->_db->loadObject();
		return $result;
	}
	/*	DESCRIPTION ::Accept itemattributeoption_id and fetch its price according currencey
	 * 	@param ::ARRAY ofitemattributeoption_id
	 *  @return ::int total price of attribute option
	 * */

	public function getCurrPriceFromBaseCurrencyOption($itemattributeoption_ids)
	{
		$comquick2cartHelper = new comquick2cartHelper;
		$db = JFactory::getDBO();
		$itemattributeoption_ids = trim($itemattributeoption_ids);
		$arr = explode(",", $itemattributeoption_ids);
		$newarray = array_filter($arr, "trim");
		$idstr = implode(",", $newarray);

		if ($idstr)
		{
			$currency = $comquick2cartHelper->getCurrencySession();
			$q = "SELECT oc.price, attop.itemattributeoption_prefix
			FROM  `#__kart_option_currency` AS oc
			LEFT JOIN  `#__kart_itemattributeoptions` AS attop ON oc.itemattributeoption_id = attop.itemattributeoption_id
			WHERE attop.itemattributeoption_id IN (" . $idstr . ") AND currency='" . $currency . "'";
			$db->setQuery($q);
			$result = $db->loadAssocList();
			$totoptionprice = 0;

			foreach ($result as $key => $attrib)
			{
				$price_with_sign = (float)($attrib['itemattributeoption_prefix'] . $attrib['price']);
				$totoptionprice = (float)$totoptionprice + $price_with_sign;
			}
		}
		return $totoptionprice;
	}
	/* This compare coma seperated old and new attributeoption
	 *
	 * */

	public function isAttributesSame($attr, $Dbattr)
	{
		$list = explode(",", $Dbattr);
		$attr = explode(",", $attr);

		for ($i = 0;$i < count($attr) - 1;$i++)
		{

			if (!in_array($attr[$i], $list)) // not found then dont chek for next

			{
				return false;
			}
		}
		return true;
	}
	/*This return stock detail which is used before displaying buy button
	 *
	 * */

	public function stockStatus($parent, $pid)
	{
		$db = JFactory::getDBO();
		$query = "SELECT `stock` FROM `#__kart_items`  where `product_id`=" . (int)$pid . " AND parent='$parent'";
		$db->setQuery($query);
		$result = $db->loadResult();
		return $result;
	}

	public function getStockLimit($pid, $parent, $limit)
	{
		$limit = trim($limit);
		$parent = trim($parent);
		$pid = trim($pid);
		$column = '';

		if ($limit == 'max') $column = 'max_quantity';
		else $column = 'min_quantity';

		if (!empty($column))
		{
			$db = JFactory::getDBO();
			$query = "SELECT `$column` FROM `#__kart_items`  where `product_id`=" . (int)$pid . " AND parent='$parent'";
			$db->setQuery($query);
			$result = $db->loadResult();
			return $result;
		}
		return false;
	}
	/**
	 * 	This delete user_id detail from Kart_cart tablel and associated row from kart_cartitems table
	 *  @param user_id :: user id
	 *
	 */
	/*	public function delUser_idCartDetails($user_id)
	{

	}*/
	/* @param $attoptionIds ::	ARRAY() =is id of kart_itemattributeoptions  table
	 * Retrun array of prefixes
	 **/

	public function getPrefix($attoptionIds)
	{
		$comquick2cartHelper = new comquick2cartHelper;
		$currency = $comquick2cartHelper->getCurrencySession();
		//getFromattedPrice($price,$curr=NULL)
		$prefixarray = array();
		$db = JFactory::getDBO();

		foreach ($attoptionIds as $key => $attid)
		{
			$query = "Select i.`itemattributeoption_prefix` as prefix,op.`price` FROM `#__kart_itemattributeoptions`  as i
						LEFT JOIN `#__kart_option_currency` AS op
						 ON i.`itemattributeoption_id`=op.`itemattributeoption_id`
						WHERE i.`itemattributeoption_id`=" . $attid . " AND op.`currency`='" . $currency . "'";
			$db->setQuery($query);
			$option_detail = $db->loadObject();

			if (empty($option_detail))
			{
				$option_detail = new stdClass;
				$option_detail->price = 0;
				$option_detail->prefix = '+';
			}
			$price = $comquick2cartHelper->getFromattedPrice($option_detail->price);
			$prefixarray[$key] = $option_detail->prefix . " " . $price;
		}
		return $prefixarray;
	}
	/* This  provides all info about item attributes ( id,att_name,options details, price )
	*/

	public function getItemCompleteAttrDetail($item_id)
	{
		$productHelper = new productHelper;
		return $productHelper->getItemCompleteAttrDetail($item_id);
	}

	public function countCartitems()
	{
		$db = JFactory::getDBO();
		$Quick2cartModelcart = new Quick2cartModelcart;
		$cart_id = $Quick2cartModelcart->getCartId();

		if (!isset($cart_id)) return;
		$query = "Select SUM(product_quantity)
		 FROM #__kart_cartitems
		 WHERE cart_id='$cart_id' ";
		$db->setQuery($query);
		return $db->loadResult();
	}

	public function getCartItemIds()
	{
		$cartid = $this->getCartId();
		$query = "SELECT kc.item_id
		FROM #__kart_cartitems as kc
		WHERE kc.cart_id =" . $cartid;
		$this->_db->setQuery($query);
		return $this->_db->loadColumn();
	}
} // end of class
