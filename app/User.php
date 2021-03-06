<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Socialite\Facades\Socialite;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_id', 'role_id', 'status', 'job_title', 'provider_id'
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

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function is_admin(){

        if($this->role->name == 'Admin' || $this->role->name == 'Staff'){
            return true;
        }else{
            return false;
        }
    }

    // public function user_redirect(){
    //     if($this->role == 'admin'){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }




    
}
