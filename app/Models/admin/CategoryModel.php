<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $fillable = ['id', 'title', 'description'];
}
