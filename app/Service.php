<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function projectscope()
    {
        return $this->hasMany('App\ProjectScope');
    }
    public function servicetask()
    {
        return $this->hasMany('App\ServiceTask');
    }
}
