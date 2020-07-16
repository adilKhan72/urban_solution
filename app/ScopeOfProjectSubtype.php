<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScopeOfProjectSubtype extends Model
{
    public function scopeofproject()
    {
        return $this->belongsTo('App\ScopeOfProject');
    }
    public function projectscopeofprojectsubtypestable()
    {
        return $this->hasMany('App\ProjectScopeOfProjectSubtypesTable');
    }
}
