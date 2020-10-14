<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRequirementType extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }
    public function requirementtype()
    {
        return $this->belongsTo('App\RequirementType','requirement_type_id');
    }
}
