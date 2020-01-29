<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function product(){
		return $this->hasOne('App\Product');
	}

  public function sell(){
		return $this->belongsTo('App\Sell');
	}
}
