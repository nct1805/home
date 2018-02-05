<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "tbl_custommers";

    public function bill(){
    	return $this->hasMany('App\Models\frontend\Bill','id_customer','id');
    }

}
