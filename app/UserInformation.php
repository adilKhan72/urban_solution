<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $casts = [
        'primary_address' => 'string',
        'secondary_address' => 'string',
        'google_location_pin' => 'string'
    ];
    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function bloodgroup()
    {
        return $this->belongsTo('App\BloodGroup', 'blood_group_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

}
