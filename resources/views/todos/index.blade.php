@extends('todos/layout')

@section('content')
    <div class="w-50 mx-auto">
        <div class="d-flex justify-content-around mt-5" style="background-color: #cccccc; border-radius: 5px">
            <h1 class="my-5 font-weight-bold">TODOS</h1>
            <a href="{{route('todo.create')}}" class=" my-5"><i class="fas fa-plus-circle fa-3x"
                                                                style="color:#4682B4"></i></a>
        </div>
        <div id="session-message">
            <x-alert/>

        </div>

        @if($todos->count() > 0)
        <todo-list :todos="{{$todos}}"></todo-list>
            @else
        <p class="mt-3 font-weight-bold">No tasks, create one</p>

            @endif
    </div>
@endsection

<script>

    setTimeout(function () {
        $('#session-message').remove();
    }, 3000);
</script>

