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

?>
<div class="">

	<!-- for Length & weight class option -->
	<?php
	//$qtc_shipping_opt_status = $params->get('shipping');
	$qtc_shipping_opt_style = ($qtc_shipping_opt_status==1) ? "display:block" : "display:none";
	$storeHelper = $comquick2cartHelper->loadqtcClass(JPATH_SITE.DS."components".DS."com_quick2cart".DS."helpers".DS."storeHelper.php","storeHelper");
	$legthList = (array) $storeHelper->getStoreShippingLegthClassList($storeid = 0);
	$weigthList = (array) $storeHelper->getStoreShippingWeigthClassList($storeid = 0);

	if ($isTaxationEnabled)
	{	?>
		<div class="form-group">
			<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" for="qtcTaxprofileSel">
				<?php echo JHtml::tooltip(JText::_('COM_QUICK2CART_TAXPROFILE_DESC_TOOLTIP'), JText::_('COM_QUICK2CART_TAXPROFILE_DESC'), '', JText::_('COM_QUICK2CART_TAXPROFILE_DESC'));?>
			</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 taxprofile">
			</div>
			<div class="clearfix"></div>
		</div>
	<?php
	} 	?>
	<?php
	if ($qtc_shipping_opt_status)
	{
	?>
	<div class='form-group ' style="<?php echo $qtc_shipping_opt_style;?>">
		<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" for="qtc_item_length">
			<?php echo JHtml::tooltip(JText::_('COM_QUICK2CART_PROD_DIMENSION_LENGTH_LABEL_TOOLTIP'), JText::_('COM_QUICK2CART_PROD_DIMENSION_LENGTH_LABEL'), '', JText::_('COM_QUICK2CART_PROD_DIMENSION_LENGTH_LABEL'));?>
		</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 form-inline">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<input type="text" class=" form-control " Onkeyup='checkforalpha(this,46,<?php echo $entered_numerics; ?>);' name='qtc_item_length' id='qtc_item_length' value='<?php echo (!empty($minmaxstock->item_length)) ?  number_format($minmaxstock->item_length, 2) : '' ?>' placeholder="<?php echo JText::_('COM_QUICK2CART_LENGTH_HINT') ?>" />

				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<input type="text" class="form-control" Onkeyup='checkforalpha(this,46,<?php echo $entered_numerics; ?>);' name='qtc_item_width' id='qtc_item_width' value='<?php  echo (!empty($minmaxstock->item_width)) ?  number_format($minmaxstock->item_width, 2) : '' ?>' placeholder="<?php echo JText::_('COM_QUICK2CART_WIDTH_HINT') ?>" />
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="input-group">
					<input type="text" class="form-control " Onkeyup='checkforalpha(this,46,<?php echo $entered_numerics; ?>);' name='qtc_item_height' id='qtc_item_height' value='<?php echo (!empty($minmaxstock->item_height)) ?  number_format($minmaxstock->item_height, 2) : '' ?>' placeholder="<?php echo JText::_('COM_QUICK2CART_HEIGHT_HINT') ?>" />

					<?php
						// Get store configued length id.
						// The get default value

						$lenUniteId = 0;
						if (isset($minmaxstock) && $minmaxstock->item_length_class_id)
						{
							// While edit used item class id
							$lenUniteId = $minmaxstock->item_length_class_id;
						}
						elseif (isset($this->defaultStoreSettings['length_id']))
						{
							// If for store default length unite has set
							$lenUniteId = $this->defaultStoreSettings['length_id'];
						}

						$lenUnitDetail = $storeHelper->getProductLengthDetail($lenUniteId);
						?>

						<div class="input-group-addon"><?php echo $lenUnitDetail['title']; ?>
							<input type='hidden' name="length_class_id" value="<?php echo $lenUnitDetail['id']; ?>"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>


	<?php
	// Get store configued length id.
	// The get default value

	$weightUniteId = 0;
	if (isset($minmaxstock) && $minmaxstock->item_weight_class_id)
	{
		// While edit used item class id
		$weightUniteId = $minmaxstock->item_weight_class_id;
	}
	elseif (isset($this->defaultStoreSettings['weight_id']))
	{
		// If for store default length unite has set
		$weightUniteId = $this->defaultStoreSettings['weight_id'];
	}

	$weightUniteDetail = $storeHelper->getProductWeightDetail($weightUniteId);
	?>
	<div class='form-group ' style="<?php echo $qtc_shipping_opt_style;?>">
		<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" for="qtc_item_weight">
			<?php echo JHtml::tooltip(JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL_TOOLTIP'), JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL'), '', JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL'));?>
		</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 form-inline">
			<div class="input-group ">
				<input type="text" class=" " Onkeyup='checkforalpha(this,46,<?php echo $entered_numerics; ?>);' name='qtc_item_weight' id='qtc_item_weight' value='<?php if (isset($minmaxstock)) echo number_format($minmaxstock->item_weight, 2);?>' />

					<div class="input-group-addon"><?php echo $weightUniteDetail['title']; ?>
						<input type='hidden' name="weigth_class_id" value="<?php echo $weightUniteDetail['id']; ?>"/>
					</div>

			</div>

		</div>
		<div class="clearfix"></div>
	</div>

	<!-- weight unit-->
<!--
	<div class='form-group qtc_item_weight' style="<?php echo $qtc_shipping_opt_style;?>">
		<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" for="qtc_item_weight">
			<?php echo JHtml::tooltip(JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL_TOOLTIP'), JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL'), '', JText::_('COM_QUICK2CART_PROD_DIMENSION_WEIGTH_LABEL'));?>
		</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="input-group">
				<input type="text" class=" " Onkeyup='checkforalpha(this,46,<?php echo $entered_numerics; ?>);' name='qtc_item_weight' id="qtc_item_weight" value='<?php if (isset($minmaxstock)) echo number_format($minmaxstock->item_weight, 2);?>' />
					<div class="input-group-addon"><?php echo $weightUniteDetail['title']; ?>
						<input type='hidden' name="weigth_class_id" value="<?php echo $weightUniteDetail['id']; ?>"/>
					</div>
			</div>
		</div>
	</div>
-->
	<!-- END for Legth & weigth class option -->
	<!-- Shipping Profile-->
	<div class="form-group">
		<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" for="qtc_shipProfileSelList">
			<?php echo JHtml::tooltip(JText::_('COM_QUICK2CART_S_SEL_SHIPPROFILE_TOOLTIP'), JText::_('COM_QUICK2CART_S_SEL_SHIPPROFILE'), '', JText::_('COM_QUICK2CART_S_SEL_SHIPPROFILE'));?>
		</label>

		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 qtc_shipProfileList">
			<span id="qtc_shipProfileSelListWrapper">
			<?php
				// Here default_store_id - before saving the item, value =first store id
				// While edit default_store_id- item's store id
				$defaultProfile = !empty($this->itemDetail['shipProfileId']) ? $this->itemDetail['shipProfileId'] : '';
				$shipDefaultStore = !empty($this->itemDetail['store_id']) ? $this->itemDetail['store_id'] : $this->store_id;
				// Get qtc_shipProfileSelList
				echo $shipProfileSelectList = $qtcshiphelper->qtcLoadShipProfileSelectList($shipDefaultStore, $defaultProfile);
			?>
			</span>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
	}
	?>
</div>

