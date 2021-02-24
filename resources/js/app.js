import Vue from "vue";

require('./bootstrap');
window.Vue = require('vue').default;

import App from './components/App'
import Navbar from './components/parts/Navbar'
import Notes from './components/parts/Notes'
import router from "./router"
Vue.component('navbar',Navbar)

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
