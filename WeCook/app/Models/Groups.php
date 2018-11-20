<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected  $table = 'groups';
    protected $fillable = ['nbPers','status'];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
