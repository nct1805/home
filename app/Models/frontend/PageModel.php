<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = 'tbl_pages';
    protected $fillable = ['id', 'name','slug'];
    
}
