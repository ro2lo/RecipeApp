<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
    protected  $table = 'aliments';
    protected $fillable = ['qt','qtToShow','qtType','recette_id','ingredient_id'];

    public function recette(){
        return $this->belongsTo('App\Models\Recette','id');
    }
    public function ingredient(){
        return $this->belongsTo('App\Models\Ingredient','ingredient_id','id');
    }
}
