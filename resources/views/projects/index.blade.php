@extends('layouts.app')

@section('content')
<!-- search panel -->
<nav class="level">
  <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5" id='projects-count'>
            <strong>{{$projectsCount}}</strong> projects
          </p>
        </div>
        <div class="level-item">
          <div class="field has-addons">
            <p class="control">
              <input class="input" id='search-projects-input'  type="text" placeholder="Find a project">
            </p>
            <!-- <p class="control">
              <button class="button">
                Search
              </button>
            </p> -->
          </div>
        </div>
      </div>
      
      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><strong>All</strong></p>
        <p class="level-item"><a>Published</a></p>
        <p class="level-item"><a>Drafts</a></p>
        <p class="level-item"><a>Deleted</a></p>
        <p class="level-item">
          <form action="/projects/create" >
          @csrf
          <button type="submit" class="button is-success">New</button>
          
        </form>
      </p>
    </div>
  </nav>
  
  
  
<!-- projects list -->
    
  <aside class="menu">
  <p class="menu-label">
    Projects
  </p>
  <ul class="menu-list" id='projects-list-body'>
    @foreach ( $projects as $project)
        <li><a href="/projects/{{$project->id}}" class='project-name'>{{$project->name}}</a></li>
    @endforeach
  </ul>

   
</aside>
    
@endsection


@section('page_specific_scripts')
    <script src="{{asset('js/projects_page.js')}}"></script>
@endsection