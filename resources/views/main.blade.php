@extends('layouts.app')

@section('content')
<h1 class="title">
This is main page!<br>
@auth
    Hello, {{auth()->user()->name}}
@else
    Please, register or login
@endauth
</h1>
@endsection
