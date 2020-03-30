<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function educationaldegree()
    {
        return $this->belongsTo('App\EducationalDegree');
    }
}
