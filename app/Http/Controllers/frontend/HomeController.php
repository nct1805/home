<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\CategoryModel;
use App\Models\frontend\CategoryInternalModel;
use App\Models\frontend\SlidesModel;
use App\Models\frontend\BannersModel;

class HomeController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
		$menu = CategoryModel::where('parent_id','0')->where('status','1')->orderBy('id', 'DESC')->get();
		$slide = SlidesModel::orderBy('ordering', 'ASC')->get();
		$banner = BannersModel::orderBy('ordering', 'ASC')->limit(3)->get();
		$data = array();
		if(!empty($menu)){
			foreach($menu as $key => $category){
				$cate_2 = CategoryModel::where('parent_id', $category['id'])->orderBy('id', 'DESC')->get();
				if(!empty($cate_2)){
					$menu[$key]['cate_2'] = $cate_2;
					$data[$category['id']]['id'] = $category['id'];
					$data[$category['id']]['name'] = $category['name'];
					$data[$category['id']]['cate_2'] = $cate_2;
					foreach($cate_2 as $k => $cate){
						$product = ProductsModel::where('status','1')->orderBy('id', 'DESC')->get();
						if(!empty($product))
							$data[$category['id']]['cate_2']['products'] = $product;
					}
				}
			}
		}
        return view('frontend.home.index', ['menu' => $menu, 'slide' => $slide, 'banner' => $banner, 'data' => $data]);
    }
//	public function index(Request $request)
//    {
//        $page = $request->input('page', 1);
//        $models = ProductsModel::orderBy('id','DESC')->paginate(20);
//        return view('frontend.home.index', ['models' => $models, 'des'=>'Đồ trang trí nội thất','title' => 'Đồ trang trí nội thất','device' => 'desktop']);
//    }

    public function search(Request $request)
    {
        $search = $request->input('keywords');
        if ($search) {
            $page = $request->input('page', 1);
            $models = Cache::remember('search_page_' . $page . '_for_' . str_slug($search, '_'), config('post.timeOut'), function () use ($search) {
                $models = MetaModel::orderBy('id', 'ASC')
                    ->where('type', '=', ProductModel::class)->where('meta_title', 'like', '%' . $search . '%')
                    ->paginate(config('post.homeLimit'));
                return $models;
            });
            return view('frontend.home.search', ['models' => $models, 'title' => 'Tìm kiếm: "' . $search . ' "']);
        }
        return redirect()->action('Frontend\HomeController@index');

    }
}
