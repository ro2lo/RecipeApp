<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateRecette extends Model
{
    protected  $table = 'caterecettes';
    protected $fillable = ['name'];

    public function recette() {
        return $this->hasMany('App\Models\Recette');
    }

}
