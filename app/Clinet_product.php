<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinet_product extends Model
{
    //
     public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
     public function clinet_orders()
    {

        return $this->hasMany('App\Client_order', 'work_id', 'id');
    }
}
