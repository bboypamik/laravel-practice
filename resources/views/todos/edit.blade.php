@extends('todos.layout')

@section('content')
    <div>
        <h1  class="my-4">Update your Todo</h1> <span></span>
        <x-alert />
        <form method="POST" class="form-group" action="{{route('todo.update', $todo->id)}}">
            @csrf
            @method('patch')
            <label for="title">Text</label>
            <input class="form-control mb-4" type="text" name="title" value="{{$todo->title}}" />
            <input class="btn btn-primary" type="submit" value="Update" />
        </form>

        <a href="{{route('todo.index')}}" class="btn btn-info my-5"> <- back</a>
    </div>

@endsection
