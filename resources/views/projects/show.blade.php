@extends('layouts.layout')

@section('content')
<h1 class="title">{{$project->name}}</h1>
<h2 class="subtitle"> {{$project->description}}</h2>
   
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
@if ($project->tasks()->count())
    <div class="panel"> 
        <p class="panel-heading">
                <label class="label">Tasks</label>
        </p>
    
        @foreach ($project->tasks as $task)
          
            <form action="/tasks/{{$task->id}}" method='post'> 
            @csrf
            @method('PATCH')
                <label class="panel-block {{$task->completed ? 'is-complete' : ''}}" >
                    <input type="checkbox" name='completed' onChange = "this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                    {{$task->description}}
                </label>   
            </form>
        @endforeach
    </div>
@endif
@endsection
