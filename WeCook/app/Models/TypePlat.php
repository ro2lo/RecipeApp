<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePlat extends Model
{
    protected  $table = 'typePlats';
    protected  $fillable = ['name'];

    public function player() {
        return $this->hasMany('App\Models\Player','typePlat_id','id');
    }
}
