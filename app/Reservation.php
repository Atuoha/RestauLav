<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'name','email','contact','table_number','date','time','message','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
