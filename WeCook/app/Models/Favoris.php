<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected  $table = 'favoris';
    protected $fillable = ['recette_id','user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
