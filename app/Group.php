<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function tournaments(){
        return $this->belongsToMany('App\Tournament','group_tournament')->withTimestamps();
    }
}
