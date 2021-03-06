<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2013 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );
?>
<form method="post" action="<?php echo JRoute::_( 'index.php' );?>" data-profile-privacy-form class="form-horizontal">
<div class="view-edit_privacy" data-edit-privacy>
	<div class="row">
		<a href="javascript:void(0);" class="btn btn-block btn-es-inverse btn-sidebar-toggle" data-sidebar-toggle>
			<i class="ies-grid-view ies-small mr-5"></i> <?php echo JText::_( 'COM_EASYSOCIAL_SIDEBAR_TOGGLE' );?>
		</a>
		<div class="col-md-3" data-sidebar>
			<?php echo $this->render( 'module' , 'es-profile-editprivacy-sidebar-top' ); ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo JText::_( 'COM_EASYSOCIAL_PROFILE_SIDEBAR_PRIVACY' );?>
				</div>

				<div class="panel-body">
					<ul class="panel-menu privacy-groups">
					<?php $i = 0; ?>
					<?php  foreach( $privacy as $group => $items ) {  ?>
						<li class="privacy-groups-item<?php echo $i == 0 ? ' active' : '';?>"
							data-profile-privacy-item
							data-group="<?php echo $group; ?>"
						>
							<a href="javascript:void(0);"><?php echo JText::_( 'COM_EASYSOCIAL_PRIVACY_GROUP_' . strtoupper( $group ) ); ?></a>
						</li>
						<?php $i++; ?>
					<?php } ?>

					</ul>
				</div>
			</div>
			<?php echo $this->render( 'module' , 'es-profile-editprivacy-sidebar-bottom' ); ?>
		</div>


	<div class="col-md-9">
		<div class="panel panel-default panel-content form-horizontal">
			<div class="panel-body">
				<?php echo $this->render( 'module' , 'es-profile-editprivacy-before-contents' ); ?>
				<?php if( count( $privacy ) > 0 ){ ?>
					<?php foreach( $privacy as $group => $items ){ ?>
					<div class="privacy-contents privacy-content-<?php echo $group; ?>" data-privacy-content data-group="<?php echo $group; ?>">
						<h4><?php echo JText::_( 'COM_EASYSOCIAL_PRIVACY_GROUP_' . strtoupper( $group ) ); ?></h4>
						<p class="mb-20"><?php echo JText::_( 'COM_EASYSOCIAL_PRIVACY_GROUP_' . strtoupper( $group ) . '_DESC' ); ?></p>
						<hr>
						<?php foreach( $items as $item ){

							$hasCustom = ( $item->custom ) ? true : false;
							$customIds = '';
							$curValue  = '';
						?>
						<div class="form-group" data-privacy-item>
							<label class="col-sm-3 control-label"><?php echo $item->label; ?></label>
							<div class="col-sm-8">
								<i class="icon-es-help pull-right" <?php echo $this->html( 'bootstrap.popover' , $item->label , $item->tips , 'bottom' ); ?>></i>
								<select autocomplete="off" class="form-control input-sm privacySelection" name="privacy[<?php echo $item->groupKey;?>][<?php echo $item->rule;?>]" data-privacy-select>
									<?php foreach( $item->options as $option => $value ){
										if( $value )
										{
											$curValue = $option;
										}

										if( $this->config->get( 'general.site.lockdown.enabled' ) && $option == SOCIAL_PRIVACY_0 )
										{
											continue;
										}
									?>
										<option value="<?php echo $option;?>"<?php echo $value ? ' selected="selected"' : '';?>>
											<?php echo JText::_( 'COM_EASYSOCIAL_PRIVACY_OPTION_' . strtoupper( $option ) );?>
										</option>
									<?php } ?>
								</select>

								<a <?php if( !$hasCustom ) { ?>style="display:none;"<?php } ?> href="javascript:void(0);" data-privacy-custom-edit-button>
									<i class="icon-es-settings"></i>
								</a>

								<div data-privacy-custom-form
									class="dropdown-menu dropdown-arrow-topleft privacy-custom-menu"
									style="display:none;"
								>
									<div class="fd-small mb-10 row">
										<div class="col-md-12">
											<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_NAME'); ?>
											<a href="javascript:void(0);" class="pull-right" data-privacy-custom-hide-button>
												<i class="ies-cancel-2 ies-small" title="<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_HIDE' , true );?>"></i>
											</a>	
										</div>
									</div>
									<div class="textboxlist" data-textfield >

										<?php
											if( $hasCustom )
											{
												foreach( $item->custom as $friend )
												{
													if( $customIds )
													{
														$customIds = $customIds . ',' . $friend->user_id;
													}
													else
													{
														$customIds = $friend->user_id;
													}

													$friend = Foundry::user( $friend->user_id );
										?>
											<div class="textboxlist-item" data-id="<?php echo $friend->id; ?>" data-title="<?php echo $friend->getName(); ?>" data-textboxlist-item>
												<span class="textboxlist-itemContent" data-textboxlist-itemContent><?php echo $friend->getName(); ?><input type="hidden" name="items" value="<?php echo $friend->id; ?>" /></span>
												<a class="textboxlist-itemRemoveButton" href="javascript: void(0);" data-textboxlist-itemRemoveButton></a>
											</div>
										<?php
												}

											}
										?>

										<input type="text" class="textboxlist-textField" data-textboxlist-textField placeholder="<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_ENTER_NAME'); ?>" autocomplete="off" />
									</div>
								</div>

								<input type="hidden" name="privacyID[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo $item->id . '_' . $item->mapid;?>" />
								<input type="hidden" name="privacyOld[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo $curValue; ?>" />
								<input type="hidden" data-hidden-custom name="privacyCustom[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo $customIds; ?>" />
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				<?php } ?>
				<hr>
				<button class="btn btn-medium btn-es-primary pull-right" data-profile-notifications-save><?php echo JText::_( 'COM_EASYSOCIAL_SAVE_BUTTON' );?></button>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" name="privacyReset" /> <?php echo JText::_( 'COM_EASYSOCIAL_PRIVACY_RESET_DESCRIPTION' ); ?>
					</label>
				</div>
			</div>

			<?php echo $this->render( 'module' , 'es-profile-editprivacy-after-contents' ); ?>
		</div>
	</div>
</div>
<input type="hidden" name="option" value="com_easysocial" />
<input type="hidden" name="controller" value="profile" />
<input type="hidden" name="task" value="savePrivacy" />
<input type="hidden" name="<?php echo Foundry::token();?>" value="1" />
</form>
