require('./bootstrap');

import 'alpinejs';

import Glide from '@glidejs/glide';




var sliders = document.querySelectorAll('.slider');
for (var i = 0; i < sliders.length; i++) {
    let glide = new Glide(sliders[i], {
        type: 'carousel',
        hoverpause: true,
        autoplay: 4000,
        perView: 1
    });
    glide.mount();
}


var carousels = document.querySelectorAll('.carousel');
for (var i = 0; i < carousels.length; i++) {
    let carousel = new Glide(carousels[i], {
        type: 'carousel',
        hoverpause: true,
        // autoplay: 6000,
        perView: 5,
        breakpoints: {
            1024: {
                perView: 5
            },
            960: {
                perView: 4
            },
            720: {
                perView: 3
            },
            480: {
                perView: 2
            }
        }
    });
    carousel.mount();
}


