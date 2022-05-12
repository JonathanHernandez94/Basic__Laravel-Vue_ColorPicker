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
                                @@click="renderShapeLinear(), isCenterButtonVisible=false" type="button">Linear</button>
                            <button id="styleRadial" :class="{ 'selected': isSelectedRadial }" class="button-1"
                                @@click="renderShapeRadial(); isCenterButtonVisible=true" type="button">Radial</button>
                        </span>
                    </div>
                    <div id="container_input_direction" class=" py-1 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_direction"> DIRECTION:</label>
                            <br>
                            <div id="container_input_direction" class="min-w-min">
                                <buttons-dir></buttons-dir>
                            </div>
                        </span>
                    </div>
                    <div id="container_input_colors" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_colors">COLORS:</label>
                            <br>
                            <div id="container_input_colors_upper" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_upper_color" type="color" name="colorUpper"
                                    v-model="color1" />
                                <input id="container_input_colors_upper_text" type="text" readonly="readonly"
                                    name="colorUpperText" :value="color1" class="button-2" />
                            </div>
                            <div id="container_input_colors_lower" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_lower_color" type="color" name="colorLower"
                                    v-model="color2" />
                                <input id="container_input_colors_lower_text" type="text" readonly="readonly"
                                    name="colorLowerText" :value="color2" class="button-2" />
                            </div>
                        </span>
                    </div>
                    <div id="container_input_format" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_format">COLOR FORMAT:</label>
                            <br>
                            <button id="hex" :class="{ 'selected': isSelectedHex }" class=" button-1"
                                @@click="rgbToHex" type="button">Hex</button>
                            <button id="rgb" :class="{ 'selected': isSelectedRGB }" class=" button-1"
                                @@click="hexToRgb" type="button">Rgb</button>
                        </span>
                    </div>
                </div>
                <div id="container_right"
                    class=" relative h-3/4 w-7/12 float-right bg-neutral-800 flex flex-col min-h-min min-w-min ">
                    <div id="container_righ_screen" class="rounded relative float-right mx-1 h-2/3 w-11/12"
                        :style="renderedStyle">
                    </div>
                    <div id="container_right_output"
                        class=" bg-neutral-800 relative float-right mx-1 h-1/3 w-11/12 flex flex-col min-h-min min-w-min">
                        <input id="container_right_output_input" type="text" readonly="readonly" v-model="codeShowed"
                            class=" rounded w-full h-1/5 my-3 relative p-3 buttons font-sans font-medium text-slate-100 bg-transparent border-2 border-slate-100"
                            name="title" />
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
        Vue.component('buttons-dir', {
            template: `<div>
            <button-dir v-for="dir in dirs" @@buttonPressed.once="checkButtons">@{{ dir.name }}</button-dir>
            <button-dir-center @@buttonPressed="checkButtons">@{{ center.name }}</button-dir-center>
            </div>
            `,
            methods: {
                renderDir(dir) {
                    if (dir._uid == 10) {
                        app.dir = 'center';
                    }
                    this.dirs.forEach(element => {
                        if (dir._uid == element.id) {
                            app.dir = element.value;
                        }
                    });
                },
                checkButtons(dir) {
                    dir.$parent.$children.forEach(element => {
                        (element._uid == dir._uid) ? dir.Pressed = true: element.isPressed = false;
                        this.renderDir(dir);
                    });
                }
            },
            data() {
                return {
                    center: {
                        id: 10,
                        name: 'Center',
                    },
                    dirs: [{
                            id: 2,
                            name: 'Top',
                            value: 'center top',
                        },
                        {
                            id: 3,
                            name: 'Top Right',
                            value: 'top right',

                        },
                        {
                            id: 4,
                            name: 'Right',
                            value: 'right center',

                        },
                        {
                            id: 5,
                            name: 'Bottom Right',
                            value: 'bottom right',

                        },
                        {
                            id: 6,
                            name: 'Bottom',
                            value: 'center bottom',

                        },
                        {
                            id: 7,
                            name: 'Bottom Left',
                            value: 'bottom left',

                        },
                        {
                            id: 8,
                            name: 'Left',
                            value: 'left center',

                        },
                        {
                            id: 9,
                            name: 'Top left',
                            value: 'top left',

                        },
                    ]
                };
            }
        });
        Vue.component('button-dir', {
            template: ` 
            <button :class="{selected:isPressed}" class=" button-1 m-1" @@click="isPressed=true;wasPressed()" 
                                    type="button"><slot></slot></button>
            `,
            methods: {
                wasPressed() {
                    this.$emit('buttonPressed', this);
                }
            },
            data() {
                return {
                    isPressed: false
                }
            }
        });
        Vue.component('button-dir-center', {
            template: `
            <button id="center" :class="{selected:isPressed}" class="button-1 m-1" @@click="isPressed=true;wasPressed()" type="button"
                                    v-show='isCenterButtonVisible'><slot></slot></button>
            `,
            methods: {
                wasPressed() {
                    this.$emit('buttonPressed', this);
                }
            },
            data() {
                return {
                    isPressed: false,
                    isCenterButtonVisible: ''
                }
            },
            computed: {
                checkCenterButtonVisible() {
                    this.isCenterButtonVisible = app.isCenterButtonVisible;
                }
            }
        });
        var app = new Vue({
            el: '#app',
            data: {
                isCenterButtonVisible: false,
                isCenterButtonSelected: false,
                isSelectedRadial: false,
                isSelectedLinear: false,
                isSelectedHex: false,
                isSelectedRGB: false,
                prefix: '',
                shape: 'linear-gradient',
                dir: 'to bottom',
                color1: '#00fbff',
                color2: '#e1ffe0',
                codeShowed: ''
            },
            computed: {
                renderedStyle(defaultCode = null) {
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
                            case 'at center center':
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
                    code = 'background-image: ' + this.prefix + this.shape + '(' + this.dir + ',' + this.color1 +
                        ',' + this.color2 + ')';
                    this.codeShowed = code;
                    // return (typeof defaultCode !== null) ? defaultCode : code;
                    return code;
                }
            },
            methods: {
                hexToRgb() {
                    // this.isSelectedHex = false;
                    // this.isSelectedRGB = true;
                    if (this.color1[0] !== '#' && this.color2[0] !== '#') {
                        return;
                    } else if (this.color1[0] == '#' && this.color2[0] !== '#') {
                        this.color1 = (['0x' + this.color1[1] + this.color1[2] |
                            0, '0x' + this.color1[3] + this.color1[4] | 0, '0x' +
                            this.color1[5] + this.color1[6] | 0
                        ]);
                    } else if (this.color1[0] !== '#' && this.color2[0] == '#') {
                        this.color2 = (['0x' + this.color2[1] + this.color2[2] |
                            0, '0x' + this.color2[3] + this.color2[4] | 0, '0x' +
                            this.color2[5] + this.color2[6] | 0
                        ]);
                    } else {
                        this.color1 = (['0x' + this.color1[1] + this.color1[2] |
                            0, '0x' + this.color1[3] + this.color1[4] | 0, '0x' +
                            this.color1[5] + this.color1[6] | 0
                        ]);
                        this.color2 = (['0x' + this.color2[1] + this.color2[2] |
                            0, '0x' + this.color2[3] + this.color2[4] | 0, '0x' +
                            this.color2[5] + this.color2[6] | 0
                        ]);
                    }
                    // this.$color1 = "rgb(" + this.color1 + ")";
                    // this.$color2 = "rgb(" + this.color2 + ")";
                },
                rgbToHex() {
                    // this.isSelectedHex = true;
                    // this.isSelectedRGB = false;
                    if (this.color1[0] == '#' && this.color2[0] == '#') {
                        return;
                    } else if (this.color1[0] !== '#' && this.color2[0] == '#') {
                        colors1 = this.color1.split(",");
                        red1 = colors1[0];
                        green1 = colors1[1];
                        blue1 = colors1[2];
                        const rgb1 = (red1 << 16) | (green1 << 8) | (blue1 << 0);
                        this.color1 = '#' + (0x1000000 + rgb1).toString(16).slice(1);
                    } else if (this.color1[0] == '#' && this.color2[0] !== '#') {
                        colors2 = this.color2.split(",");
                        red2 = colors2[0];
                        green2 = colors2[1];
                        blue2 = colors2[2];
                        const rgb2 = (red2 << 16) | (green2 << 8) | (blue2 << 0);
                        this.color2 = '#' + (0x1000000 + rgb2).toString(16).slice(1);
                    } else {
                        colors1 = this.color1.split(",");
                        red1 = colors1[0];
                        green1 = colors1[1];
                        blue1 = colors1[2];
                        const rgb1 = (red1 << 16) | (green1 << 8) | (blue1 << 0);
                        this.color1 = '#' + (0x1000000 + rgb1).toString(16).slice(1);

                        colors2 = this.color2.split(",");
                        red2 = colors2[0];
                        green2 = colors2[1];
                        blue2 = colors2[2];
                        const rgb2 = (red2 << 16) | (green2 << 8) | (blue2 << 0);
                        this.color2 = '#' + (0x1000000 + rgb2).toString(16).slice(1);
                    }
                    Vue.prototype.$color1 = this.color1;
                    Vue.prototype.$color2 = this.color2;
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
                showGradient(e) {
                    this.$refs.screen.style = e.target.value;
                    this.codeShowed = e.target.value;
                }
            }
        });
    </script>
</body>

</html>
