<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function servicetask()
    {
        return $this->hasMany('App\ServiceTask');
    }
    public function taskassignment()
    {
        return $this->hasMany('App\TaskAssignment');
    }
}
