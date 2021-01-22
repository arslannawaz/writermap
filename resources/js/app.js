require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import svgSpriteLoader from './helpers/svg-sprite-loader';
import VueHtmlToPaper from "vue-html-to-paper/src";
import vClickOutside from 'v-click-outside'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import {loadStripe} from '@stripe/stripe-js';

// import VueProgressBar from 'vue-progressbar'

// const __svg__ = { path: './../images/icons/*.svg', name: 'assets/images/[hash].sprite.svg' };
// svgSpriteLoader(__svg__.filename);

const truncateFilter = function(text, length, clamp){
    clamp = clamp || '...';
    var node = document.createElement('div');
    node.innerHTML = text;
    var content = node.textContent;
    return content.length > length ? content.slice(0, length) + clamp : content;
};

Vue.filter('truncate', truncateFilter);

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(vClickOutside);
Vue.use(VueSweetalert2);

import VueMask from 'v-mask'
Vue.use(VueMask);

import { VueMaskDirective } from 'v-mask'
Vue.directive('mask', VueMaskDirective);

// Vue.use(VueProgressBar, {
//     color: 'rgb(255,233,143)',
//     failedColor: 'red',
//     height: '2px'
// })

const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://unpkg.com/kidlat-css/css/kidlat.css'
    ]
}
Vue.use(VueHtmlToPaper);

Vue.config.errorHandler = err => {
    console.log('Exception: ', err)
}

Vue.mixin({
    methods: {
        removeTypeHere: function (event) {
            console.log('TYPE HERE', event);
            if (event.target.innerText === 'Type here...') {
                event.target.innerText = '';
            }
        }
    }
})

// Vue.prototype.$stripe = await loadStripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
