<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function skilluser()
    {
        return $this->hasMany('App\SkillUser');
    }
}
