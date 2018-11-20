<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected  $table = 'ingredients';
    protected $fillable = ['sousCcateAliment_id','picture','name','kcal','cholesterol'];

    public function aliments(){
        return $this->hasMany('App\Models\Aliment','ingredient_id');
    }
    public function sousCateAliment()
    {
        return $this->belongsTo('App\Models\sousCateAliment','id','sousCateAliment_id');
    }
}
