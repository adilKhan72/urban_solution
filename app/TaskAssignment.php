<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
    public function assignedby()
    {
        return $this->belongsTo('App\Task', 'assigned_by');
    }
    public function assignedto()
    {
        return $this->belongsTo('App\Task', 'assigned_to');
    }
    public function taskchecklist()
    {
        return $this->hasMany('App\TaskChecklist');
    }
    public function taskresponse()
    {
        return $this->hasMany('App\TaskResponse');
    }
}
