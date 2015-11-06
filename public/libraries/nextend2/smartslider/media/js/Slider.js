(function ($, scope, undefined) {
    function NextendSmartSlider() {
        this.sliders = {};
        this.readys = {};
    }

    NextendSmartSlider.prototype.makeReady = function (id, slider) {
        this.sliders[id] = slider;
        if (typeof this.readys[id] !== 'undefined') {
            for (var i = 0; i < this.readys[id].length; i++) {
                this.readys[id][i].call(slider, slider, slider.sliderElement);
            }
        }
    };

    NextendSmartSlider.prototype.ready = function (id, callback) {
        if (typeof this.sliders[id] !== 'undefined') {
            callback.call(this.sliders[id], this.sliders[id], this.sliders[id].sliderElement);
        } else {
            if (typeof this.readys[id] == 'undefined') {
                this.readys[id] = [];
            }
            this.readys[id].push(callback);
        }
    };

    window.n2ss = new NextendSmartSlider();
})(n2, window);