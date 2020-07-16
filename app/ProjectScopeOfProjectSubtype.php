<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScopeOfProjectSubtype extends Model
{
    public function scopeofprojectsubtype()
    {
        return $this->belongsTo('App\ScopeOfProjectSubtype');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
