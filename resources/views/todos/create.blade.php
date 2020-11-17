@extends('todos/layout')


<div class="container text-center">
    <h1  class="my-4">What next you need to-DO?</h1> <span></span>
    <x-alert />
    <form method="POST" class="form-group" action="/todos/create">
        @csrf
        <label for="title">Text</label>
        <input class="form-control mb-4" type="text" name="title" />
        <input class="btn btn-primary" type="submit" value="create" />
    </form>

    <a href="/todos" class="btn btn-info my-5"> <- back</a>
</div>



