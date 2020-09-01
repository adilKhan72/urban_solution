<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScopeOfProjectSubtype extends Model
{
    public function scopeofprojectsubtype()
    {
        return $this->belongsTo('App\ScopeOfProjectSubtype','scope_of_project_subtype_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
