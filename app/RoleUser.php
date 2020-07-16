<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function role()
    {
        return $this->belongsToMany('App\Role');
    }
    
}
