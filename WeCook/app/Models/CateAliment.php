<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateAliment extends Model
{
    protected  $table = 'catealiments';
    protected  $fillable = ['name','picture'];

    public function sousCateAliment() {
        return $this->hasMany('App\Models\sousCateAliment','cateAliment_id','id');
    }
}
