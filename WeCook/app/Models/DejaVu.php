<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DejaVu extends Model
{
    protected  $table = 'dejavu';
    public function recette() {
        return $this->hasMany('App\Models\Recette');
    }
    public function compo() {
        return $this->hasMany('App\Models\Compo');
    }
}
