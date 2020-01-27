<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Relacion con la tabla Sells
    public function sell(){
        return $this->belongsTo(Sell::class);
    }
}
