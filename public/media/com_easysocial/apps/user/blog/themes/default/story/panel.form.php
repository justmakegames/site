<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="es-story-blog-form" data-story-blog-form>
    <div class="form-group mb-0">
          <select data-story-blog-category class="form-control input-sm">
          <?php foreach ($categories as $category) { ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
          <?php } ?>
          </select>
    </div>
    <div data-story-blog-form class="mt-10">
        <div class="form-group">
            <input type="text" class="form-control input-sm" placeholder="<?php echo JText::_('APP_USER_BLOG_TITLE_PLACEHOLDER');?>" data-blog-title />
        </div>

        <div class="form-group">
            <textarea name="content" id="content" class="input-sm form-control" placeholder="<?php echo JText::_('APP_USER_BLOG_CONTENT_PLACEHOLDER');?>" data-blog-content></textarea>
        </div>
    </div>
</div>
