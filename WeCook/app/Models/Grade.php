<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected  $table = 'grades';
    protected $fillable = ['grade','recette_id','compo_id','user_id'];
    public function recette(){
        return $this->belongsTo('App\Models\Recette');
    }
    public function compo(){
        return $this->belongsTo('App\Models\Compo');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
