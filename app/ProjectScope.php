<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScope extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
