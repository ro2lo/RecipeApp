<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forbiden extends Model
{
    protected  $table = 'forbiden';
    protected $fillable = ['cateForbiden_id','cateAliment_id','status','user_id'];

    public function cateForbiden(){
        return $this->belongsTo('App\Models\CateForbiden','cateForbiden_id','id');
    }
    public function cateAliment(){
        return $this->belongsTo('App\Models\SousCateAliment','cateAliment_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','id','user_id');
    }
    public function player(){
        return $this->hasMany('App\Models\Player');
    }
}
