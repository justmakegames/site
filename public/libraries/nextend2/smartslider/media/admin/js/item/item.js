(function (smartSlider, $, scope, undefined) {

    function Item(item, layer, itemEditor, createPosition) {
        this.item = item;
        this.layer = layer;
        this.itemEditor = itemEditor;

        this.type = this.item.data('item');
        this.values = this.item.data('itemvalues');

        if (typeof this.values !== 'object') {
            this.values = $.parseJSON(this.values);
        }

        this.itemsRow = layer.itemsRow;

        if (scope['NextendSmartSliderItemParser_' + this.type] !== undefined) {
            this.parser = new scope['NextendSmartSliderItemParser_' + this.type](this);
        } else {
            this.parser = new scope['NextendSmartSliderItemParser'](this);
        }
        this.item.data('item', this);

        this.createRow(createPosition);

        if (typeof createPosition !== 'undefined') {
            if (this.layer.items.length == 0 || this.layer.items.length <= createPosition) {
                this.item.appendTo(this.layer.layer);
            } else {
                this.layer.items[createPosition].item.before(this.item);
            }
        }

        if (typeof createPosition === 'undefined' || this.layer.items.length == 0 || this.layer.items.length <= createPosition) {
            this.layer.items.push(this);
        } else {
            this.layer.items.splice(createPosition, 0, this);
        }

        if (this.item.children().length === 0) {
            this.reRender();
        }


        $('<div/>')
            .addClass('ui-helper ui-item-overlay')
            .css('zIndex', 89)
            .appendTo(this.item);

        this.item.on({
            click: $.proxy(this.activate, this)
        });

        $(window).trigger('ItemCreated');
    };

    Item.prototype.createRow = function (createPosition) {
        var remove = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-delete n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.delete, this)),
            duplicate = $('<a href="#" onclick="return false;"><i class="n2-i n2-i-duplicate n2-i-grey-opacity"></i></a>').on('click', $.proxy(this.duplicate, this));

        this.row = $('<li class="n2-ss-item-row"></li>')
            .on({
                mouseenter: $.proxy(function () {
                    this.item.addClass('n2-highlight');
                    this.layer.layer.addClass('n2-item-highlight');
                }, this),
                mouseleave: $.proxy(function () {
                    this.item.removeClass('n2-highlight');
                    this.layer.layer.removeClass('n2-item-highlight');
                }, this)
            });
        this.itemTitleSpan = $('<span class="n2-ucf">' + this.type + '</span>');
        this.itemTitle = $('<div class="n2-ss-item-title"></div>')
            .append(this.itemTitleSpan)
            .append($('<div class="n2-actions-left"></div>').append('<a href="#" onclick="return false;"><i class="n2-i n2-i-order n2-i-grey-opacity"></i></a>'))
            .append($('<div class="n2-actions"></div>').append(duplicate).append(remove))
            .appendTo(this.row)
            .on({
                click: $.proxy(this.activate, this)
            });

        if (typeof createPosition === 'undefined' || this.layer.items.length == 0 || this.layer.items.length <= createPosition) {
            this.row.appendTo(this.itemsRow);
        } else {
            this.layer.items[createPosition].row.before(this.row);
        }

        this.row.data('item', this);
    };

    Item.prototype.changeValue = function (property, value) {
        if (this == this.itemEditor.activeItem) {
            $('#item_' + this.type + property).data('field')
                .insideChange(value);
        } else {
            this.values[property] = value;
        }
    };

    Item.prototype.activate = function (e, force) {
        if (window.nextendPreventClick) return;

        this.layer.activate(null, this);
        this.itemEditor.setActiveItem(this, force);

        this.row.addClass('n2-active');
        this.layer.layerRow.addClass('n2-item-active');
    };

    Item.prototype.deActivate = function () {
        this.row.removeClass('n2-active');
        this.layer.layerRow.removeClass('n2-item-active');
    };

    Item.prototype.render = function (html, data, originalData) {
        this.item.html(this.parser.render(html, data));

        // These will be available on the backend render
        this.values = originalData;

        $('<div/>')
            .addClass('ui-helper ui-item-overlay')
            .css('zIndex', 89)
            .appendTo(this.item);

        var layerName = this.parser.getName(data);
        if (layerName === false) {
            layerName = this.type;
        } else {
            layerName = layerName.replace(/[^a-z0-9\-_\. ]/gi, '');
        }
        this.layer.rename(layerName, false);

        this.layer.update();
    };

    Item.prototype.reRender = function (newData) {

        var data = {},
            itemEditor = this.itemEditor,
            form = itemEditor.getItemType(this.type),
            html = form.template;

        for (var name in this.values) {
            data[name] = this.values[name];
            //$.extend(data, this.parser.parse(name, data[name]));
        }

        data = $.extend({}, this.parser.getDefault(), data, newData);

        var originalData = $.extend({}, data);

        this.parser.parseAll(data, this);
        this.values = originalData;

        for (var k in data) {
            var reg = new RegExp('\\{' + k + '\\}', 'g');
            html = html.replace(reg, data[k]);
        }

        this.render($(html), data, this.values);
    };

    Item.prototype.duplicate = function () {
        this.layer.addItem(this.getHTML(), true);
    };

    Item.prototype.delete = function () {
        this._removeItemsFromLayer();

        this.item.trigger('mouseleave');
        this.row.trigger('mouseleave');

        this.item.remove();
        this.row.remove();

        if (this.itemEditor.activeItem == this) {
            this.itemEditor.activeItem = null;
        }

        delete this.itemEditor;
        delete this.layer;
    };

    Item.prototype.moveItem = function (newLayer, position) {
        this._removeItemsFromLayer();

        var items = newLayer.items;

        this.layer = newLayer;

        if (items.length == 0 || items.length <= position) {
            this.item.appendTo(this.layer.layer);
        } else {
            items[position].item.before(this.item);
        }
        items.splice(position, 0, this);
    };

    Item.prototype._removeItemsFromLayer = function () {
        var previousIndex = $.inArray(this, this.layer.items);
        if (previousIndex !== -1) {
            this.layer.items.splice(previousIndex, 1);
            if (this.layer.activeItem == this) {
                this.layer.activeItem = null;
            }
        }
    };

    Item.prototype.getHTML = function (base64) {
        var item = '';
        if (base64) {

            item = '[' + this.type + ' values="' + Base64.encode(JSON.stringify(this.values)) + '"]';
        } else {
            item = $('<div class="n2-ss-item n2-ss-item-' + this.type + '"></div>')
                .attr('data-item', this.type)
                .attr('data-itemvalues', JSON.stringify(this.values));
        }
        return item;
    };

    Item.prototype.getData = function () {
        return {
            type: this.type,
            values: this.values
        };
    };

    scope.NextendSmartSliderItem = Item;
})(nextend.smartSlider, n2, window);