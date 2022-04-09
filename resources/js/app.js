/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { method, split } = require('lodash');

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
        },
        hexToRgb() {
            if (this.$refs.color1.value[0] !== '#' || this.$refs.color2.value[0] !== '#') {
                return;
            } else {
                this.$refs.color1.value = (['0x' + this.$refs.color1.value[1] + this.$refs.color1.value[2] | 0, '0x' + this.$refs.color1.value[3] + this.$refs.color1.value[4] | 0, '0x' + this.$refs.color1.value[5] + this.$refs.color1.value[6] | 0]);
                this.$refs.color2.value = (['0x' + this.$refs.color2.value[1] + this.$refs.color2.value[2] | 0, '0x' + this.$refs.color2.value[3] + this.$refs.color2.value[4] | 0, '0x' + this.$refs.color2.value[5] + this.$refs.color2.value[6] | 0]);
            }
        },
        rgbToHex() {
            if (this.$refs.color1.value[0] == '#' || this.$refs.color2.value[0] == '#') {
                return;
            } else {
                colors1 = this.$refs.color1.value.split(",");
                red1 = colors1[0];
                green1 = colors1[1];
                blue1 = colors1[2];
                const rgb1 = (red1 << 16) | (green1 << 8) | (blue1 << 0);
                this.$refs.color1.value = '#' + (0x1000000 + rgb1).toString(16).slice(1);

                colors2 = this.$refs.color2.value.split(",");
                red2 = colors2[0];
                green2 = colors2[1];
                blue2 = colors2[2];
                const rgb2 = (red2 << 16) | (green2 << 8) | (blue2 << 0);
                this.$refs.color2.value = '#' + (0x1000000 + rgb2).toString(16).slice(1);
            }
        }
    }


});
