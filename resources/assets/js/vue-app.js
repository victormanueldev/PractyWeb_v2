import Vue from 'vue'
import VueRouter from 'vue-router';
import Home from './components/home.vue';
import VentasGlobales from './components/ventasGlobales.vue';
import VentasPorCaja from './components/ventasCaja.vue';
require('./bootstrap');

import { routes } from './routes.js';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
    el: '#app',
    router
  });