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
<div class="row tablestats no-margin">
	<div class="accordion-group">
		<div class="accordion-heading">
			<div class="accordion-toggle accordion_lightblue noaccordion" data-toggle="collapse">
				<h3><?php echo JText::sprintf('COM_JREALTIME_SERVERSTATS_IP_DETAILS', '<span class="badge badge-info">' . $this->app->input->get('identifier')) . '</span>'; ?></h3>
			</div>
		</div>
		<div class="accordion-body accordion-inner collapse fancybox">
			<table class="adminlist table table-striped table-hover">
				<thead>
					<tr>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NAME');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_USERS_DETAILS_VISITEDPAGE');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISIT_LIFE');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_USERS_DETAILS_LASTVISIT');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_GEOLOCATION_STATS');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_BROWSERNAME');?></span></th>
						<th><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_OS_TITLE');?></span></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$totalTime = 0;
						$totalAverageTime = 0;
						$counter = 0;
						foreach ($this->detailData as $index=>$userDetail):
					?> 
						<tr>
							<td><?php echo $userDetail->customer_name;?></td>
							<td><?php echo $userDetail->visitedpage;?></td>
							<td><?php echo gmdate('H:i:s', $userDetail->impulse * $this->daemonRefresh);?></td>
							<td><?php echo date('Y-m-d H:i:s',  $userDetail->visit_timestamp);?></td>
							<td><?php echo $userDetail->geolocation;?> <img src="<?php echo $this->livesite;?>/administrator/components/com_jrealtimeanalytics/images/flags/<?php echo strtolower($userDetail->geolocation);?>.png"/></td>
							<td><?php echo $userDetail->browser;?></td>
							<td><?php echo $userDetail->os;?></td>
						</tr>
					<?php 
						$counter++;
						$totalTime += $userDetail->impulse * $this->daemonRefresh;
						$totalAverageTime = $totalTime / $counter;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="headstats texttitle">
	<span class="badge badge-info">
		<?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_TOTALDURATION');?>
		<span class="badge badge-inverse-info"><?php echo gmdate('H:i:s', $totalTime);?></span>
	</span>
</div>
<div class="headstats average texttitle">
	<span class="badge badge-info">
		<?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_AVERAGEPAGE_DURATION')?>
		<span class="badge badge-inverse-info"><?php echo gmdate('H:i:s', $totalAverageTime);?>
	</span>
</div>
<a class="headstats btn btn-primary csv" download href="index.php?option=com_jrealtimeanalytics&amp;task=serverstats.showEntitycsv&amp;tmpl=component&amp;details=ip&amp;identifier=<?php echo rawurlencode($this->app->input->get('identifier'));?>">
	<span class="icon-chart"></span>
	<?php echo JText::_('COM_JREALTIME_EXPORTCSV' ); ?>
</a>
<a class="headstats btn btn-primary xls" download href="index.php?option=com_jrealtimeanalytics&amp;task=serverstats.showEntityxls&amp;tmpl=component&amp;details=ip&amp;identifier=<?php echo rawurlencode($this->app->input->get('identifier'));?>">
	<span class="icon-chart"></span>
	<?php echo JText::_('COM_JREALTIME_EXPORTXLS' ); ?>
</a>
<a class="headstats btn btn-primary" download href="index.php?option=com_jrealtimeanalytics&amp;task=serverstats.showEntitypdf&amp;tmpl=component&amp;details=ip&amp;identifier=<?php echo rawurlencode($this->app->input->get('identifier'));?>">
	<span class="icon-chart"></span>
	<?php echo JText::_('COM_JREALTIME_EXPORTPDF' ); ?>
</a>