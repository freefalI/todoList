@extends('layouts.app')

@section('content')

    <h1 class="title">Edit project</h1>

    <form action="/projects/{{$project->id}}" method="post">
        @method('PUT')
        @csrf
        @include ('projects.form_layout', ['formMode' => 'edit'])

    </form>

@endsection

