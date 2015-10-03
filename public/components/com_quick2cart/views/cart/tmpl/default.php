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
$document = JFactory::getDocument();
//$document->addStyleSheet(JUri::base().'components/com_quick2cart/assets/css/quick2cart_style.css');//aniket

if(version_compare(JVERSION, '3.0', 'lt')) {
	/*BS start*/
	$document->addStyleSheet(JUri::base().'components/com_quick2cart/bootstrap/css/bootstrap.css');//aniket
	/*BS end*/
}

$path = JPATH_SITE.DS.'components'.DS.'com_quick2cart'.DS.'helper.php';
if(!class_exists('comquick2cartHelper'))
{
  //require_once $path;
   JLoader::register('comquick2cartHelper', $path);
   JLoader::load('comquick2cartHelper');
}
$helperobj = new comquick2cartHelper;

$user = JFactory::getUser();
$checkout='index.php?option=com_quick2cart&view=cart';
$itemid=$helperobj->getitemid($checkout);

$checkout=JUri::root().substr(JRoute::_('index.php?option=com_quick2cart&view=cartcheckout&Itemid='.$itemid,false),strlen(JUri::base(true))+1);
$session = JFactory::getSession();
$cart_session = $this->cart;
if(empty($cart_session)){
?>
<div class="well" >
	<div class="alert alert-danger">
		<span ><?php echo JText::_('QTC_EMPTY_CART'); ?> </span>
	</div>
</div>
<?php
	return false;
}
$showoptioncol=0;
foreach($cart_session as $citem)
{
	if(!empty($citem['options']))
	{
		$showoptioncol=1; // atleast one found then show
		break;
	}
}
?>
<?php	echo $this->beforecartdisplay; ?>
<!--<form method="" name="adminForm" class="form-horizontal" id="adminForm" action="">-->
<div id="myModal" class="<?php echo Q2C_WRAPPER_CLASS; ?>" >
	<div class="">
		<h2><?php echo JText::_('QTC_CART')?></h2>
	</div>
	<div class="page-body" id="no-more-tables">
	<div class="cartitems" >
	<?php $align_style='align="right"'; ?>
		<table class="table table-condensed"> <!-- table-striped  -->
			<thead>
				<tr>
					<th class="cartitem_name" width="25%" align="left"><b><?php echo JText::_('QTC_CART_TITLE'); ?> </b></th>
			<?php if($showoptioncol==1)
			{?>	<th class="cartitem_opt" width="20%"	align="left"><b><?php echo JText::_('QTC_CART_OPTS'); ?></b> </th>
			<?php } ?>
					<th class="cartitem_price" width="20%"	align="left"><b><?php echo JText::_('QTC_CART_PRICE'); ?></b> </th>
					<th class="cartitem_qty" width="20%"	align="left"><b><?php echo JText::_('QTC_CART_QTY'); ?></b> </th>
					<th class="cartitem_tprice" width="20%"	<?php echo $align_style ?>><b><?php echo JText::_('QTC_CART_TOTAL_PRICE'); ?> </b></th>
					<!--<th width="5%"	align="left"></th>-->
				</tr>
			</thead>
		<tbody>
		<?php
		$tprice = 0;
		$store_array=array();
		$params = JComponentHelper::getParams('com_quick2cart');
		$multivendor_enable=$params->get('multivendor');
		$storeHelper = new storeHelper();
		foreach($cart_session as $cart)
		{
		?>
			<?php
			// IF MUTIVENDER ENDABLE
			if(!empty($multivendor_enable))
			{
				if(!in_array($cart['store_id'], $store_array))
				{
					$store_array[]=$cart['store_id'];
					$storeinfo=$helperobj->getSoreInfo($cart['store_id']);

					$storeLink   = $storeHelper->getStoreLink($cart['store_id']);
				?>	<!-- STORE TITILE -->
					<tr class="info">
							<td colspan="5" ><b><a href="<?php echo $storeLink; ?>"><?php echo $storeinfo['title'];?></a></b></td>
					</tr>
				<?php
				}
			}
				$product_link=$helperobj->getProductLink($cart['item_id']);
			?>
			<tr>
				<td class="cartitem_name" data-title="<?php echo JText::_('QTC_CART_TITLE'); ?> ">
					<input class="inputbox cart_fields" id="cart_id[]" name="cart_id[]" type="hidden" value="<?php echo $cart['id']; ?>" size="5">
				<?php
					if(empty($product_link))
					{
						echo $cart['title'];
					}
					else
					{
						?><a href="<?php echo $product_link;?>"><?php echo $cart['title']; ?></a><?php
					}
				?>
				</td>
				<?php if($showoptioncol==1)
				{?>
				<td class="cartitem_opt" data-title="<?php echo JText::_('QTC_CART_OPTS'); ?> ">
					<span><?php
					if(!empty($cart['options'])){
						echo nl2br(str_replace(",", "\n", $cart['options']));
					}
						// user field data - eg text to print on T-shirt
					if(!empty($cart['product_attributesUserData']) && 0){
						$productHelper = new productHelper;
						$userdata = json_decode($cart['product_attributesUserData'], true);
						echo $productHelper->getFormattedAttributesUserData($userdata);
					}
					 ?></span>
				</td>
			<?php } ?>
				<td class="cartitem_price" data-title="<?php echo JText::_('QTC_CART_PRICE'); ?> ">
					<div>
						<span><?php echo $helperobj->getFromattedPrice(number_format($cart['amt'] + $cart['opt_amt'] ,2)); ?> </span>
					</div>
				</td>
				<td class="cartitem_qty"  data-title="<?php echo JText::_('QTC_CART_QTY'); ?> ">
					<span><?php echo $cart['qty'];?></span>
				</td>
				<td class="cartitem_tprice"  <?php echo $align_style ?> data-title="<?php echo JText::_('QTC_CART_TOTAL_PRICE'); ?> ">
					<span id="cart_total_price<?php echo $cart['id'];?>"><?php echo $helperobj->getFromattedPrice(number_format($cart['tamt'],2)); ?></span>
					<?php $tprice += $cart['tamt']; ?>
					<input class="totalpriceclass" id="cart_total_price_inputbox<?php echo $cart['id'];?>"	name="cart_total_price_inputbox<?php echo $cart['id'];?>" 	type="hidden" value="<?php echo $cart['tamt']; ?>" size="5">
				</td>
				<!---<td 	><button class="close remove_cart" onclick="removecart('<?php echo $cart['id'];?>')">&times;</button>
				</td> -->
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
				if($params->get('shipping')==1)
				{
					echo $this->aftercartdisplay; ?>
				<?php
				} ?>
		</div>
		<table class="table table-condensed">
			<thead >
					<tr >
						<th width="25%" align="left"></th>
						<th width="20%"	align="left"> </th>
						<th width="20%"	align="left"> </th>
						<th width="20%"	align="left"></th>
						<th width="20%"	<?php echo $align_style ?> ></th>
						<!--<th width="5%"	align="left"></th>-->

					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan = "3" class="hidden-xs hidden-sm"></td>
					<td class="cartitem_tprice_label hidden-xs hidden-sm" align="right"  >
						<?php echo JText::_('QTC_TOTALPRICE_PAY'); ?>
					</td>
					<td class="cartitem_tprice" <?php echo $align_style ?> data-title="<?php echo JText::_('QTC_TOTALPRICE_PAY'); ?> ">
						<span name="total_amt" id="total_amt"> <?php echo $helperobj->getFromattedPrice(number_format($tprice,2)); ?></span>
						<input type="hidden" value="<?php echo $tprice; ?>"	name="total_amt_inputbox"	id="total_amt_inputbox">
					</td>

				</tr>

<?php $shipval = $tprice;  ?>
			</tbody>
		</table>
	</div>
	<div class="" id="qtc_formactions">
		<a class="btn btn-success" onclick="window.parent.document.location.href='<?php echo $checkout; ?>';" ><?php echo JText::_('QTC_CHKOUT'); ?></a>
		<button class="btn btn-primary" onclick="qtcCartContinueBtn()" ><?php echo JText::_('QTC_BACK'); ?></button>
	</div>

</div>

<?php

// To change to Continue shipping URL to site specific URL.
$AllProductItemid = $helperobj->getitemid('index.php?option=com_quick2cart&view=category');
$allProdLink = JUri::root() . substr(JRoute::_('index.php?option=com_quick2cart&view=category&Itemid=' . $AllProductItemid, false), strlen(JUri::base(true)) + 1);
?>
<script>

		function qtcCartContinueBtn()
		{
			var popup = true;
			try {
				 // IF popup.
				 popup = (window.self === window.top);
			} catch (e) {
				popup = true;
			}

			if (popup == true)
			{
				/* qtc_base_url - Defined in asset loader plugin*/
				window.location.assign(qtc_base_url);

				/* To change to Continue shipping URL to site specific URL. */
				/*window.location.assign("<?php echo $allProdLink; ?>"); */
			}
			else
			{
				window.parent.SqueezeBox.close();
			}
		}

</script>
