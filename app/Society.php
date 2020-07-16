<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    public function projectsociety()
    {
        return $this->hasMany('App\ProjectSociety');
    }
}
