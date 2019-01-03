@extends('layouts.layout')

@section('content')

    <h1>create project</h1>
    <form action="/projects" method="post">
        @csrf
        Name
        <input type="text" name="name" id="" class = "input">

        Description
        <input type="text" name="description" id=""  class = "input">

        <button type="submit" class="button ">Submit</button>
    </form>
    
@endsection