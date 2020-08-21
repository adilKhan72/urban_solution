<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReqCusFieldAnswers extends Model
{
    public function requirementcustomfield()
    {
        return $this->belongsTo('App\RequirementCustomField', 'requirement_custom_field_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }
}
