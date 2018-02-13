<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class ProductsInternalModel extends Model
{
    protected $table = 'xf_thread';
    protected $fillable = ['thread_id', 'node_id', 'title'];
//    public function getCategory(){
//    	return $this->belongsTo('App\Models\admin\CategoryModel','category_id','id');
//    }
}
