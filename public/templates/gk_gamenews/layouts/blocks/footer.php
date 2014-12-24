<?php

// No direct access.
defined('_JEXEC') or die;

?>

<footer class="gkFooter">
	<?php if($this->API->get('framework_logo', '0') == '1') : ?>
	<a href="http://gavick.com" id="gkFrameworkLogo" title="Gavern Framework">Gavern Framework</a>
	<?php endif; ?>
	
	<?php if($this->API->modules('footer_nav')) : ?>
	<div id="gkFooterNav">
		<jdoc:include type="modules" name="footer_nav" style="<?php echo $this->module_styles['footer_nav']; ?>" />
	</div>
	<?php endif; ?>
	
	<?php if($this->API->get('stylearea', '0') == '1') : ?>
	<div id="gkStyleArea">
	    <div id="gkColors">
	    	<a href="#" id="gkColor1"><?php echo JText::_('TPL_GK_LANG_COLOR_1'); ?></a>
	    	<a href="#" id="gkColor2"><?php echo JText::_('TPL_GK_LANG_COLOR_2'); ?></a>
	    	<a href="#" id="gkColor3"><?php echo JText::_('TPL_GK_LANG_COLOR_3'); ?></a>
	    </div>
	    
	    <div id="gkBackgrounds">
	    	<a href="#" id="gkBg1" title="<?php echo JText::_('TPL_GK_LANG_BG_1'); ?>">1</a>
	    	<a href="#" id="gkBg2" title="<?php echo JText::_('TPL_GK_LANG_BG_2'); ?>">2</a>
	    	<a href="#" id="gkBg3" title="<?php echo JText::_('TPL_GK_LANG_BG_3'); ?>">3</a>
	    </div>
	</div>
	<?php endif; ?>
	
	<?php if($this->API->get('copyrights', '') !== '') : ?>
	<p class="gkCopyrights"><?php echo $this->API->get('copyrights', ''); ?></p>
	<?php else : ?>
	<p class="gkCopyrights">Template Design &copy; <a href="http://www.gavick.com" title="Joomla Templates">Joomla Templates</a> GavickPro. All rights reserved.</p>
	<?php endif; ?>
</footer>