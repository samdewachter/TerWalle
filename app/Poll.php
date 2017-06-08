<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
	use SoftDeletes;
    use RecordsActivity;

    public function Answers() {
    	return $this->hasMany('App\AnswerPoll');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($poll) { // before delete() method call this
             $poll->Answers()->delete();
             // do the rest of the cleanup...
        });
    }
}
