<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\CategoryModel;
use App\Models\frontend\PostModel;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

    public function __construct(){
    }

    public function index($slug,Request $request)
    {
        
        if($slug !=''){
        // kiem tra danh mục cấp 1
            $model = DB::table('tbl_pcategories')
                    ->where('alias','like',$slug)
                    ->where('parent_id',0)
                    ->first();;
            if(count($model)>0){
                $id=$model->id; 
                $data['title'] = $model->title;             
                $models = ProductsModel::whereRaw('FIND_IN_SET(?,`parent_id`)', [$id])->orderBy('created_at','DESC')->paginate(20);
                return View('frontend.content.catProducts', ['models' => $models,'device' => 'desktop','data'=>$data]);
            }
            else{
                // danh mục cấp 2
                $model1 = DB::table('tbl_pcategories')
                    ->where('alias','like',$slug)
                    ->where('parent_id','>',0)
                    ->first();
                    if(count($model1)>0){
                        $id=$model1->id;              
                        $models = ProductsModel::whereRaw('FIND_IN_SET(?,`parent_id`)', [$id])->orderBy('created_at','DESC')->paginate(20);
                return View('frontend.content.catProducts', ['models' => $models,'device' => 'desktop']);
                    }else{
                        // chi tiết sản phẩm
                        $model3 = ProductsModel::where('alias',$slug)->first();
                        if(count($model3)>0){
                            return View('frontend.content.detail', ['models' => $model3,'device' => 'desktop']);

                        }else{
                            // tin tức
                            $model4 = PostModel::where('alias',$slug)->first();
                            return View('frontend.content.details', ['models' => $model4,'device' => 'desktop']);
                        }
                        
                    }
            }          

        }
        
    }

    public function switchDir (Request $request)
    {
        $page = $request->input('page', 1);
        $models = Cache::remember('meta_' . $page, config('post.timeOut'), function () {
            return $this->model->paginate(1);
        });
        return View('frontend.content.index', ['models' => $models]);
    }
}