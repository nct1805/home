<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class SlidesModel extends Model
{
    protected $table = 'slide';
    protected $fillable = ['id', 'name','url','catid','image','ordering','status','target','lang'];
    
}
