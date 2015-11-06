<?php
/**
 * @var $slidesModel N2SmartsliderSlidesModel
 */
$slide = $slidesModel->get(N2Request::getInt('slideid', 0));

$actions = array(
    NHtml::tag('a', array(
        'href'    => $this->appType->router->createUrl(array(
            "slider/edit",
            array(
                "sliderid" => $sliderId
            )
        )),
        'class'   => 'n2-button n2-button-red n2-button-big n2-h4 n2-b n2-uc',
        'onclick' => 'return nextend.cancel(this.href);'
    ), n2_('Cancel'))
);

if ($slide && $slide['generator_id'] > 0) {
    $actions[] = NHtml::tag('a', array(
        'href'    => '#',
        'class'   => 'n2-button n2-button-blue n2-button-big n2-h4 n2-b n2-uc',
        'onclick' => 'nextend.askToSave = false;setTimeout(function() {var static = n2("<input name=\'static\' value=\'1\' />"); n2(\'#smartslider-form\').append(static).submit(); static.remove();}, 300); return false;'
    ), n2_('Static save'));
}

$actions[] = NHtml::tag('a', array(
    'href'    => '#',
    'class'   => 'n2-button n2-button-green n2-button-big n2-h4 n2-b n2-uc',
    'onclick' => 'return NextendForm.submit("#smartslider-form");'
), n2_('Save'));

$this->widget->init('topbar', array(
    'back'        => NHtml::tag('a', array(
        'class' => 'n2-h4 n2-uc',
        'href'  => $this->appType->router->createUrl(array(
            "slider/edit",
            array(
                "sliderid" => $sliderId
            )
        ))
    ), n2_('Slider settings')),
    "actions"     => $actions,
    'menu'        => array(
        NHtml::tag('a', array(
            'id'    => 'n2-ss-preview',
            'href'  => '#',
            'class' => 'n2-h3 n2-uc n2-has-underline n2-button n2-button-blue n2-button-big',
            'style' => 'font-size: 12px;'
        ), n2_('Preview'))
    ),
    "hideSidebar" => true
));
?>

<script type="text/javascript">
    nextend.isPreview = false;
    nextend.ready(
        function ($) {

            var form = $('#smartslider-form'),
                formAction = form.attr('action');

            var modal = new NextendSimpleModal('<iframe name="n2-tab-preview" src="" style="width: 100%;height:100%;"></iframe>');
            modal.modal.on('ModalHide', function () {
                modal.modal.find('iframe').attr('src', 'about:blank');
                $(window).trigger('SSPreviewHide');
            });

            $('#n2-ss-preview').on('click', function (e) {
                nextend.isPreview = true;
                e.preventDefault();
                nextend.smartSlider.slide.prepareForm();
                modal.show();
                //var currentRequest = form.serialize();
                form.attr({
                    action: '<?php echo $this->appType->router->createUrl(array("preview/slide", N2Form::tokenizeUrl() + array('slideId' => $slide ? $slide['id'] : 0, 'sliderId' => $sliderId)))?>',
                    target: 'n2-tab-preview'
                }).submit().attr({
                    action: formAction,
                    target: null
                });
                nextend.isPreview = false;
            });

        }
    );
</script>

<form id="smartslider-form" action="" method="post">
    <?php
    $slideData = $slidesModel->renderEditForm($slide);
    ?>
    <input name="save" value="1" type="hidden"/>
</form>

<script type="text/javascript">

    nextend.ready(
        function ($) {
            var topOffset = $('#wpadminbar, .navbar-fixed-top').height() + $('.n2-top-bar').height() + 2;
            $('#n2-tab-smartslider-editor .n2-heading-controls').each(function () {
                var bar = $(this);
                bar.fixTo(bar.parent(), {
                    top: topOffset
                });
            });
        }
    );

</script>

<div id='n2-tab-smartslider-editor' class='n2-form-tab'>
    <div class="n2-heading-controls n2-content-box-title-bg">
        <div class="n2-table">
            <div class="n2-tr">
                <div class="n2-td" id="n2-ss-snap-to">
                    <div class="n2-form-element-onoff-button n2-onoff-on">
                        <div class="n2-onoffb-label"><?php n2_e('Snap'); ?></div>

                        <div class="n2-onoffb-container">
                            <div class="n2-onoffb-slider"><!--
                        --><div class="n2-onoffb-round"></div><!--
                        --></div>
                        </div>
                        <input type="hidden" autocomplete="off" value="1" id="n2-ss-snap">
                    </div>

                    <div id="n2-ss-horizontal-align" class="n2-form-element-radio-tab n2-form-element-icon-radio"><div
                            class="n2-radio-option n2-first" data-align="left"><i
                                class="n2-i n2-it n2-i-horizontal-left"></i></div>

                        <div class="n2-radio-option" data-align="center"><i
                                class="n2-i n2-it n2-i-horizontal-center"></i>
                        </div>

                        <div class="n2-radio-option n2-last" data-align="right"><i
                                class="n2-i n2-it n2-i-horizontal-right"></i></div>
                    </div>

                    <div id="n2-ss-vertical-align" class="n2-form-element-radio-tab n2-form-element-icon-radio"><div
                            class="n2-radio-option n2-first" data-align="top"><i
                                class="n2-i n2-it n2-i-vertical-top"></i></div>

                        <div class="n2-radio-option" data-align="middle"><i class="n2-i n2-it n2-i-vertical-middle"></i>
                        </div>

                        <div class="n2-radio-option n2-last" data-align="bottom"><i
                                class="n2-i n2-it n2-i-vertical-bottom"></i></div></div>

                </div>
                <div class="n2-td" id="n2-ss-zoom">
                    <div class="n2-ss-slider-zoom-container">
                        <i class="n2-i n2-i-minus"></i>
                        <i class="n2-i n2-i-plus"></i>

                        <div class="n2-ss-slider-zoom-bg"></div>

                        <div class="n2-ss-slider-zoom-1"></div>

                        <div id="n2-ss-slider-zoom"></div>

                        <div class="n2-expert" id="n2-ss-lock">
                            <i class="n2-i n2-i-unlock"></i>
                        </div>
                    </div>
                </div>

                <div class="n2-td" id="n2-ss-devices">
                    <div class="n2-controls-panel n2-table n2-table-auto">
                        <div class="n2-tr">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    $sliderManager = $this->appType->app->get('sliderManager');
    $slider        = $sliderManager->getSlider();

    echo NHtml::tag('div', array(
        'id'    => 'smartslider-adjust-height',
        'style' => 'overflow: auto; margin: 5px; padding: 5px'
    ), NHtml::tag('div', array(), $sliderManager->render()));

    N2Localization::addJS(array(
        'Add',
        'Clear',
        'in',
        'loop',
        'out'
    ));

    echo NHtml::script("
            nextend.ready(function($){
                nextend.smartSlider.startEditor('" . $slider->elementId . "', 'slideslide', " . $slideData->get('static-slide', 0) . ", " . (defined('N2_IMAGE_UPLOAD_DISABLE') ? 1 : 0) . ", '" . N2Base::getApplication('system')->router->createAjaxUrl(array('browse/upload')) . "', 'slider" . $slider->sliderId . "');
            });
        ");
    ?>
</div>
<div id='n2-ss-timeline' class='n2-form-tab'>

    <script type="text/javascript">
        nextend.ready(
            function ($) {

                var lastHeight = $.jStorage.get('smartsliderTimelineHeight', 200),
                    pane1 = $('.n2-ss-timeline-sidebar-layers'),
                    pane2 = $('.n2-ss-timeline-content-layers-container')
                        .height(lastHeight);

                pane1.on('scroll', function () {
                    pane2.scrollTop(pane1.scrollTop());
                });

                $('.n2-ss-timeline-sidebar-layers-container')
                    .height(lastHeight)
                    .resizable({
                        minHeight: 200,
                        alsoResize: pane2,
                        handles: 's',
                        create: function (ui) {
                            $(ui.target).find('.ui-resizable-s').append('<i class="n2-i n2-it n2-i-drag"></i>');
                        },
                        stop: function (event, ui) {
                            $.jStorage.set('smartsliderTimelineHeight', ui.size.height);
                        }
                    });
            }
        );
    </script>


    <div>
        <div id="n2-ss-timeline-table" class="n2-table n2-table-fixed">
            <div class="n2-tr">
                <div class="n2-td n2-ss-timeline-sidebar">
                    <div class="n2-ss-timeline-sidebar-top">
                        <div class="n2-h2"><?php n2_e('Timeline'); ?></div>

                        <div class="n2-ss-timeline-control" style="display: inline-block;">
                            <a href="#" class="n2-button n2-button-grey n2-button-medium n2-stop">
                                <i class="n2-i n2-i-stop"></i>
                            </a><a href="#" class="n2-button n2-button-grey n2-button-medium n2-play"><i
                                    class="n2-i n2-i-play"></i></a>
                        </div>
                    </div>

                    <div class="n2-ss-timeline-sidebar-layers-container">
                        <div class="n2-ss-timeline-sidebar-layers"></div>
                    </div>
                </div>

                <div class="n2-td n2-ss-timeline-content">
                    <div class="n2-ss-timeline-scrollbar-wrapper">
                        <div class="scrollbar">
                            <div class="track">
                                <div class="thumb"><div class="end"></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="n2-ss-timeline-content-container viewport">

                        <div class="n2-ss-timeline-content-scrollable overview" style="min-width: 100%;">

                            <div class="n2-ss-timeline-content-timeframe">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>