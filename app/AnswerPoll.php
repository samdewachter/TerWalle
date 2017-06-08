<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerPoll extends Model
{
    public function Poll() {
        return $this->belongsTo('App\Poll');
    }

    public function Results() {
        return $this->hasMany('App\PollResult');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($answer) { // before delete() method call this
             $answer->Results()->delete();
             // do the rest of the cleanup...
        });
    }
}
