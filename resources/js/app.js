require('./bootstrap');

import 'alpinejs';

import Glide from '@glidejs/glide';

let glide = new Glide('.glide', {
    type: 'carousel',
    hoverpause: true,
    autoplay: 2000,
    perView: 2
});
glide.mount();