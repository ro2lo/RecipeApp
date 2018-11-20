<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateForbiden extends Model
{
    protected  $table = 'cateforbiden';
    protected  $fillable = ['name','status'];

    public function forbiden() {
        return $this->hasMany('App\Models\Forbiden','id','cateForbiden_id');
    }
    public function player() {
        return $this->hasMany('App\Models\Player','cateForbiden_id','id');
    }
}
