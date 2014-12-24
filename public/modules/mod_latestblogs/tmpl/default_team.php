<?php
/**
 * @package		EasyBlog
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *  
 * EasyBlog is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
 
defined('_JEXEC') or die('Restricted access');
?>
<div class="ezcategoryhead ezcf">
    <?php if ($params->get('showtavatar', true)) : ?>
	<div class="avatar ezfl ezmrs">
		<img style="border-style:solid; border-width:1px; border-color:grey;" src="<?php echo $team->getAvatar(); ?>" width="35" alt="<?php echo $team->title; ?>" />
	</div>
	<?php endif; ?>

    <div class="eztc">
        <div class="ezcategorytitle">
        <?php

		$tmpObj = new stdClass();
		$tmpObj->category_id    = '0';
		$tmpObj->created_by     = '0';
		$tmpObj->id    			= '0';

		$itemId     = modLatestBlogsHelper::_getMenuItemId($tmpObj, $params);
		$teamURL 	= EasyBlogRouter::_('index.php?option=com_easyblog&view=teamblog&layout=listings&id=' . $team->id . $itemId );
		$teamLink	= '<a href="'.$teamURL.'">'.$team->title.'</a>';
		echo $teamLink;
		?>
        </div>
    </div>
</div>

<?php if($team->access == '1' && empty($team->isMember)) { ?>
	<div class="eblog-message warning mtm">
	    <?php echo JText::_('MOD_LATESTBLOGS_TEAMBLOG_MEMBERS_ONLY'); ?>
    </div>
<?php } ?>