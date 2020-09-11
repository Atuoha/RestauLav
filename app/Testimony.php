<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
    protected $fillable = [
        'user_id', 'job_title', 'message'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
