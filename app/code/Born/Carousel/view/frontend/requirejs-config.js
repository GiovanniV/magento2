/*
 * Copyright � 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        "*": {
            'born/carousel': 'Born_Carousel/js/module.carousel',
            'born/carouselSettings': 'Born_Carousel/js/module.carousel.settings',
            'slick': 'Born_Carousel/js/lib/slick.min'
        }
    },
    shim: {
        'slick': {
            deps: ['jquery']
        }
    }
};
