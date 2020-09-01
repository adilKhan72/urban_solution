<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUnitForArea extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function unitforarea()
    {
        return $this->belongsTo('App\UnitForArea','unit_for_area_id');
    }
}
