<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function User() {
    	return $this->hasOne('App\User');
    }
}
