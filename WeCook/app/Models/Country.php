<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected  $table = 'country';
    protected $fillable = ['name'];

    public function recette() {
        return $this->hasMany('App\Models\Recette');
    }
    public function compo() {
        return $this->hasMany('App\Models\Compo');
    }
}
