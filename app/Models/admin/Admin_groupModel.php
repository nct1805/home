<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Admin_groupModel extends Model
{
    protected $table = 'admin_group';
    protected $fillable = ['id', 'name'];
}
