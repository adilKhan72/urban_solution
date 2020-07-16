<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsContactUser extends Model
{
    public function projectclient()
    {
        return $this->hasMany('App\ProjectClient');
    }
}
