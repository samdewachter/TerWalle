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
}
