@extends('layouts.layout')

@section('content')

    <h1>edit project</h1>
    <form action="/projects/{{$project->id}}" method="post">
        @method('PUT')
        @csrf
        Name
        <input type="text" name="name" id="" class = "input" value="{{$project->name}}">

        Description
        <input type="text" name="description" id=""  class = "input" value="{{$project->description}}">

        <button type="submit" class="button ">Submit</button>
    </form>

@endsection

