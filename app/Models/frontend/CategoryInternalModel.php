<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class CategoryInternalModel extends Model
{
    protected $table = 'xf_node';
    protected $primaryKey = 'node_id';
    public $timestamps = false;
    protected $fillable = ['node_id', 'title', 'description', 'parent_node_id', 'display_in_list'];
}
