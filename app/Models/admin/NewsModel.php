<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'tbl_posts';
    protected $fillable = ['id', 'title','alias','content'];
    
}
