<?php

/**
 *
 * Default view
 *
 * @version             1.0.0
 * @package             Gavern Framework
 * @copyright			Copyright (C) 2010 - 2011 GavickPro. All rights reserved.
 *               
 */
 
// No direct access.
defined('_JEXEC') or die;

//
$app = JFactory::getApplication();
$user = JFactory::getUser();
// getting User ID
$userID = $user->get('id');
// getting params
$option = JRequest::getCmd('option', '');
$view = JRequest::getCmd('view', '');
// defines if com_users
define('GK_COM_USERS', $option == 'com_users' && ($view == 'login' || $view == 'registration'));
// other variables
$btn_login_text = ($userID == 0) ? JText::_('TPL_GK_LANG_LOGIN') : JText::_('TPL_GK_LANG_LOGOUT');
$tpl_page_suffix = $this->page_suffix != '' ? ' class="'.$this->page_suffix.'"' : '';

?>
<!DOCTYPE html>
<html lang="<?php echo $this->APITPL->language; ?>" <?php echo $tpl_page_suffix; ?>>
<head>
	<?php $this->layout->addTouchIcon(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <?php if($this->API->get('rwd', 1)) : ?>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <?php else : ?>
      <meta name="viewport" content="width=<?php echo $this->API->get('template_width', 1020)+80 ?>">
    <?php endif; ?>
    <jdoc:include type="head" />
    <?php $this->layout->loadBlock('head'); ?>
	<?php $this->layout->loadBlock('cookielaw'); ?>
</head>
<body<?php echo $tpl_page_suffix; ?><?php if($this->browser->get("tablet") == true) echo ' data-tablet="true"'; ?><?php if($this->browser->get("mobile") == true) echo ' data-mobile="true"'; ?><?php $this->layout->generateLayoutWidths(); ?> data-bg="<?php echo $this->API->get('template_bg', '1'); ?>">	
	<?php if ($this->browser->get('browser') == 'ie7' || $this->browser->get('browser') == 'ie6') : ?>
	<!--[if lte IE 7]>
	<div id="ieToolbar"><div><?php echo JText::_('TPL_GK_LANG_IE_TOOLBAR'); ?></div></div>
	<![endif]-->
	<?php endif; ?>	
	
	<div id="gkPage">	 
	    <?php if(count($app->getMessageQueue())) : ?>
	    <jdoc:include type="message" />
	    <?php endif; ?>
	    
	    <section id="gkPageTop">                    	
		    <?php $this->layout->loadBlock('logo'); ?>
		    
		    <div id="gkMobileMenu">
		    	<?php echo JText::_('TPL_GK_LANG_MOBILE_MENU'); ?>
		    	<select onChange="window.location.href=this.value;">
		    	<?php 
		    	    $this->mobilemenu->loadMenu($this->API->get('menu_name','mainmenu')); 
		    	    $this->mobilemenu->genMenu($this->API->get('startlevel', 0), $this->API->get('endlevel',-1));
		    	?>
		    	</select>
		    </div>
		    
		    <?php if($this->API->modules('topbanner')) : ?>
		    <div id="gkTopBanner">
		    	<?php if($this->API->modules('topbanner')) : ?>
		    		<jdoc:include type="modules" name="topbanner" style="<?php echo $this->module_styles['topbanner']; ?>"  modnum="<?php echo $this->API->modules('topbanner'); ?>" />
		    	<?php endif; ?>
		    </div>
		    <?php endif; ?>
		    
		    <div id="gkMainMenu">
		    	<?php
		    		$this->mainmenu->loadMenu($this->API->get('menu_name','mainmenu')); 
		    	    $this->mainmenu->genMenu($this->API->get('startlevel', 0), $this->API->get('endlevel',-1));
		    	?>   
	    	</div>
	    	
	    	<?php if($this->API->modules('topmenu')) : ?>
	    	<nav id="gkTopMenu">
	    		<jdoc:include type="modules" name="topmenu" style="<?php echo $this->module_styles['topmenu']; ?>"  modnum="<?php echo $this->API->modules('topmenu'); ?>" />
	    	</nav>
	    	<?php endif; ?>
	    </section>
	
		<div id="gkPageContent">
			<?php if($this->API->modules('sidebar') && $this->API->get('sidebar_position', 'right') == 'left') : ?>
			<aside id="gkSidebar">
				<jdoc:include type="modules" name="sidebar" style="<?php echo $this->module_styles['sidebar']; ?>" />
			</aside>
			<?php endif; ?>
		 
	    	<section id="gkContent">					
				<?php if($this->API->modules('top1')) : ?>
				<section id="gkTop1" class="gkCols3">
					<div>
						<jdoc:include type="modules" name="top1" style="<?php echo $this->module_styles['top1']; ?>"  modnum="<?php echo $this->API->modules('top1'); ?>" modcol="3" />
					</div>
				</section>
				<?php endif; ?>
				
				<?php if($this->API->modules('top2')) : ?>
				<section id="gkTop2" class="gkCols3">
					<div>
						<jdoc:include type="modules" name="top2" style="<?php echo $this->module_styles['top2']; ?>" modnum="<?php echo $this->API->modules('top2'); ?>" modcol="3" />
					</div>
				</section>
				<?php endif; ?>
				
				<?php if($this->API->modules('mainbody_top')) : ?>
				<section id="gkMainbodyTop">
					<jdoc:include type="modules" name="mainbody_top" style="<?php echo $this->module_styles['mainbody_top']; ?>" />
				</section>
				<?php endif; ?>	
				
				<?php if($this->API->modules('breadcrumb') || $this->getToolsOverride()) : ?>
				<section id="gkBreadcrumb">
					<?php if($this->API->modules('breadcrumb')) : ?>
					<jdoc:include type="modules" name="breadcrumb" style="<?php echo $this->module_styles['breadcrumb']; ?>" />
					<?php endif; ?>
					
					<?php if($this->getToolsOverride()) : ?>
						<?php $this->layout->loadBlock('tools/tools'); ?>
					<?php endif; ?>
				</section>
				<?php endif; ?>
				
				<section id="gkMainbody">
					<?php if(($this->layout->isFrontpage() && !$this->API->modules('mainbody')) || !$this->layout->isFrontpage()) : ?>
						<jdoc:include type="component" />
					<?php else : ?>
						<jdoc:include type="modules" name="mainbody" style="<?php echo $this->module_styles['mainbody']; ?>" />
					<?php endif; ?>
				</section>
				
				<?php if($this->API->modules('mainbody_bottom')) : ?>
				<section id="gkMainbodyBottom">
					<jdoc:include type="modules" name="mainbody_bottom" style="<?php echo $this->module_styles['mainbody_bottom']; ?>" />
				</section>
				<?php endif; ?>
	    	</section>
	    	
	    	<?php if($this->API->modules('sidebar') && $this->API->get('sidebar_position', 'right') == 'right') : ?>
	    	<aside id="gkSidebar">
	    		<jdoc:include type="modules" name="sidebar" style="<?php echo $this->module_styles['sidebar']; ?>" />
	    	</aside>
	    	<?php endif; ?>
		</div>
		    
		<?php if($this->API->modules('bottom1')) : ?>
		<section id="gkBottom1" class="gkCols6">
			<div>
				<jdoc:include type="modules" name="bottom1" style="<?php echo $this->module_styles['bottom1']; ?>" modnum="<?php echo $this->API->modules('bottom1'); ?>" />
			</div>
		</section>
		<?php endif; ?>
    </div> 
    
    <?php if($this->API->modules('bottom2')) : ?>
    <section id="gkBottom2" class="gkCols6">
    	<div>
    		<jdoc:include type="modules" name="bottom2" style="<?php echo $this->module_styles['bottom2']; ?>" modnum="<?php echo $this->API->modules('bottom2'); ?>" />
    	</div>
    </section>
    <?php endif; ?>
    
    <?php $this->layout->loadBlock('footer'); ?>
    
    <?php if($this->API->modules('topnav + social')) : ?>
    <div id="gkTopBar">
    	<div>
    		<?php if($this->API->modules('social')) : ?>
    		<div class="social-icons">
    			<jdoc:include type="modules" name="social" style="<?php echo $this->module_styles['social']; ?>"  modnum="<?php echo $this->API->modules('social'); ?>" />
    		</div>
    		<?php endif; ?>
    		
    		<?php if($this->API->modules('topnav')) : ?>
    		<nav>
    			<jdoc:include type="modules" name="topnav" style="<?php echo $this->module_styles['topnav']; ?>"  modnum="<?php echo $this->API->modules('topnav'); ?>" />
    		</nav>
    		<?php endif; ?>
    		
    		<?php if($this->API->modules('usermenu')) : ?>
    		<nav id="gkTopBarUsermenu">
    			<jdoc:include type="modules" name="usermenu" style="<?php echo $this->module_styles['usermenu']; ?>"  modnum="<?php echo $this->API->modules('usermenu'); ?>" />
    		</nav>
    		<?php endif; ?>
    	</div>
    </div>
    <?php endif; ?>
    	
   	<?php $this->layout->loadBlock('social'); ?>
	<jdoc:include type="modules" name="debug" />
</body>
</html>