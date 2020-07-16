<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskChecklist extends Model
{
    public function taskassignment()
    {
        return $this->belongsTo('App\TaskAssignment');
    }
        public function checklist()
    {
        return $this->hasMany('App\Checklist');
    }
}
