<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\colorresource;
use App\Models\color;

class colorcontroller extends Controller
{
    public function show() {
        return colorresource::collection(color::all());
    }

    public function add(Request $request) {
        $tag = new color();
        $tag->color_num = $request->input('color_num');
        $tag->save();

        return response()->json($tag, 201);
    }

    public function edit($id, Request $request)
    {
        $todo = color::find($id);
        $todo->color_num = $request->input('color_num');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function delete($id)
    {
        color::find($id)->delete();
        return response()->json("OK", 201);
    }
}
