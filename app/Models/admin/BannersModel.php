<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class BannersModel extends Model
{
    protected $table = 'banner';
    protected $fillable = ['id', 'name','url','catid','image','ordering','status','target','lang'];
    
}
