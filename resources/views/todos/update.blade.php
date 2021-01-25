@extends('layout.app')

@section('content')

    <div class="container">

        @if (session()->has('accept'))
            <div class="alert alert-success">
                {{ session()->get('accept') }}
            </div>
        @endif


        <div class="row">
            <div class="col-md-8" style="margin: auto">
                <form action="/todos/{{$todo->todosId}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Todo Title</label>
                        <input name="todoTitle" value="{{$todo->title}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Todo description</label>
                        <textarea name="todoDescription" class="form-control" cols="30" rows="10">
                            {{$todo->description}}
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Add Todo</button>
                </form>
            </div>
        </div>
    </div>
@endsection