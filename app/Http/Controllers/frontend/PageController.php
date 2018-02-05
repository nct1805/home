<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\CategoryModel;
use App\Models\frontend\PageModel;

class PageController extends Controller
{

    public function __construct(){
    }

    public function index()
    {
        $alias = request()->segment(1);
        $alias = str_replace('.html','',$alias);
        $model = PageModel::where('slug',$alias)->first();
        return View('frontend.content.page', ['models' => $model,'device' => 'desktop']);
    }
}