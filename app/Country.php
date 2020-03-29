<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function userinformation()
    {
        return $this->hasMany('App\UserInformation');
    }
}
