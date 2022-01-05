<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    //hasMany - Se recuperara un arreglo con los usuarios que tienen este atributo en su relacion
    public function users(){
        return $this->hasMany(User::class);
    }
    //Fin de hasMany
}
