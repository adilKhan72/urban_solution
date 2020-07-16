<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTask extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
