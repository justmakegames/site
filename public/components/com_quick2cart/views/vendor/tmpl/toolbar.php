<?php
/**
 * @version    SVN: <svn_id>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access.
defined('_JEXEC') or die();

$params = JComponentHelper::getParams('com_quick2cart');
$isShippingEnabled = $params->get('shipping', 0);
$isTaxationEnabled = $params->get('enableTaxtion', 0);
$user = JFactory::getUser();
?>

<script type="text/javascript">
	function submitAction_store(action)
	{
		if (action=="change_store")
		{
			var store_id=document.getElementById("current_store_id").value;
			document.adminForm.change_store.value=store_id;
			document.adminForm.submit();
		}
	}
</script>

<?php
$this->params = JComponentHelper::getparams('com_quick2cart');
$multivendor_enable = 1;//$this->params->get('multivendor');
if (empty($multivendor_enable))
{
	return;
}

$jinput = JFactory::getApplication()->input;
$preview = $jinput->get("preview");

if (!empty($preview))
{
	return;
}
?>

<div class="qtc_toolbarDiv">
	<?php
	if (!$user->guest)
	{
		$comquick2cartHelper = new comquick2cartHelper;

		$this->store_cp_itemid        = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=vendor&layout=cp');
		$this->create_store_itemid    = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=vendor&layout=createstore');
		$this->my_stores_itemid       = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=stores&layout=my');
		$this->my_payouts_itemid      = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=payouts&layout=my');
		$this->my_coupons_itemid         = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=coupons&layout=my');
		$this->store_customers_itemid = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=orders&layout=mycustomer');
		$this->store_orders_itemid    = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=orders&layout=storeorder');
		$this->view_products_itemid   = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=category');
		$this->add_product_itemid     = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=product');
		$this->my_products_itemid   = $comquick2cartHelper->getitemid('index.php?option=com_quick2cart&view=category&layout=my');

		$this->store_id = (!empty($this->store_id)) ? $this->store_id : 0 ;
		$storeLimitPerUser = $this->params->get('storeLimitPerUser');
		$storeHelper = new storeHelper();
		$allowToCreateStore = $storeHelper->isAllowedToCreateNewStore();
		?>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 qtc_toolbar">
				<div class="navbar">
					<div class="navbar-inner">
						<div class="containe">
							<ul class="nav">
								<?php
								if (!empty($this->store_role_list))
								{
									$storehelp = new storeHelper();
									$index = $storehelp->array_search2d($this->store_id, $this->store_role_list);
									$store_name = "";

									if ( is_numeric( $index))
									{
										$store_name = $this->store_role_list[$index]['title'];
									}

									$dash_hometitle = JText::sprintf('QTC_STORE_DASHBOARD', $store_name);
								}
								else
								{
									$dash_hometitle = JText::_('QTC_STORE_DASHBOARD_DEFAULT');
								}
								?>

								<li class="<?php echo ($active == 'cp') ? 'active': '' ?>" >
									<a class="brand"
										href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=vendor&layout=cp&Itemid=' . $this->store_cp_itemid);?>"
										title="<?php echo $dash_hometitle; ?>">
										<i class="<?php echo Q2C_TOOLBAR_ICON_HOME;?>"></i>
									</a>
								</li>
							</ul>


							<div class="nav-collapse ">
								<ul class="nav">
									<?php
									$setup_array = array ('zones', 'taxrates', 'taxprofiles', 'shipping', 'shipprofiles'); ?>

									<li class="<?php echo (in_array($active, $setup_array)) ? 'active': '' ?>  dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="<?php echo Q2C_TOOLBAR_ICON_SETTINGS;?>"></i>
											<?php echo JText::_('COM_QUICK2CART_STORE_SETUP'); ?>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=zones&Itemid=' . $this->store_cp_itemid);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
													<?php echo JText::_('COM_QUICK2CART_SETUP_ZONES'); ?></a>
											</li>

											<?php
											// // Dont show taxation related links if taxation is diabled msg
											if ($isTaxationEnabled == 1)
											{
												?>
												<li>
													<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=taxrates&Itemid=' . $this->store_cp_itemid);?>">
														<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
														<?php echo JText::_('COM_QUICK2CART_SETUP_TAXRATES'); ?>
													</a>
												</li>
												<li>
													<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=taxprofiles&Itemid=' . $this->store_cp_itemid);?>">
														<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
														<?php echo JText::_('COM_QUICK2CART_SETUP_TAXPROFILE'); ?>
													</a>
												</li>
												<?php
											}
											?>

											<?php
											// Dont show shipping related links if shipping is diabled msg
											if ($isShippingEnabled == 1)
											{
											?>
												<li>
													<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=shipping&Itemid=' . $this->store_cp_itemid);?>">
														<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
														<?php echo JText::_('COM_QUICK2CART_SETUP_SHIPPING'); ?>
													</a>
												</li>

												<li>
													<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=shipprofiles&Itemid=' . $this->store_cp_itemid);?>">
														<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
														<?php echo JText::_('COM_QUICK2CART_SETUP_SHIPPROFILE'); ?>
													</a>
												</li>
											<?php
											}
											?>
										</ul>
									</li>

									<li class="<?php echo ($active == 'create_store' || $active == 'my_stores') ? 'active': '' ?> dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<?php echo JText::_('QTC_MANAGE_STORE'); ?>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<?php
											if (!empty($allowToCreateStore))
											{
											?>
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=vendor&layout=createstore&Itemid=' . $this->create_store_itemid);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_PLUS;?>"></i>
													<?php echo JText::_('QTC_NEW_STORE'); ?></a>
											</li>
											<?php
											}
											?>
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=stores&layout=my&Itemid=' . $this->my_stores_itemid);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
													<?php echo JText::_('QTC_MANAGE_MY_STORE'); ?>
												</a>
											</li>
										</ul>
									</li>

									<!--
									<li class="dropdown">
									-->
									<li class="<?php echo ($active == 'add_product' || $active == 'my_products') ? 'active': '' ?> dropdown">
										<a href="#"
											class="<?php echo ($active == 'products') ? 'active': '' ?> dropdown-toggle"
											data-toggle="dropdown">
											<?php echo JText::_('QTC_MANAGE_STORE_PROD'); ?>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=product&layout=default&current_store=' . $this->store_id . '&Itemid=' . $this->add_product_itemid);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_PLUS;?>"></i>
													<?php echo JText::_('QTC_MANAGE_STORE_ADD_PROD'); ?>
												</a>
											</li>
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=category&qtcStoreOwner=1&layout=my&Itemid=' . $this->my_products_itemid /* . '&current_store=' . $this->store_id*/);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
													<?php echo JText::_('COM_QUICK2CART_MY_PRODUCTS'); ?>
												</a>
											</li>
											<li>
												<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=category&qtcStoreOwner=1&layout=default&Itemid=' . $this->view_products_itemid . '&current_store=' . $this->store_id);?>">
													<i class="<?php echo Q2C_TOOLBAR_ICON_LIST;?>"></i>
													<?php echo JText::_('QTC_MANAGE_STORE_VIEW_PROD'); ?>
												</a>
											</li>
										</ul>
									</li>

									<li class="<?php echo ($active == 'storeorders' || $active == 'storeorder') ? 'active': '' ?>">
										<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=orders&layout=storeorder&Itemid=' . $this->store_orders_itemid);?>">
											<i class="<?php echo Q2C_TOOLBAR_ICON_CART;?>"></i>
											<?php echo JText::_('QTC_MANAGE_STORE_ORDERS'); ?>
										</a>
									</li>

									<li class="<?php echo ($active == 'storecustomers' || $active == 'customerdetails') ? 'active': '' ?>">
										<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=orders&layout=mycustomer&Itemid=' . $this->store_customers_itemid);?>">
											<i class="<?php echo Q2C_TOOLBAR_ICON_USERS;?>"></i>
											<?php echo JText::_('QTC_MANAGE_STORE_CUSTOMER'); ?>
										</a>
									</li>

									<li class="<?php echo ($active == 'my_coupons' || $active == 'couponform') ? 'active': '' ?>">
										<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=coupons&layout=my&Itemid=' . $this->my_coupons_itemid);?>">
											<i class="<?php echo Q2C_TOOLBAR_ICON_COUPONS;?>"></i>
											<?php echo JText::_('QTC_MANAGE_STORE_COUPON'); ?>
										</a>
									</li>

									<li class="<?php echo ($active == 'payouts') ? 'active': '' ?>">
										<a href="<?php echo JRoute::_('index.php?option=com_quick2cart&view=payouts&layout=my&Itemid=' . $this->my_payouts_itemid);?>">
											<i class="<?php echo Q2C_TOOLBAR_ICON_PAYOUTS;?>"></i>
											<?php echo JText::_('QTC_MANAGE_STORE_PAYOUTS');?>
										</a>
									</li>
								</ul>
							</div>
							<!-- /.nav-collapse -->
						</div>
					</div>
					<!-- /navbar-inner -->
				</div>
			</div>
		</div>
		<?php
	}
?>
</div>
<!-- END OF <div class="qtc_toolbarDiv">-->

<?php
$skip_array = array(
	'0'=>'add_product',
	'1'=>'customerdetails',
	'2'=>'storeorder',
	'3'=>'storecoupon',
	'4'=>'payouts'
	);

if (isset($this->store_role_list) && !in_array($active, $skip_array))
{
	if (count($this->store_role_list)>1)
	{
		?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!--
				<div class="">
					<span class="pull-left qtc_left_top qtc_right_margin">
						<strong><?php echo JText::_('QTC_STORE'); ?>&nbsp;:</strong>
					</span>
				</div>
				-->

				<?php
				$options = array();
				/*$default = '';
				$default = (!empty($this->store_id)) ? $this->store_id : $this->store_role_list['0']['store_id'];*/

				$app = JFactory::getApplication();
				$default = $app->getUserStateFromRequest('com_quick2cart' . '.current_store', 'current_store');
				$app->setUserState('com_quick2cart.current_store', $default);

				foreach ($this->store_role_list as $key=>$value)
				{
					$options[] = JHtml::_('select.option', $value["store_id"], $value['title']);
				}

				// echo $this->dropdown = JHtml::_('select.genericlist', $options, 'current_store', 'class="" autocomplete="off"  onchange=\'submitAction_store("change_store");\' ', 'value', 'text', $default, 'current_store_id');
				?>

				<div class="form-horizontal">
					<div class="clearfix"></div>

					<div class="pull-right">
								<?php
								echo $this->dropdown = JHtml::_('select.genericlist', $options, 'current_store', 'class="" autocomplete="off"  onchange=\'submitAction_store("change_store");\' title="' . JText::_('COM_QUICK2CART_CURRENT_STORE') . '"', 'value', 'text', $default, 'current_store_id');
								?>
								<input type="hidden" name="change_store" id="qtc_change_store" value="<?php echo $default;?>" />
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php
	}
}
