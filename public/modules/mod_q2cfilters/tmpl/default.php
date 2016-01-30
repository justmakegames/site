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
//~ JHtml::_('jquery.framework',  true, true);
JHtml::_('bootstrap.framework');
$document = JFactory::getDocument();

$path = JUri::base() . 'components/com_quick2cart/assets/css/bootstrap-slider.css';
$document->addStyleSheet($path);
$path = JUri::base() . 'components/com_quick2cart/assets/js/bootstrap-slider.js';
$document->addScript($path);
$document->addStyleSheet(JUri::base().'components/com_quick2cart/assets/css/quick2cart.css');

$selectedFilters = explode(',',JFactory::getApplication()->input->get('attributeoption', '', 'string'));
$jinput = JFactory::getApplication();
$baseurl = $jinput->input->server->get('REQUEST_URI', '', 'STRING');
$min_price = $jinput->input->get('min_price', '0', 'int');
$max_price = $jinput->input->get('max_price', '600', 'int');

// If min price is less than max price then replace values
if ($min_price > $max_price)
{
	$temp = $min_price;
	$min_price = $max_price;
	$max_price = $temp;
}

$urlArray = explode ('&',$baseurl);
$document = JFactory::getDocument();

// Block mootools to load for filter module
unset($document->_scripts['/quick/media/system/js/mootools-core-uncompressed.js']);

foreach ($urlArray as $key => $url)
{
	if (strpos($url, 'attributeoption') !== false)
	{
		unset($urlArray[$key]);
	}
	if (strpos($url, 'min_price') !== false)
	{
		unset($urlArray[$key]);
	}
	if (strpos($url, 'max_price') !== false)
	{
		unset($urlArray[$key]);
	}
}

$baseurl = implode('&', $urlArray);
?>

<b class="q2c-price-slider"><?php echo JText::_('COM_QUICK2CART_PRICE_FILTER_RANGE');?></b>
<br><br>
<input id="q2c-price-filter-slider" type="text" style="width:100%"class="q2c-price-slider" value="" data-slider-min="<?php echo $priceRange['min'];?>" data-slider-max="<?php echo $priceRange['max'];?>" data-slider-step="5" data-slider-value="[<?php echo $min_price;?>, <?php echo $max_price;?>]"/><br><br>

<script type="text/javascript">
	techjoomla.jquery = jQuery.noConflict();
	techjoomla.jquery("#q2c-price-filter-slider").slider({});
	techjoomla.jquery("#q2c-price-filter-slider").on('slideStop', function (ev) {
		qtcfiltersubmit();
	});

	function qtcfiltersubmit()
	{
		// Variable to get current filter values
		var filterValues = techjoomla.jquery('#q2c-price-filter-slider').val();
		var values = new Array();
		values = filterValues.split(',');
		var min_price = values[0];
		var max_price = values[1];

		var redirectlink = '<?php echo $baseurl;?>';

		var optionStr = '&min_price='+min_price+'&max_price='+max_price+'&attributeoption=';

		techjoomla.jQuery("#qtcFilterWrapper .qtcCheck:checked").each(function()
		{
			optionStr += techjoomla.jQuery(this).val() + ',';
		});

		window.location = redirectlink+optionStr;
	}

	// Functions to clear all filters
	function clearfilters()
	{
		var redirectlink = '<?php echo $baseurl;?>';

		techjoomla.jQuery("#qtcFilterWrapper .qtcCheck:checked").each(function()
		{
			techjoomla.jQuery(this).attr('checked', false);
		});

		window.location = redirectlink;
	}

</script>
<form action="" method="post" name="filterForm" id="filterForm">
<div id="qtcFilterWrapper">
	<?php
	if (isset($filters))
	{
		foreach ($filters as $filterName => $filter)
		{
			$filter->selectedFilters = $selectedFilters;

			if (!empty($filter))
			{
		?>
				<?php
				$layout = new JLayoutFile(str_replace('.php','',$filter->renderer), $basePath = JPATH_ROOT .'/components/com_quick2cart/layouts/globalattribute/renderer');
				$fieldHtml = $layout->render($filter);

				//$fieldHtml = $productHelper->getAttrFieldTypeHtml($data);
				?>
				<div>
					<?php echo $fieldHtml;?>
				</div>
				<?php
			}
		}
		?>
		<br><br>
		<div class="center">
			<a class="btn btn-small btn-info" onclick='clearfilters()'><?php echo JText::_('COM_QUICK2CART_Q2CFILTERS_CLEAR_FILTERS');?></a>
		</div>
	<?php
	}
	?>
</div>
</form>
