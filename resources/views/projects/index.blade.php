@extends('layouts.layout')

@section('content')

    <h1 class='label'>Projects</h1>
    @foreach ( $projects as $project)
        <a href="/projects/{{$project->id}}">{{$project->name}}</a>
        <br>
    @endforeach


    <br>
    <br>

    <a href="/projects/create">Create new project</a>


@endsection
