<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
     public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
//
 public function emp()
    {

        return $this->hasOne('App\Admin', 'id', 'emp_id');
    }
  public function order()
    {

        return $this->hasOne('App\Order', 'id', 'order_id');
    }
}
