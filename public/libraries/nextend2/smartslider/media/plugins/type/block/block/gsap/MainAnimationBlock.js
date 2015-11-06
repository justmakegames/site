(function ($, scope, undefined) {


    function NextendSmartSliderMainAnimationBlock(slider, parameters) {
        NextendSmartSliderMainAnimationAbstract.prototype.constructor.apply(this, arguments);
    };

    NextendSmartSliderMainAnimationBlock.prototype = Object.create(NextendSmartSliderMainAnimationAbstract.prototype);
    NextendSmartSliderMainAnimationBlock.prototype.constructor = NextendSmartSliderMainAnimationBlock;

    NextendSmartSliderMainAnimationBlock.prototype.hasBackgroundAnimation = function () {
        return false;
    };

    scope.NextendSmartSliderMainAnimationBlock = NextendSmartSliderMainAnimationBlock;

})(n2, window);