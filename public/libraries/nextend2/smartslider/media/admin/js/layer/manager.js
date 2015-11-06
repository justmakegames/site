(function (smartSlider, $, scope, undefined) {
    var layerClass = '.n2-ss-layer',
        keys = {
            16: 0,
            38: 0,
            40: 0,
            37: 0,
            39: 0
        },
        nameToIndex = {
            left: 0,
            center: 1,
            right: 2,
            top: 0,
            middle: 1,
            bottom: 2
        },
        horizontalAlign = {
            97: 'left',
            98: 'center',
            99: 'right',
            100: 'left',
            101: 'center',
            102: 'right',
            103: 'left',
            104: 'center',
            105: 'right'
        },
        verticalAlign = {
            97: 'bottom',
            98: 'bottom',
            99: 'bottom',
            100: 'middle',
            101: 'middle',
            102: 'middle',
            103: 'top',
            104: 'top',
            105: 'top'
        };

    function AdminSlideLayerManager(layerManager, staticSlide, isUploadDisabled, uploadUrl, uploadDir) {
        this.activeLayerIndex = -1;
        this.advanced = false;
        this.snapToEnabled = true;
        this.staticSlide = staticSlide;

        this.layerDefault = {
            align: null,
            valign: null
        };

        this.solo = false;

        this.$ = $(this);
        smartSlider.layerManager = this;

        this.responsive = smartSlider.frontend.responsive;

        new NextendSmartSliderSidebar();

        this.layerList = [];

        this.layersItemsElement = $('#n2-ss-layers-items-list');

        this.frontendSlideLayers = layerManager;

        this.frontendSlideLayers.setZero();


        this.layerContainerElement = smartSlider.$currentSlideElement.find('.n2-ss-layers-container');
        if (!this.layerContainerElement.length) {
            this.layerContainerElement = smartSlider.$currentSlideElement;
        }

        this.slideSize = {
            width: this.layerContainerElement.width(),
            height: this.layerContainerElement.height()
        };

        smartSlider.frontend.sliderElement.on('SliderResize', $.proxy(this.refreshSlideSize, this));

        this.initToolbox();

        new NextendSmartSliderLayerAnimationManager(this);

        this.refreshLayers();

        smartSlider.itemEditor = this.itemEditor = new NextendSmartSliderItemManager(this);

        this.positionDisplay = $('<div class="n2 n2-ss-position-display"/>')
            .appendTo('body');

        this.zIndexList = [];

        this.layers.each($.proxy(function (i, layer) {
            new NextendSmartSliderLayer(this, $(layer), this.itemEditor);
        }, this));

        this.reIndexLayers();

        this._makeLayersOrderable();

        $('#smartslider-slide-toolbox-layer').on('mouseenter', function () {
            $('#n2-admin').addClass('smartslider-layer-highlight-active');
        }).on('mouseleave', function () {
            $('#n2-admin').removeClass('smartslider-layer-highlight-active');
        });

        this._initDeviceModeChange();

        $('.n2-layers-tab-label').on('dblclick', $.proxy(function () {
            if (this.advanced) {
                this.switchAdvanced(false);
            } else {
                this.switchAdvanced(true);
            }
        }, this));

        //this.initBatch();
        this.initSnapTo();
        this.initAlign();

        if (this.zIndexList.length > 0) {
            this.zIndexList[this.zIndexList.length - 1].activate();
        }


        $(window).on({
            keydown: $.proxy(function (e) {
                if (e.target.tagName != 'TEXTAREA' && e.target.tagName != 'INPUT' && !smartSlider.timelineControl.isActivated()) {
                    if (this.activeLayerIndex != -1) {
                        if (e.keyCode == 46) {
                            this.layerList[this.activeLayerIndex].delete();
                        } else if (e.keyCode == 35) {
                            this.layerList[this.activeLayerIndex].duplicate();
                            e.preventDefault();
                        } else if (e.keyCode == 16) {
                            keys[e.keyCode] = 1;
                        } else if (e.keyCode == 38) {
                            if (!keys[e.keyCode]) {
                                var fn = $.proxy(function () {
                                    this.layerList[this.activeLayerIndex].moveY(-1 * (keys[16] ? 10 : 1))
                                }, this);
                                fn();
                                keys[e.keyCode] = setInterval(fn, 100);
                            }
                            e.preventDefault();
                        } else if (e.keyCode == 40) {
                            if (!keys[e.keyCode]) {
                                var fn = $.proxy(function () {
                                    this.layerList[this.activeLayerIndex].moveY((keys[16] ? 10 : 1))
                                }, this);
                                fn();
                                keys[e.keyCode] = setInterval(fn, 100);
                            }
                            e.preventDefault();
                        } else if (e.keyCode == 37) {
                            if (!keys[e.keyCode]) {
                                var fn = $.proxy(function () {
                                    this.layerList[this.activeLayerIndex].moveX(-1 * (keys[16] ? 10 : 1))
                                }, this);
                                fn();
                                keys[e.keyCode] = setInterval(fn, 100);
                            }
                            e.preventDefault();
                        } else if (e.keyCode == 39) {
                            if (!keys[e.keyCode]) {
                                var fn = $.proxy(function () {
                                    this.layerList[this.activeLayerIndex].moveX((keys[16] ? 10 : 1))
                                }, this);
                                fn();
                                keys[e.keyCode] = setInterval(fn, 100);
                            }
                            e.preventDefault();
                        } else if (e.keyCode >= 97 && e.keyCode <= 105) {
                            // numeric pad
                            this.horizontalAlign(horizontalAlign[e.keyCode]);
                            this.verticalAlign(verticalAlign[e.keyCode]);

                        } else if (e.keyCode == 34) {
                            e.preventDefault();
                            var targetIndex = this.layerList[this.activeLayerIndex].zIndex - 1;
                            if (targetIndex < 0) {
                                targetIndex = this.zIndexList.length - 1;
                            }
                            this.zIndexList[targetIndex].activate();

                        } else if (e.keyCode == 33) {
                            e.preventDefault();
                            var targetIndex = this.layerList[this.activeLayerIndex].zIndex + 1;
                            if (targetIndex > this.zIndexList.length - 1) {
                                targetIndex = 0;
                            }
                            this.zIndexList[targetIndex].activate();

                        }
                    }
                }
            }, this),
            keyup: $.proxy(function (e) {
                if (typeof keys[e.keyCode] !== 'undefined' && keys[e.keyCode]) {
                    clearInterval(keys[e.keyCode]);
                    keys[e.keyCode] = 0;
                }
            }, this)
        });

        if (!isUploadDisabled) {
            smartSlider.frontend.sliderElement.fileupload({
                url: uploadUrl,
                pasteZone: false,
                dropZone: smartSlider.frontend.sliderElement,
                dataType: 'json',
                paramName: 'image',
                add: $.proxy(function (e, data) {
                    data.formData = {path: '/' + uploadDir};
                    data.submit();
                }, this),
                done: $.proxy(function (e, data) {
                    var response = data.result;
                    if (response.data && response.data.name) {
                        var item = this.itemEditor.createLayerItem('image');
                        item.reRender({
                            image: response.data.url
                        });
                        item.activate(null, true);
                    } else {
                        NextendAjaxHelper.notification(response);
                    }

                }, this),
                fail: $.proxy(function (e, data) {
                    NextendAjaxHelper.notification(data.jqXHR.responseJSON);
                }, this),

                start: function () {
                    NextendAjaxHelper.startLoading();
                },

                stop: function () {
                    setTimeout(function () {
                        NextendAjaxHelper.stopLoading();
                    }, 100);
                }
            });
        }
    };

    AdminSlideLayerManager.prototype.getMode = function () {
        return this.responsive.getNormalizedModeString();
    };

    AdminSlideLayerManager.prototype.getResponsiveRatio = function (axis) {
        if (axis == 'h') {
            return this.responsive.lastRatios.slideW;
        } else if (axis == 'v') {
            return this.responsive.lastRatios.slideH;
        }
        return 0;
    };

    AdminSlideLayerManager.prototype.createLayer = function (properties) {
        for (var k in this.layerDefault) {
            if (this.layerDefault[k] !== null) {
                properties[k] = this.layerDefault[k];
            }
        }
        var newLayer = new NextendSmartSliderLayer(this, false, this.itemEditor, properties);

        this.reIndexLayers();

        this._makeLayersOrderable();

        return newLayer;
    };

    AdminSlideLayerManager.prototype.addLayer = function (html, refresh) {
        var newLayer = $(html);
        this.layerContainerElement.append(newLayer);
        var layerObj = new NextendSmartSliderLayer(this, newLayer, this.itemEditor);

        if (refresh) {
            this.reIndexLayers();
            this.refreshMode();
        }
        return layerObj;
    };

    AdminSlideLayerManager.prototype.setSolo = function (layer) {
        if (this.solo) {
            this.solo.unmarkSolo();
            if (this.solo === layer) {
                this.solo = false;
                smartSlider.$currentSlideElement.removeClass('n2-ss-layer-solo-mode');
                return;
            } else {
                this.solo = false;
            }
        }

        this.solo = layer;
        layer.markSolo();
        smartSlider.$currentSlideElement.addClass('n2-ss-layer-solo-mode');
    };

    /**
     * Force the view to change to the second mode (layer)
     */
    AdminSlideLayerManager.prototype.switchToLayerTab = function () {
        smartSlider.slide._changeView(1);
    };

    AdminSlideLayerManager.prototype.switchAdvanced = function (state) {

        if (state) {
            $('#n2-admin')
                .addClass('n2-ss-item-mode');
        } else {
            $('#n2-admin')
                .removeClass('n2-ss-item-mode');
        }
        this.advanced = state;
        this.itemEditor.advanced(state);
    };

    //<editor-fold desc="Initialize the device mode changer">

    AdminSlideLayerManager.prototype._initDeviceModeChange = function () {
        this.resetToDesktopTRElement = $('#layerresettodesktop').on('click', $.proxy(this.__onResetToDesktopClick, this))
            .closest('tr');
        this.__onChangeDeviceOrientation();
        smartSlider.frontend.sliderElement.on('SliderDeviceOrientation', $.proxy(this.__onChangeDeviceOrientation, this));


        //this.__onResize();
        smartSlider.frontend.sliderElement.on('SliderResize', $.proxy(this.__onResize, this));
    };

    /**
     * Refresh the current responsive mode. Example: you are in tablet view and unpublish a layer for tablet, then you should need a refresh on the mode.
     */
    AdminSlideLayerManager.prototype.refreshMode = function () {

        this.__onChangeDeviceOrientation();

        smartSlider.frontend.responsive.reTriggerSliderDeviceOrientation();
    };

    /**
     * When the device mode changed we have to change the slider
     * @param mode
     * @private
     */
    AdminSlideLayerManager.prototype.__onChangeDeviceOrientation = function () {

        var mode = this.getMode();

        this.resetToDesktopTRElement.css('display', (mode == 'desktopPortrait' ? 'none' : 'table-row'));
        for (var i = 0; i < this.layerList.length; i++) {
            this.layerList[i].changeEditorMode(mode);
        }
    };

    AdminSlideLayerManager.prototype.__onResize = function (e, ratios) {

        for (var i = 0; i < this.layerList.length; i++) {
            this.layerList[i].resize(ratios);
        }
    };

    /**
     * Reset the custom values of the current mode on the current layer to the desktop values.
     * @private
     */
    AdminSlideLayerManager.prototype.__onResetToDesktopClick = function () {
        if (this.activeLayerIndex != -1) {
            this.layerList[this.activeLayerIndex].resetMode(this.getMode());
        }
    };

    AdminSlideLayerManager.prototype.refreshSlideSize = function () {
        this.slideSize.width = smartSlider.frontend.dimensions.slide.width;
        this.slideSize.height = smartSlider.frontend.dimensions.slide.height;
    };

//</editor-fold>

    AdminSlideLayerManager.prototype._makeLayersOrderable = function () {
        this.layersOrderableElement = this.layersItemsElement.find(' > ul');
        this.layersOrderableElement
            .sortable({
                axis: "y",
                helper: 'clone',
                placeholder: "sortable-placeholder",
                forcePlaceholderSize: true,
                tolerance: "pointer",
                items: '.n2-ss-layer-row',
                //handle: '.n2-i-order',
                start: function (event, ui) {
                    $(ui.item).data("startindex", ui.item.index());
                },
                stop: $.proxy(function (event, ui) {
                    var startIndex = this.zIndexList.length - $(ui.item).data("startindex") - 1,
                        newIndex = this.zIndexList.length - $(ui.item).index() - 1;
                    this.zIndexList.splice(newIndex, 0, this.zIndexList.splice(startIndex, 1)[0]);
                    this.reIndexLayers();
                }, this)
            });
    };

    AdminSlideLayerManager.prototype.reIndexLayers = function () {
        this.zIndexList = this.zIndexList.filter(function (item) {
            return item != undefined
        });

        for (var i = this.zIndexList.length - 1; i >= 0; i--) {
            this.zIndexList[i].setZIndex(i);
        }
    };

    AdminSlideLayerManager.prototype.initSnapTo = function () {

        var field = new NextendElementOnoff("n2-ss-snap");

        if (!$.jStorage.get("n2-ss-snap-to-enabled", 1)) {
            field.insideChange(0);
            this.snapToDisable();
        }

        field.element.on('outsideChange', $.proxy(this.switchSnapTo, this));
    };

    AdminSlideLayerManager.prototype.switchSnapTo = function (e) {
        e.preventDefault();
        if (this.snapToEnabled) {
            this.snapToDisable();
        } else {
            this.snapToEnable();
        }
    };

    AdminSlideLayerManager.prototype.snapToDisable = function () {
        this.snapToEnabled = false;
        this.snapToChanged(0);
    };

    AdminSlideLayerManager.prototype.snapToEnable = function () {
        this.snapToEnabled = true;
        this.snapToChanged(1);
    };
    AdminSlideLayerManager.prototype.snapToChanged = function () {
        for (var i = 0; i < this.layerList.length; i++) {
            this.layerList[i].snap();
        }
        $.jStorage.set("n2-ss-snap-to-enabled", this.snapToEnabled);
    };

    AdminSlideLayerManager.prototype.getSnap = function () {
        if (!this.snapToEnabled) {
            return false;
        }
        if (this.staticSlide) {
            return '.n2-ss-static-slide .n2-ss-layer:not(.n2-ss-layer-locked):visible';
        }
        return '.n2-ss-slide.n2-ss-slide-active .n2-ss-layer:not(.n2-ss-layer-locked):visible';
    };

    AdminSlideLayerManager.prototype.initAlign = function () {
        var hAlignButton = $('#n2-ss-horizontal-align .n2-radio-option'),
            vAlignButton = $('#n2-ss-vertical-align .n2-radio-option');

        hAlignButton.add(vAlignButton).on('click', $.proxy(function (e) {
            if (e.ctrlKey || e.metaKey) {
                var $el = $(e.currentTarget),
                    isActive = $el.hasClass('n2-active'),
                    align = $el.data('align');
                switch (align) {
                    case 'left':
                    case 'center':
                    case 'right':
                        hAlignButton.removeClass('n2-active');
                        if (isActive) {
                            $.jStorage.set('ss-item-horizontal-align', null);
                            this.layerDefault.align = null;
                        } else {
                            $.jStorage.set('ss-item-horizontal-align', align);
                            this.layerDefault.align = align;
                            $el.addClass('n2-active');
                        }
                        break;
                    case 'top':
                    case 'middle':
                    case 'bottom':
                        vAlignButton.removeClass('n2-active');
                        if (isActive) {
                            $.jStorage.set('ss-item-vertical-align', null);
                            this.layerDefault.valign = null;
                        } else {
                            $.jStorage.set('ss-item-vertical-align', align);
                            this.layerDefault.valign = align;
                            $el.addClass('n2-active');
                        }
                        break;
                }
            } else if (this.activeLayerIndex != -1) {
                var align = $(e.currentTarget).data('align');
                switch (align) {
                    case 'left':
                    case 'center':
                    case 'right':
                        this.horizontalAlign(align);
                        break;
                    case 'top':
                    case 'middle':
                    case 'bottom':
                        this.verticalAlign(align);
                        break;
                }
            }
        }, this));

        var hAlign = $.jStorage.get('ss-item-horizontal-align', null),
            vAlign = $.jStorage.get('ss-item-vertical-align', null);
        if (hAlign != null) {
            hAlignButton.eq(nameToIndex[hAlign]).addClass('n2-active');
            this.layerDefault.align = hAlign;
        }
        if (vAlign != null) {
            vAlignButton.eq(nameToIndex[vAlign]).addClass('n2-active');
            this.layerDefault.valign = vAlign;
        }
    };

    AdminSlideLayerManager.prototype.horizontalAlign = function (align) {
        if (this.toolboxForm.align.val() == align) {
            this.toolboxForm.left.val(0).trigger('change');
        } else {
            this.toolboxForm.align.data('field').options.eq(nameToIndex[align]).trigger('click')
        }
    };

    AdminSlideLayerManager.prototype.verticalAlign = function (align) {
        if (this.toolboxForm.valign.val() == align) {
            this.toolboxForm.top.val(0).trigger('change');
        } else {
            this.toolboxForm.valign.data('field').options.eq(nameToIndex[align]).trigger('click')
        }
    };

    /**
     * Delete all layers on the slide
     */
    AdminSlideLayerManager.prototype.deleteLayers = function () {
        for (var i = this.layerList.length - 1; i >= 0; i--) {
            this.layerList[i].delete();
        }
    };

    AdminSlideLayerManager.prototype.layerDeleted = function (index) {

        this.reIndexLayers();

        var activeLayer = this.getSelectedLayer();

        this.layerList.splice(index, 1);

        if (index === this.activeLayerIndex) {
            this.activeLayerIndex = -1;
            if (this.zIndexList.length > 0) {
                this.zIndexList[this.zIndexList.length - 1].activate();
            } else {
                this.changeActiveLayer(-1);
            }
        } else if (activeLayer) {
            this.activeLayerIndex = activeLayer.getIndex();
        }
    };

    /**
     * Get the HTML code of the whole slide
     * @returns {string} HTML
     */
    AdminSlideLayerManager.prototype.getHTML = function () {

        var node = $('<div></div>');

        for (var i = 0; i < this.layerList.length; i++) {
            node.append(this.layerList[i].getHTML(true, true));
        }

        return node.html();
    };


    AdminSlideLayerManager.prototype.getData = function () {
        var layers = [];

        for (var i = 0; i < this.layerList.length; i++) {
            layers.push(this.layerList[i].getData(true));
        }

        return layers;
    };

    AdminSlideLayerManager.prototype.loadData = function (data, overwrite) {
        var layers = $.extend(true, [], data);
        if (overwrite) {
            this.deleteLayers();
        }
        for (var i = 0; i < layers.length; i++) {

            var layerData = layers[i],
                layer = $('<div class="n2-ss-layer"></div>')
                    .attr('style', layerData.style);

            for (var j = 0; j < layerData.items.length; j++) {
                $('<div class="n2-ss-item n2-ss-item-' + layerData.items[j].type + '"></div>')
                    .data('item', layerData.items[j].type)
                    .data('itemvalues', layerData.items[j].values)
                    .appendTo(layer);
            }

            delete layerData.style;
            delete layerData.items;
            layerData.animations = Base64.encode(JSON.stringify(layerData.animations));
            for (var k in layerData) {
                layer.data(k, layerData[k]);
            }
            this.addLayer(layer, false);
        }
        this.reIndexLayers();
        this.refreshMode();
    };

    /**
     * Reloads the layers by the class name
     */
    AdminSlideLayerManager.prototype.refreshLayers = function () {
        this.layers = this.layerContainerElement.find(layerClass);
    };

//<editor-fold desc="Toolbox fields and related stuffs">

    /**
     * Initialize the sidebar Layer toolbox
     */
    AdminSlideLayerManager.prototype.initToolbox = function () {

        this.toolboxElement = $('#smartslider-slide-toolbox-layer');

        this.toolboxForm = {
            left: $('#layerleft'),
            top: $('#layertop'),
            responsiveposition: $('#layerresponsive-position'),
            width: $('#layerwidth'),
            height: $('#layerheight'),
            responsivesize: $('#layerresponsive-size'),
            showFieldDesktopPortrait: $('#layershow-desktop-portrait'),
            showFieldDesktopLandscape: $('#layershow-desktop-landscape'),
            showFieldTabletPortrait: $('#layershow-tablet-portrait'),
            showFieldTabletLandscape: $('#layershow-tablet-landscape'),
            showFieldMobilePortrait: $('#layershow-mobile-portrait'),
            showFieldMobileLandscape: $('#layershow-mobile-landscape'),
            crop: $('#layercrop'),
            inneralign: $('#layerinneralign'),
            parallax: $('#layerparallax'),
            align: $('#layeralign'),
            valign: $('#layervalign'),
            fontsize: $('#layerfont-size'),
            adaptivefont: $('#layeradaptive-font')
        };

        for (var k in this.toolboxForm) {
            this.toolboxForm[k].on('outsideChange', $.proxy(this.activateLayerPropertyChanged, this, k));
        }

        if (!this.responsive.isEnabled('desktop', 'Landscape')) {
            this.toolboxForm.showFieldDesktopLandscape.closest('.n2-mixed-group').css('display', 'none');
        }
        if (!this.responsive.isEnabled('tablet', 'Portrait')) {
            this.toolboxForm.showFieldTabletPortrait.closest('.n2-mixed-group').css('display', 'none');
        }
        if (!this.responsive.isEnabled('tablet', 'Landscape')) {
            this.toolboxForm.showFieldTabletLandscape.closest('.n2-mixed-group').css('display', 'none');
        }
        if (!this.responsive.isEnabled('mobile', 'Portrait')) {
            this.toolboxForm.showFieldMobilePortrait.closest('.n2-mixed-group').css('display', 'none');
        }
        if (!this.responsive.isEnabled('mobile', 'Landscape')) {
            this.toolboxForm.showFieldMobileLandscape.closest('.n2-mixed-group').css('display', 'none');
        }
    };

    AdminSlideLayerManager.prototype.activateLayerPropertyChanged = function (name, e) {
        if (this.activeLayerIndex != -1) {
            var value = this.toolboxForm[name].val();
            this.layerList[this.activeLayerIndex].setProperty(name, value);
        } else {
            this.toolboxForm[name].data('field').insideChange('');
        }
    };

    /**
     * getter for the currently selected layer
     * @returns {jQuery|boolean} layer element in jQuery representation or false
     * @private
     */
    AdminSlideLayerManager.prototype.getSelectedLayer = function () {
        if (this.activeLayerIndex == -1) {
            return false;
        }
        return this.layerList[this.activeLayerIndex];
    };

//</editor-fold>

    AdminSlideLayerManager.prototype.changeActiveLayer = function (index) {
        var lastActive = this.activeLayerIndex;
        if (lastActive != -1) {
            var $layer = this.layerList[lastActive];
            // There is a chance that the layer already deleted
            if ($layer) {
                $layer.$.off('propertyChanged.layerEditor');

                $layer.deActivate();
            }
        }
        this.activeLayerIndex = index;

        if (index != -1) {
            var $layer = this.layerList[index];
            $layer.$.on('propertyChanged.layerEditor', $.proxy(this.activeLayerPropertyChanged, this));

            $layer.animation.activate();

            var properties = $layer.property;
            for (var name in properties) {
                this.activeLayerPropertyChanged({
                    target: $layer
                }, name, properties[name]);
            }
        }
    };

    AdminSlideLayerManager.prototype.activeLayerPropertyChanged = function (e, name, value) {
        if (typeof this['_formSet' + name] === 'function') {
            this['_formSet' + name](value, e.target);
        } else {
            this.toolboxForm[name].data('field').insideChange(value);
        }
    };

    AdminSlideLayerManager.prototype._formSetname = function (value) {

    };

    AdminSlideLayerManager.prototype._formSetnameSynced = function (value) {

    };

    AdminSlideLayerManager.prototype._formSetdesktopPortrait = function (value, layer) {
        this.toolboxForm.showFieldDesktopPortrait.data('field').insideChange(value);
    };

    AdminSlideLayerManager.prototype._formSetdesktopLandscape = function (value, layer) {
        this.toolboxForm.showFieldDesktopLandscape.data('field').insideChange(value);
    };

    AdminSlideLayerManager.prototype._formSettabletPortrait = function (value, layer) {
        this.toolboxForm.showFieldTabletPortrait.data('field').insideChange(value);
    };

    AdminSlideLayerManager.prototype._formSettabletLandscape = function (value, layer) {
        this.toolboxForm.showFieldTabletLandscape.data('field').insideChange(value);
    };

    AdminSlideLayerManager.prototype._formSetmobilePortrait = function (value, layer) {
        this.toolboxForm.showFieldMobilePortrait.data('field').insideChange(value);
    };

    AdminSlideLayerManager.prototype._formSetmobileLandscape = function (value, layer) {
        this.toolboxForm.showFieldMobileLandscape.data('field').insideChange(value);
    };

    scope.NextendSmartSliderAdminSlideLayerManager = AdminSlideLayerManager;

})(nextend.smartSlider, n2, window);