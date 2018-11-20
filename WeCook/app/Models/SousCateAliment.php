<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCateAliment extends Model
{
    protected  $table = 'sousCateAliment';
    protected $fillable = ['cateAliment_id','name','picture'];


    public function ingredients() {
        return $this->hasMany('App\Models\Ingredients','sousCateAliment_id');
    }

    public function CateAliment()
    {
        return $this->belongsTo('App\Models\CateAliment','id');
    }
}
