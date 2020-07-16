<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = array('name', 'display_name', 'description');
	public $timestamps = true;
     /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function roleuser()
    {
        return $this->hasOne('App\RoleUser');
    }
}
