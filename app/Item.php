<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	public function getNameAttribute()
	{
		return $this->product->nombre;
  }
  
  public function product(){
		return $this->belongsTo('App\Product');
	}

  public function sell(){
		return $this->belongsTo('App\Sell');
	}
}
