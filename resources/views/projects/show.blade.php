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
            <button type="submit" class="button is-danger">Delete</button>
        </form>
    </p>
</div>

<!-- task list -->
<div class="panel" id='task-list'> 
    <p class="panel-heading">
        <label class="label">Tasks</label>
    </p>
    
    @if ($project->tasks()->count())
        @foreach ($project->tasks as $task)
            <form action="/tasks/{{$task->id}}" method='post'> 
                @csrf
                @method('PATCH')
            
                <div class='delete-task-button button is-danger is-pulled-right '  data-id='{{$task->id}}'>Delete</div>
                <label class="panel-block   {{$task->completed ? 'is-complete' : ''}}" >
                    <input id='task-{{$task->id}}'  data-id='{{$task->id}}' class='task-status' 
                    type="checkbox" name='completed'  {{$task->completed ? 'checked' : ''}}>
                    {{$task->description}}
                </label>    
            </form>
        @endforeach
    @endif
</div>


<!-- add task -->
<form action="/projects/{{$project->id}}/tasks" method='post'>
    @csrf
 
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

</form>

@endsection
