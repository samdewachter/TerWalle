<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    public function Grocery(){
    	return $this->hasOne('App\Grocery');
    }
}
