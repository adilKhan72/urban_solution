<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectZone extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }
}
