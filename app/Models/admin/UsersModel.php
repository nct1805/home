<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['id', 'name','email','group_id'];
    public function getGroup(){
    	return $this->belongsTo('App\Models\admin\Admin_groupModel','group_id','id');
    }
}
