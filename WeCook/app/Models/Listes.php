<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listes extends Model
{
    protected  $table = 'listes';
    protected $fillable = ['nbPers','recette_id','nameList_id','day'];
    public function nameList(){
        return $this->belongsTo('App\Models\NameList');
    }
    public function recette(){
        return $this->hasMany('App\Models\Recette','id','recette_id');
    }
}
