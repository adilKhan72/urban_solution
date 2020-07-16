<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSociety extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function society()
    {
        return $this->belongsTo('App\Society');
    }
}
