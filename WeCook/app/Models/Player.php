<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected  $table = 'player';
    protected $fillable = ['cateForbiden_id','cateAliment_id','typePlat_id','recette_id','status'];

    public function recette(){
        return $this->belongsTo('App\Models\Recette');
    }
    public function cateForbiden(){
        return $this->belongsTo('App\Models\CateForbiden','id','cateForbiden_id');
    }
    public function typePlat(){
        return $this->belongsTo('App\Models\TypePlat','typeplat_id','id');
    }
    public function compo(){
        return $this->belongsTo('App\Models\Compo');
    }
}
