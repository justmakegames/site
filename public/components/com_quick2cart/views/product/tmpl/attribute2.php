<?php
/**
 * @version    SVN: <svn_id>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die();

jimport('joomla.html.pane');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$jinput = JFactory::getApplication()->input;
$lang = JFactory::getLanguage();
$lang->load('com_quick2cart', JPATH_ADMINISTRATOR);
$params = JComponentHelper::getParams('com_quick2cart');
$qtc_base_url = JUri::base();

$entered_numerics= "'".JText::_('QTC_ENTER_NUMERICS')."'";
$document = JFactory::getDocument();
$currencies=$params->get('addcurrency');
$document = JFactory::getDocument();

if (version_compare(JVERSION, '1.6.0', 'ge'))
	$js_key="
	Joomla.submitbutton = function(task){ ";
else
	$js_key="
	function submitbutton( task ){";

	$js_key.="
		if (task == 'cancel')
		{";
	        if (version_compare(JVERSION, '1.6.0', 'ge'))
				$js_key.="Joomla.submitform(task);";
			else
				$js_key.="document.qtcAddProdForm.submit();";
	    $js_key.="
	    }else{
			var validateflag = document.formvalidator.isValid(document.qtcAddProdForm);
			if (validateflag){";
				if (version_compare(JVERSION, '1.6.0', 'ge'))
				{
					$js_key.="
				Joomla.submitform(task);";
				}else{
					$js_key.="
				document.qtcAddProdForm.submit();";
				}
			$js_key.="
			}else{
				return false;
			}
		}
	}
	function checkfornum(el)
	{
		var i =0 ;
		for(i=0;i<el.value.length;i++){
		   if (el.value.charCodeAt(i) > 47 && el.value.charCodeAt(i) < 58) { alert(\"".JText::_('QTC_NUMERICS_NOT_ALLOWED')."\"); el.value = el.value.substring(0,i); break;}
		}
	}

function removeopt(elem,id){
	var opt_id = techjoomla.jQuery('input[name=\"attri_opt[' + id + '][id]').val();
	if (opt_id){
	var confirm = confirm('Do you want to remove this option?');
	if (confirm){
		techjoomla.jQuery.ajax({
			url: '".$qtc_base_url."/index.php?option=com_quick2cart&controller=cartcheckout&task=delattributeoption&opt_id='+opt_id,
			type: 'GET',
			success: function(msg)
			{
				window.location.reload();
			}
		});
	}
}
techjoomla.jQuery(elem).parent().remove();

}

function saveAttributeOptionCurrency(currdata,pid)
	{
		var currvalue='';
		techjoomla.jQuery('.currtext').each(function() {
			var bval = techjoomla.jQuery(this).val();
			var bid = techjoomla.jQuery(this).attr('id');
			currvalue+=bval+',';

		});
	}
function qtc_ispositive(ele)
{
		var val=ele.value;
		if (val==0 || val < 0)
		{
			ele.value='';
			alert(\"".JText::_('QTC_ENTER_POSITIVE_ORDER')."\");
			return false;
		}

	}

";
		$document->addScriptDeclaration($js_key);
		$addpre_select = array();
		$addpre_select[] = JHtml::_('select.option','+', JText::_('QTC_ADDATTRI_PREADD'));
		$addpre_select[] = JHtml::_('select.option','-', JText::_('QTC_ADDATTRI_PRESUB'));
		//$addpre_select[] = JHtml::_('select.option','=', JText::_('QTC_ADDATTRI_PRESAM'));


		$pid =  $jinput->get('pid',0,'INTEGER');
		$client =  $jinput->get( 'client','','STRING');
?>
<?php
	$attri_model=new quick2cartModelAttributes();
	//print"<pre>";print_r($this->allAttribues);
	// clearing previous contain(garbage)
	$this->attribute_opt=array();
	if (!empty($this->allAttribues[$i]))
	{
		$this->attribute_opt=$attri_model->getAttributeoption($this->allAttribues[$i]->itemattribute_id);
		$att_op_count=count($this->attribute_opt);
	}
	else
	{
		$att_op_count=0;
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 ">
			<table class="table  table-condensed removeMargin " >
			<thead>
				<tr>
					<th width="42%" align="left"><?php echo JText::_( 'QTC_ADDATTRI_NAME' ); ?> </th>
					<th width="42%"	align="left"><?php echo JText::_( 'QTC_ADDATTRI_FIELD_TYPE_TO_USE' ); ?></th>
					<th width="%"	align="left"><?php echo JText::_( 'QTC_ATT_COMPALSARY_CK' ); ?> </th>
				</tr>
			</thead>
			<tbody>
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_NAME');?>">

					<input id="atrri_name" name="att_detail[<?php echo $i; ?>][attri_name]" class="input-medium bill inputbox qtc_attrib " type="text" value="<?php echo (isset($this->allAttribues[$i]->itemattribute_name))?$this->allAttribues[$i]->itemattribute_name:''; ?>" maxlength="250" size="32" title="<?php echo JText::_('QTC_ADDATTRI_NAME_DESC')?>">
					<!-- Hidded field -->
					<input id="atrri_name_id" name="att_detail[<?php echo $i; ?>][attri_id]" class="input-medium bill inputbox " type="hidden" value="<?php echo (isset($this->allAttribues[$i]->itemattribute_id))?$this->allAttribues[$i]->itemattribute_id:''; ?>" maxlength="250" size="32" title="<?php echo JText::_('QTC_ADDATTRI_NAME_DESC')?>">
				</td>
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_FIELD_TYPE_TO_USE');?>">
					<?php
					$fields = array();
					$default =  !empty($this->allAttribues[$i]->attributeFieldType)? $this->allAttribues[$i]->attributeFieldType :"Select";
					$tableDisplay ='display:table';
					if ($default == 'Textbox'){
						$tableDisplay ='display:none';
					}
					$fields = $this->productHelper->getAttributeFieldsOption();
					//$fields[] = JHtml::_('select.option','Select', JText::_('QTC_ADDATTRI_SELECT_FIELD'));
					//$fields[] = JHtml::_('select.option','Textbox', JText::_('QTC_ADDATTRI_TEXT_FIELD'));

					$fnparam = "this,'".$attribute_container_id."'";
					echo JHtml::_('select.genericlist', $fields, "att_detail[$i][fieldType]", 'class="no_chzn qtcfieldType input-small" data-chosen="qtc" onChange="qtc_fieldTypeChange('.$fnparam.')"', "value", "text",$default);
					?>
				</td>
				<td data-title="<?php echo JText::_('QTC_ATT_COMPALSARY_CK');?>">
					<label class=" ">
				<?php
					$qtc_ck_att="";

					if (isset($this->allAttribues[$i]->attribute_compulsary) && $this->allAttribues[$i]->attribute_compulsary == 1)
					{
						$qtc_ck_att=($this->allAttribues[$i]->attribute_compulsary)?"checked":"";
					}
				?>
				<input type="checkbox" class="checkboxdiv " name="att_detail[<?php echo $i; ?>][iscompulsary_attr]" autocomplete="off" <?php echo $qtc_ck_att;?> >
				</label>

				</td>
			</tbody>
			</table>
		</div>
	</div>

<!--
	<div class="row">
			<div class="col-md-4">
					<label class="" ><strong><?php echo JText::_('QTC_ADDATTRI_NAME'); ?></strong></label>
			</div>
			<div class="col-md-4">
					<strong><?php echo JText::_('QTC_ADDATTRI_FIELD_TYPE_TO_USE')?> </strong>
			</div>
			<div class="col-md-4">
				<strong><?php echo JText::_('QTC_ATT_COMPALSARY_CK')?></strong>
			</div>

	</div>
	<div class="row">

			<div class="col-md-4">

				<input id="atrri_name" name="att_detail[<?php echo $i; ?>][attri_name]" class="input-medium bill inputbox qtc_attrib " type="text" value="<?php echo (isset($this->allAttribues[$i]->itemattribute_name))?$this->allAttribues[$i]->itemattribute_name:''; ?>" maxlength="250" size="32" title="<?php echo JText::_('QTC_ADDATTRI_NAME_DESC')?>">

				<input id="atrri_name_id" name="att_detail[<?php echo $i; ?>][attri_id]" class="input-medium bill inputbox " type="hidden" value="<?php echo (isset($this->allAttribues[$i]->itemattribute_id))?$this->allAttribues[$i]->itemattribute_id:''; ?>" maxlength="250" size="32" title="<?php echo JText::_('QTC_ADDATTRI_NAME_DESC')?>">
			</div>

			<div class="col-md-4" style="">
				<?php
					$fields = array();
					$default =  !empty($this->allAttribues[$i]->attributeFieldType)? $this->allAttribues[$i]->attributeFieldType :"Select";
					$tableDisplay ='display:table';
					if ($default == 'Textbox'){
						$tableDisplay ='display:none';
					}
					$fields = $this->productHelper->getAttributeFieldsOption();
					//$fields[] = JHtml::_('select.option','Select', JText::_('QTC_ADDATTRI_SELECT_FIELD'));
					//$fields[] = JHtml::_('select.option','Textbox', JText::_('QTC_ADDATTRI_TEXT_FIELD'));

					$fnparam = "this,'".$attribute_container_id."'";
					echo JHtml::_('select.genericlist', $fields, "att_detail[$i][fieldType]", 'class="no_chzn qtcfieldType input-small" data-chosen="qtc" onChange="qtc_fieldTypeChange('.$fnparam.')"', "value", "text",$default);
				?>
			</div>
			<div class="col-md-3 ">
				<label class="checkbox ">
				<?php
					$qtc_ck_att="";

					if (isset($this->allAttribues[$i]->attribute_compulsary) && $this->allAttribues[$i]->attribute_compulsary == 1)
					{
						$qtc_ck_att=($this->allAttribues[$i]->attribute_compulsary)?"checked":"";
					}
				?>
				<input type="checkbox" class="checkboxdiv " name="att_detail[<?php echo $i; ?>][iscompulsary_attr]" autocomplete="off" <?php echo $qtc_ck_att;?> >
				</label>
			</div>
	</div>
-->
	<?php
	$k = 1;
	$lastkey_opt = $att_op_count ;//count($this->attribute_opt);
	?>
	<div class="">
		<table class="table  table-condensed removeMargin qtc_attributeOpTable" style="<?php echo $tableDisplay; ?>"><!-- the table width is fixed to 450px -->
			<thead>
				<tr>
					<th width="30%" align="left"><?php echo JText::_( 'QTC_ADDATTRI_OPTNAME' ); ?> </th>
					<th width="10%"	align="left"><?php echo JText::_( 'QTC_ADDATTRI_OPTPREFIX' ); ?></th>
					<th width="40%"	align="left"><?php echo JText::_( 'QTC_ADDATTRI_OPTVAL' ); ?> </th>
					<th width="10%"	align="left"><?php echo JText::_( 'QTC_ADDATTRI_OPTORDER' ); ?></th>
					<th width="5%"	align="left"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			for ($k = 0; $k <=$att_op_count ; $k++)
			{
				echo '';
			?>
			<tr class="form-inline clonedInput" id="attri_opts<?php echo $k; ?>" >
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_OPTNAME');?>">
					<input type="hidden" name="att_detail[<?php echo $i; ?>][attri_opt][<?php echo $k; ?>][id]" value="<?php echo (!empty($this->attribute_opt[$k]->itemattributeoption_id))?$this->attribute_opt[$k]->itemattributeoption_id:''; ?>">
					<input type="text" class="input-small" name="att_detail[<?php echo $i; ?>][attri_opt][<?php echo $k; ?>][name]" placeholder="<?php echo JText::_('QTC_ADDATTRI_OPTNAME')?>" value="<?php echo (isset($this->attribute_opt[$k]->itemattributeoption_name))?$this->attribute_opt[$k]->itemattributeoption_name:''; ?>">
				</td>
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_OPTPREFIX');?>">
					<?php
					$addpre_val = (isset($this->attribute_opt[$k]->itemattributeoption_prefix))?$this->attribute_opt[$k]->itemattributeoption_prefix:'';
					echo JHtml::_('select.genericlist', $addpre_select, "att_detail[$i][attri_opt][$k][prefix]", 'class="chzn-done input-mini" data-chosen="qtc"', "value", "text", $addpre_val);
				?>
				</td>
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_OPTVAL');?>">
					<?php
					$currencies=$params->get('addcurrency');
					$curr=explode(',',$currencies);
					?>
					<div class='qtc_currencey_textbox '  >
						<?php $quick2cartModelAttributes =  new quick2cartModelAttributes();

							foreach($curr as $currKey=>$value)    // key contain 0,1,2... // value contain INR...
							{
									$currvalue=array();
									$storevalue="";

									if (isset($this->attribute_opt[$k] ))
									{
										$currvalue=$quick2cartModelAttributes->getOption_currencyValue($this->attribute_opt[$k]->itemattributeoption_id,$value);
										$storevalue=(isset($currvalue[0]['price']))?$currvalue[0]['price'] : '';
									}

									if (!empty($curr_syms[$currKey]))
									{
										$currtext = $curr_syms[$currKey];
									}
									else
									{
										$currtext = $value;
									}
									?>
								<div class="input-group curr_margin " >
									<input type='text' name="att_detail[<?php echo $i; ?>][attri_opt][<?php echo $k; ?>][currency][<?php echo $value; ?>]" size='2' id='' value="<?php echo ((isset($currvalue[0]['price']))?$currvalue[0]['price'] : ''); ?>" class="col-md-2 currtext form-control" Onkeyup="checkforalpha(this,46,<?php echo $entered_numerics; ?>);">
									<div class="input-group-addon "><?php echo $currtext; ?></div>
								</div>
						<?php
							}
						?>
					</div>
				</td>
				<td data-title="<?php echo JText::_('QTC_ADDATTRI_OPTORDER');?>">
					<input type="text" name="att_detail[<?php echo $i; ?>][attri_opt][<?php echo $k; ?>][order]" size="2" Onkeyup="checkforalpha(this,'',<?php echo $entered_numerics; ?>);" onchange="qtc_ispositive(this)"	 id="" class="col-md-1"  placeholder="<?php echo JText::_('QTC_ADDATTRI_OPTORDER')?>" value="<?php echo (isset($this->attribute_opt[$k]->ordering))?$this->attribute_opt[$k]->ordering:1; ?>">
				</td>
				<td>
					<?php
					if ($k == $lastkey_opt)
					{ ?>
						 <button type="button"  class="btnAdd btn btn-mini btn-primary" id="qtc_container<?php echo $i;?>" title="<?php echo JText::_('QTC_ADD_MORE_OPTION_TITLE')?>" onclick="addopt(this.id);"><i class="<?php echo QTC_ICON_PLUS;?> icon-white"></i></button>
						<?php
					}
					else
					{ ?>
						 <button type="button" class="btn btn-mini btn-danger" id="btnRemove<?php echo $k; ?>" title="<?php echo JText::_('QTC_REMOVE_MORE_OPTION_TITLE');?>" onclick="techjoomla.jQuery(this).parent().parent().remove();" ><i class="icon-trash icon-white"></i></button>
						<?php
					} ?>
				</td>
			</tr>

			<?php } ?>

			</tbody>
		</table>

	</div>
</div><!---row fluid end -->



	<?php echo JHtml::_( 'form.token' ); ?>
<!-- </form> -->

