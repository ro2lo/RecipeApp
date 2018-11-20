<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected  $table = 'friends';
    protected $fillable = ['user_id','friend_id'];

    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function friend() {
        return $this->belongsTo('App\Models\User','friend_id');
    }
}
