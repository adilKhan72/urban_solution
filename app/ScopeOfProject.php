<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScopeOfProject extends Model
{
    public function scopeofprojectsubtype()
    {
        return $this->hasMany('App\ScopeOfProjectSubtype');
    }
}
