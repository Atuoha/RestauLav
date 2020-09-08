<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $path = '/images/';

    protected $fillable = ['name'];

    public function getNameAttribute($value){
        return $this->path.$value;
    }
    
}
