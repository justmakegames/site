(function ($, scope, undefined) {
    function NextendSmartSliderWidgetArrowImageBar(id, images) {
        var slider = this.slider = window[id];
        if (this.slider.sliderElement.data('arrow')) {
            return false;
        }

        this.previous = $('#' + id + '-arrow-previous').on('click', function () {
            slider.previous();
        });

        var previousImage = this.previous.find('.nextend-arrow-image');


        this.next = $('#' + id + '-arrow-next').on('click', function () {
            slider.next();
        });

        var nextImage = this.next.find('.nextend-arrow-image');

        var length = images.length;

        this.slider.sliderElement.data('arrow', this)
            .on('sliderSwitchTo', function (e, index) {
                if (index == 0) {
                    previousImage.css('backgroundImage', 'url(' + images[length - 1] + ')');
                } else {
                    previousImage.css('backgroundImage', 'url(' + images[index - 1] + ')');
                }

                if (index == length - 1) {
                    nextImage.css('backgroundImage', 'url(' + images[0] + ')');
                } else {
                    nextImage.css('backgroundImage', 'url(' + images[index + 1] + ')');
                }
            });

    };


    scope.NextendSmartSliderWidgetArrowImageBar = NextendSmartSliderWidgetArrowImageBar;
})(n2, window);