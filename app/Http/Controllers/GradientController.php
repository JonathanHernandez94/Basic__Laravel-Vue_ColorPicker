<?php

namespace App\Http\Controllers;

use App\Models\Gradient;
use Illuminate\Http\Request;

class GradientController extends Controller
{
    public function show(Gradient $gradient)
    {
        $gradients = Gradient::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('gradients'));
    }

    public function store(Request $request)
    {   
        $title = $request->title;
        if (Gradient::all()->find($title) ) {
            return redirect('/')->withErrors(['errorMsg' => 'Gradient already exist:   '. $title ]);
        }
        if (strpos($title, " radial-gradient(") !== false) {
            $style = substr($title, strpos($title, ': ') + 2, strpos($title, '(') - strpos($title, ': ') - 2);
            $attrsU = substr($title, strpos($title, '(') + 1, strpos($title, ')') - strpos($title, ')') - 1);
            $attrsO = explode(',', $attrsU);
            $color1 = $attrsO[0];
            $color2 = $attrsO[1];
            $direction = null;
        } else {
            $style = substr($title, strpos($title, ': ') + 2, strpos($title, '(') - strpos($title, ': ') - 2);
            $attrsU = substr($title, strpos($title, '(') + 1, strpos($title, ')') - strpos($title, ')') - 1);
            $attrsO = explode(',', $attrsU);
            $color1 = $attrsO[1];
            $color2 = $attrsO[2];
            $direction = $attrsO[0];
        }

        $gradient = Gradient::firstOrCreate([
            'title' => $title,
            'style' => $style,
            'color1' => $color1,
            'color2' => $color2,
            'direction' => $direction
        ]);

        return redirect('/');
    }
}
