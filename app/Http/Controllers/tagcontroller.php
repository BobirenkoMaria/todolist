<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Resources\tagresource;

class tagcontroller extends Controller
{
    public function show() {
        return tagresource::collection(tag::all());
    }

    public function add(Request $request) {
        $tag = new tag();
        $tag->name = $request->input('name');
        $tag->color_id = $request->input('color_id');
        $tag->save();

        return response()->json($tag, 201);
    }

    public function edit($id, Request $request)
    {
        $todo = tag::find($id);
        $todo->name = $request->input('name');
        $todo->tag_id = $request->input('color_id');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function delete($id)
    {
        tag::find($id)->delete();
        return response()->json("OK", 201);
    }
}
