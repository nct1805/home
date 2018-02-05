<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ProductsModel;
use App\Models\admin\CategoryModel;

class AjaxController extends Controller
{
    
    public function __construct(){
    }
    public function getCategory()
    {
        return 'ok';    
    }
   
}
