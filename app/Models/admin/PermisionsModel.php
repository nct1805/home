<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class PermisionsModel extends Model
{
    protected $table = 'permisions';
    protected $fillable = ['id', 'admin_group_id','modules_id'];
}
