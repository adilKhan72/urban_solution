<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function projectscopeofprojectsubtypeservice()
    {
        return $this->hasMany('App\ProjectScopeOfProjectSubtypeService');
    }
    public function servicetask()
    {
        return $this->hasMany('App\ServiceTask');
    }
}
