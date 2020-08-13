<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReqCusFieldAnswers extends Model
{
    public function requirementcustomfield()
    {
        return $this->belongsTo('App\RequirementCustomField', 'requirement_custom_field_id');
    }

}
