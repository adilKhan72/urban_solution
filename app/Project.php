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
        return $this->hasOne('App\ProjectRequirementType');
    }

    public function reqcusfieldanswers()
    {
        return $this->hasMany('App\ReqCusFieldAnswers');
    }

    public function projectzone()
    {
        return $this->hasMany('App\ProjectZone');
    }

    public function projectsociety()
    {
        return $this->hasMany('App\ProjectSociety');
    }
    public function projectscopeofprojectsubtype()
    {
        return $this->hasOne('App\ProjectScopeOfProjectSubtype');
    }

    public function projectscope()
    {
        return $this->hasMany('App\ProjectScope');
    }

    public function projectservice()
    {
        return $this->hasMany('App\ProjectService');
    }

}
