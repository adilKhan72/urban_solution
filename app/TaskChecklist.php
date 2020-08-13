<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskChecklist extends Model
{
    public function taskassignment()
    {
        return $this->belongsTo('App\TaskAssignment','task_assignment_id');
    }
        public function checklist()
    {
        return $this->belongsTo('App\Checklist','checklist_id');
    }
}
