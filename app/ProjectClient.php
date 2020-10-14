<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectClient extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function clientscontactuser()
    {
        return $this->belongsTo('App\ClientsContactUser','clients_contact_user_id');
    }

}
