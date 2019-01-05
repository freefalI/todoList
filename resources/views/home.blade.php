@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">
        Dashboard
    </h1>
    <div class="">
        @if (session('status'))
            <div class="notification is-success" >
                {{ session('status') }}
            </div>
        @endif
       

        <h1 class='subtitle'> {{ Auth::user()->name }}, <br>You are logged in!</h1>
    </div>
    <br>
    @auth
        <a  href="/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
            <button class="button is-danger" >
                <p>Log out</p>
            </button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
        </form>
    @endauth


</div>
@endsection
