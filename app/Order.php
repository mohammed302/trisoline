<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     public function work()
    {

        return $this->hasOne('App\Work', 'id', 'work_id');
    }

    public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function replies()
    {

        return $this->hasMany('App\Reply', 'order_id', 'id');
    }
 public function emp()
    {

        return $this->hasOne('App\Admin', 'id', 'emp_id');
    }
}
