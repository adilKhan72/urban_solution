<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The roles that belong to the user.
     */
    protected $guarded = ['id'];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
    
    public function skilluser()
    {
        return $this->hasMany('App\SkillUser');
    }

    public function userinformation()
    {
        return $this->hasOne('App\UserInformation');
    }


    public function userqualification()
    {
        return $this->hasMany('App\UserQualification');
    }

    public function userexperience()
    {
        return $this->hasMany('App\UserExperience');
    }

    public function useremergencycontact()
    {
        return $this->hasMany('App\UserEmergencyContact');
    }

    public function userpersonalproject()
    {
        return $this->hasMany('App\UserPersonalProject');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
