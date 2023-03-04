<?php

namespace App\Http\Controllers;

use App\Http\Resources\todoresource;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo): View
    {
        $show = new Todo();
        return view('home', ['todos' => $show->all()]);
    }

    public function show_api(Todo $todo)
    {
        return todoresource::collection(Todo::all());
    }

    public function change_status($id, Request $request) {
        $todo = Todo::find($id);
        $todo->status = $request->input('status');
        $todo->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        return view('edit_todo', ['todo' => $request, "name" => $request->name]);
    }

    public function edit_check($id, Request $request)
    {
        $todo = Todo::find($id);
        $todo->name = $request->input('name');
        $todo->save();

        return to_route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        //
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
        return to_route('home');
    }


    public function add(Request $request) {
        $validation = $request->validate([
            'name' => 'required'
        ]);

        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->status = 0;
        $todo->tag_id = $request->input('tag_id');
        $todo->deadline = $request->input('deadline');
        $todo->save();
        
        return to_route('home');
    }
}
