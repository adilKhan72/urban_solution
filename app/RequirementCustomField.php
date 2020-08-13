<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementCustomField extends Model
{
    public function requirementtype()
    {
        return $this->belongsTo('App\RequirementType', 'requirement_type_id');
    }

    public function reqcusfieldanswers()
    {
        return $this->hasMany('App\ReqCusFieldAnswers');
    }
}
