<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name','content','photo_id','category_id','price','food_plan','user_id','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
