<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'tbl_pcategories';
    protected $fillable = ['id', 'title', 'alias','parent_id'];
}
