/**
 * Carousel Module
 *
 * This is a custom Magento 2 JS Component acting
 * as a wrapper around Ken Wheeler's Slick Carousel
 * with some additional features.
 *
 * source:
 * http://github.com/kenwheeler/slick
 */

define([
    "jquery",
    "born/carouselSettings",
    "slick"
], function ($, carouselSettings) {
    'use strict';

    var carousel = function (config, element) {
        // get carousel typ from the config passed
        // if it is defined, get the corresponding settings
        // and merge the original config passed on top of it
        // in case any properties should be overridden
        let baseSettings = carouselSettings.base,
            typeSettings = config.hasOwnProperty('type') ? carouselSettings[config.type] : {},
            slickSettings = $.extend(baseSettings, typeSettings, config);

        // init event must be attached to the element BEFORE initializing slick
        // $(element).on('init', function (event, slick) {
        //     $(slick.$slider[0]).find(".slick-slide:not(.slick-active)").addClass('animate-slide--off');
        //     $(slick.$slider[0]).find(".slick-active").addClass('animate-slide');
        // });

        let slickSlider = $(element).slick(slickSettings);

        // if (slickSettings.hasOwnProperty('cssAnimateClass')) {
        //     slickSlider.on('beforeChange', function (event, slick, currentSlide) {
        //         $(slick.$slider[0]).find(".slick-active").removeClass('animate-slide');
        //     });

        //     slickSlider.on('afterChange', function (event, slick, currentSlide) {
        //         $(slick.$slider[0]).find(".slick-slide:not(.slick-active)").addClass('animate-slide--off');
        //         $(slick.$slider[0]).find(".slick-active").toggleClass('animate-slide animate-slide--off');
        //     });
        // }

    };

    return carousel;
});
