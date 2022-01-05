<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

}
