require('./bootstrap');

import 'alpinejs';

import Glide from '@glidejs/glide';

let glide = new Glide('.glide', {
    type: 'carousel',
    hoverpause: true,
    autoplay: 4000,
    perView: 1
});
glide.mount();