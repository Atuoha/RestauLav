<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $fillable = [
        'user_id', 'subject', 'message'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
