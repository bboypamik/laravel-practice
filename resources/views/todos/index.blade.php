@extends('todos/layout')

@section('content')
<div>
    <h1 class="my-4">All Todos</h1>
    <x-alert />
    <ul class="list-group ">
        @foreach($todos as $todo)

            <li class="list-group-item d-flex justify-content-between">

                <a class="btn btn-info" href="{{'/todos/'.$todo->id.'/edit'}}" >edit</a>

                <p>{{$todo->title}}</p>

                <button class="btn btn-danger btn-sm" >delete</button>

            </li>

        @endforeach
    </ul>

    <a href="/todos/create" class="btn btn-primary mt-4">Create New Todo</a>
</div>

@endsection

