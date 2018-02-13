<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'name','alias','category_id'];
    public function getCategory(){
    	return $this->belongsTo('App\Models\frontend\CategoryModel','category_id','id');
    }
}
