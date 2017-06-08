<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use Searchable;
    use SoftDeletes;
    use RecordsActivity;

    public function Events() {
        return $this->belongsToMany('App\Event');
    }

    public function Photos() {
    	return $this->hasMany('App\EventPhoto');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($album) { // before delete() method call this
             $album->photos()->delete();
        });
    }
}
