<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectService extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
