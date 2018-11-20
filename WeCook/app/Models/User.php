<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function regimeSpecial() {
        return $this->hasMany('App\Models\Forbiden','user_id','id')->whereStatus(1);
    }
    public function mieuxManger() {
        return $this->hasMany('App\Models\Forbiden','user_id','id')->whereStatus(2);
    }
    public function CateIngredientsInterdits() {
        return $this->hasMany('App\Models\Forbiden','user_id','id')->whereStatus(3);
    }

    public function favoris() {
        return $this->hasMany('App\Models\Favoris');
    }

    public function nameListes() {
        return $this->hasMany('App\Models\NameList','user_id');
    }

    public function friends() {
        return $this->hasMany('App\Models\Friends','id');
    }

    public function userListe() {
        return $this->hasMany('App\Models\UserListe','id');
    }

    public function socialProviders() {
        return $this->hasMany('App\Models\SocialProvider');
    }

    public function myGroup() {
        return $this->hasOne('App\Models\Groups','groups_id');
    }

    public function group(){
        return $this->belongsTo('App\Models\Groups');
    }
}
