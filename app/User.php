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
    protected $fillable = [
        'name', 'email', 'password','image','tel','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function dep()
    {

        return $this->hasOne('App\Department', 'id', 'department');
    }

   

     public function verified()
    {
        $this->email_verification= 1;
        $this->email_token = null;
        $this->save();
    }
    
     public function orders()
    {

        return $this->hasMany('App\Order', 'user_id', 'id');
    }
}