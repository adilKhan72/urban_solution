<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementCustomField extends Model
{
    public function requirementtype()
    {
        return $this->belongsTo('App\RequirementType');
    }
}