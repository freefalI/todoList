@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h1 class="title">Register</h1>
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input id="name" type="text" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <p class="help is-danger" >
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label">E-Mail Address</label>
        <div class="control">
            <input  id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <p class="help is-danger" >
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input  id="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password"  required >
            @if ($errors->has('password'))
                <p class="help is-danger" >
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>
    </div>


    <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
            <input  id="password-confirm" class="input" type="password" name="password_confirmation"  required >
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-success">
                {{ __('Register') }}
            </button>

        </div>
    </div>

</form>

@endsection
