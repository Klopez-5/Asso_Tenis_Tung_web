<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //hasMany - Se recuperara un arreglo con los usuarios que tienen este atributo en su relacion
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function groups(){
        return $this->belongsToMany('App\Group','group_tournament')->withTimestamps();
    }
}
