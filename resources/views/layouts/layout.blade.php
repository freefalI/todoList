<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        

        <nav class="nav">
          <div class="nav-left">
            <a class="nav-item">
              <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>
          </div>
        
          <div class="nav-center">
            <a class="nav-item">
              <span class="icon">
                <i class="fa fa-github"></i>
              </span>
            </a>
            <a class="nav-item">
              <span class="icon">
                <i class="fa fa-twitter"></i>
              </span>
            </a>
          </div>
        
          <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
          <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
          <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
          </span>
        
          <!-- This "nav-menu" is hidden on mobile -->
          <!-- Add the modifier "is-active" to display it on mobile -->
          <div class="nav-right nav-menu">
            <a class="nav-item" href='/projects'>
              Projects
            </a>
            <a class="nav-item">
              Documentation
            </a>
            <a class="nav-item">
              Blog
            </a>
          </div>
        </nav>

        <br>    


        <div class="container is-fluid">
        @include('layouts.notifications')
            <!-- <div class="notification">
            </div> -->
                @yield('content')
        </div>
    
    </body>
</html>
