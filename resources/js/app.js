/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


const { method, split } = require('lodash');


// require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.prototype.$style;
Vue.prototype.$direction;
Vue.prototype.$syntax;
Vue.prototype.$color1;
Vue.prototype.$color2;

new Vue({
el: '#app',
data: {
    message: 'Test'
},

methods: {
    addEvents1(e) {
        input = document.getElementById("container_input_colors_upper");
        text = document.getElementById("container_input_colors_upper_text");
        input.addEventListener("input", function() {
            input.value = e.target.value;
            text.value = e.target.value;
            Vue.prototype.$color1 = e.target.value;
            this.$refs.color1.value = e.target.value;
            this.renderCode();
        }.bind(this), false);

    },
    addEvents2(e) {
        input = document.getElementById("container_input_colors_lower");
        text = document.getElementById("container_input_colors_lower_text");
        screen = document.getElementById("container_righ_screen");
        input.addEventListener("input", function() {
            input.value = e.target.value;
            text.value = e.target.value;
            Vue.prototype.$color2 = e.target.value;
            this.$refs.color2.value = e.target.value;
            this.renderCode();
        }.bind(this), false);
    },
    hexToRgb() {

        $("#hex").removeClass("selected");
        $("#rgb").removeClass("selected");
        $("#rgb").addClass("selected");

        if (this.$refs.color1.value[0] !== '#' && this.$refs.color2.value[0] !== '#') {
            return;
        } else if (this.$refs.color1.value[0] == '#' && this.$refs.color2.value[0] !== '#') {
            this.$refs.color1.value = (['0x' + this.$refs.color1.value[1] + this.$refs.color1.value[2] | 0, '0x' + this.$refs.color1.value[3] + this.$refs.color1.value[4] | 0, '0x' + this.$refs.color1.value[5] + this.$refs.color1.value[6] | 0]);
        } else if (this.$refs.color1.value[0] !== '#' && this.$refs.color2.value[0] == '#') {
            this.$refs.color2.value = (['0x' + this.$refs.color2.value[1] + this.$refs.color2.value[2] | 0, '0x' + this.$refs.color2.value[3] + this.$refs.color2.value[4] | 0, '0x' + this.$refs.color2.value[5] + this.$refs.color2.value[6] | 0]);
        } else {
            this.$refs.color1.value = (['0x' + this.$refs.color1.value[1] + this.$refs.color1.value[2] | 0, '0x' + this.$refs.color1.value[3] + this.$refs.color1.value[4] | 0, '0x' + this.$refs.color1.value[5] + this.$refs.color1.value[6] | 0]);
            this.$refs.color2.value = (['0x' + this.$refs.color2.value[1] + this.$refs.color2.value[2] | 0, '0x' + this.$refs.color2.value[3] + this.$refs.color2.value[4] | 0, '0x' + this.$refs.color2.value[5] + this.$refs.color2.value[6] | 0]);
        }
        Vue.prototype.$color1 = "rgb(" + this.$refs.color1.value + ")";
        Vue.prototype.$color2 = "rgb(" + this.$refs.color2.value + ")";
        this.renderCode();
    },
    rgbToHex() {

        $("#hex").removeClass("selected");
        $("#rgb").removeClass("selected");
        $("#hex").addClass("selected");

        if (this.$refs.color1.value[0] == '#' && this.$refs.color2.value[0] == '#') {
            return;
        } else if (this.$refs.color1.value[0] !== '#' && this.$refs.color2.value[0] == '#') {
            colors1 = this.$refs.color1.value.split(",");
            red1 = colors1[0];
            green1 = colors1[1];
            blue1 = colors1[2];
            const rgb1 = (red1 << 16) | (green1 << 8) | (blue1 << 0);
            this.$refs.color1.value = '#' + (0x1000000 + rgb1).toString(16).slice(1);
        } else if (this.$refs.color1.value[0] == '#' && this.$refs.color2.value[0] !== '#') {
            colors2 = this.$refs.color2.value.split(",");
            red2 = colors2[0];
            green2 = colors2[1];
            blue2 = colors2[2];
            const rgb2 = (red2 << 16) | (green2 << 8) | (blue2 << 0);
            this.$refs.color2.value = '#' + (0x1000000 + rgb2).toString(16).slice(1);
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
        Vue.prototype.$color1 = this.$refs.color1.value;
        Vue.prototype.$color2 = this.$refs.color2.value;
    },

    renderStyle(e) {
        $("#styleLinear").removeClass("selected");
        $("#styleRadial").removeClass("selected");

        switch (e.currentTarget.id) {
            case 'styleLinear':
                $("#styleLinear").addClass("selected");
                this.renderCode('styleLinear');
                break;
            case 'styleRadial':
                $("#styleRadial").addClass("selected");
                this.renderCode('styleRadial');
                break;
            default:
                break;
        }
    },
    renderDir(e) {
        $("#top").removeClass("selected");
        $("#topRight").removeClass("selected");
        $("#right").removeClass("selected");
        $("#bottomRight").removeClass("selected");
        $("#bottom").removeClass("selected");
        $("#bottomLeft").removeClass("selected");
        $("#left").removeClass("selected");
        $("#topLeft").removeClass("selected");
        $("#center").removeClass("selected");

        switch (e.currentTarget.id) {
            case 'top':
                $("#top").addClass("selected");
                this.renderCode('to top');
                break;
            case 'topRight':
                $("#topRight").addClass("selected");
                this.renderCode('to top right')
                break;
            case 'right':
                $("#right").addClass("selected");
                this.renderCode('to right')
                break;
            case 'bottomRight':
                $("#bottomRight").addClass("selected");
                this.renderCode('to bottom right')
                break;
            case 'bottom':
                $("#bottom").addClass("selected");
                this.renderCode('to bottom')
                break;
            case 'topLeft':
                $("#topLeft").addClass("selected");
                this.renderCode('to top left')
                break;
            case 'left':
                $("#left").addClass("selected");
                this.renderCode('to left')
                break;
            case 'bottomLeft':
                $("#bottomLeft").addClass("selected");
                this.renderCode('to bottom left')
                break;
            case 'center':
                $("#center").addClass("selected");
                this.renderCode('center')
                break;
            default:
                break;
        }
    },
    renderCode(parm) {

        if (typeof(this.$color1) === 'undefined') {
            Vue.prototype.$color1 = this.$refs.color1.value;
        }

        if (typeof(this.$color2) === 'undefined') {
            Vue.prototype.$color2 = this.$refs.color2.value;
        }

        if (typeof(this.$direction) === 'undefined') {
            direction = 'to top';
            Vue.prototype.$direction = direction
        }

        if ($("#styleLinear").hasClass("selected")) {
            style = 'linear-gradient'
            Vue.prototype.$style = style;
        }
        if (parm == 'styleRadial') {
            Vue.prototype.$style = 'radial-gradient';
        } else if (parm == 'styleLinear') {
            Vue.prototype.$style = 'linear-gradient';
        } else if (parm != null && this.$direction != 'empty') {
            Vue.prototype.$direction = parm;
        }

        if (Vue.prototype.$style == 'radial-gradient') {
            prefix = '-webkit-'
            switch (this.$direction) {
                case 'to top':
                    Vue.prototype.$direction = 'center top'
                    break;
                case 'to top right':
                    Vue.prototype.$direction = 'top right'
                    break;
                case 'to right':
                    Vue.prototype.$direction = 'right center'
                    break;
                case 'to bottom right':
                    Vue.prototype.$direction = 'bottom right'
                    break;
                case 'to bottom':
                    Vue.prototype.$direction = 'center bottom'
                    break;
                case 'to top left':
                    Vue.prototype.$direction = 'top left'
                    break;
                case 'to left':
                    Vue.prototype.$direction = 'left center'
                    break;
                case 'to bottom left':
                    Vue.prototype.$direction = 'bottom left'
                    break;
                case 'center':
                    Vue.prototype.$direction = 'center top';
                    prefix = '';
                    break;
                default:
                    break;
            }
        } else if (Vue.prototype.$style == 'linear-gradient') {
            switch (this.$direction) {
                case 'center top':
                    Vue.prototype.$direction = 'to top'
                    break;
                case 'top right':
                    Vue.prototype.$direction = 'to top right'
                    break;
                case 'right center':
                    Vue.prototype.$direction = 'to right'
                    break;
                case 'bottom right':
                    Vue.prototype.$direction = 'to bottom right'
                    break;
                case 'center bottom':
                    Vue.prototype.$direction = 'to bottom'
                    break;
                case 'top left':
                    Vue.prototype.$direction = 'to top left'
                    break;
                case 'left center':
                    Vue.prototype.$direction = 'to left'
                    break;
                case 'bottom left':
                    Vue.prototype.$direction = 'to bottom left'
                    break;
                default:
                    break;
            }
        }
        if (this.$style == 'radial-gradient' && prefix != '') {
            $("#center").css("display", "inline-block");
            syntax = "background-image: " + prefix + this.$style + '(' + this.$direction + ',' + this.$color1 + ',' + this.$color2 + ')';
        } else if (this.$style == 'radial-gradient' && prefix == '') {
            $("#center").css("display", "inline-block");
            syntax = "background-image: " + prefix + this.$style + '(' + this.$color1 + ',' + this.$color2 + ')';
        } else {
            $("#center").css("display", "none");
            Vue.prototype.$style == 'linear-gradient'
            syntax = "background-image: " + this.$style + '(' + this.$direction + ',' + this.$color1 + ',' + this.$color2 + ')';
        }

        this.$refs.screen.style = syntax;
        this.$refs.code.value = syntax;


    },
    showGradient(e) {
        this.$refs.screen.style = e.target.value;
        this.$refs.code.value = e.target.value;
    }
}


});
});