import 'vuetify/dist/vuetify.min.css';
import 'element-ui/lib/theme-chalk/index.css';

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VTooltip from 'v-tooltip';
import ElementUI from 'element-ui';

import {routes} from './routes';
import App from './components/App';

Vue.use(VTooltip);
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(ElementUI);

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY')
    }
});

import wysiwyg from "vue-wysiwyg";
Vue.use(wysiwyg, { maxHeight: "800px", });
import "vue-wysiwyg/dist/vueWysiwyg.css"

const router = new VueRouter({
    routes,
    linkActiveClass: 'active',
    forcePlainTextOnPaste: false
});

// Globals
window.axios = require('axios');
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            currentPage: router.currentRoute.meta.name,
        };
    },
    render: (h) => h(App),
    created(){
        window.Localize.hidePreloader();

        this.$on('get-page', () => {
            this.$emit('change-page', this.currentPage)
        });
    }
});

router.beforeEach((to, from, next) => {
    setTimeout(() => {
        app.$emit('change-page', to.meta.name);
    });
    next();
});


