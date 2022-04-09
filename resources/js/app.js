/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { method } = require('lodash');

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        container_right_output_input: 'Hi EEUU'
    },
    methods: {
        myColor1(e) {
            this.$refs.color1.value = e.target.value;
        },
        myColor2(e) {
            this.$refs.color2.value = e.target.value;
        }
    }


});
