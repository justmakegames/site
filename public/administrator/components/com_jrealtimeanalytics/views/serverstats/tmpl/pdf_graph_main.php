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
<style>
	table.newpage {
		page-break-after:always;
		width: 100%;		
	}
	div.statslabel {
		margin-bottom: 10px;
	}
	.label {
		display: inline-block;
		padding: 4px 4px;
		font-size: 15px;
		font-weight: bold;
		color: #fff;
		white-space: nowrap;
		text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
		background-color: #3a87ad;
		height: 20px;
		width: 200px;
	}
	.badge {
		background-color: #FFF;
		color: #3a87ad !important;
		padding: 15px;
	}
</style>

<br/><br/>
<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_DETAILS');?></b>
<hr/>
<table class="newpage">
	<tr>
		<td width="30%">
			<div class="statslabel blue">
				<span class="label label-info">
					<?php echo JText::_('COM_JREALTIME_TOTAL_VISITED_PAGES');?>:
					<?php echo $this->data[TOTALVISITEDPAGES];?>
				</span>
			</div>
			<div class="statslabel blue">
				<span class="label label-info">
					<?php echo JText::_('COM_JREALTIME_TOTAL_VISITORS');?>:
					<?php echo $this->data[TOTALVISITORS];?>
				</span>
			</div>
			<div class="statslabel blue">
				<span class="label label-info">
					<?php echo JText::_('COM_JREALTIME_MEDIUM_VISIT_TIME');?>:
					<?php echo $this->data[MEDIUMVISITTIME];?>
				</span>
			</div>
			<div class="statslabel blue">
				<span class="label label-info">
					<?php echo JText::_('COM_JREALTIME_MEDIUM_VISITED_PAGES_PERUSER');?>:
					<?php echo $this->data[MEDIUMVISITEDPAGESPERSINGLEUSER];?>
				</span>
			</div>
		</td>
		<td width="70%">
			<br/><br/><br/>
			<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_bars.png'?>" />
		</td>
	</tr>
</table>

<br/><br/>
<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_GEOLOCATION_AWARE');?></b>
<hr/>
<table class="newpage">
	<tr>
		<td width="30%">
			<?php foreach ($this->data[NUMUSERSGEOGROUPED]['serverside'] as $index=>$geo):?>
				<div class="statslabel blue">
					<span class="label label-info">
						<?php echo !empty($this->geotrans[$geo[1]]['name']) ? $this->geotrans[$geo[1]]['name'] : JText::_('COM_JREALTIME_NOTSET');?>:
						<?php echo $geo[0];?>
					</span>
					<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/flags/<?php echo strtolower($geo[1]);?>.png"/>
				</div>
			<?php endforeach;?> 
		</td>
		<td width="70%">
			<br/><br/><br/>
			<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_pie_geolocation.png'?>" />
		</td>
	</tr>
</table>

<br/><br/>
<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_OS');?></b>
<hr/>
<br/>
<table class="newpage">
	<tr>
		<td width="30%">
			<?php foreach ($this->data[NUMUSERSOSGROUPED] as $index=>$os):?>
				<div class="statslabel blue">
					<span class="label label-info">
						<?php echo $os[1]?>:
						<?php echo $os[0];?>
					</span>
				</div>
			<?php endforeach;?> 
		</td>
		<td width="70%">
			<br/><br/><br/>
			<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_pie_os.png'?>" />
		</td>
	</tr>
</table>

<br/><br/>
<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_BROWSER');?></b>
<hr/>
<table class="newpage">
	<tr>
		<td width="30%">
			<br/> 
			<?php foreach ($this->data[NUMUSERSBROWSERGROUPED] as $index=>$browser):?>
				<div class="statslabel blue">
					<span class="label label-info">
						<?php echo $browser[1]?>:
						<?php echo $browser[0];?>
					</span>
				</div>
			<?php endforeach;?> 
		</td>
		<td width="70%">
			<br/><br/><br/>
			<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/cache/<?php echo $this->userid . '_serverstats_pie_browser.png'?>" />
		</td>
	</tr>
</table>

<?php if($this->cparams->get('landing_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_LANDING_PAGES');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td style="background-color: #d9edf7;" width="80%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGE');?></b><br/>
			</td>
			<td width="20%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NUMUSERS');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[LANDING_PAGES] as $page):?> 
		<tr>
			<td> 
				<?php echo strlen($page[1]) > 100 ? substr($page[1], 0, 100) . '...' : $page[1];?> 
			</td> 
			<td> 
				<?php echo $page[0]?> 
			</td>
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>

<?php if($this->cparams->get('leaveoff_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_LEAVEOFF_PAGES');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td style="background-color: #d9edf7;" width="80%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGE');?></b><br/>
			</td>
			<td width="20%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NUMUSERS');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[LEAVEOFF_PAGES] as $page):?> 
		<tr>
			<td> 
				<?php echo strlen($page[1]) > 100 ? substr($page[1], 0, 100) . '...' : $page[1];?> 
			</td> 
			<td> 
				<?php echo $page[0]?> 
			</td>
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>

<?php if($this->cparams->get('visitsbypage_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGES');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td style="background-color: #d9edf7;" width="65%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_PAGE');?></b><br/>
			</td>
			<td width="20%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_LASTVISIT');?></b>
			</td>
			<td width="15%">
				<b style="font-size:13px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NUMVISITS');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[VISITSPERPAGE] as $page):?> 
		<tr>
			<td>  
				<?php echo strlen($page[2]) > 85 ? substr($page[2], 0, 85) . '...' : $page[2];?> 
			</td> 
			<td> 
				<?php echo date('Y-m-d H:i:s', $page[1]);?> 
			</td>
			<td> 
				<?php echo $page[0];?> 
			</td> 
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>

<?php if($this->cparams->get('visitsbyuser_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_USERS');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td width="12%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_NAME');?></b><br/>
			</td>
			<td width="12%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_LASTVISIT');?></b>
			</td>
			<td width="12%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISIT_LIFE');?></b>
			</td>
			<td width="12%">
				<b style="font-size:14px;color: #3a87ad;">Browser</b>
			</td>
			<td width="16%">
				<b style="font-size:12px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_OS_TITLE');?></b>
			</td>
			<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
				<td width="12%">
					<b style="font-size:14px;color: #3a87ad;">IP</b>
				</td>
			<?php endif;?>
			<td width="12%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_GEOLOCATION');?></b>
			</td>
			<td width="12%">
				<b style="font-size:12px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISITED_PAGES');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[TOTALVISITEDPAGESPERUSER] as $user):?> 
		<tr>
			<td>  
				<?php echo $user[1];?> 
			</td> 
			<td> 
				<span style="font-size:10px;"><?php echo date('Y-m-d H:i:s', $user[2]);?></span> 
			</td>
			<td> 
				<?php echo gmdate('H:i:s', $user[7] * $this->cparams->get('daemonrefresh'));?>
			</td>
			<td> 
				<?php echo $user[3];?> 
			</td> 
			<td> 
				<?php echo $user[4];?> 
			</td> 
			<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
				<td> 
					<?php echo $user[6];?> 
				</td>
			<?php endif;?>
			<td>
				<?php echo $user[8];?> <img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/flags/<?php echo strtolower($user[8]);?>.png"/>
			</td>
			<td> 
				<?php echo $user[0];?> 
			</td> 
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>

<?php if($this->cparams->get('visitsbyip_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JUri::root();?>administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISITSBY_IPADDRESS');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td width="18%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_IPADDRESS');?></b><br/>
			</td>
			<td width="18%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_EVENTTITLE_GEOLOCATION');?></b><br/>
			</td>
			<td width="18%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_LASTVISIT');?></b><br/>
			</td>
			<td width="18%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISIT_LIFE');?></b><br/>
			</td>
			<td width="18%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_VISITED_PAGES');?></b><br/>
			</td>
		</tr>
		<?php foreach ($this->data[TOTALVISITEDPAGESPERIPADDRESS] as $iprecord):?> 
		<tr>
			<td>
				<?php echo $iprecord[2];?>
			</td>
			<td>
				<?php echo $iprecord[4];?> <img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/flags/<?php echo strtolower($iprecord[4]);?>.png"/>
			</td>
			<td>
				<?php echo date('Y-m-d H:i:s', $iprecord[1]);?>
			</td>
			<td>
				<?php echo gmdate('H:i:s', $iprecord[3] * $this->cparams->get('daemonrefresh'));?>
			</td>
			<td>
				<?php echo $iprecord[0];?>
			</td>
		</tr>
		<?php endforeach;?> 
	</table>  
<?php endif; ?>

<?php if($this->cparams->get('referral_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_REFERRAL');?></b>
	<hr/>
	<table class="newpage">
		<tr>
			<td style="background-color: #d9edf7;" width="50%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_REFERRAL_LINK');?></b><br/>
			</td>
			<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
				<td style="background-color: #d9edf7;" width="20%">
					<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_IPADDRESS');?></b><br/>
				</td>
			<?php endif;?>
			<td width="15%">
				<b style="font-size:12px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_REFERRAL_COUNTER');?></b>
			</td>
			<td width="15%">
				<b style="font-size:12px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_REFERRAL_PERCENTAGE');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[REFERRALTRAFFIC] as $referral):?> 
		<tr>
			<td>  
				<?php echo strlen($referral[0]) > 95 ? substr($referral[0], 0, 95) . '...' : $referral[0];?> 
			</td> 
			<?php if(!$this->cparams->get('anonymize_ipaddress', 0)):?>
				<td>  
					<?php echo $referral[2] == 1 ? $referral[1] : JText::_('COM_JREALTIME_SERVERSTATS_MULTIPLE_IP');?> 
				</td>
			<?php endif;?>
			<td>  
				<?php echo $referral[2];?> 
			</td> 
			<td> 
				<?php printf('%.2f', ($referral[2] / $referral[3]) * 100);?>%
			</td> 
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>

<?php if($this->cparams->get('searchkeys_stats', true)): ?>
	<br/><br/>
	<img src="<?php echo JPATH_ROOT;?>/administrator/components/com_jrealtimeanalytics/images/icon-48-statspdf.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:18px;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_SEARCHES');?></b>
	<hr/>
	<table width="100%">
		<tr>
			<td style="background-color: #d9edf7;" width="60%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_SEARCHES_PHRASE');?></b><br/>
			</td>
			<td width="20%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_SEARCHES_COUNTER');?></b>
			</td>
			<td width="20%">
				<b style="font-size:14px;color: #3a87ad;"><?php echo JText::_('COM_JREALTIME_SERVERSTATS_SEARCHES_PERCENTAGE');?></b>
			</td>
		</tr>
		<?php foreach ($this->data[SEARCHEDPHRASE] as $phrase):?> 
		<tr>
			<td>  
				<?php echo $phrase[0];?> 
			</td> 
			<td>  
				<?php echo $phrase[1];?> 
			</td> 
			<td> 
				<?php printf('%.2f', ($phrase[1] / $phrase[2]) * 100);?>%
			</td> 
		</tr>
		<?php endforeach;?> 
	</table>
<?php endif; ?>