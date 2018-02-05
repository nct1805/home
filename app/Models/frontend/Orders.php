<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";

    /*public function bill_detail(){
    	return $this->hasMany('App\Models\frontend\BillDetail','id_bill','id');
    }*/

    public function bill(){
    	return $this->belongsTo('App\Models\frontend\Customer','id_customer','id');
    }
}
