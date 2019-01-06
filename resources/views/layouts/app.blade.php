<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <!-- Fonts -->

        <!-- Styles -->
        <style>
          .is-complete{
            text-decoration:line-through;
          }
        </style>
    </head>
    <body>
        

        <nav class="navbar">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
                </a>
                <a class="navbar-item {{ request()->is('/') ? 'is-tab is-active' : '' }}" href='/'>
                    Main Page
                </a>   
                <a class="navbar-item {{ request()->is('projects') ? 'is-tab is-active' : '' }}" href='/projects'>
                    Projects
                </a>
                <a class="navbar-item">
                    Documentation
                </a>
                <a class="navbar-item">
                    Blog
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>
        
         
        
          <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
          <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
          <span class="navbar-toggle">
            <span></span>
            <span></span>
            <span></span>
          </span>
        
          <!-- This "nav-menu" is hidden on mobile -->
          <!-- Add the modifier "is-active" to display it on mobile -->
          
          
         
            <div class="navbar-end">
                @guest
                
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="{{ route('login') }}">
                                <strong>{{ __('Login') }}</strong>
                            </a>
                            @if (Route::has('register'))
                                <a class="button is-light" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/home">
                            Account
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                {{ Auth::user()->name }}
                            </a>
                            <hr class="navbar-divider">
                            
                            <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                @endguest
          </div>
        </nav>

        <br>    


        <div class="container is-fluid">
          
            @yield('content')
            <br>
            @include('layouts.notifications')
        </div>
        <br>
        <br>
    </body>
</html>


