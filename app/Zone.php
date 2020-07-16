<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function projectzone()
    {
        return $this->hasMany('App\ProjectZone');
    }
}
