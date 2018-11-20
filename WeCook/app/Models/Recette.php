<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class recette extends Model
{
    protected  $table = 'recettes';
    protected $fillable = ['title','description','toknow','timeCuisson','time','iframe','picture','vid','nbPers','kcal','visible','cateRecette_id','country_id','user_id'];


    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function aliments() {
        return $this->hasMany('App\Models\Aliment','recette_id');
    }
    public function grades() {
        return $this->hasMany('App\Models\Grade');
    }
    public function player() {
        return $this->hasMany('App\Models\Player');
    }
    public function typePlat() {
        return $this->hasMany('App\Models\Player')->whereTypeplat_id(!null);
    }
    public function cateRecette(){
        return $this->belongsTo('App\Models\CateRecette');
    }
    public function Listes(){
        return $this->belongsTo('App\Models\Listes');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
