<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grocery extends Model
{
    use SoftDeletes;
    use RecordsActivity;

    public function Items(){
    	return $this->hasMany('App\GroceryItem');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($grocery) { // before delete() method call this
             $grocery->Items()->delete();
             // do the rest of the cleanup...
        });
    }
}
