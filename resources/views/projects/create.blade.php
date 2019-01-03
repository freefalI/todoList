@extends('layouts.layout')

@section('content')
    <h1 class="title">Create project</h1>

    <form action="/projects" method="post">
        @csrf

        @include ('projects.form_layout', ['formMode' => 'edit'])

    </form>
    
@endsection