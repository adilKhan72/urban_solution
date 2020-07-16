<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitForArea extends Model
{
    public function projectunitforarea()
    {
        return $this->hasMany('App\ProjectUnitForArea');
    }
}
