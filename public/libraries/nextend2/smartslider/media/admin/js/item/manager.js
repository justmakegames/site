(function (smartSlider, $, scope, undefined) {

    function ItemManager(layerEditor) {
        this._sortable = $([]);
        this.suppressChange = false;
        this._itemsSortableRefreshTimeout = -1;

        this.layerEditor = layerEditor;

        this._initInstalledItemsDraggable();

        this.form = {};
        this.activeForm = {
            form: $('<div></div>')
        };
    }

    ItemManager.prototype.advanced = function (state) {
        if (state) {
            this._sortable.sortable("option", "disabled", false);
            this.installedItems.draggable("option", "disabled", false);
        } else {
            this._sortable.sortable("option", "disabled", true);
            this.installedItems.draggable("option", "disabled", true);
        }
    };

    ItemManager.prototype.setActiveItem = function (item, force) {
        if (item != this.activeItem || force) {
            var type = item.type,
                values = item.values;

            this.activeForm.form.css('display', 'none');

            this.activeForm = this.getItemType(type);

            if (this.activeItem) {
                this.activeItem.deActivate();
            }

            this.activeItem = item;

            this.suppressChange = true;

            for (var key in values) {
                var field = $('#item_' + type + key).data('field');
                if (field) {
                    field.insideChange(values[key]);
                }
            }

            this.suppressChange = false;

            this.activeForm.form.css('display', 'block');
        }
    };

    ItemManager.prototype._initInstalledItemsDraggable = function () {

        this.installedItems = $('#n2-ss-item-container .n2-ss-core-item')
            .draggable({
                disabled: !this.layerEditor.advanced,
                helper: 'clone',
                appendTo: document.body,
                start: function (event, ui) {
                    ui.helper.css({
                        height: 40,
                        width: $('#n2-ss-layers-items-list .ui-sortable').width()
                    });
                }
            }).on('click', $.proxy(function (e) {
                this.createLayerItem($(e.currentTarget).data('item'));
            }, this));
    };

    ItemManager.prototype.createLayerItem = function (type) {
        var itemData = this.getItemType(type),
            layer = this.layerEditor.createLayer($('.n2-ss-core-item-' + type).data('layerproperties'));

        var itemNode = $('<div></div>').data('item', type).data('itemvalues', $.extend(true, {}, itemData.values))
            .addClass('n2-ss-item n2-ss-item-' + type);

        var item = new scope.NextendSmartSliderItem(itemNode, layer, this, 0);
        layer.activate();

        smartSlider.sidebarManager.switchTab(0);

        return item;
    };

    ItemManager.prototype._makeItemsOrderable = function (layersItemList) {
        this._sortable = this._sortable.add(layersItemList);

        layersItemList
            .sortable({
                disabled: !this.layerEditor.advanced,
                appendTo: $('#n2-ss-layers-items-list > ul'),
                axis: "y",
                helper: 'clone',
                placeholder: "sortable-placeholder",
                forcePlaceholderSize: true,
                tolerance: "pointer",
                items: '.n2-ss-item-row',
                handle: '.n2-i-order',
                stop: $.proxy(function (event, ui) {
                    var itemEl = $(ui.item)
                    if (itemEl.hasClass('n2-ss-core-item')) {
                        // Item came from #draggableitems

                        var type = itemEl.data('item');
                        var itemData = this.getItemType(type);

                        var itemNode = $('<div></div>').data('item', type).data('itemvalues', itemData.values)
                            .addClass('n2-ss-item n2-ss-item-' + type);

                        var item = new scope.NextendSmartSliderItem(itemNode, itemEl.parent().data('layer'), this, itemEl.index());

                        itemEl.remove();
                    } else {
                        var item = itemEl.data('item');
                        item.moveItem(itemEl.parent().data('layer'), item.row.index());
                    }

                }, this)
            });
        this._itemsSortableRefresh();
    };

    ItemManager.prototype._removeItemOrderable = function (layersItemList) {
        this._sortable = this._sortable.not(layersItemList);
    };

    ItemManager.prototype._itemsSortableRefresh = function () {
        if (this._itemsSortableRefreshTimeout) clearTimeout(this._itemsSortableRefreshTimeout);

        this._itemsSortableRefreshTimeout = setTimeout($.proxy(this.__itemsSortableRefresh, this), 100);
    };

    ItemManager.prototype.__itemsSortableRefresh = function () {
        this._sortable.sortable("option", "connectWith", this._sortable);
        this.installedItems.draggable("option", 'connectToSortable', this._sortable);
    };

    /**
     * Initialize an item type and subscribe the field changes on that type.
     * We use event normalization to stop not necessary rendering.
     * @param type
     * @private
     */
    ItemManager.prototype.getItemType = function (type) {
        if (this.form[type] === undefined) {
            var form = $('#smartslider-slide-toolbox-item-type-' + type),
                formData = {
                    timeOut: null,
                    form: form,
                    template: form.data('itemtemplate'),
                    values: form.data('itemvalues'),
                    fields: form.find('[name^="item_' + type + '"]'),
                    fieldNameRegexp: new RegExp('item_' + type + "\\[(.*?)\\]", "")
                };
            formData.fields.on('nextendChange keydown', $.proxy(function (e) {
                if (!this.suppressChange) {
                    if (formData.timeOut) {
                        clearTimeout(formData.timeOut);
                    }
                    formData.timeOut = setTimeout($.proxy(this.updateCurrentItem, this), 100);
                }
            }, this));

            this.form[type] = formData;
        }
        return this.form[type];
    };

    /**
     * This function renders the current item with the current values of the related form field.
     */
    ItemManager.prototype.updateCurrentItem = function () {
        var data = {},
            originalData = {},
            form = this.form[this.activeItem.type],
            html = form.template,
            parser = this.activeItem.parser;

        // Get the current values of the fields
        // Run through the related item filter
        // Replace the variables in the template of the item type
        form.fields.each($.proxy(function (i, field) {
            var field = $(field),
                name = field.attr('name').match(form.fieldNameRegexp)[1];

            originalData[name] = data[name] = field.val();

        }, this));

        data = $.extend({}, parser.getDefault(), data);

        parser.parseAll(data, this.activeItem);
        for (var k in data) {
            var reg = new RegExp('\\{' + k + '\\}', 'g');
            html = html.replace(reg, data[k]);
        }

        this.activeItem.render($(html), data, originalData);

    };

    scope.NextendSmartSliderItemManager = ItemManager;

})(nextend.smartSlider, n2, window);