<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouza extends Model
{
        public function projectmouza()
    {
        return $this->hasMany('App\ProjectMouza');
    }

}
