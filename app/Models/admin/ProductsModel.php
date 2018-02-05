<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'tbl_products';
    protected $fillable = ['id', 'name','alias','category_id'];
    public function getCategory(){
    	return $this->belongsTo('App\Models\admin\CategoryModel','category_id','id');
    }
}
