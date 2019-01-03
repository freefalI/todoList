@extends('layouts.layout')

@section('content')
<h1 class="title">{{$project->name}}</h1>
    <h2 class="subtitle"> {{$project->description}}</h2>
   
    <div class="field is-grouped">
        <form action="/projects/{{$project->id}}/edit" method='get'>
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-primary">Edit</button>
        </form>
        
        <p class="control">
            <form action="/projects/{{$project->id}}" method='post'>
                @method('DELETE')
                @csrf
                <button type="submit" class="button is-danger">Delete</button>
            </form>
        </p>

    </div>
@endsection
