@extends('todos.layout')

@section('content')
    <div>
        <h1  class="my-4">Update your Todo</h1> <span></span>
        <x-alert />
        <form method="POST" class="form-group" action="{{route('todo.update', $todo->id)}}">
            @csrf
            @method('patch')
            <div>

                <label for="title">Text</label>
                <input class="form-control mb-4" type="text" name="title" value="{{$todo->title}}" />
            </div>
            <div class="py-3 ">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="120" rows="5" placeholder="description">{{$todo->description}}</textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Update" />
            </div>
        </form>

        <a href="{{route('todo.index')}}" class="btn btn-info my-5"> <- back</a>
    </div>

@endsection
