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

                    <div id="container_input_style" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="conatiner_input_style"> STYLE: </label>
                            <br>
                            <button id="styleLinear" class=" button-1 selected" @@click="renderStyle($event)"
                                type="button">Linear</button>
                            <button id="styleRadial" class=" button-1" @@click="renderStyle($event)"
                                type="button">Radial</button>
                        </span>
                    </div>
                    <div id="container_input_direction" class=" py-1 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_direction"> DIRECTION:</label>
                            <br>
                            <div id="container_input_direction_upper" class="   min-w-min">
                                <button id="top" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Top</button>
                                <button id="topRight" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Top right</button>
                                <button id="right" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Right</button>
                                <button id="bottomRight" class=" button-1 m-1 " @@click="renderDir($event)"
                                    type="button">Bottom right</button>
                                <button id="center" class="button-1 m-1" @@click="renderDir($event)"
                                    type="button" style="display: none">Center</button>
                            </div>
                            <div id="container_input_direction_lower" class="  ">
                                <button id="bottom" class=" button-1 m-1 selected" @@click="renderDir($event)"
                                    type="button">Bottom</button>
                                <button id="bottomLeft" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Bottom left</button>
                                <button id="left" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Left</button>
                                <button id="topLeft" class=" button-1 m-1" @@click="renderDir($event)"
                                    type="button">Top Left</button>
                            </div>
                        </span>
                    </div>
                    <div id="container_input_colors" class=" py-4 flex flex-col min-h-min min-w-min">
                        <span class=" buttons font-sans font-medium text-slate-100">
                            <label for="container_input_colors">COLORS:</label>
                            <br>
                            <div id="container_input_colors_upper" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_upper_color" type="color" name="colorUpper"
                                    @@change="myColor1($event)" value="#00fbff" />
                                <input id="container_input_colors_upper_text" type="text" name="colorUpperText" value="#05f1f5"
                                    class="button-2" ref="color1" />
                            </div>
                            <div id="container_input_colors_lower" class="flex flex-row min-h-min min-w-min">
                                <input id="container_input_colors_lower_color" type="color" name="colorLower"
                                    @@change="myColor2($event)" value="#e1ffe0" />
                                <input id="container_input_colors_lower_text" type="text" name="colorLowerText" value="#e2fee1"
                                    class="button-2" ref="color2" />
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
                <div id="conatiner_right"
                    class=" relative h-3/4 w-7/12 float-right bg-neutral-800 flex flex-col min-h-min min-w-min ">
                    <div id='container_righ_screen flex flex-col min-h-min min-w-min'
                        class="rounded relative float-right mx-1 h-2/3 w-11/12" ref="screen"
                        style="background-image: linear-gradient(to bottom,#05f1f5,#e2fee1)">
                    </div>
                    <div id="conatainer_righ_output"
                        class=" bg-neutral-800 relative float-right mx-1 h-2/3 w-11/12 flex flex-col min-h-min min-w-min">
                        <input id="container_right_output_input" type="text" value="background-image: linear-gradient(to bottom,#05f1f5,#e2fee1)"
                            class=" rounded w-full h-1/5 my-3 relative p-3 buttons font-sans font-medium text-slate-100 bg-transparent border-2 border-slate-100"
                            name="title" ref="code" />
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('js/app.js') }}">


    </script>
</body>

</html>
