(function ($, scope, undefined) {

    function NextendImageHelper(parameters, openLightbox, openMultipleLightbox, openFoldersLightbox) {
        NextendImageHelper.prototype.openLightbox = openLightbox;
        NextendImageHelper.prototype.openMultipleLightbox = openMultipleLightbox;
        NextendImageHelper.prototype.openFoldersLightbox = openFoldersLightbox;
        nextend.imageHelper = this;
        this.parameters = $.extend({
            siteKeywords: [],
            imageUrls: [],
            wordpressUrl: '',
            placeholderImage: '',
            placeholderRepeatedImage: ''
        }, parameters);
    }


    NextendImageHelper.prototype.make = function (image) {
        return this.dynamic(image);
    };

    NextendImageHelper.prototype.dynamic = function (image) {
        var imageUrls = this.parameters.imageUrls,
            keywords = this.parameters.siteKeywords;
        for (var i = 0; i < keywords.length; i++) {
            if (image.indexOf(imageUrls[i]) === 0) {
                image = keywords[i] + image.slice(imageUrls[i].length);
            }
        }
        return image;
    };

    NextendImageHelper.prototype.fixed = function (image) {
        var imageUrls = this.parameters.imageUrls,
            keywords = this.parameters.siteKeywords;
        for (var i = 0; i < keywords.length; i++) {
            if (image.indexOf(keywords[i]) === 0) {
                image = imageUrls[i] + image.slice(keywords[i].length);
            }
        }
        return image;
    };

    NextendImageHelper.prototype.openLightbox = function (callback) {

    };

    NextendImageHelper.prototype.openMultipleLightbox = function (callback) {
    };

    NextendImageHelper.prototype.openFoldersLightbox = function (callback) {
    };

    NextendImageHelper.prototype.getPlaceholder = function () {
        return this.fixed(this.parameters.placeholderImage);
    };

    NextendImageHelper.prototype.getRepeatedPlaceholder = function () {
        return this.fixed(this.parameters.placeholderRepeatedImage);
    };

    scope.NextendImageHelper = NextendImageHelper;

})(n2, window);