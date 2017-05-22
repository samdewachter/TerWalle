<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function Answers() {
    	return $this->hasMany('App\AnswerPoll');
    }
}
