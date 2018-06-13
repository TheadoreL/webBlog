
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes.js'
import http from './data.js'

Vue.use(VueRouter)
Vue.prototype.$http = http

window._ = require('lodash');
window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

Vue.component('index', require('./components/index.vue'))

const router = new VueRouter({
  routes: routes(Vue)
})

const app = new Vue({
	router,
    el: '#app'
})
