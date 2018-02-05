<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\PostModel;
use App\Models\frontend\CategoryModel;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $data['title'] = 'Tư vấn đồ trang trí nội thất';             
        $models = PostModel::where('status',0)->orderBy('created_at','DESC')->paginate(10);
        return view('frontend.post.index',['title'=>'Tư vấn đồ trang trí nội thất','models'=>$models,'data' => $data,'device' => 'desktop']);
    }
    public function view($alias,Request $request)
    {
        $model = PostModel::where('alias',$alias)->first();
        return View('frontend.content.details', ['models' => $model,'device' => 'desktop']);
                   
        
    }
}