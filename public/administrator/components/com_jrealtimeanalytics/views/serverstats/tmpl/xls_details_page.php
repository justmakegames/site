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
defined ( '_JEXEC' ) or die ( 'Restricted access' ); 
$rowSpacer = '<p></p>';
$reportDelimiter = '_________________';
?>

<b>
	<font size="4" color="#0028D3">
		<?php echo JText::sprintf('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS', 
			$this->detailData[0]->visitedpage);
		?>
	</font>
</b>
<?php echo $rowSpacer;?>

<table>
	<tr>
		<td>
			<font size="3" color="#CE1300"><b><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_VISITEDUSERS');?></b></font>
		</td>
		<td>
			<font size="3" color="#CE1300"><b><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISIT_LIFE');?></b></font>
		</td>
		<td>
			<font size="3" color="#CE1300"><b><?php echo JText::_('COM_JREALTIME_SERVERSTATS_USERS_DETAILS_LASTVISIT');?></b></font>
		</td>
	</tr>
	<?php 
		$totalTime = 0;
		$totalAverageTime = 0;
		$counter = 0;
		foreach ($this->detailData as $userDetail):
	?> 
		<tr>
			<td><?php echo $userDetail->customer_name;?></td>
			<td><?php echo gmdate('H:i:s', $userDetail->impulse * $this->daemonRefresh);?></td>
			<td><?php echo date('Y-m-d H:i:s',  $userDetail->visit_timestamp);?></td>
		</tr>
	<?php 
		$counter++;
		$totalTime += $userDetail->impulse * $this->daemonRefresh;
		$totalAverageTime = $totalTime / $counter;
		endforeach;
	?> 
</table>
<?php echo $rowSpacer;?>

<table>
	<tr>
		<td>
			<font size="3" color="#CE1300"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_TOTALDURATION');?></font>
		</td>
		<td>
			<?php echo gmdate('H:i:s', $totalTime);?>
		</td>
	</tr>
	<tr>
		<td>
			<font size="3" color="#CE1300"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES_DETAILS_AVERAGEDURATION')?></font>
		</td>
		<td>
			<?php echo gmdate('H:i:s', $totalAverageTime);?>
		</td>
	</tr>
</table>