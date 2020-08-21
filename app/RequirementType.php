<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementType extends Model
{
    public function projectrequirementtype()
    {
        return $this->hasMany('App\ProjectRequirementType');
    }
    public function requirementcustomfield()
    {
        return $this->hasMany('App\RequirementCustomField');
    }
}
