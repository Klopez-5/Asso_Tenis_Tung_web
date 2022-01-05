<?php
namespace App\Traits;


trait UserTrait{
    //belongsTo - Funciones para recuperar los datos a los que estan relacionados por ID
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function havePermission($permission){
        foreach ($this->roles as $role){
            if($role['full_access']=='yes'){
                return true;
            }
            foreach ($role->permissions as $perm){
                if($perm->slug == $permission){
                    return true;
                }
            }
        }
        return false;
    }



}
