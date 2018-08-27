<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_order extends Model
{
    //
     public function work()
    {

        return $this->hasOne('App\Clinet_product', 'id', 'work_id');
    }

    public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function replies()
    {

        return $this->hasMany('App\Clinet_reply', 'order_id', 'id');
    }
    
     public function emp()
    {

        return $this->hasOne('App\User', 'id', 'emp_id');
    }
}
