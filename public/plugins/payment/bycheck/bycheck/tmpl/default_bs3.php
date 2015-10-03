<?php
/**
 *  @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 *  @license    GNU General Public License version 2, or later
 */

// no direct access

defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.formvalidation');
$document =JFactory::getDocument();
	if($vars->custom_email=="")
		$email = JText::_('NO_ADDRS');
	else
		$email = $vars->custom_email;

?>
<script type="text/javascript">
function myValidate(f)
{
if (document.formvalidator.isValid(f)) {
		f.check.value='<?php echo JSession::getFormToken(); ?>';
		return true;
	}
	else {
		var msg = 'Some values are not acceptable.  Please retry.';
		alert(msg);
	}
	return false;
}
</script>
<div class="akeeba-bootstrap">
<form action="<?php echo $vars->url; ?>" name="adminForm" id="adminForm" onSubmit="return myValidate(this);" class="form-validate form-horizontal"  method="post">
	<div>
		<div class="form-group">
			<label for="cardfname" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label"><?php  echo JText::_( 'PLG_CHEQUE_ORDER_INFO' );?></label>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	<?php  echo JText::sprintf( 'ORDER_INFO', $vars->custom_name);?></div>
		</div>
		<div class="form-group">
			<label for="cardlname" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label"><?php echo JText::_( 'COMMENT' ); ?></label>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

				<textarea id='comment' name='comment' class="inputbox" rows='3' maxlength='135' size='28'><?php if(isset($vars->comment)){ echo $vars->comment; } ?></textarea>

			</div>
		</div>
		<div class="form-group">
			<label for="cardaddress1" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label"><?php echo JText::_( 'CON_PAY_PRO' ) ?></label>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12"><?php  echo $email;?>
					<input type='hidden' name='mail_addr' value="<?php echo $email;?>" />
			</div>
		</div>
			<div class="form-actions">
					<input type='hidden' name='order_id' value="<?php echo $vars->order_id;?>" />
					<input type='hidden' name="total" value="<?php echo sprintf('%02.2f',$vars->amount) ?>" />
					<input type="hidden" name="user_id" size="10" value="<?php echo $vars->user_id;?>" />
					<input type='hidden' name='return' value="<?php echo $vars->return;?>" >
					<input type="hidden" name="plugin_payment_method" value="onsite" />
					<input type='submit' name='btn_check' id='btn_check' class="btn btn-success"  value="<?php echo JText::_('SUBMIT'); ?>">
				</div>

	</div>
</form>
</div>