<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CategoryModel;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {
        
        return redirect('admin/products/list');
           
    }
    public function permision()
    {
        return view('admin.layouts.thongbao');
           
    }
    
}
