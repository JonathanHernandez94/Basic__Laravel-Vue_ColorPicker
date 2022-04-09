<?php

namespace App\Http\Controllers;

use App\Models\Gradient;
use Illuminate\Http\Request;

class GradientController extends Controller
{
    public function show(Gradient $gradient)
    {
        return view('home', compact('product'));
    }

    public function store(Request $request)
    {
        $gradient = Gradient::firstOrCreate([
            'id' => $request->id,
            'style' => $request->style,
            'color1' => $request->color1,
            'color2' => $request->color2,
            'format' => $request->format,
            'direction' => $request->direction
        ]);
    }
}
