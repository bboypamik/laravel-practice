<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){

        $todos = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create(){
        return view('todos.create');

    }

    public function store(TodoCreateRequest $request) {

        Todo::create($request->all());
        return redirect('todos')->with('message', 'New Todo created successfully.');
    }

    public function edit(Todo $todo){

        return view('todos.edit', compact('todo'));

    }

    public function update(TodoCreateRequest $request, Todo $todo){

        $todo->update(['title' => $request->title]);
        return redirect('todos')->with('message', 'Updated!');

    }

    public function complete( Todo $todo) {

            if ($todo->completed) {
                $todo->update(['completed' => false]);
            }else{
                $todo->update(['completed' => true]);
            }
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return $todo->latest()->get();
    }


}
