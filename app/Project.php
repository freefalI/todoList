<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','description','owner_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function addTask($description)
    {
        return $this->tasks()->create(compact('description'));
        // return Task::create([
        //     'project_id'=>$this->id,
        //     'description'=>$description
        // ]);
    }
}
