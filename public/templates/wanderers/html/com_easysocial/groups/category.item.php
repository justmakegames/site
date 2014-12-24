<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2013 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );
?>
<div class="es-groups-category" data-es-groups-category>
    <div class="catergory-details">
        <div class="es-category-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="media">
                        <div class="media-object pull-left">
                            <img src="<?php echo $category->getAvatar();?>" class="es-avatar" />
                        </div>

                        <div class="media-body">
                            <h2 class="category-title"><?php echo $category->get( 'title' ); ?></h2>
                        </div>
                    </div>

                    <p class="category-desc"><?php echo $category->get( 'description' ); ?></p>
                </div>
                <div class="col-md-4">
                    <div class="category-graph">
                        <div class="h5"><?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_CREATED_PAST_WEEK' ); ?></div>

                        <span data-category-gravity-chart>
                            <?php echo implode( ',' , $stats ); ?>
                        </span>

                    </div>
                </div>
            </div>

            <div class="es-category-meta">
                <ul class="list-unstyled category-stats pull-left">
                    <li>
                        <i class="ies-users"></i> <?php echo JText::sprintf( Foundry::string()->computeNoun( 'COM_EASYSOCIAL_GROUPS_COUNT' , $totalGroups ) , $totalGroups ); ?>
                    </li>
                    <li>
                        <i class="ies-pictures"></i> <?php echo JText::sprintf( Foundry::string()->computeNoun( 'COM_EASYSOCIAL_GROUPS_ALBUMS' , $totalAlbums ) , $totalAlbums ); ?>
                    </li>
                </ul>

                <?php if( $this->access->allowed( 'groups.create' , true ) && !$this->access->exceeded( 'groups.limit' , $this->my->getTotalGroups() ) ){ ?>
                <a href="<?php echo FRoute::groups( array( 'controller' => 'groups' , 'task' => 'selectCategory' , 'category_id' => $category->id ) );?>" class="btn btn-es-primary pull-right">
                    <?php echo JText::_( 'COM_EASYSOCIAL_CREATE_GROUP_BUTTON' ); ?> &rarr;
                </a>
                <?php } ?>
            </div>
        </div>


    </div>

    <div class="es-container">
        <div class="row">
            <div class="col-md-3">
                <div class="es-sidebar" data-sidebar>

                <?php echo $this->render( 'module' , 'es-groups-sidebar-top' ); ?>

                <div class="es-widget">
                    <div class="es-widget-head">
                        <div class="pull-left widget-title"><?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_RANDOM_GROUPS' );?></div>
                    </div>

                    <div class="es-widget-body">
                        <?php if( $groups ){ ?>
                        <ul class="widget-list fd-nav fd-nav-stacked random-groups">
                            <?php foreach( $groups as $group ){ ?>
                            <li>
                                <img src="<?php echo $group->getAvatar();?>" class="pull-left mr-10 es-avatar" title="<?php echo $this->html( 'string.escape' , $group->getName() );?>" />
                                <a href="<?php echo FRoute::groups( array( 'layout' => 'item' , 'id' => $group->getAlias() ) );?>"><?php echo $group->getName(); ?></a>
                                <div class="fd-small group-meta">
                                    <i class="ies-users"></i> <?php echo JText::sprintf( Foundry::string()->computeNoun( 'COM_EASYSOCIAL_GROUPS_MEMBERS' , $group->getTotalMembers() ) , $group->getTotalMembers() );?>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                        <div class="fd-small">
                            <?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_NO_GROUPS_YET' ); ?>
                        </div>
                        <?php } ?>

                    </div>
                </div>


                <div class="es-widget">
                    <div class="es-widget-head">
                        <div class="pull-left widget-title"><?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_RANDOM_ALBUMS' );?></div>
                    </div>

                    <div class="es-widget-body">
                        <?php if ($randomAlbums) { ?>
                            <ul class="widget-list-grid">
                            <?php foreach( $randomAlbums as $album ){ ?>
                                <li>
                                    <div class="es-avatar-wrap">
                                        <a href="<?php echo $album->getPermalink();?>" class="es-avatar es-avatar-small es-borderless"
                                            data-original-title="<?php echo $this->html( 'string.escape' , $album->get( 'title' ) );?>"
                                            data-es-provide="tooltip"
                                            data-placement="bottom"
                                        >
                                            <img alt="<?php echo $this->html( 'string.escape' , $album->get( 'title' ) );?>" src="<?php echo $album->getCover( 'square' );?>" />
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        <?php } else { ?>
                        <div class="fd-small">
                            <?php echo JText::_('COM_EASYSOCIAL_GROUPS_NO_ALBUMS_HERE'); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="es-widget">
                    <div class="es-widget-head">
                        <div class="pull-left widget-title"><?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_RANDOM_MEMBERS' );?></div>
                    </div>

                    <div class="es-widget-body">
                        <?php if ($randomMembers) { ?>
                        <ul class="widget-list-grid">
                            <?php foreach( $randomMembers as $user ){ ?>
                            <li>
                                <div class="es-avatar-wrap">
                                    <a href="<?php echo $user->getPermalink();?>"
                                        class="es-avatar es-avatar-small es-borderless"
                                        data-popbox="module://easysocial/profile/popbox"
                                        data-user-id="<?php echo $user->id;?>"
                                    >
                                        <img alt="<?php echo $this->html( 'string.escape' , $user->getName() );?>" src="<?php echo $user->getAvatar();?>" />
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                        <div class="fd-small">
                            <?php echo JText::_('COM_EASYSOCIAL_GROUPS_NO_MEMBERS_HERE'); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <?php echo $this->render( 'module' , 'es-groups-sidebar-bottom' ); ?>
                </div>
            </div>

            <div class="col-md-9">
                <div class="es-content">
                    <div class="header-title">
                        <?php echo JText::_( 'COM_EASYSOCIAL_GROUPS_RECENT_UPDATES' ); ?>
                    </div>

                    <div class="es-content-wrap" data-es-group-item-content>
                        <?php echo $stream->html();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
