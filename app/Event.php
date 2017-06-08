<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use Searchable;
	use RecordsActivity;
	use SoftDeletes;

	protected $fillable = ['title'];
	
    public function Albums() {
        return $this->belongsToMany('App\Album');
    }

}
