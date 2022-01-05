<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UserTrait;
use App\Role;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }

    public function relacion(){
        return $this->belongsTo(Relation::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user')->withTimestamps();
    }
    //Fin de Funciones belongsTo

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url','name', 'email', 'password','card_id','last_name','phone','dat_of_birth','age','club_id','rol_id','relation_id','represented_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





}
