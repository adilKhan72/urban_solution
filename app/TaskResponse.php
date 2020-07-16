<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskResponse extends Model
{
    public function taskassignment()
    {
        return $this->belongsTo('App\TaskAssignment');
    }
}
