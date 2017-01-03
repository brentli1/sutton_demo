<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  public function is_admin() {
    if($this->role == 'admin') { 
      return true; 
    } else { 
      return false; 
    } 
  }

  public function avatar() {
    return $this->hasMany('App\Image');
  }

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
  }
