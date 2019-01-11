<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded =[];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function toggle()
    {
        $this->isCompleted() ?  $this->incomplete() : $this->complete();
    }

    public function complete()
    {
        $this->update(['completed'=>true ]);
    }

    public function incomplete()
    {
        $this->update(['completed'=>false]);
    }

    public function isCompleted()
    {
        return $this->completed;
    }
    
}
