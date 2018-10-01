<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table="user";
    

    public static $basicmessage=[

    'first_name.required' => 'please requires first name',
    'first_name.min' => 'please requires minimum 3 letters',
    'password.required' => 'please requires Password', 
    'mobile.required' => 'please requires Mobile Number',    
    'email.required' => 'please requires Email',
       
    ];

    public static $basicrules=[
        'first_name' => 'required|min:3',
        // 'last_name' => 'required|min:3',  
        'password' => 'required|min:6',    
        'mobile' => 'required|min:10,',
        'email' => 'required|min:10',

         
    ];

    protected $fillable = [
     'email', 'password','status',
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
