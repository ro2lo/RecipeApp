<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compo extends Model
{
    protected  $table = 'compos';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function player(){
        return $this->belongsTo('App\Models\Player');
    }
}
