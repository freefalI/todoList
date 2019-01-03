@extends('layouts.layout')

@section('content')

    {{$project->name}}
    <br>
    {{$project->description}}
    <br>


    <form action="/projects/{{$project->id}}/edit" method='get'>
        @method('DELETE')
        @csrf
        <button type="submit" class="button">Edit</button>

    </form>


    <form action="/projects/{{$project->id}}" method='post'>
        @method('DELETE')
        @csrf
        <button type="submit" class="button">Delete</button>

    </form>
        
@endsection
