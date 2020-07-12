<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    public function userinformation()
    {
        return $this->hasMany('App\UserInformation');
    }
}
