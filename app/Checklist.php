<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function taskchecklist()
    {
        return $this->hasMany('App\TaskChecklist');
    }
}
