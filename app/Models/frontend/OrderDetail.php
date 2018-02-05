<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "orderdetails";

    /*public function product(){
    	return $this->belongsTo('App\Models\frontend\Products','id_product','id');
    }
*/
    public function orders(){
    	return $this->belongsTo('App\Models\frontend\Orders','order_id','id');
    }
}
