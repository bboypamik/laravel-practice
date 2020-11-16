<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index(){
        return view('todos.index');
    }

    public function create(){
        return view('todos.create');

    }

    public function store(TodoCreateRequest $request) {

        Todo::create($request->all());
        return redirect()->back()->with('message', 'New Todo created successfully.');
    }

    public function edit(){
        return view('todos.edit');

    }
}
