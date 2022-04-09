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
    <div id="app" class=" ">
        <div id="container" class=" bg-neutral-800  m-0 absolute  w-full h-full">
            <div id="container_title" class=" p-8  relative flex flex-col min-h-min min-w-min">

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
                        <a id="styleLinear" class=" button-1">Linear</a>
                        <a id="styleRadial" class=" button-1">Radial</a>
                    </span>
                </div>
                <div id="container_input_direction" class=" py-1 flex flex-col min-h-min min-w-min">
                    <span class=" buttons font-sans font-medium text-slate-100">
                        <label for="container_input_direction"> DIRECTION:</label>
                        <br>
                        <div id="container_input_direction_upper" class="   min-w-min">
                            <a id="top" class=" button-1 m-1">Top</a>
                            <a id="topRight" class=" button-1 m-1">Top right</a>
                            <a id="right" class=" button-1 m-1">Right</a>
                            <a id="bottomRight" class=" button-1 m-1">Bottom right</a>
                        </div>
                        <div id="container_input_direction_lower" class="  ">
                            <a id="bottom" class=" button-1 m-1">Bottom</a>
                            <a id="topLeft" class=" button-1 m-1">Bottom left</a>
                            <a id="left" class=" button-1 m-1">Left</a>
                            <a id="topLeft" class=" button-1 m-1">Top Left</a>
                        </div>
                    </span>
                </div>
                <div id="container_input_colors" class=" py-4 flex flex-col min-h-min min-w-min">
                    <span class=" buttons font-sans font-medium text-slate-100">
                        <label for="container_input_colors">COLORS:</label>
                        <br>
                        <div id="container_input_colors_upper" class="flex flex-row min-h-min min-w-min">
                            <input id="container_input_colors_upper_color" type="color" name="colorUpper" @@change="myColor1($event)" :value="color1v" />
                            <input id="container_input_colors_upper_text" type="text" name="colorUpperText" value="" class="button-2" ref="color1"/>
                        </div>
                        <div id="container_input_colors_lower" class="flex flex-row min-h-min min-w-min">
                            <input id="container_input_colors_lower_color" type="color" name="colorLower" @@change="myColor2($event)" :value="color2v" />
                            <input id="container_input_colors_lower_text" type="text" name="colorLowerText" value="" class="button-2" ref="color2"/>
                        </div>
                    </span>
                </div>
                <div id="container_input_format" class=" py-4 flex flex-col min-h-min min-w-min">
                    <span class=" buttons font-sans font-medium text-slate-100">
                        <label for="container_input_format">COLOR FORMAT:</label>
                        <br>
                        <a id="hex" class=" button-1" @@click="rgbToHex" >Hex</a>
                        <a id="rgb" class=" button-1" @@click="hexToRgb" >Rgb</a>
                    </span>
                </div>
            </div>
            <div id="conatiner_right"
                class=" relative h-3/4 w-7/12 float-right bg-neutral-800 flex flex-col min-h-min min-w-min ">
                <div id='container_righ_screen flex flex-col min-h-min min-w-min'
                    class=" bg-blue-800 rounded relative float-right mx-1 h-2/3 w-11/12">
                </div>
                <div id="conatainer_righ_output"
                    class=" bg-neutral-800 relative float-right mx-1 h-2/3 w-11/12 flex flex-col min-h-min min-w-min">
                    <!--input id="container_right_outpu_input" type="text" value="@{{ code }}"
                        class=" rounded w-full h-1/5 my-3 relative p-3 buttons font-sans font-medium text-slate-100 bg-transparent border-2 border-slate-100" /-->
                    <input id="container_right_output_input" type="text" :value="container_right_output_input"
                        class=" rounded w-full h-1/5 my-3 relative p-3 buttons font-sans font-medium text-slate-100 bg-transparent border-2 border-slate-100" ref="code"/>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}">
    

    </script>
</body>

</html>
