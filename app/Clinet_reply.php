<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinet_reply extends Model
{
    //
     public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
//
 public function emp()
    {

        return $this->hasOne('App\User', 'id', 'emp_id');
    }
    
  public function order()
    {

        return $this->hasOne('App\Clinet_order', 'id', 'order_id');
    }
}
