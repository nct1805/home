<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'tbl_pcategories';
    protected $fillable = ['id', 'title', 'parrent_id'];
}
