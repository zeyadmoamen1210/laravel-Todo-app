@extends('layout.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Todos Page</h1>
        <a class="btn btn-success mb-2" href="/create">Create Todo</a>

        @if (session()->has('accept'))
            <div class="alert alert-success">
                {{ session()->get('accept') }}
            </div>
        @endif

        <ul>
            @if (isset($todos))
                @forelse ($todos as $todo)
                    <li class="card mb-2 p-2" >
                        <div style="display:flex">
                            <div style="flex:1">
                                {{ $todo->title }} 
                             </div>
                             <div >
                                 @if (!$todo->completed)
                                    <a href="todos/{{$todo->todosId}}/completed">
                                        <i style="cursor: pointer;color: var(--warning);" class="fas fa-check-square"></i>
                                    </a>
                                 @endif
                                
                                <a href="/todos/{{$todo->todosId}}">
                                    <i style="cursor: pointer" class="text-primary far fa-eye"></i>
                                </a>
                                <a href="todos/{{$todo->todosId}}/update">
                                    <i style="cursor: pointer" class="text-success far fa-edit"></i>
                                </a>
                                <a href="todos/{{$todo->todosId}}/delete">
                                    <i style="cursor: pointer" class="text-danger fas fa-trash-alt"></i>
                                </a>
                             </div>
                        </div>
                    </li>
                    @empty
                    <h6> No Todos Available </h6>
                @endforelse
            @endif
        </ul>
    </div>
@endsection

    
