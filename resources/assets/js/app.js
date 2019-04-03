
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');
// Vue.use(require('vue-resource'));

Vue.component('profile', require('./components/Profile.vue'), {
  data: {
    profile: {}
  }
});

Vue.component('social-tools', require('./components/SocialTools.vue'));
Vue.component('spell-checker', require('./components/SpellChecker.vue'));

const app = new Vue({
    el: '#app',
    // data: {

    // }
});