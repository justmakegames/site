<?php
/**
 * @version    SVN:<SVN_ID>
 * @package    Quick2cart
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved
 * @license    GNU General Public License version 2, or later
 */
$data = $displayData;

// Remove extra data
unset($data->renderer);
$selectedFilters=$data->selectedFilters;

// Remove extra data
unset($data->selectedFilters);

foreach ($data as $filterName => $options)
{
	if (!empty($options))
	{
	?>
		<div>
			<b><?php echo $filterName;?></b>
		</div>
	<?php
	}
	?>
	<?php foreach ($options as $filterOption)
	{
?>
		<div>
			<input type="checkbox" class="qtcCheck" name="attributeoptions[]" id="<?php echo $filterName . $filterOption['option_name'];?>" onclick="qtcfiltersubmit()" value="<?php echo $filterOption['id'];?>" <?php echo in_array($filterOption['id'],$selectedFilters)?'checked="checked"':'';?>/>
				<?php echo $filterOption['option_name'];?>
		</div>
<?php
	}
}
