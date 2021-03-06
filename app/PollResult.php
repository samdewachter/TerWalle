<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollResult extends Model
{
   	public function Answer() {
        return $this->belongsTo('App\AnswerPoll');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
