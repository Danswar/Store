<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    public function items(){
         return $this->hasMany('App\Item');
    }
}