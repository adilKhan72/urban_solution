<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function projectinfodocument()
    {
        return $this->hasOne('App\ProjectInfoDocument');
    }
    public function projectpreviousdesign()
    {
        return $this->hasMany('App\ProjectPreviousDesign');
    }
    public function projectstreetaddress()
    {
        return $this->hasOne('App\ProjectStreetAddress');
    }
    public function projectclient()
    {
        return $this->hasMany('App\ProjectClient');
    }
    public function projectmouza()
    {
        return $this->hasMany('App\ProjectMouza');
    }
    public function projectunitforarea()
    {
        return $this->hasOne('App\ProjectUnitForArea');
    }
    public function projectrequirementtype()
    {
        return $this->hasMany('App\ProjectRequirementType');
    }
    public function projectzone()
    {
        return $this->hasMany('App\ProjectZone');
    }
    public function projectscopeofprojectsubtypestable()
    {
        return $this->hasMany('App\ProjectScopeOfProjectSubtypesTable');
    }
}
