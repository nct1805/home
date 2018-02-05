<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class OrderdetailsModel extends Model
{
    protected $table = 'orderdetails';
    protected $fillable = ['id', 'price', 'qty','order_id','product_id'];
}
