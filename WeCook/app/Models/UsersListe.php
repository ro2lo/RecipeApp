<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersListe extends Model
{
    protected  $table = 'usersliste';
    protected $fillable = ['user_id','nameList_id'];


    public function user() {
        return $this->hasMany('App\Models\User','id','user_id');
    }
    public function nameList() {
        return $this->belongsTo('App\Models\NameList','nameList_id');
    }
}
