<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalDegree extends Model
{
    public function userqualification()
    {
        return $this->hasOne('App\UserQualification');
    }
}
