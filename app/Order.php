<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'user_id','contact','address','item','total_price','quantity','date','time','message','status','price'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
