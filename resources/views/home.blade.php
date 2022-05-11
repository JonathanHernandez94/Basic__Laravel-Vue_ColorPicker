<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Gradient Party</title>
</head>

<body class=" bg-neutral-800 ">
    <form method="POST" action="{{ route('gradient.store') }}">
        @csrf
        <div id="app" class=" ">
            <div id="container" class=" bg-neutral-800  m-0 absolute  w-full h-full">
                <div id="container_title" class=" p-8 relative flex flex-col min-h-min min-w-min">

                    <h1 id="container_title_h1" class=" font-sans font-medium  text-slate-100 text-2xl">CSS
                        GRADIENT </h1>
                    <p id="container_title_p" class=" font-sans font-normal text-sm text-slate-400 font">Gradient
                        Generator for
                        Linear and Radial Css Color Gradients</p>

                </div>
                <div id="container_input"
                    class=" bg-neutral-800  w-5/12 h-3/4  p-8 float-left flex flex-col min-h-min min-w-min ">

                    <div id="container_input_shape" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="conatiner_input_style"> STYLE: </label>
                            <br>
                            <button id="styleLinear" :class="{ 'selected': isSelectedLinear }" class="button-1"
                                @@click="renderShapeLinear(), isCenterButtomVisible=false" type="button">Linear</button>
                            <button id="styleRadial" :class="{ 'selected': isSelectedRadial }" class="button-1"
                                @@click="renderShapeRadial(); isCenterButtomVisible=true" type="button">Radial</button>
                        </span>
                    </div>
                    <div id="container_input_direction" class=" py-1 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_direction"> DIRECTION:</label>
                            <br>
                            <div id="container_input_direction" class="   min-w-min">
                                <buttons-dir></buttons-dir>
                                <button id="center" class="button-1 m-1" @@click="renderDir($event)" type="button"
                                    v-show='isCenterButtomVisible'>Center</button>
                            </div>
                        </span>
                    </div>
                    <div id="container_input_colors" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_colors">COLORS:</label>
                            <br>
                            <div id="container_input_colors_upper" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_upper_color" type="color" name="colorUpper"
                                    @@mouseover="addEvents1($event)" value="#00fbff" />
                                <input id="container_input_colors_upper_text" type="text" readonly="readonly"
                                    name="colorUpperText" :value="color1" class="button-2" ref="color1" />
                            </div>
                            <div id="container_input_colors_lower" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_lower_color" type="color" name="colorLower"
                                    @@mouseover="addEvents2($event)" value="#e1ffe0" />
                                <input id="container_input_colors_lower_text" type="text" readonly="readonly"
                                    name="colorLowerText" :value="color2" class="button-2" ref="color2" />
                            </div>
                        </span>
                    </div>
                    <div id="container_input_format" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_format">COLOR FORMAT:</label>
                            <br>
                            <button id="hex" class=" button-1 selected" @@click="rgbToHex" type="button">Hex</button>
                            <button id="rgb" class=" button-1" @@click="hexToRgb" type="button">Rgb</button>
                        </span>
                    </div>
                </div>
                <div id="container_right"
                    class=" relative h-3/4 w-7/12 float-right bg-neutral-800 flex flex-col min-h-min min-w-min ">
                    <div id="container_righ_screen" class="rounded relative float-right mx-1 h-2/3 w-11/12" ref="screen"
                        :style="renderedStyle">
                    </div>
                    <div id="container_right_output"
                        class=" bg-neutral-800 relative float-right mx-1 h-1/3 w-11/12 flex flex-col min-h-min min-w-min">
                        <input id="container_right_output_input" type="text" readonly="readonly"
                            value="background-image: linear-gradient(to bottom,#05f1f5,#e2fee1)"
                            class=" rounded w-full h-1/5 my-3 relative p-3 buttons font-sans font-medium text-slate-100 bg-transparent border-2 border-slate-100"
                            name="title" ref="code" />
                    </div>
                    <div id="container_right_save"
                        class=" bg-neutral-800 relative float-right mx-1 h-1/3 w-11/12 flex flex-col min-h-min min-w-min">
                        <input type="submit" class=" button-3" value="SAVE" />
                        @if ($errors->any())
                            <h2 class="font-sans font-normal text-lg text-red-600">{{ $errors->first() }}</h2>
                        @endif
                    </div>
                    <div id="msg"
                        class="bg-neutral-800 relative float-right mx-1 h-1/12 w-11/12 flex flex-col min-h-min min-w-min">
                        <h2 class="font-sans font-normal text-sm text-slate-200 font">Saved Gradients :</h2>
                    </div>
                    <div id="container_right_show"
                        class=" bg-neutral-800 relative float-right mx-1 h-1/3 w-11/12 inline-flex min-h-min min-w-min">
                        @foreach ($gradients as $gradient)
                            <div class=" relative float-right m-1 p-2 h-4/12 w-4/12 inline-flex min-h-min min-w-min rounded"
                                style="{{ $gradient->title }}"><button id="show" type="button"
                                    class="relative float-right m-1 h-full w-full inline-flex "
                                    @@click="showGradient($event)" value="{{ $gradient->title }}"></button>
                            </div>
                        @endforeach
                    </div>
                    {{ $gradients->links() }}
                </div>
            </div>
        </div>
    </form>

    <script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------>
    <script>
        window.Event = new Vue();
        Vue.component('buttons-dir', {
            template: `<div>
            <button-dir :pressed="changePressed" v-for="dir in dirs" @@buttonPressed="clearButtons">@{{ dir.name }}</button-dir>
            </div>
            `,
            methods: {
                clearButtons(e) {
                    // console.log(this.dirs[0]);
                    this.dirs.forEach(dir => {
                        dir.changePressed = false;
                    });
                }
            },
            data() {
                return {
                    dirs: [{
                            name: 'Top',
                            value: 'top',
                            changePressed: '',
                        },
                        {
                            name: 'Top Right',
                            value: 'topRight',
                            changePressed: '',

                        },
                        {
                            name: 'Right',
                            value: 'right',
                            changePressed: '',

                        },
                        {
                            name: 'Bottom Right',
                            value: 'bottomRight',
                            changePressed: '',

                        },
                        {
                            name: 'Bottom',
                            value: 'bottom',
                            changePressed: '',

                        },
                        {
                            name: 'Bottom Left',
                            value: 'bottomLeft',
                            changePressed: '',

                        },
                        {
                            name: 'Left',
                            value: 'left',
                            changePressed: '',

                        },
                        {
                            name: 'Top left',
                            value: 'topLeft',
                            changePressed: '',

                        },
                    ]
                };
            }
        });
        Vue.component('button-dir', {
            props: ['pressed'],
            template: ` 
            <button :class="{selected:pressed}" class=" button-1 m-1" @@click="pressed=true;wasPressed()" 
                                    type="button"><slot></slot></button>
            `,
            methods: {
                wasPressed() {
                    this.$emit('buttonPressed', this.pressed);
                }
            },
            // data() {
            //     return {
            //         pressed: this.pressed
            //     }
            // }
        });
        var app = new Vue({
            el: '#app',
            data: {
                isCenterButtomVisible: '',
                isSelectedRadial: '',
                isSelectedLinear: '',
                prefix: '',
                shape: 'linear-gradient',
                dir: 'to bottom',
                color1: '#05f1f5',
                color2: '#e2fee1',

            },
            computed: {
                renderedStyle() {
                    //Convert from one shape to another on the fly
                    if (this.shape == 'radial-gradient') {
                        switch (this.dir) {
                            case 'to top':
                                this.dir = 'center top'
                                break;
                            case 'to top right':
                                this.dir = 'top right'
                                break;
                            case 'to right':
                                this.dir = 'right center'
                                break;
                            case 'to bottom right':
                                this.dir = 'bottom right'
                                break;
                            case 'to bottom':
                                this.dir = 'center bottom'
                                break;
                            case 'to top left':
                                this.dir = 'top left'
                                break;
                            case 'to left':
                                this.dir = 'left center'
                                break;
                            case 'to bottom left':
                                this.dir = 'bottom left'
                                break;
                            case 'center':
                                this.dir = 'center top';
                                prefix = '';
                                break;
                            default:
                                break;
                        }
                    } else {
                        switch (this.dir) {
                            case 'center top':
                                this.dir = 'to top'
                                break;
                            case 'top right':
                                this.dir = 'to top right'
                                break;
                            case 'right center':
                                this.dir = 'to right'
                                break;
                            case 'bottom right':
                                this.dir = 'to bottom right'
                                break;
                            case 'center bottom':
                                this.dir = 'to bottom'
                                break;
                            case 'top left':
                                this.dir = 'to top left'
                                break;
                            case 'left center':
                                this.dir = 'to left'
                                break;
                            case 'bottom left':
                                this.dir = 'to bottom left'
                                break;
                            default:
                                break;
                        }
                    }

                    //Final style
                    (this.shape == 'linear-gradient') ? this.prefix = '': this.prefix = '-webkit-';
                    return 'background-image: ' + this.prefix + this.shape + '(' + this.dir + ',' + this.color1 +
                        ',' + this.color2 + ')';
                }
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
                        this.$refs.color1.value = (['0x' + this.$refs.color1.value[1] + this.$refs.color1.value[2] |
                            0, '0x' + this.$refs.color1.value[3] + this.$refs.color1.value[4] | 0, '0x' +
                            this.$refs.color1.value[5] + this.$refs.color1.value[6] | 0
                        ]);
                    } else if (this.$refs.color1.value[0] !== '#' && this.$refs.color2.value[0] == '#') {
                        this.$refs.color2.value = (['0x' + this.$refs.color2.value[1] + this.$refs.color2.value[2] |
                            0, '0x' + this.$refs.color2.value[3] + this.$refs.color2.value[4] | 0, '0x' +
                            this.$refs.color2.value[5] + this.$refs.color2.value[6] | 0
                        ]);
                    } else {
                        this.$refs.color1.value = (['0x' + this.$refs.color1.value[1] + this.$refs.color1.value[2] |
                            0, '0x' + this.$refs.color1.value[3] + this.$refs.color1.value[4] | 0, '0x' +
                            this.$refs.color1.value[5] + this.$refs.color1.value[6] | 0
                        ]);
                        this.$refs.color2.value = (['0x' + this.$refs.color2.value[1] + this.$refs.color2.value[2] |
                            0, '0x' + this.$refs.color2.value[3] + this.$refs.color2.value[4] | 0, '0x' +
                            this.$refs.color2.value[5] + this.$refs.color2.value[6] | 0
                        ]);
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
                    this.renderCode();
                },
                renderShapeLinear() {
                    this.isSelectedLinear = true;
                    this.isSelectedRadial = false;
                    this.shape = 'linear-gradient';
                },
                renderShapeRadial() {
                    this.isSelectedRadial = true;
                    this.isSelectedLinear = false;
                    this.shape = 'radial-gradient';
                },
                renderDir(e) {
                    // $("#top").removeClass("selected");
                    // $("#topRight").removeClass("selected");
                    // $("#right").removeClass("selected");
                    // $("#bottomRight").removeClass("selected");
                    // $("#bottom").removeClass("selected");
                    // $("#bottomLeft").removeClass("selected");
                    // $("#left").removeClass("selected");
                    // $("#topLeft").removeClass("selected");
                    // $("#center").removeClass("selected");

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
                        this.dir = direction
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
                        this.dir = parm;
                    }

                    // if (Vue.prototype.$style == 'radial-gradient') {
                    //     prefix = '-webkit-'
                    //     switch (this.$direction) {
                    //         case 'to top':
                    //             this.dir = 'center top'
                    //             break;
                    //         case 'to top right':
                    //             this.dir = 'top right'
                    //             break;
                    //         case 'to right':
                    //             this.dir = 'right center'
                    //             break;
                    //         case 'to bottom right':
                    //             this.dir = 'bottom right'
                    //             break;
                    //         case 'to bottom':
                    //             this.dir = 'center bottom'
                    //             break;
                    //         case 'to top left':
                    //             this.dir = 'top left'
                    //             break;
                    //         case 'to left':
                    //             this.dir = 'left center'
                    //             break;
                    //         case 'to bottom left':
                    //             this.dir = 'bottom left'
                    //             break;
                    //         case 'center':
                    //             this.dir = 'center top';
                    //             prefix = '';
                    //             break;
                    //         default:
                    //             break;
                    //     }
                    // } else if (Vue.prototype.$style == 'linear-gradient') {
                    //     switch (this.$direction) {
                    //         case 'center top':
                    //             this.dir = 'to top'
                    //             break;
                    //         case 'top right':
                    //             this.dir = 'to top right'
                    //             break;
                    //         case 'right center':
                    //             this.dir = 'to right'
                    //             break;
                    //         case 'bottom right':
                    //             this.dir = 'to bottom right'
                    //             break;
                    //         case 'center bottom':
                    //             this.dir = 'to bottom'
                    //             break;
                    //         case 'top left':
                    //             this.dir = 'to top left'
                    //             break;
                    //         case 'left center':
                    //             this.dir = 'to left'
                    //             break;
                    //         case 'bottom left':
                    //             this.dir = 'to bottom left'
                    //             break;
                    //         default:
                    //             break;
                    //     }
                    // }
                    if (this.$style == 'radial-gradient' && prefix != '') {
                        $("#center").css("display", "inline-block");
                        syntax = "background-image: " + prefix + this.$style + '(' + this.$direction + ',' + this
                            .$color1 + ',' + this.$color2 + ')';
                    } else if (this.$style == 'radial-gradient' && prefix == '') {
                        $("#center").css("display", "inline-block");
                        syntax = "background-image: " + prefix + this.$style + '(' + this.$color1 + ',' + this
                            .$color2 + ')';
                    } else {
                        $("#center").css("display", "none");
                        Vue.prototype.$style == 'linear-gradient'
                        syntax = "background-image: " + this.$style + '(' + this.$direction + ',' + this.$color1 +
                            ',' + this.$color2 + ')';
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
    </script>
</body>

</html>
