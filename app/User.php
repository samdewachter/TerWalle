<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'birth_year', 'photo', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role() {
        return $this->belongsTo('App\Role');
    }

    public function Paid() {
        return $this->hasMany('App\PaidUser');
    }

    public function Results() {
        return $this->hasMany('App\PollResult');
    }

    public function isHeadAdmin(){
        if ($this->Role->role == "headAdmin") {
            return true;
        }
        return false;
    }

    public function isSubAdmin(){
        if ($this->Role->role == "subAdmin") {
            return true;
        }
        return false;
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->Paid()->delete();
             // do the rest of the cleanup...
        });
    }
}
