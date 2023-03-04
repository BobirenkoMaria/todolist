<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\todoresource;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class apicontroller extends Controller
{
    public function show(Todo $todo)
    {
        return todoresource::collection(Todo::all());
    }

    public function edit($id, Request $request)
    {
        $todo = Todo::find($id);
        $todo->name = $request->input('name');
        $todo->tag_id = $request->input('tag_id');
        $todo->time = $request->input('deadline');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function change_status($id, Request $request) {
        $todo = Todo::find($id);
        $todo->status = $request->input('status');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
        return response()->json("OK", 201);
    }

    public function add(Request $request) {
        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->status = 0;
        $todo->tag_id = $request->input('tag_id');
        $todo->deadline = $request->input('deadline');
        $todo->save();

        return response()->json($todo, 201);
    }
}
