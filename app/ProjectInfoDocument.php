<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectInfoDocument extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
