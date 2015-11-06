if (N2SSPRO) {
    (function ($, scope, undefined) {
        function Parallax(slider, parameters) {
            this.levels = {
                1: 10,
                2: 20,
                3: 30,
                4: 90,
                5: 150,
                6: 200,
                7: 250,
                8: 300,
                9: 400,
                10: 500
            };
            this.active = false;
            this.mouseOrigin = false;
            this.slide = null;
            this._scrollCallback = false;
            this.parameters = $.extend({
                mode: 'scroll', // mouse||scroll||mouse-scroll
                origin: 'slider' // slider||enter
            }, parameters);
            this.x = this.y = this._x = this._y = 0;
            this.window = $(window);
            this.slider = slider;
            this.sliderElement = slider.sliderElement;
        };

        Parallax.prototype.resize = function () {
            var offset = this.sliderElement.offset(),
                sliderSize = this.slider.responsive.responsiveDimensions;

            this.sliderOrigin = {
                x: offset.left + sliderSize.width / 2,
                y: offset.top + sliderSize.height / 2
            }
            if (this.parameters.origin == 'slider') {
                this.mouseOrigin = this.sliderOrigin;
            }

        };

        Parallax.prototype.enable = function () {
            this.active = true;
            this.resize();
            this.sliderElement.on({
                'SliderResize.n2-ss-parallax': $.proxy(this.resize, this)
            });

            var x = -1,
                y = -1;
            this.mouseX = false;
            this.mouseY = false;
            this.scrollY = false;

            switch (this.parameters.horizontal) {
                case 'mouse':
                    this.mouseX = true;
                    break;
                case 'mouse-invert':
                    this.mouseX = true;
                    x = 1;
                    break;
            }

            switch (this.parameters.vertical) {
                case 'mouse':
                    this.mouseY = true;
                    break;
                case 'mouse-invert':
                    this.mouseY = true;
                    y = 1;
                    break;
                case 'scroll':
                    this.scrollY = true;
                    y = 1;
                    break;
                case 'scroll-invert':
                    this.scrollY = true;
                    y = -1;
                    break;
            }

            if (this.mouseX || this.mouseY) {
                this.sliderElement.on({
                    'mouseenter.n2-ss-parallax': $.proxy(this.mouseEnter, this),
                    'mousemove.n2-ss-parallax': $.proxy(this.mouseMove, this, x, y),
                    'mouseleave.n2-ss-parallax': $.proxy(this.mouseLeave, this, x, y)
                });
            }

            if (this.scrollY) {
                this._scrollCallback = $.proxy(this.scroll, this, y);
                this.window.on({
                    'scroll.n2-ss-parallax': this._scrollCallback
                });
            }
        };

        Parallax.prototype.disable = function () {
            this.sliderElement.off('.n2-ss-parallax');
            this.window.off('scroll', this._scrollCallback);
            this.active = false;
        };

        Parallax.prototype.start = function (slide) {
            if (this.slide !== null) {
                this.end();
            }
            if (slide.$parallax.length) {
                this.slide = slide;
                if (!this.active) {
                    this.enable();
                }
                if (this._scrollCallback) {
                    this._scrollCallback();
                }
            } else if (this.active) {
                this.disable();
            }
        };

        Parallax.prototype.end = function () {
            switch (this.parameters.mode) {
                case 'mouse-scroll':
                    this.mouseLeave(true, false);
                    break;
                case 'scroll':
                    break;
                default:
                    this.mouseLeave(true, true);
            }
            this.slide = null;
        };

        Parallax.prototype.mouseEnter = function (e) {
            TweenLite.ticker.addEventListener("tick", this.tick, this);
            if (this.parameters.origin == 'enter') {
                this.mouseOrigin = {
                    x: e.pageX,
                    y: e.pageY
                };
            }
        };

        Parallax.prototype.mouseMove = function (x, y, e) {
            if (this.mouseOrigin === false) {
                this.mouseOrigin = this.sliderOrigin;
            }
            var sliderSize = this.slider.responsive.responsiveDimensions;
            if (this.mouseX) {
                this._x = this.x;
                this.x = x * (e.pageX - this.mouseOrigin.x) / sliderSize.width;
            }
            if (this.mouseY) {
                this._y = this.y;
                this.y = y * (e.pageY - this.mouseOrigin.y) / sliderSize.height;
            }
        };

        Parallax.prototype.mouseLeave = function () {
            TweenLite.ticker.removeEventListener("tick", this.tick, this);
            var props = {};
            if (this.mouseX) {
                props.x = 0;
            }
            if (this.mouseY) {
                props.y = 0;
            }
            NextendTween.to(this.slide.$parallax, 2, props);
            this.mouseOrigin = this.sliderOrigin;
        };

        Parallax.prototype.scroll = function (y) {
            var sliderSize = this.slider.responsive.responsiveDimensions;
            this._y = this.y;
            this.y = (this.window.scrollTop() + this.window.height() / 2 - this.sliderOrigin.y) / sliderSize.height * y;
            this.draw(false, true);
        };

        Parallax.prototype.draw = function (x, y) {
            var $layers = this.slide.$parallax;
            for (var i = 0; i < $layers.length; i++) {
                var modifier = this.levels[$layers.eq(i).data('parallax')],
                    props = {};
                if (x && this.x != this._x) {
                    props.x = this.x * modifier;
                }
                if (y && this.y != this._y) {
                    props.y = this.y * modifier;
                }
                NextendTween.set($layers[i], props);
            }
        };

        Parallax.prototype.tick = function () {
            this.draw(this.mouseX, this.mouseY);
        };

        scope.NextendSmartSliderLayerParallax = Parallax;
    })(n2, window);
} //N2SSPRO