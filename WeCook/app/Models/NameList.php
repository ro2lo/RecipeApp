<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameList extends Model
{
    protected  $table = 'namelist';
    protected $fillable = ['user_id','name','nbDay','date','nbByDay'];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function listes(){
        return $this->hasMany('App\Models\Listes','nameList_id');
    }
    public function usersListe(){
        return $this->hasMany('App\Models\UsersListe','nameList_id');
    }
}
