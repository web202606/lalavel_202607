<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        //テーブルと結合
        public function html(){
        return $this->hasMany('App\Html');
    }
        public function css(){
        return $this->hasMany('App\Css');
    }
        public function javascript(){
        return $this->hasMany('App\Javascript');
    }
        public function jquery(){
        return $this->hasMany('App\Jquery');
    }
        public function php(){
        return $this->hasMany('App\Php');
    }
        public function database(){
        return $this->hasMany('App\Database');
    }
        public function laraveltbl(){
        return $this->hasMany('App\Laraveltbl');
    }
        public function skill(){
        return $this->hasMany('App\Skill');
    }

}
