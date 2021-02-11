/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import Home from './Home/Home.vue';
import Detail from './Home/Detail.vue';


window.eventBus = new Vue({});

const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/video/:id', component: Detail, name: 'video' }
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
