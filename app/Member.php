<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table="member";

    protected $fillable = [
     'user_id', 'first_name','last_name','email','mobile','telephone','address','country_id','state_id','city_id','pin','age','dob','qualification_id','medical_council_name','medical_council_no','medical_council_year','enrollment_id','enrollment_id','status','member_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
