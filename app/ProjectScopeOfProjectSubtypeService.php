<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScopeOfProjectSubtypeService extends Model
{
    public function scopeofprojectsubtype()
    {
        return $this->belongsTo('App\ScopeOfProjectSubtype');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
