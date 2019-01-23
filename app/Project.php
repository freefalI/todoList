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

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function addTask($description)
    {
        return $this->tasks()->create(compact('description'));
    }

    public function getTaskCountAttribute($value){
        return $this->tasks()->count();
    }
    public function getCompletedTaskCountAttribute($value){
        return $this->tasks()->where('completed',1)->count();
    }
}
