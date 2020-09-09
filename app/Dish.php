<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name','content','photo_id','category_id','price','food_plan','user_id'
    ];
}
