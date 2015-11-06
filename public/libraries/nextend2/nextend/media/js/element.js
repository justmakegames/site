;
(function ($, scope) {

    function NextendElement() {
        this.element.data('field', this);
    };

    NextendElement.prototype.triggerOutsideChange = function () {
        this.element.trigger('outsideChange', this)
            .trigger('nextendChange', this);
    };

    NextendElement.prototype.triggerInsideChange = function () {
        this.element.trigger('insideChange', this)
            .trigger('nextendChange', this);
    };

    scope.NextendElement = NextendElement;

})(n2, window);
