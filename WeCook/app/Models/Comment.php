<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $table = 'comments';
    protected  $fillable =['comment','validate','recette_id','user_id'];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function recette(){
        return $this->belongsTo('App\Models\Recette');
    }
}
