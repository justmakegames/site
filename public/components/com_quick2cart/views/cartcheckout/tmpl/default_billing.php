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

<div id="qtc_ckout_billing-info" class="qtc_billing_page com_quick2cart-checkout-steps " style="<?php echo (isset($showBillShipTab) && $showBillShipTab ==0 ? "display:none;" : '')?>">
	<!-- Billing and shipping info -->
	<div class="row">
	<div id="qtc_mainwrapper" class="">  <!-- qtc_mainwrapper  -->
		<div id="q2c_billing" class="  <?php echo ($this->params->get( 'shipping' )==1)?' col-lg-6 col-md-6 col-sm-6 col-xs-12':' col-lg-12 col-md-12 col-sm-12 col-xs-12';?> qtc_innerwrapper">
			<legend id="qtc_billin" ><?php echo JText::_('QTC_BILLIN')?>&nbsp;<small><?php //echo JText::_('QTC_BILLIN_DESC')?></small></legend>
			<div class="form-group">
				<label  for="fnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label"><?php echo "* ".JText::_('QTC_BILLIN_FNAM')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="fnam" class="input-medium bill inputbox required validate-name" type="text" value="<?php echo (isset($userbill->firstname))?$userbill->firstname:''; ?>" maxlength="250" size="32" name="bill[fnam]" title="<?php echo JText::_('QTC_BILLIN_FNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>

		<?php
			if ($this->params->get('qtc_middlenmae')==1)
			{
		?>
			<div class="form-group">
				<label  for="mnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_MNAM')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="mnam" class="input-medium bill inputbox required validate-name" type="text" value="<?php echo (isset($userbill->middlename))?$userbill->middlename:''; ?>" maxlength="250" size="32" name="bill[mnam]" title="<?php echo JText::_('QTC_BILLIN_MNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
		<?php } ?>

			<div class="form-group">
				<label for="lnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_LNAM')?>	</label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="lnam" class="input-medium bill inputbox required validate-name" type="text" value="<?php echo (isset($userbill->lastname))?$userbill->lastname:''; ?>" maxlength="250" size="32" name="bill[lnam]" title="<?php echo JText::_('QTC_BILLIN_LNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group">
				<label for="email1" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_EMAIL')?></label>
				<!--div class=""><input id="email1" class="input-medium bill inputbox required validate-email" type="text" value="<?php echo (isset($userbill->user_email))?$userbill->user_email:'' ; ?>" maxlength="250" size="32" name="bill[email1]" onblur="chkbillmail11(this.value);" title="<?php echo JText::_('QTC_BILLIN_EMAIL_DESC')?>"-->
				<!--Added by Sneha-->
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="email1" class="input-medium bill inputbox required validate-email" type="text" value="<?php echo (isset($userbill->user_email))?$userbill->user_email:'' ; ?>" maxlength="250" size="32" name="bill[email1]" onblur=" chkbillmailregistered(this.value);" title="<?php echo JText::_('QTC_BILLIN_EMAIL_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group" id="qtc_billmail_msg_div" style="display:none;">
				<span class="help-inline qtc_removeBottomMargin" id="billmail_msg"></span>
			</div>
			<?php
			$enable_bill_vat = $this->params->get('enable_bill_vat');
			if ($enable_bill_vat=="1")
			{
			 ?>
			<div class="form-group">
				<label for="vat_num"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo  JText::_('QTC_BILLIN_VAT_NUM')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				  <input id="vat_num" class="input-small bill inputbox validate-integer" type="text" value="<?php echo (isset($userbill->vat_number))?$userbill->vat_number:''; ?>" size="32" name="bill[vat_num]" title="<?php echo JText::_('QTC_BILLIN_VAT_NUM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<?php
			} ?>
			<div class="form-group">
				<label for="phon"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_PHON')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				  <input id="phon" class="input-small bill inputbox required validate-integer" type="text" onkeyup="checkforalpha(this,43,<?php echo $entered_numerics; ?>);" maxlength="50" value="<?php echo (isset($userbill->phone))?$userbill->phone:''; ?>" size="32" name="bill[phon]" title="<?php echo JText::_('QTC_BILLIN_PHON_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group">
				<label for="addr"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_ADDR')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<textarea id="addr" class=" bill inputbox required" name="bill[addr]"  maxlength="250" rows="3" title="<?php echo 		JText::_('QTC_BILLIN_ADDR_DESC')?>" ><?php echo (isset($userbill->address))?$userbill->address:''; ?></textarea>
					<p class="help-block"><?php echo JText::_('QTC_BILLIN_ADDR_HELP')?> </p>
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group">
				<label for="zip"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_ZIP')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="zip"  class="input-small bill inputbox required " type="text" value="<?php echo (isset($userbill->zipcode))?$userbill->zipcode:''; ?>" onblur="" maxlength="20" size="32" name="bill[zip]" title="<?php echo JText::_('QTC_BILLIN_ZIP_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group">
				<label for="country"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* " . JText::_('QTC_BILLIN_COUNTRY')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" >
				<?php

				/** --------------------------------------------------------------------------------------*/
						 $country=$this->country;
						// start sneha code
						/*$default_country =$params->get('set_default_country','');
//						print"<pre>"; print_r($city_country); die;
						$default=NULL;
						if ($user->id)
						{
							//$default= ((isset($city_country[0]->cb_country))?$city_country[0]->cb_country:''); // sneha's code

						}
						elseif (isset($default_country)){
							$default=$default_country;
						}*/
						// end sneha code
						$default = (isset($userbill->country_code))?$userbill->country_code: $this->params->get('set_default_country','');
						$options = array();
						$options[] = JHtml::_('select.option', "", JText::_('QTC_BILLIN_SELECT_COUNTRY'));

						foreach ($country as $key=>$value)
						{
							$options[] = JHtml::_('select.option', $value['id'], $value['country']);
						}

					echo $this->dropdown = JHtml::_('select.genericlist',$options,'bill[country]','class="qtc_select bill chzn-done" data-chosen="qtc"  required="required"  aria-invalid="false" size="1" onchange=\'generateState(id,"",'.$tprice.')\' ','value','text',$default,'country');
				?>

				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group" >
				<label for="state" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* " .  JText::_('QTC_BILLIN_STATE')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" id="qtcBillState">
					<select name="bill[state]" id="state" class="qtc_select bill required chzn-done" data-chosen="qtc">
						<option selected="selected" value="" ><?php echo JText::_('QTC_BILLIN_SELECT_STATE')?></option>
					</select>
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group">
				<label for="city" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_BILLIN_CITY')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="city" class="input-medium bill inputbox required validate-name" type="text" value="<?php echo (isset($userbill->city))?$userbill->city:''; ?>" maxlength="250" size="32" name="bill[city]" title="<?php echo JText::_('QTC_BILLIN_CITY_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group ">
				<label for="" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo JText::_( 'QTC_USER_COMMENT' ); ?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<textarea id="comment" name="comment" class="inputbox" rows="3" maxlength="135" size="28"></textarea>
				</div>
				<div class="qtcClearBoth"></div>
			</div>
		<?php
			if($this->params->get( 'shipping' ) == '1' )
			{
				// Removed class checkbox qtcMarginLeft
				?>
			<div class="checkbox">
				<label class=""><input type="checkbox" id = "ship_chk"  name = "ship_chk" value="1" size= "10" onchange="show_ship()"  />	<?php echo JText::_('QTC_SHIP_SAME')?></label>
			</div>
		<?php }  ?>
		</div><!-- END OF qtc_leftwrapper-->

	<?php
	if ( $this->params->get('shipping') == '1' )
	{
		?>
		<div id="qtc_ship1" class="broadcast-expands  col-lg-6 col-md-6 col-sm-6 col-xs-12 qtc_innerwrapper ">
			<legend id="qtc_ship" class="ship_tr"> <?php echo JText::_('QTC_SHIPIN')?>&nbsp;<small><?php //echo JText::_('QTC_SHIPIN_DESC')?></small></legend>
			<div class=" form-group ship_tr">
				<label  for="ship_fnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label"><?php echo "* ".JText::_('QTC_SHIPIN_FNAM')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_fnam" class="input-medium inputbox required validate-name form-control" type="text" value="<?php echo (isset($usership->firstname))?$usership->firstname:''; ?>" maxlength="250" size="32" name="ship[fnam]" title="<?php echo JText::_('QTC_SHIPIN_FNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>

		<!--added by aniket to get middle name-->
		<?php
			if ($this->params->get('qtc_middlenmae')==1)
			{
		?>
			<div class="form-group ship_tr">
				<label for="ship_mnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_MNAM')?>	</label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_mnam" class="input-medium inputbox required validate-name form-control" type="text" value="<?php echo (isset($usership->middlename))?$usership->middlename:''; ?>" maxlength="250" size="32" name="ship[mnam]" title="<?php echo JText::_('QTC_SHIPIN_MNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
		<?php } ?>
<!--end by aniket to get middle name-->
			<div class="form-group ship_tr">
				<label for="ship_lnam" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_LNAM')?>	</label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_lnam" class="input-medium inputbox required validate-name form-control" type="text" value="<?php echo (isset($usership->lastname))?$usership->lastname:''; ?>" maxlength="250" size="32" name="ship[lnam]" title="<?php echo JText::_('QTC_SHIPIN_LNAM_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>

			<div class="form-group ship_tr">
				<label for="ship_email1" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_EMAIL')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_email1" class="input-medium inputbox required validate-email form-control" type="text" value="<?php echo (isset($usership->user_email))?$usership->user_email:''; ?>" maxlength="250" size="32" name="ship[email1]" title="<?php echo JText::_('QTC_SHIPIN_EMAIL_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>

			<div class="form-group ship_tr">
				<label for="ship_phon"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_PHON')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_phon" class="input-small inputbox required validate-integer form-control" maxlength="50" type="text" onkeyup="checkforalpha(this,43,<?php echo $entered_numerics; ?>);" value="<?php echo (isset($usership->phone))?$usership->phone:''; ?>" maxlength="50" size="32" name="ship[phon]" title="<?php echo JText::_('QTC_SHIPIN_PHON_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group ship_tr">
				<label for="ship_addr"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_ADDR')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<textarea id="ship_addr" class="input-medium bill inputbox required form-control" name="ship[addr]"  maxlength="250" rows="3" title="<?php echo JText::_('QTC_SHIPIN_ADDR_DESC')?>" ><?php echo (isset($usership->address))?$usership->address:''; ?></textarea>
				<p class="help-block"><?php echo JText::_('QTC_SHIPIN_ADDR_HELP')?> </p>
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group ship_tr">
				<label for="ship_zip"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_ZIP')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_zip" class="input-small inputbox required form-control" type="text" value="<?php echo (isset($usership->zipcode))?$usership->zipcode:''; ?>" maxlength="20" size="32" name="ship[zip]" title="<?php echo JText::_('QTC_SHIPIN_ZIP_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group ship_tr">
				<label for="ship_country"  class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* ".JText::_('QTC_SHIPIN_COUNTRY')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" id='qtcShipCountry'>
					<?php
						$country=$this->country;
						$default_country = (isset($usership->country_code)) ? $usership->country_code : $this->params->get('set_default_country','');

						$options = array();
						$options[] = JHtml::_('select.option', "", JText::_('QTC_SHIPIN_SELECT_COUNTRY'));
						foreach ($country as $key=>$value)
						{
							$options[] = JHtml::_('select.option', $value['id'], $value['country']);
						}
						echo $this->dropdown = JHtml::_('select.genericlist',$options,'ship[country]','class="qtc_select form-control" required="required" data-chosen="qtc" aria-invalid="false" size="1" onchange=\'generateState(id,"",'.$taxval.')\' ','value','text',$default_country,'ship_country');
					?>
				</div>
				<div class="qtcClearBoth"></div>
			</div>
			<div class="form-group ship_tr" >
				<label for="ship_state" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label"><?php echo "* " . JText::_('QTC_SHIPIN_STATE')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" id="qtcShipState">
					<select name="ship[state]" id="ship_state"  class=" qtc_select required form-control" data-chosen="qtc">
						<option value=""><?php echo JText::_('QTC_SHIPIN_SELECT_STATE')?></option>
					</select>
				</div>
				<div class="qtcClearBoth"></div>
			</div>

			<div class="form-group ship_tr">
				<label for="ship_city" class="col-lg-3 col-md-12 col-sm-12 col-xs-12  control-label" ><?php echo "* ".JText::_('QTC_SHIPIN_CITY')?></label>
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<input id="ship_city"  class="input-medium inputbox required validate-name form-control" type="text" value="<?php echo (isset($usership->city))?$usership->city:''; ?>" maxlength="250" size="32" name="ship[city]" title="<?php echo JText::_('QTC_SHIPIN_CITY_DESC')?>">
				</div>
				<div class="qtcClearBoth"></div>
			</div>

		</div> <!-- End of qtc_ship1, END OF qtc_innerwrapper-->
	<?php  }?> <!-- if ( $params->get( 'shipping' ) == '1' ) -->
	</div><!-- END qtc_mainwrapper  -->
			<!-- COMMENT-->
	</div> <!--First row end -->
	<!-- END :: Billing and shipping info -->

	<?php

	$shipval = $taxval;
	?>

	<!-- FOR TERMS AND CONDITON-->
	<?php

	if ($showTersmAndCond )
	{
		JHtml::_('behavior.modal');
		$Itemid = $helperobj->getitemid('index.php?option=com_content&view=article');
		$catid=0;
		//$link =JUri::root().ContentHelperRoute::getArticleRoute($res["product_id"], $catid);
		$terms_link = JUri::root().substr(JRoute::_('index.php?option=com_content&view=article&id='.$termsCondArtId."&Itemid=".$Itemid."&tmpl=component"),strlen(JUri::base(true))+1);
	?>
		<div class="checkbox">
			<label class="">
				<input class="qtc_checkbox_style" type="checkbox" name="qtc_accpt_terms" id="qtc_accpt_terms" size="30" aria-invalid="false"><?php  echo JText::_( 'COM_QUICK2CART_ACCEPT' ); ?>

				<a rel="{handler: 'iframe', size: {x: 600, y: 600}}" href="<?php echo $terms_link;?>" class="modal" title="<?php echo JText::_( 'COM_QUICK2CART_TERMS_CONDITION' ); ?>">
						<?php  echo JText::_( 'COM_QUICK2CART_TERMS_CONDITION' ); ?>
				</a>
			</label>
		</div>
		<?php
	} ?>

 <!-- </div> END OF checkout-first-step-billing-info-->


</div><!--END OF billing-info-->
