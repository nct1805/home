<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'tbl_posts';
    protected $fillable = ['id', 'title', 'alias','parent_id'];
}
