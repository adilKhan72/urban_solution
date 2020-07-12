<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPersonalProject extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
