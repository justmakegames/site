<?php
/**
 * @version    SVN:<SVN_ID>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved
 * @license    GNU General Public License version 2, or later
 */

$data = $displayData;
$comquick2cartHelper = new comquick2cartHelper;
$att_currency = comquick2cartHelper::getCurrencySession();

// Get current stock settings
$params               = JFactory::getApplication()->getParams('com_quick2cart');
$usestock             = $params->get('usestock');
$outofstock_allowship = $params->get('outofstock_allowship');
$chekForStock = 0;
$product_id          = $data['product_id'];

if ($usestock == 1 && $outofstock_allowship == 0)
{
	$chekForStock = 1;
}

$parent = '';
$is_stock_keepingAttri = 0;

if (isset($data['parent']))
{
	$parent = $data['parent'];
}

if (!empty($data['attributeDetail']))
{
	$atri_options = $data['attributeDetail']->optionDetails;
	$is_stock_keepingAttri = $data['attributeDetail']->is_stock_keeping;
}

$select_opt   = array();
$userData     = array();
$userData[]   = 'Textbox';

if (!$data['attribute_compulsary'] && !in_array($data['fieldType'], $userData))
{
	$select_opt[] = JHtml::_('select.option', "", "");
}

$returnHtml = '';

foreach ($atri_options as $atri_option)
{
	// Check whether option is published or not
	if (empty($atri_option->state))
	{
		continue;
	}

	// For backend: use currency which is sent from data array. From front end, you can use the from session
	$useCurrency = !empty($data['currency']) ? $data['currency'] : $att_currency;
	$attOp_price = (int)  $atri_option->$useCurrency;

	// IF  Atrr price is 0 then don't add +0 USD
	if (!empty($attOp_price))
	{
		$priceText = $comquick2cartHelper->getFromattedPrice($attOp_price, NULL, 0);
		$opt_str   = $atri_option->itemattributeoption_name . ": " . $atri_option->itemattributeoption_prefix . " " . $priceText;
	}
	else
	{
		//  If no price than dont append like  +00.0 USD
		$opt_str = $atri_option->itemattributeoption_name;
	}

	//  Generate op according to datatype

	if (in_array($data['fieldType'], $userData))
	{
		$returnHtml = "<input type='text' name='qtcUserField_" . $atri_option->itemattributeoption_id . "' class='input input-small " . $parent . '-' . $product_id . '_UserField' . "' >";
	}
	else
	{
		$default_value = '';

		if (isset($data['default_value']))
		{
			$default_value = $data['default_value'];
		}

		$field_name = 'attri_option';

		if (isset($data['field_name']))
		{
			$field_name = $data['field_name'];
		}

		$option = new stdClass;
		$option->value  = $atri_option->itemattributeoption_id;
		$option->text  = $opt_str;
		$option->disabled  = 0;

		if ($chekForStock && $is_stock_keepingAttri)
		{
			if (isset($atri_option->child_product_detail->stock) && $atri_option->child_product_detail->stock <= 0)
			{
				$option->disabled  = 1;
			}
		}

		// User data
		// $select_opt[] = JHtml::_('select.option', $atri_option->itemattributeoption_id, $opt_str);
		$select_opt[] = $option;
	}
}

// For select type or radio (Future)
if (!in_array($data['fieldType'], $userData))
{
	?>
	<select class="q2c_AttoptionsMaxWidth <?php echo $parent; ?>-<?php echo $product_id ?>_options">
	<?php
		foreach ($select_opt as $op_key => $option)
		{
			$optionText = $option->text;

			if ($option->disabled == 1)
			{
				$optionText .= JText::_("COM_QUICK2CART_PROD_PAGE_OPTION_SEL_OUT_OF_STOCK");
			}
			?>
				<option value="<?php echo $option->value ?>" <?php echo ($option->disabled == 1) ? 'disabled "': ''?>><?php echo $optionText ?></option>
			<?php
		}
	?>
	</select>
	<?php
}

echo $returnHtml;
?>

