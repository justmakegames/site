<?php 
/** 
 * @package JREALTIMEANALYTICS::SERVERSTATS::administrator::components::com_jrealtimeanalytics
 * @subpackage views
 * @subpackage serverstats
 * @subpackage tmpl
 * @author Joomla! Extensions Store
 * @copyright (C) 2013 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html 
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );  ?>

<div class="lefttext_stats span4"> 
	<div class="statslabel blue">
		<span class="statslabel_value icon-copy"><?php echo $this->data[TOTALVISITEDPAGES];?></span>
		<span class="statslabel_text"><?php echo JText::_('COM_JREALTIME_TOTAL_VISITED_PAGES');?></span>
	</div>
	
	<div class="statslabel green">
		<span class="statslabel_value icon-users"><?php echo $this->data[TOTALVISITORS];?></span>
		<span class="statslabel_text"><?php echo JText::_('COM_JREALTIME_TOTAL_VISITORS');?></span>
	</div>
	
	<div class="statslabel yellow">
		<span class="statslabel_value icon-clock"><?php echo $this->data[MEDIUMVISITTIME];?></span>
		<span class="statslabel_text"><?php echo JText::_('COM_JREALTIME_MEDIUM_VISIT_TIME');?></span>
	</div>
	
	<div class="statslabel red">
		<span class="statslabel_value icon-eye"><?php echo $this->data[MEDIUMVISITEDPAGESPERSINGLEUSER];?></span>
		<span class="statslabel_text"><?php echo JText::_('COM_JREALTIME_MEDIUM_VISITED_PAGES_PERUSER');?></span>
	</div>
</div>

<div class="rightgraph_stats span8">
	<img src="<?php echo JUri::root();?>administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_bars.png' . $this->nocache;?>" />
</div>

