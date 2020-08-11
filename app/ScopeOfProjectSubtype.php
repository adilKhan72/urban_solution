<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScopeOfProjectSubtype extends Model
{
    public function scopeofproject()
    {
        return $this->belongsTo('App\ScopeOfProject', 'scope_of_project_id');
    }
    public function projectscopeofprojectsubtypestable()
    {
        return $this->hasMany('App\ProjectScopeOfProjectSubtypesTable');
    }
}
