@extends('layouts.app')

@section('content')
<h1 class="title">{{$project->name}}</h1>
<h2 class="subtitle"> {{$project->description}}</h2>
<p id='project-id' hidden>{{$project->id}}</p>
<div class="field is-grouped">
    <form action="/projects/{{$project->id}}/edit" method='get'>
        @method('DELETE')
        @csrf
        <button type="submit" class="button is-primary">Edit</button>
    </form>
    
    <p class="control">
        <form action="/projects/{{$project->id}}" method='post'>
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Delete project</button>
        </form>
    </p>
    <p class="control">
        <div class='delete-all-tasks-button button is-danger is-pulled-right '  data-id=''>Delete all tasks</div>
    </p>


</div>

<!-- search panel -->
    <nav class="level">
      <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5" id='tasks-count'>
            <strong>{{$tasksCount}}</strong> tasks
          </p>
        </div>
        <div class="level-item">
          <div class="field has-addons">
            <p class="control">
              <input class="input" id='search-tasks-input' type="text" placeholder="Find a task">
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
    <div id='search-tabs' class="level-right tabs is-toggle">
        <ul>
            <li class="is-active" data-id='2'><a>All</a></li>
            <li data-id='1'><a>Completed</a></li>
            <li data-id='0'><a>Uncompleted</a></li>
        </ul>
       
    </div>


    </nav>


<!-- task list -->
<div class="panel" id='task-list'> 
    <p class="panel-heading">
        <label class="label">Tasks</label>
    </p>
    <div id='task-list-body'>
        @if ($project->tasks()->count())
            @foreach ($project->tasks as $task)
                <form>
                    <div class='delete-task-button button is-danger is-pulled-right '  data-id='{{$task->id}}'>Delete</div>
                    <label class="panel-block   {{$task->completed ? 'is-complete' : ''}}" >
                        <input id='task-{{$task->id}}'  data-id='{{$task->id}}' class='task-status' 
                        type="checkbox" name='completed'  {{$task->completed ? 'checked' : ''}}>
                        <p class='task-description'>{{$task->description}}</p>
                    </label>    
                </form>
            @endforeach
        @endif
    </div>
</div>


<!-- add task -->
<div id='add-task-block'>
    <div class="field">
        <label class="label">New task</label>
        <p class="control">
            <input type="text" name="description" id="new-task-description" class = "input {{$errors->has('description') ? 'is-danger' : ''}}" value="">
        </p>
    </div>
        <div id='add-task-alert' class="field" hidden>
        <p class="help is-danger">Description is required.</p>
    </div>
    <div class="field">
        <p class="control">
            <div id='new-task-button'  class="button is-success">Add</div>
        </p>
    </div>
</div>

@endsection
