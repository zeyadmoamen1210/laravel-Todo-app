@extends('layout.app')

@section('content')
    <div class="container">

        @if (isset($todo))
       


<div class="card">
    <h3 class="text-center mt-2"> {{$todo->title}} </h3>
    <p class="text-center"> {{$todo->description}} </p>

    
    

    @if (boolval($todo->completed))
        <span class="bg-success" style="max-width: 134px;color: #FFF;padding: 4px;text-align: center;"> Completed </span>
    @endif
    
    @if (!boolval($todo->completed))
        <span class="bg-danger" style="max-width: 134px;color: #FFF;padding: 4px;text-align: center;"> Not Completed </span>
    @endif
</div>
        @endif

        
    </div>
@endsection