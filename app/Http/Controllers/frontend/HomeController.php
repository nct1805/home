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
        $data             = array();
		$menu             = CategoryModel::where('parent_id','0')->where('status','1')->orderBy('id', 'DESC')->get();
		$slide            = SlidesModel::orderBy('ordering', 'ASC')->get();
		$banner           = BannersModel::orderBy('ordering', 'ASC')->limit(3)->get();
		if(!empty($menu)){
			foreach($menu as $key => $category){
				$cate_2 = CategoryModel::where('parent_id', $category['id'])->orderBy('id', 'DESC')->get();
                $arrProducts = [];
                $arrSpecial_products = [];
                if(!empty($cate_2)){
                    foreach($cate_2 as $k => $cate){
                        $special_products = array();
                        $product          = [];
						$product          = ProductsModel::where('status','1')->where('check_special', 0)->where('category_id', $cate['id'])->orderBy('id', 'DESC')->get();
						$special_products = ProductsModel::where('status','1')->where('check_special', 1)->where('category_id', $cate['id'])->orderBy('id', 'DESC')->limit(20)->get();
                        
                        if($product->count() > 0){
                            foreach($product as $pr)
                                array_push($arrProducts, $pr);
                        }
                        
                        if($special_products->count() > 0){
                            foreach($special_products as $spc_pr)
                                array_push($arrSpecial_products, $spc_pr);
                        }
					}
                    if( !empty($arrProducts) || !empty($arrSpecial_products) ){
                        $data[$category['id']]['cate1']       = $category;
                        $data[$category['id']]['total_cate2'] = $cate_2;
                        
                        $total_page = ceil((count($arrProducts)/2));
                        $data[$category['id']]['total_page']  = $total_page;
                        
                        if($total_page > 2){
                            $tmp = array();
                            foreach($arrProducts as $k => $v) {
                                if($k < 4)
                                    array_push($tmp, $v);
                            }
                            
//                            foreach($arrProducts as $v) {
//                                isset($tmp[$v['name']]) or $tmp[$v['name']] = $v;
//                            }
                            $arrProducts = $tmp;
                        }
                        $data[$category['id']]['products']    = $arrProducts;
                        $data[$category['id']]['special_products'] = $arrSpecial_products;
                    }
                }
			}
		}
        $url_5giay = 'https://www.5giay.vn';

        return view('frontend.home.index', ['menu' => $menu, 'slide' => $slide, 'banner' => $banner, 'url_5giay' => $url_5giay, 'data' => $data]);
    }
    
    public function getProductByCate(Request $request){
        if($request->ajax()){
            $cate_id = $request->id;
            $product = ProductsModel::where('status','1')->where('check_special', 0)->where('category_id', $cate_id)->orderBy('id', 'DESC')->limit(4)->get();
            return $product;
        }
    }
    
    public function getProduct(Request $request){
        if($request->ajax()){
            $page    = $request->page;
            $cate_id = $request->cate;
            $cate_2_id = $request->cate_2_id;
            $start = ($page - 1) * 2;
            if(empty($cate_2_id)){//all
                $arrCate2_id = [];
                $list_cate_2 = CategoryModel::where('parent_id', $cate_id)->orderBy('id', 'DESC')->get();
                if(!empty($list_cate_2)){
                    foreach($list_cate_2 as $v)
                        array_push($arrCate2_id, $v['id']);
                    $product = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate2_id)->orderBy('id', 'DESC')->offset($start)->limit(2)->get();
                }
            }
            else
                $product = ProductsModel::where('status','1')->where('check_special', 0)->where('category_id', $cate_id)->orderBy('id', 'DESC')->offset($start)->limit(2)->get();
//            print_r($product);die;
            return $product;
        }
    }
    
    public function pushCookie(Request $request){
        if($request->ajax()){
            $product_id    = $request->id;
            $cookie = array (
                'name'   => 'list_products',
                'value'  => serialize ($product_id),
                'expire' => '3600', //1h 
            );
            $this->input->set_cookie ($cookie); //set cookie
            $list_products = $this->input->cookie ('list_products', true);
            print_r($list_products);die;
        }
    }

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
