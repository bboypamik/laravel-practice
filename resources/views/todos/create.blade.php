@extends('todos/layout')


<div class="container text-center">
    <span class="d-flex justify-content-lg-center">
        <a href="{{route('todo.index')}}" class="btn btn-info my-5 mr-5"> <i class="fas fa-arrow-circle-left"></i></a>

        <h1  class="my-4">What next you need to-DO?</h1>

    </span>
    <x-alert />
    <form method="POST" class="form-group" action="{{route('todo.store')}}">
        @csrf
        <div>

            <label for="title">Title</label>
            <input class="form-control mb-4" type="text" name="title" placeholder="title" />
        </div>
        <div class="py-3 ">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="120" rows="5" placeholder="description"></textarea>
        </div>
        <div>
        <input class="btn btn-primary" type="submit" value="create" />
        </div>
    </form>
</div>



