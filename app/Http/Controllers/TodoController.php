<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){
        $todos = auth()->user()->todos()->orderBy('completed')->latest()->get();
        return view('todos.index', compact('todos'));
    }

    public function create(){
        return view('todos.create');

    }

    public function store(TodoCreateRequest $request) {
        $todoId = auth()->id();

        $request['user_id'] = $todoId;

        Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'New Todo created successfully.');
    }

    public function edit(Todo $todo){

        return view('todos.edit', compact('todo'));

    }

    public function update(TodoCreateRequest $request, Todo $todo){

        $todo->update(['title' => $request->title]);
        return redirect('todo')->with('message', 'Updated!');

    }

    public function destroy(Todo $todo){
        $todo->delete();
        return auth()->user()->todos()->orderBy('completed')->latest()->get();
    }

    public function complete( Todo $todo) {

        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return auth()->user()->todos()->orderBy('completed')->latest()->get();
        }else{
            $todo->update(['completed' => true]);
            return auth()->user()->todos()->orderBy('completed')->latest()->get();

        }
    }


}
