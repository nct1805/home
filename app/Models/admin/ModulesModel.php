<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class ModulesModel extends Model
{
    protected $table = 'modules';
    protected $fillable = ['id', 'name'];
}
