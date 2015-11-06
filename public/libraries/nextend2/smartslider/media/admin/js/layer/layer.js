(function (smartSlider, $, scope, undefined) {

    window.nextendPreventClick = false

    function Layer(layerEditor, layer, itemEditor, properties) {
        this.activeItem = null;
        this.highlighted = null;
        this.eye = 0;
        this.lock = 0;
        this.$ = $(this);

        this.layerEditor = layerEditor;

        if (!layer) {
            layer = $('<div class="n2-ss-layer" style="z-index: ' + layerEditor.zIndexList.length + ';"></div>')
                .appendTo(layerEditor.layerContainerElement);
            this.property = $.extend({
                name: 'New layer',
                nameSynced: 1,
                crop: 'visible',
                inneralign: 'left',
                parallax: 0,
                align: 'center',
                valign: 'middle',
                fontsize: 100,
                adaptivefont: 0,
                desktopPortrait: 1,
                desktopLandscape: 1,
                tabletPortrait: 1,
                tabletLandscape: 1,
                mobilePortrait: 1,
                mobileLandscape: 1,
                left: 0,
                top: 0,
                responsiveposition: 1,
                width: 'auto',
                height: 'auto',
                responsivesize: 1
            }, properties);
        } else {
            this.property = {
                name: layer.data('name'),
                nameSynced: layer.data('namesynced'),
                crop: layer.data('crop'),
                inneralign: layer.data('inneralign'),
                parallax: layer.data('parallax'),
                align: layer.data('desktopportraitalign'),
                valign: layer.data('desktopportraitvalign'),
                fontsize: layer.data('fontsize'),
                adaptivefont: layer.data('adaptivefont'),
                desktopPortrait: parseFloat(layer.data('desktopportrait')),
                desktopLandscape: parseFloat(layer.data('desktoplandscape')),
                tabletPortrait: parseFloat(layer.data('tabletportrait')),
                tabletLandscape: parseFloat(layer.data('tabletlandscape')),
                mobilePortrait: parseFloat(layer.data('mobileportrait')),
                mobileLandscape: parseFloat(layer.data('mobilelandscape')),
                left: parseInt(layer.data('desktopportraitleft')),
                top: parseInt(layer.data('desktopportraittop')),
                responsiveposition: parseInt(layer.data('responsiveposition')),
                responsivesize: parseInt(layer.data('responsivesize'))
            };

            var width = layer.data('desktopportraitwidth');
            if (width == 'auto') {
                this.property.width = 'auto';
            } else {
                this.property.width = parseInt(width);
            }

            var height = layer.data('desktopportraitheight');
            if (height == 'auto') {
                this.property.height = 'auto';
            } else {
                this.property.height = parseInt(height);
            }
        }

        if (typeof this.property.nameSynced === 'undefined') {
            this.property.nameSynced = 1;
        }

        if (typeof this.property.responsiveposition === 'undefined') {
            this.property.responsiveposition = 1;
        }

        if (typeof this.property.responsivesize === 'undefined') {
            this.property.responsivesize = 1;
        }

        if (!this.property.inneralign) {
            this.property.inneralign = 'left';
        }

        if (!this.property.crop) {
            this.property.crop = 'visible';
        }

        if (!this.property.parallax) {
            this.property.parallax = 0;
        }

        if (typeof this.property.fontsize == 'undefined') {
            this.property.fontsize = 100;
        }

        if (typeof this.property.adaptivefont == 'undefined') {
            this.property.adaptivefont = 0;
        }

        if (!this.property.align) {
            this.property.align = 'left';
        }

        if (!this.property.valign) {
            this.property.valign = 'top';
        }
        layer.attr('data-align', this.property.align);
        layer.attr('data-valign', this.property.valign);

        this.layer = layer;
        this.layer.css('visibility', 'hidden');

        this.zIndex = parseInt(this.layer.css('zIndex'));
        if (isNaN(this.zIndex)) {
            this.zIndex = 0;
        }

        var eye = layer.data('eye'),
            lock = layer.data('lock');
        if (eye !== null && typeof eye != 'undefined') {
            this.eye = eye;
        }
        if (lock !== null && typeof lock != 'undefined') {
            this.lock = lock;
        }
        this.deviceProperty = {
            desktopPortrait: {
                left: this.property.left,
                top: this.property.top,
                width: this.property.width,
                height: this.property.height,
                align: this.property.align,
                valign: this.property.valign,
                fontsize: this.property.fontsize
            },
            desktopLandscape: {
                left: layer.data('desktoplandscapeleft'),
                top: layer.data('desktoplandscapetop'),
                width: layer.data('desktoplandscapewidth'),
                height: layer.data('desktoplandscapeheight'),
                align: layer.data('desktoplandscapealign'),
                valign: layer.data('desktoplandscapevalign'),
                fontsize: layer.data('desktoplandscapefontsize')
            },
            tabletPortrait: {
                left: layer.data('tabletportraitleft'),
                top: layer.data('tabletportraittop'),
                width: layer.data('tabletportraitwidth'),
                height: layer.data('tabletportraitheight'),
                align: layer.data('tabletportraitalign'),
                valign: layer.data('tabletportraitvalign'),
                fontsize: layer.data('tabletportraitfontsize')
            },
            tabletLandscape: {
                left: layer.data('tabletlandscapeleft'),
                top: layer.data('tabletlandscapetop'),
                width: layer.data('tabletlandscapewidth'),
                height: layer.data('tabletlandscapeheight'),
                align: layer.data('tabletlandscapealign'),
                valign: layer.data('tabletlandscapevalign'),
                fontsize: layer.data('tabletlandscapefontsize')
            },
            mobilePortrait: {
                left: layer.data('mobileportraitleft'),
                top: layer.data('mobileportraittop'),
                width: layer.data('mobileportraitwidth'),
                height: layer.data('mobileportraitheight'),
                align: layer.data('mobileportraitalign'),
                valign: layer.data('mobileportraitvalign'),
                fontsize: layer.data('mobileportraitfontsize')
            },
            mobileLandscape: {
                left: layer.data('mobilelandscapeleft'),
                top: layer.data('mobilelandscapetop'),
                width: layer.data('mobilelandscapewidth'),
                height: layer.data('mobilelandscapeheight'),
                align: layer.data('mobilelandscapealign'),
                valign: layer.data('mobilelandscapevalign'),
                fontsize: layer.data('mobilelandscapefontsize')
            }
        };


        this.layersItemsElement = layerEditor.layersItemsElement;
        this.layersItemsUlElement = this.layersItemsElement.find('> ul');

        this.createRow();

        this.itemEditor = itemEditor;

        this.initItems();

        this.___makeLayerAlign();
        this.___makeLayerResizeable();
        this.___makeLayerDraggable();
        this.___makeLayerQuickHandle();

        layerEditor.layerList.push(this);
        //this.index = layerEditor.layerList.push(this) - 1;

        /**
         * This is a fix for the editor load. The layers might not in the z-index order on the load,
         * so we have to "mess up" the array and let the algorithm to fix it.
         */
        if (typeof layerEditor.zIndexList[this.zIndex] === 'undefined') {
            layerEditor.zIndexList[this.zIndex] = this;
        } else {
            layerEditor.zIndexList.splice(this.zIndex, 0, this);
        }

        this._eye();
        this._lock();

        this.animation = new NextendSmartSliderLayerAnimations(this);


        this.layerEditor.$.trigger('layerCreated', this);
        $(window).triggerHandler('layerCreated');

        this.animation.load();

        this.layer.on({
            mousedown: $.proxy(this.activate, this),
            dblclick: $.proxy(this.fit, this)
        });

        this.markSmallLayer();

        setTimeout($.proxy(function () {
            this._resize();
            //this.update();
            this.layer.css('visibility', '');
        }, this), 300);
    };

    Layer.prototype.getIndex = function () {
        return this.layerEditor.layerList.indexOf(this);
    };

    Layer.prototype.createRow = function () {
        var dblClickInterval = 300,
            timeout = null,
            remove = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-delete n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.delete, this)),
            duplicate = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-duplicate n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.duplicate, this));

        this.soloElement = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-bulb n2-i-grey-opacity"></i></a>').css('opacity', 0.3).on('click', $.proxy(this.switchSolo, this));
        this.eyeElement = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-eye n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.switchEye, this));
        this.lockElement = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-lock n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.switchLock, this));

        this.layerRow = $('<li class="n2-ss-layer-row"></li>')
            .on({
                mouseenter: $.proxy(function () {
                    this.layer.addClass('n2-highlight');
                    if (this.activeItem) {
                        this.highlighted = this.activeItem.item.addClass('n2-force-item-highlight');
                    } else if (this.items.length) {
                        // There can exists a layer without item... nothing to do there
                        this.highlighted = this.items[0].item.addClass('n2-force-item-highlight');
                    }
                }, this),
                mouseleave: $.proxy(function (e) {
                    this.layer.removeClass('n2-highlight');
                    if (this.highlighted) {
                        this.highlighted.removeClass('n2-force-item-highlight');
                        this.highlighted = null;
                    }
                }, this)
            })
            .appendTo(this.layersItemsUlElement);
        this.layerTitleSpan = $('<span class="n2-ucf">' + this.property.name + '</span>')
            .on({
                mouseup: $.proxy(function (e) {
                    if (timeout) {
                        clearTimeout(timeout);
                        timeout = null;
                        this.editName();
                    } else {
                        timeout = setTimeout($.proxy(function () {
                            this.activate();
                            timeout = null;
                        }, this), dblClickInterval);
                    }
                }, this)
            });

        this.layerTitle = $('<div class="n2-ss-layer-title"></div>')
            .append(this.layerTitleSpan)
            .append($('<div class="n2-actions"></div>').append(duplicate).append(remove))
            .append($('<div class="n2-actions-left"></div>').append(this.eyeElement).append(this.soloElement).append(this.lockElement))
            .appendTo(this.layerRow)
            .on({
                mouseup: $.proxy(function (e) {
                    if (e.target.tagName === 'DIV') {
                        this.activate();
                    }
                }, this)
            });
        this.itemsRow = $('<ul class="n2-ss-layer-items"></ul>')
            .appendTo(this.layerRow);

        this.itemsRow.data('layer', this);

        this.editorVisibilityChange();
    };

    Layer.prototype.editorVisibilityChange = function () {
        switch (this.layersItemsUlElement.children().length) {
            case 0:
                this.layerEditor.toolboxElement.removeClass('n2-has-layers');
                break;
            case 1:
                this.layerEditor.toolboxElement.addClass('n2-has-layers');
                break;
        }
    };

    Layer.prototype.setZIndex = function (targetIndex) {
        this.zIndex = targetIndex;
        this.layer.css('zIndex', targetIndex);
        this.layersItemsUlElement.append(this.layerRow);
        this.$.trigger('layerIndexed', targetIndex);
    };

    /**
     *
     * @param item {optional}
     */
    Layer.prototype.activate = function (e, item) {
        if (item) {
            this.activeItem = item;
            if (this.highlighted) {
                this.highlighted.removeClass('n2-force-item-highlight');
                this.highlighted = this.activeItem.item.addClass('n2-force-item-highlight');
            }
        } else {
            if (this.activeItem) {
                this.activeItem.activate();
            } else if (this.items.length) {
                // There can exists a layer without item... nothing to do there
                this.items[0].activate();
            }
        }
        // Set the layer active if it is not active currently
        var currentIndex = this.getIndex();
        if (this.layerEditor.activeLayerIndex !== currentIndex) {
            this.layerRow.addClass('n2-active');
            this.layer.triggerHandler('n2-ss-activate');
            this.layerEditor.changeActiveLayer(currentIndex);
            nextend.activeLayer = this.layer;
            nextend.a = this;

            var scroll = this.layersItemsUlElement.parent(),
                scrollTop = scroll.scrollTop(),
                top = this.layerRow.get(0).offsetTop;
            if (top < scrollTop || top > scrollTop + scroll.height() - this.layerRow.height()) {
                scroll.scrollTop(top);
            }
        }
        if (!this.eye) {
            this._show(true);
        }
    };

    Layer.prototype.deActivate = function () {
        this.animation.deActivate();
        this.layerRow.removeClass('n2-active');
        this.layer.triggerHandler('n2-ss-deactivate');
    };

    Layer.prototype.fit = function () {
        var layer = this.layer.get(0);

        var slideSize = this.layerEditor.slideSize,
            position = this.layer.position();
        var maxWidth = slideSize.width - position.left,
            maxHeight = slideSize.height - position.top;

        if (layer.scrollWidth > 0 && layer.scrollHeight > 0) {
            var resized = false;
            for (var i = 0; i < this.items.length; i++) {
                resized = this.items[i].parser.fitLayer(this.items[i]);
                if (resized) {
                    break;
                }
            }
            if (!resized) {
                //this.setProperty('width', Math.min(layer.scrollWidth, maxWidth) + 'px');
                this.setProperty('width', 'auto');
                this.setProperty('height', 'auto');
                /*
                 setTimeout($.proxy(function () {
                 if (this.layerEditor.slideSize.width < this.layer.width()) {
                 this.setProperty('width', this.layerEditor.slideSize.width);
                 setTimeout($.proxy(function () {
                 if (this.layerEditor.slideSize.height < this.layer.height()) {
                 this.setProperty('height', this.layerEditor.slideSize.height);
                 }
                 }, this), 100);
                 } else if (this.layerEditor.slideSize.height < this.layer.height()) {
                 this.setProperty('height', this.layerEditor.slideSize.height);
                 }
                 }, this), 100);
                 */
            }
        }
    };

    Layer.prototype.switchToAnimation = function () {
        smartSlider.sidebarManager.switchTab(1);
    };

    Layer.prototype.hide = function (targetMode) {
        this._setProperty(false, (targetMode ? targetMode : this.getMode()), 0, true, false);
    };

    Layer.prototype.show = function (targetMode) {
        this._setProperty(false, (targetMode ? targetMode : this.getMode()), 1, true, false);
    };

    Layer.prototype.switchSolo = function () {
        this.layerEditor.setSolo(this);
    };

    Layer.prototype.markSolo = function () {
        this.soloElement.css('opacity', 1);
        this.layer.addClass('n2-ss-layer-solo');
    };

    Layer.prototype.unmarkSolo = function () {
        this.soloElement.css('opacity', 0.3);
        this.layer.removeClass('n2-ss-layer-solo');
    };

    Layer.prototype.switchEye = function () {
        this.eye = !this.eye;
        this._eye();
    };

    Layer.prototype._eye = function () {
        if (this.eye) {
            this.eyeElement.css('opacity', 0.3);
            this._hide();
        } else {
            this.eyeElement.css('opacity', 1);
            this._show();
        }
    };

    Layer.prototype._hide = function () {
        this.layer.css('display', 'none');
    };

    Layer.prototype._show = function () {
        if (parseInt(this.property[this.layerEditor.getMode()]) && (!this.eye || (arguments.length == 1 && arguments[0]))) {
            this.layer.css('display', 'block');
        }
    };

    Layer.prototype.switchLock = function () {
        this.lock = !this.lock;
        this._lock();
    };

    Layer.prototype._lock = function () {
        if (this.lock) {
            this.lockElement.css('opacity', 1);
            this.layer.nextenddraggable("disable");
            this.layer.resizable("disable");
            this.layer.addClass('n2-ss-layer-locked');
        } else {
            this.lockElement.css('opacity', 0.3);
            this.layer.nextenddraggable("enable");
            this.layer.resizable("enable");
            this.layer.removeClass('n2-ss-layer-locked');

        }
    };

    Layer.prototype.duplicate = function () {
        var layer = this.getHTML(true, false);
        layer.attr('data-name', layer.attr('data-name') + ' - copy');

        var newLayer = this.layerEditor.addLayer(layer, true);

        this.layerRow.trigger('mouseleave');
        newLayer.activate();
    };

    Layer.prototype.delete = function () {

        this.itemEditor._removeItemOrderable(this.itemsRow);

        this.deActivate();

        for (var i = 0; i < this.items.length; i++) {
            this.items[i].delete();
        }

        this.layerEditor.zIndexList.splice(this.zIndex, 1);

        this.layer.remove();
        this.layerRow.remove();
        this.layerEditor.layerDeleted(this.getIndex());

        this.editorVisibilityChange();

        this.$.trigger('layerDeleted');

        delete this.layerEditor;
        delete this.layer;
        delete this.itemEditor;
        delete this.animation;
        delete this.items;
    };

    Layer.prototype.getHTML = function (itemsIncluded, base64) {
        var layer = $('<div class="n2-ss-layer"></div>')
            .attr('style', this.getStyleText());

        for (var k in this.property) {
            if (k != 'width' && k != 'height' && k != 'left' && k != 'top') {
                layer.attr('data-' + k.toLowerCase(), this.property[k]);
            }
        }

        for (var k in this.deviceProperty) {
            for (var k2 in this.deviceProperty[k]) {
                layer.attr('data-' + k.toLowerCase() + k2, this.deviceProperty[k][k2]);
            }
        }

        layer.css({
            position: 'absolute',
            zIndex: this.zIndex + 1
        });

        for (var k in this.deviceProperty['desktop']) {
            layer.css(k, this.deviceProperty['desktop'][k] + 'px');
        }

        if (itemsIncluded) {
            for (var i = 0; i < this.items.length; i++) {
                layer.append(this.items[i].getHTML(base64));
            }
        }

        layer.attr('data-eye', this.eye);
        layer.attr('data-lock', this.lock);


        layer.attr('data-animations', this.animation.getAnimationsCode());

        return layer;
    };

    Layer.prototype.getData = function (itemsIncluded) {
        var layer = {
            style: 'z-index: ' + (this.zIndex + 1) + ';' + this.getStyleText(),
            eye: this.eye,
            lock: this.lock,
            animations: this.animation.getData()
        };
        for (var k in this.property) {
            switch (k) {
                case 'width':
                case 'height':
                case 'left':
                case 'top':
                case 'align':
                case 'valign':
                case 'fontsize':
                    break;
                default:
                    layer[k.toLowerCase()] = this.property[k];
            }
        }

        // store the device based properties
        for (var device in this.deviceProperty) {
            for (var property in this.deviceProperty[device]) {
                var value = this.deviceProperty[device][property];
                if (typeof value === 'undefined') {
                    continue;
                }
                if (!(property == 'width' && value == 'auto') && !(property == 'height' && value == 'auto') && property != 'align' && property != 'valign') {
                    value = parseFloat(value);
                }
                layer[device.toLowerCase() + property] = value;
            }
        }

        // Set the default styles for the layer
        var defaultProperties = this.deviceProperty['desktopPortrait'];
        layer.style += 'left:' + parseFloat(defaultProperties.left) + 'px;';
        layer.style += 'top:' + parseFloat(defaultProperties.top) + 'px;';
        if (defaultProperties.width == 'auto') {
            layer.style += 'width:auto;';
        } else {
            layer.style += 'width:' + parseFloat(defaultProperties.width) + 'px;';
        }
        if (defaultProperties.height == 'auto') {
            layer.style += 'height:auto;';
        } else {
            layer.style += 'height:' + parseFloat(defaultProperties.height) + 'px;';
        }

        if (itemsIncluded) {
            layer.items = [];
            for (var i = 0; i < this.items.length; i++) {
                layer.items.push(this.items[i].getData());
            }
        }

        return layer;
    };

    Layer.prototype.initItems = function () {
        this.items = [];
        var items = this.layer.find('.n2-ss-item');
        for (var i = 0; i < items.length; i++) {
            this.addItem(items.eq(i), false);
        }

        this.itemEditor._makeItemsOrderable(this.itemsRow);
    };

    Layer.prototype.addItem = function (item, place) {
        if (place) {
            item.appendTo(this.layer);
        }
        new NextendSmartSliderItem(item, this, this.itemEditor);
    };

    Layer.prototype.editName = function () {
        var input = new NextendSmartSliderAdminInlineField();

        input.$input.on({
            valueChanged: $.proxy(function (e, newName) {
                this.rename(newName, true);
                this.layerTitleSpan.css('display', 'inline');
            }, this),
            cancel: $.proxy(function () {
                this.layerTitleSpan.css('display', 'inline');
            }, this)
        });

        this.layerTitleSpan.css('display', 'none');
        input.injectNode(this.layerTitle, this.property.name);

    };

    Layer.prototype.rename = function (newName, force) {

        if (this.property.nameSynced || force) {

            if (force) {
                this.property.nameSynced = 0;
            }

            if (newName == '') {
                if (force) {
                    this.property.nameSynced = 1;
                    if (this.items.length) {
                        this.items[0].reRender();
                        return false;
                    }
                }
                newName = 'Layer #' + (this.layerEditor.layerList.length + 1);
            }
            newName = newName.substr(0, 35);
            if (this.property.name != newName) {
                this.property.name = newName;
                this.layerTitleSpan.html(newName);

                this.$.trigger('layerRenamed', newName);
            }
        }
    };

    Layer.prototype.markSmallLayer = function () {
        var w = this.layer.width(),
            h = this.layer.height();
        if (w < 50 || h < 50) {
            this.layer.addClass('n2-ss-layer-small');
        } else {
            this.layer.removeClass('n2-ss-layer-small');
        }
    };

    Layer.prototype.setProperty = function (name, value) {
        switch (name) {
            case 'responsiveposition':
            case 'responsivesize':
            case 'inneralign':
            case 'crop':
            case 'parallax':
            case 'adaptivefont':
                this._setProperty(false, name, value, true, false);
                break;
            case 'align':
            case 'valign':
            case 'fontsize':
                this._setProperty(true, name, value, true, false);
                break;
            case 'width':
                var ratioSizeH = this.layerEditor.getResponsiveRatio('h')
                if (!parseInt(this.getProperty(false, 'responsivesize'))) {
                    ratioSizeH = 1;
                }
                this._setPropertyWithModifier(name, value == 'auto' ? value : Math.round(value), ratioSizeH, true, false);
                this._resize();
                break;
            case 'height':
                var ratioSizeV = this.layerEditor.getResponsiveRatio('v')
                if (!parseInt(this.getProperty(false, 'responsivesize'))) {
                    ratioSizeV = 1;
                }
                this._setPropertyWithModifier(name, value == 'auto' ? value : Math.round(value), ratioSizeV, true, false);
                this._resize();
                break;
            case 'left':
                var ratioPositionH = this.layerEditor.getResponsiveRatio('h')
                if (!parseInt(this.getProperty(false, 'responsiveposition'))) {
                    ratioPositionH = 1;
                }
                this._setPropertyWithModifier(name, Math.round(value), ratioPositionH, true, false);
                break;
            case 'top':
                var ratioPositionV = this.layerEditor.getResponsiveRatio('v')
                if (!parseInt(this.getProperty(false, 'responsiveposition'))) {
                    ratioPositionV = 1;
                }
                this._setPropertyWithModifier(name, Math.round(value), ratioPositionV, true, false);
                break;
            case 'showFieldDesktopPortrait':
                this._setProperty(false, 'desktopPortrait', value, true, false);
                break;
            case 'showFieldDesktopLandscape':
                this._setProperty(false, 'desktopLandscape', value, true, false);
                break;
            case 'showFieldTabletPortrait':
                this._setProperty(false, 'tabletPortrait', value, true, false);
                break;
            case 'showFieldTabletLandscape':
                this._setProperty(false, 'tabletLandscape', value, true, false);
                break;
            case 'showFieldMobilePortrait':
                this._setProperty(false, 'mobilePortrait', value, true, false);
                break;
            case 'showFieldMobileLandscape':
                this._setProperty(false, 'mobileLandscape', value, true, false);
                break;
        }

    };

    Layer.prototype.getProperty = function (deviceBased, name) {

        if (deviceBased) {
            var properties = this.deviceProperty[this.getMode()],
                fallbackProperties = this.deviceProperty['desktopPortrait'];
            if (typeof properties[name] !== 'undefined') {
                return properties[name];
            } else if (typeof fallbackProperties[name] !== 'undefined') {
                return fallbackProperties[name];
            }
        }
        return this.property[name];
    };

    Layer.prototype._setProperty = function (deviceBased, name, value, sync, isReset) {
        var lastLocalValue = this.property[name],
            lastValue = lastLocalValue;

        if (!isReset && this.property[name] != value) {
            this.property[name] = value;


            if (deviceBased) {
                lastValue = this.getProperty(true, name);
                this.deviceProperty[this.getMode()][name] = value;
            }
        } else if (deviceBased) {
            lastValue = this.getProperty(true, name);

        }

        if (lastLocalValue != value) {
            this.$.trigger('propertyChanged', [name, value]);
        }
        // The resize usually sets px for left/top/width/height values for the original percents. So we have to force those values back.
        if (sync) {
            this['_sync' + name](value, lastValue);
        }

        if (name == 'width' || name == 'height') {
            this.markSmallLayer();
        }
    };

    Layer.prototype._setPropertyWithModifier = function (name, value, modifier, sync, isReset) {
        var lastLocalValue = this.property[name];

        if (!isReset && this.property[name] != value) {
            this.property[name] = value;

            this.$.trigger('propertyChanged', [name, value]);

            this.deviceProperty[this.getMode()][name] = value;
        }

        if (lastLocalValue != value) {
            this.$.trigger('propertyChanged', [name, value]);
        }

        // The resize usually sets px for left/top/width/height values for the original percents. So we have to force those values back.
        if (sync) {
            if (value == 'auto') {
                this['_sync' + name](value);
            } else {
                this['_sync' + name](Math.round(value * modifier));
            }
        }

        this.markSmallLayer();
    };

    Layer.prototype._syncinneralign = function (value) {
        this.layer.css('text-align', value);
    };

    Layer.prototype._synccrop = function (value) {
        if (value == 'auto') {
            value = 'hidden';
        }

        var mask = this.layer.find('> .n2-ss-layer-mask');
        if (value == 'mask') {
            value = 'hidden';
            if (!mask.length) {
                mask = $("<div class='n2-ss-layer-mask'></div>").appendTo(this.layer);
                for (var i = 0; i < this.items.length; i++) {
                    mask.append(this.items[i].item);
                }
            }
        } else {
            if (mask.length) {
                for (var i = 0; i < this.items.length; i++) {
                    this.layer.append(this.items[i].item);
                    mask.remove();
                }
            }
        }
        this.layer.css('overflow', value);
    };

    Layer.prototype._syncparallax = function (value) {

    };

    Layer.prototype._syncalign = function (value, lastValue) {
        if (lastValue !== 'undefined' && value != lastValue) {
            var ratioH = this.layerEditor.getResponsiveRatio('h');
            this._setPropertyWithModifier('left', 0, ratioH, true, false);
        }
        this.layer.attr('data-align', value);
    };

    Layer.prototype._syncvalign = function (value, lastValue) {
        if (lastValue !== 'undefined' && value != lastValue) {
            var ratioV = this.layerEditor.getResponsiveRatio('v');
            this._setPropertyWithModifier('top', 0, ratioV, true, false);
        }
        this.layer.attr('data-valign', value);
    };

    Layer.prototype._syncfontsize = function (value) {
        this.adjustFontSize(this.getProperty(false, 'adaptivefont'), value, true);
    };

    Layer.prototype._syncadaptivefont = function (value) {
        this.adjustFontSize(value, this.getProperty(true, 'fontsize'), true);
    };

    Layer.prototype.adjustFontSize = function (isAdaptive, fontSize, shouldUpdatePosition) {
        fontSize = parseInt(fontSize);
        if (parseInt(isAdaptive)) {
            this.layer.css('font-size', (nextend.smartSlider.frontend.sliderElement.data('fontsize') * fontSize / 100) + 'px');
        } else if (fontSize != 100) {
            this.layer.css('font-size', fontSize + '%');
        } else {
            this.layer.css('font-size', '');
        }
        if (shouldUpdatePosition) {
            this.update();
        }
    };

    Layer.prototype._syncleft = function (value) {
        switch (this.getProperty(true, 'align')) {
            case 'right':
                this.layer.css({
                    left: 'auto',
                    right: value + 'px'
                });
                break;
            case 'center':
                this.layer.css({
                    left: (this.layer.parent().width() / 2 + value - this.layer.width() / 2) + 'px',
                    right: 'auto'
                });
                break;
            default:
                this.layer.css({
                    left: value + 'px',
                    right: 'auto'
                });
        }
    };

    Layer.prototype._synctop = function (value) {
        switch (this.getProperty(true, 'valign')) {
            case 'bottom':
                this.layer.css({
                    top: 'auto',
                    bottom: value + 'px'
                });
                break;
            case 'middle':
                this.layer.css({
                    top: (this.layer.parent().height() / 2 + value - this.layer.height() / 2) + 'px',
                    bottom: 'auto'
                });
                break;
            default:
                this.layer.css({
                    top: value + 'px',
                    bottom: 'auto'
                });
        }
    };

    Layer.prototype._syncresponsiveposition = function (value) {
        this._resize();
    };

    Layer.prototype._syncwidth = function (value) {
        this.layer.css('width', value + (value == 'auto' ? '' : 'px'));
    };

    Layer.prototype._syncheight = function (value) {
        this.layer.css('height', value + (value == 'auto' ? '' : 'px'));
    };

    Layer.prototype._syncresponsivesize = function (value) {
        this._resize();
    };

    Layer.prototype._syncdesktopPortrait = function (value) {
        this.__syncShowOnDevice('desktop', 'Portrait', value);
    };

    Layer.prototype._syncdesktopLandscape = function (value) {
        this.__syncShowOnDevice('desktop', 'Landscape', value);
    };

    Layer.prototype._synctabletPortrait = function (value) {
        this.__syncShowOnDevice('tablet', 'Portrait', value);
    };

    Layer.prototype._synctabletLandscape = function (value) {
        this.__syncShowOnDevice('tablet', 'Landscape', value);
    };

    Layer.prototype._syncmobilePortrait = function (value) {
        this.__syncShowOnDevice('mobile', 'Portrait', value);
    };

    Layer.prototype._syncmobileLandscape = function (value) {
        this.__syncShowOnDevice('mobile', 'Landscape', value);
    };

    Layer.prototype.__syncShowOnDevice = function (device, orientation, value) {
        if (this.getMode() == device + orientation) {
            if (parseInt(value)) {
                this._show();
            } else {
                this._hide();
            }
        }
    };

    Layer.prototype.___makeLayerAlign = function () {
        this.alignMarker = $('<div class="n2-ss-layer-align-marker" />').appendTo(this.layer);
    };

    //<editor-fold desc="Makes layer resizable">

    /**
     * Add resize handles to the specified layer
     * @param {jQuery} layer
     * @private
     */
    Layer.prototype.___makeLayerResizeable = function () {
        this.layer.resizable({
            handles: 'n, e, s, w, ne, se, sw, nw',
            _containment: this.layerEditor.layerContainerElement,
            start: $.proxy(this.____makeLayerResizeableStart, this),
            resize: $.proxy(this.____makeLayerResizeableResize, this),
            stop: $.proxy(this.____makeLayerResizeableStop, this),
            smartguides: this.layerEditor.getSnap(),
            tolerance: 5
        })
            .on({
                mousedown: $.proxy(function (e) {
                    if (!this.lock) {
                        this.layerEditor.positionDisplay
                            .css({
                                left: e.pageX + 10,
                                top: e.pageY + 10
                            })
                            .html('W: ' + parseInt(this.layer.width()) + 'px<br />H: ' + parseInt(this.layer.height()) + 'px')
                            .addClass('n2-active');
                    }
                    if (document.activeElement) {
                        document.activeElement.blur();
                    }
                }, this),
                mouseup: $.proxy(function (e) {
                    this.layerEditor.positionDisplay.removeClass('n2-active');
                }, this)
            });
    };

    Layer.prototype.____makeLayerResizeableStart = function (event, ui) {
        $('#n2-admin').addClass('n2-ss-resize-layer');
        this.____makeLayerResizeableResize(event, ui);
        this.layerEditor.positionDisplay.addClass('n2-active');
    };

    Layer.prototype.____makeLayerResizeableResize = function (e, ui) {
        this.layerEditor.positionDisplay
            .css({
                left: e.pageX + 10,
                top: e.pageY + 10
            })
            .html('W: ' + ui.size.width + 'px<br />H: ' + ui.size.height + 'px');
    };

    Layer.prototype.____makeLayerResizeableStop = function (event, ui) {
        window.nextendPreventClick = true;
        setTimeout(function () {
            window.nextendPreventClick = false;
        }, 50);
        $('#n2-admin').removeClass('n2-ss-resize-layer');

        var isAutoWidth = false;
        if (ui.originalSize.width == ui.size.width) {
            if (this.getProperty(true, 'width') == 'auto') {
                isAutoWidth = true;
                this['_syncwidth']('auto');
            }
        }

        var isAutoHeight = false;
        if (ui.originalSize.height == ui.size.height) {
            if (this.getProperty(true, 'height') == 'auto') {
                isAutoHeight = true;
                this['_syncheight']('auto');
            }
        }

        this.setPosition(ui.position.left, ui.position.top);


        var ratioSizeH = this.layerEditor.getResponsiveRatio('h'),
            ratioSizeV = this.layerEditor.getResponsiveRatio('v');

        if (!parseInt(this.getProperty(false, 'responsivesize'))) {
            ratioSizeH = ratioSizeV = 1;
        }

        if (!isAutoWidth) {
            this._setPropertyWithModifier('width', Math.round(ui.size.width * (1 / ratioSizeH)), ratioSizeH, false, false);
        }
        if (!isAutoHeight) {
            this._setPropertyWithModifier('height', Math.round(ui.size.height * (1 / ratioSizeV)), ratioSizeV, false, false);
        }

        this.layerEditor.positionDisplay.removeClass('n2-active');
    };
    //</editor-fold>

    //<editor-fold desc="Makes layer draggable">

    /**
     * Add draggable handles to the specified layer
     * @param layer
     * @private
     */
    Layer.prototype.___makeLayerDraggable = function () {

        this.layer.nextenddraggable({
            _containment: this.layerEditor.layerContainerElement,
            start: $.proxy(this.____makeLayerDraggableStart, this),
            drag: $.proxy(this.____makeLayerDraggableDrag, this),
            stop: $.proxy(this.____makeLayerDraggableStop, this),
            smartguides: this.layerEditor.getSnap(),
            tolerance: 5
        });
    };

    Layer.prototype.____makeLayerDraggableStart = function (event, ui) {
        $('#n2-admin').addClass('n2-ss-move-layer');
        this.____makeLayerDraggableDrag(event, ui);
        this.layerEditor.positionDisplay.addClass('n2-active');

        if (this.getProperty(true, 'width') == 'auto') {
            this.layer.width(this.layer.width() + 0.5); // Center positioned element can wrap the last word to a new line if this fix not added
        }

        if (this.getProperty(true, 'height') == 'auto') {
            this['_syncheight']('auto');
        }
    };

    Layer.prototype.____makeLayerDraggableDrag = function (e, ui) {
        this.layerEditor.positionDisplay
            .css({
                left: e.pageX + 10,
                top: e.pageY + 10
            })
            .html('L: ' + parseInt(ui.position.left | 0) + 'px<br />T: ' + parseInt(ui.position.top | 0) + 'px');
    };

    Layer.prototype.____makeLayerDraggableStop = function (event, ui) {
        window.nextendPreventClick = true;
        setTimeout(function () {
            window.nextendPreventClick = false;
        }, 50);
        $('#n2-admin').removeClass('n2-ss-move-layer');

        this.setPosition(ui.position.left, ui.position.top);

        if (this.getProperty(true, 'width') == 'auto') {
            this['_syncwidth']('auto');
        }

        if (this.getProperty(true, 'height') == 'auto') {
            this['_syncheight']('auto');
        }

        this.layerEditor.positionDisplay.removeClass('n2-active');
    };

    Layer.prototype.moveX = function (x) {
        if (this.getProperty(true, 'align') == 'right') {
            x *= -1;
        }
        this._setPropertyWithModifier('left', this.getProperty(true, 'left') + x, this.layerEditor.getResponsiveRatio('h'), true);
    };

    Layer.prototype.moveY = function (y) {
        if (this.getProperty(true, 'valign') == 'bottom') {
            y *= -1;
        }
        this._setPropertyWithModifier('top', this.getProperty(true, 'top') + y, this.layerEditor.getResponsiveRatio('v'), true);
    };

    Layer.prototype.setPosition = function (left, top) {

        var ratioH = this.layerEditor.getResponsiveRatio('h'),
            ratioV = this.layerEditor.getResponsiveRatio('v');

        if (!parseInt(this.getProperty(false, 'responsiveposition'))) {
            ratioH = ratioV = 1;
        }

        switch (this.getProperty(true, 'align')) {
            case 'left':
                this._setPropertyWithModifier('left', Math.round(left * (1 / ratioH)), ratioH, false, false);
                break;
            case 'center':
                this._setPropertyWithModifier('left', -Math.round((this.layer.parent().width() / 2 - left - this.layer.width() / 2) * (1 / ratioH)), ratioH, false, false);
                break;
            case 'right':
                this._setPropertyWithModifier('left', Math.round((this.layer.parent().width() - left - this.layer.width()) * (1 / ratioH)), ratioH, true, false);
                break;
        }

        switch (this.getProperty(true, 'valign')) {
            case 'top':
                this._setPropertyWithModifier('top', Math.round(top * (1 / ratioV)), ratioV, false, false);
                break;
            case 'middle':
                this._setPropertyWithModifier('top', -Math.round((this.layer.parent().height() / 2 - top - this.layer.height() / 2) * (1 / ratioV)), ratioV, false, false);
                break;
            case 'bottom':
                this._setPropertyWithModifier('top', Math.round((this.layer.parent().height() - top - this.layer.height()) * (1 / ratioV)), ratioV, true, false);
                break;
        }
    }
    //</editor-fold

    Layer.prototype.snap = function () {
        var snap = this.layerEditor.getSnap();
        this.layer.resizable("option", "smartguides", snap);
        this.layer.nextenddraggable("option", "smartguides", snap);
    };

    //<editor-fold desc="Makes a layer deletable">

    Layer.prototype.___makeLayerQuickHandle = function () {
        var quick = $('<div class="n2-ss-layer-quick-handle" style="z-index: 92;"><i class="n2-i n2-it n2-i-more"></i></div>')
            .on('mousedown', $.proxy(function (e) {
                e.stopPropagation();
                this.activate();
                var handleOffset = $(e.currentTarget).offset();

                var container = $('<div class="n2-ss-layer-quick-panel"></div>').css(handleOffset)
                    .on('click mouseleave', function () {
                        container.remove();
                    })
                    .appendTo('body');
                $('<div class="n2-ss-layer-quick-panel-option"><i class="n2-i n2-it n2-i-duplicate"></i></div>')
                    .on('click', $.proxy(this.duplicate, this))
                    .appendTo(container);
                $('<div class="n2-ss-layer-quick-panel-option n2-ss-layer-quick-panel-option-center"><i class="n2-i n2-it n2-i-more"></i></div>').appendTo(container);
                $('<div class="n2-ss-layer-quick-panel-option"><i class="n2-i n2-it n2-i-delete"></i></div>')
                    .on('click', $.proxy(this.delete, this))
                    .appendTo(container);
            }, this))
            .appendTo(this.layer);
    };
    //</editor-fold>

    Layer.prototype.changeEditorMode = function (mode) {
        this.setModeProperties(false);
        if (parseInt(this.property[mode])) {
            this._show();
        } else {
            this._hide();
        }
    };

    Layer.prototype.resetMode = function (mode) {
        if (mode != 'desktopPortrait') {
            var undefined;
            this.deviceProperty[mode] = {
                left: undefined,
                top: undefined,
                width: undefined,
                height: undefined,
                align: undefined,
                valign: undefined,
                fontsize: undefined
            };

            this.setModeProperties(true);
        }
    };

    Layer.prototype.setModeProperties = function (isReset) {
        var ratioPositionH = this.layerEditor.getResponsiveRatio('h'),
            ratioSizeH = ratioPositionH,
            ratioPositionV = this.layerEditor.getResponsiveRatio('v'),
            ratioSizeV = ratioPositionV;

        if (!parseInt(this.getProperty(false, 'responsivesize'))) {
            ratioSizeH = ratioSizeV = 1;
        }

        var width = this.getProperty(true, 'width'),
            height = this.getProperty(true, 'height');
        this._setPropertyWithModifier('width', width == 'auto' ? width : Math.round(width), ratioSizeH, true, isReset);
        this._setPropertyWithModifier('height', height == 'auto' ? height : Math.round(height), ratioSizeV, true, isReset);

        if (!parseInt(this.getProperty(false, 'responsiveposition'))) {
            ratioPositionH = ratioPositionV = 1;
        }

        this._setPropertyWithModifier('left', Math.round(this.getProperty(true, 'left')), ratioPositionH, true, isReset);
        this._setPropertyWithModifier('top', Math.round(this.getProperty(true, 'top')), ratioPositionV, true, isReset);


        this._setProperty(true, 'align', this.getProperty(true, 'align'), true, isReset);

        this._setProperty(true, 'valign', this.getProperty(true, 'valign'), true, isReset);

        this._setProperty(true, 'fontsize', this.getProperty(true, 'fontsize'), true, isReset);
    };

    Layer.prototype.getMode = function () {
        return this.layerEditor.getMode();
    };

    Layer.prototype._resize = function () {
        this.resize({
            slideW: this.layerEditor.getResponsiveRatio('h'),
            slideH: this.layerEditor.getResponsiveRatio('v')
        });
    }

    Layer.prototype.resize = function (ratios) {

        var ratioPositionH = ratios.slideW,
            ratioSizeH = ratioPositionH,
            ratioPositionV = ratios.slideH,
            ratioSizeV = ratioPositionV;

        if (!parseInt(this.getProperty(false, 'responsivesize'))) {
            ratioSizeH = ratioSizeV = 1;
        }

        var width = this.getProperty(true, 'width');
        this._setPropertyWithModifier('width', width == 'auto' ? width : Math.round(width), ratioSizeH, true, false);
        var height = this.getProperty(true, 'height');
        this._setPropertyWithModifier('height', height == 'auto' ? height : Math.round(height), ratioSizeV, true, false);


        if (!parseInt(this.getProperty(false, 'responsiveposition'))) {
            ratioPositionH = ratioPositionV = 1;
        }
        this._setPropertyWithModifier('left', Math.round(this.getProperty(true, 'left')), ratioPositionH, true, false);
        this._setPropertyWithModifier('top', Math.round(this.getProperty(true, 'top')), ratioPositionV, true, false);

    };

    Layer.prototype.update = function () {
        if (this.getProperty(true, 'align') == 'center') {
            this.layer.css('left', (this.layer.parent().width() / 2 - this.layer.width() / 2 + this.getProperty(true, 'left') * this.layerEditor.getResponsiveRatio('h')));
        }

        if (this.getProperty(true, 'valign') == 'middle') {
            this.layer.css('top', (this.layer.parent().height() / 2 - this.layer.height() / 2 + this.getProperty(true, 'top') * this.layerEditor.getResponsiveRatio('v')));
        }
    }

    Layer.prototype.getStyleText = function () {
        var style = '';
        var crop = this.property.crop;
        if (crop == 'auto') {
            crop = 'hidden';
        }
        style += 'overflow:' + crop + ';';
        style += 'text-align:' + this.property.inneralign + ';';
        return style;
    };

    scope.NextendSmartSliderLayer = Layer;


})(nextend.smartSlider, n2, window);