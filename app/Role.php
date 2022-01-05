<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name', 'slug', 'description','full_access',
    ];

    //hasMany - Se recuperara un arreglo con los usuarios que tienen este atributo en su relacion
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function permissions(){
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }
    //Fin de hasMany
}
