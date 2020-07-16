<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMouza extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function mouza()
    {
        return $this->belongsTo('App\mouza');
    }
}
