<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'name', 'phone','email'];
}
