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
<table class="adminlist table table-striped table-hover">
	<thead>
		<tr>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NAME');?></span></th>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_LASTVISIT');?></span></th>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISIT_LIFE');?></span></th>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_BROWSERNAME');?></span></th>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_OS_TITLE');?></span></th>
			<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
				<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_IPADDRESS');?></span></th>
			<?php endif;?>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_GEOLOCATION');?></span></th>
			<th class="title"><span class="label label-info"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISITED_PAGES');?></span></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->data[TOTALVISITEDPAGESPERUSER] as $user):?> 
			<tr>
				<td><?php echo $user[1];?></td>
				<td><?php echo date('Y-m-d H:i:s', $user[2]);?></td>
				<td><?php echo gmdate('H:i:s', $user[7] * $this->cparams->get('daemonrefresh'));?></td>
				<td><?php echo $user[3];?></td>
				<td><?php echo $user[4];?></td>
				<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
					<td><a data-title="<?php echo JText::_('COM_JREALTIME_DETAILS');?>" class="hasTooltip" target="_blank" href="http://whois.domaintools.com/<?php echo $user[6];?>"><?php echo $user[6];?></a></td>
				<?php endif;?>
				<td><?php echo $user[8];?> <img src="<?php echo $this->livesite;?>/administrator/components/com_jrealtimeanalytics/images/flags/<?php echo strtolower($user[8]);?>.png"/></td>
				<td>
					<a class="preview badge badge-info" href="index.php?option=com_jrealtimeanalytics&amp;task=serverstats.showEntity&amp;tmpl=component&amp;details=user&amp;identifier=<?php echo $user[5];?>" class="preview"><?php echo $user[0];?></a>
					<a class="preview badge badge-success" href="index.php?option=com_jrealtimeanalytics&amp;task=serverstats.showEntity&amp;tmpl=component&amp;details=flow&amp;identifier=<?php echo $user[5];?>" class="preview"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NAVIGATION_FLOW');?></a>
				</td>
			</tr>
		<?php endforeach;?> 
	</tbody>
</table>