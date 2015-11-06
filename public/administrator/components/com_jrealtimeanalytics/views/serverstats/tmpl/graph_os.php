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

<div class="lefttext_stats span5"> 
	<?php foreach ($this->data[NUMUSERSOSGROUPED] as $os):?>
		<span class="label label-info positions">
			<?php echo $os[1];?>
			<span class="badge badge-inverse-info"><?php echo $os[0];?></span>
		</span>
	<?php endforeach;?> 
</div>

<div class="rightgraph_stats pie span7">
	<img src="<?php echo JUri::root();?>administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_pie_os.png' . $this->nocache;?>" />
</div>