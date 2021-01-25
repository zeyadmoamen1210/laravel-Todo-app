@extends('layout.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin: auto">

                @if (session()->has('accept'))
                    <div class="alert alert-success">
                        {{ session()->get('accept') }}
                    </div>
                @endif

                <form action="/create" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Todo Title</label>
                        <input value="{{old('todoTitle')}}" class="form-control @error('todoTitle') is-invalid @enderror" name="todoTitle" type="text">
                    </div>
                    @error('todoTitle')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Todo description</label>
                        <textarea class="form-control @error('todoDescription') is-invalid @enderror" name="todoDescription" cols="30" rows="10">
                            {{old('todoDescription')}}
                        </textarea>
                    </div>
                    @error('todoDescription')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-success">Add Todo</button>
                </form>
            </div>
        </div>
    </div>
@endsection