<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProject;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware('can:access,project')->except(['index', 'create', 'store']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $projects = auth()->user()->projects()->latest('updated_at')->get();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateProject $request)
    {
        $validatedData = $request->validated();
        auth()->user()->addProject($validatedData);
        return redirect('projects')->with('flash_message', 'Project added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // $this->authorize('access',$project);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // $this->authorize('access',$project);
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject $request, Project $project)
    {
        // $this->authorize('access',$project);
        $validatedData = $request->validated();

        $project->update($validatedData);
        return redirect('projects')->with('flash_message', 'Project updated!');
    }


    public function deleteAllTasks(Project $project)
    {
        $project->tasks()->delete();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $this->authorize('access',$project);
        // $project->tasks->delete();
        $project->delete();
        return redirect('projects')->with('flash_message', 'Project deleted!');
    }

}
