<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $menu             = array();
		$menu             = CategoryModel::where('parent_id','0')->where('check_menu', 1)->orderBy('id', 'DESC')->get();
		$arrCateDefault   = CategoryModel::where('parent_id','0')->where('status','1')->orderBy('id', 'DESC')->get();
		$slide            = SlidesModel::orderBy('ordering', 'ASC')->get();
		$banner           = BannersModel::orderBy('ordering', 'ASC')->limit(3)->get();
		if(!empty($menu)){
			foreach($menu as $key => $category){
				$cate_2 = CategoryModel::where('parent_id', $category['id'])->where('status','1')->orderBy('id', 'DESC')->get();
				if($cate_2->count() > 0){
					$menu[$key]['total_cate2'] = $cate_2;
				}
			}
		}
		if(!empty($arrCateDefault)){
			foreach($arrCateDefault as $key => $category){
				$cate_2 = CategoryModel::where('parent_id', $category['id'])->where('status','1')->orderBy('id', 'DESC')->get();
                $arrCate2 = [];
                $arrProducts = [];
                $arrSpecial_products = [];
                if(!empty($cate_2)){
					$special_products = array();
                    $arrCate3_id = [];
                    foreach($cate_2 as $k => $cate){
//                        if($cate['id'] == 159){
                            
                        $cate3 = CategoryModel::where('parent_id', $cate['id'])->where('status','1')->orderBy('id', 'DESC')->get();
                        if(!empty($cate3)){
                            array_push($arrCate3_id, $cate['id']);
                            foreach($cate3 as $k => $v)
                                array_push($arrCate3_id, $v['id']);
                        }
                            
                        $product = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3_id)->orderBy('id', 'DESC')->first();
                        if(!empty($product['id']))
                            array_push($arrCate2, $cate);

//                        }
                    }
					
					$arrProducts          = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3_id)->orderBy('id', 'DESC')->limit(4)->get();
					$arrSpecial_products  = ProductsModel::where('status','1')->where('check_special', 1)->whereIn('category_id', $arrCate3_id)->orderBy('id', 'DESC')->limit(20)->get();

                    if( $arrProducts->count() > 0 || $arrSpecial_products->count() > 0 ){
                        $data[$category['id']]['cate1']       = $category;
                        $data[$category['id']]['total_cate2'] = $arrCate2;                       
                        $total_page = ceil((count($arrProducts)/2));
                        $data[$category['id']]['total_page']  = $total_page;
                        
//                        if($total_page > 2){
//                            $tmp = array();
//                            foreach($arrProducts as $k => $v) {
//                                if($k < 4)
//                                    array_push($tmp, $v);
//                            }
//                            
////                            foreach($arrProducts as $v) {
////                                isset($tmp[$v['name']]) or $tmp[$v['name']] = $v;
////                            }
//                            $arrProducts = $tmp;
//                        }
                        $data[$category['id']]['products']    = $arrProducts;
                        $data[$category['id']]['special_products'] = $arrSpecial_products;
                    }
                }
			}
		}
        $url_5giay = 'https://new.5giay.vn/';
		$product_seen = '';
		$list_products = $request->cookie('list_products');
//		dd($data);
		if(!empty($list_products)){
			$list_products = explode(',', $list_products);
			$list_products = array_unique($list_products);
			$product_seen = ProductsModel::where('status','1')->whereIn('id', $list_products)->orderBy('id', 'DESC')->get();
		}
        return view('frontend.home.home', ['menu' => $menu, 'slide' => $slide, 'banner' => $banner, 'url_5giay' => $url_5giay, 'data' => $data, 'product_seen' => $product_seen]);
    }
    
    public function getProductByCate(Request $request){
        if($request->ajax()){
            $type = $request->type;
            $cate_id = $request->id;
			if($type == 2){
				$arrCate3[] = $cate_id;
				$cate3 = CategoryModel::where('parent_id', $cate_id)->orderBy('id', 'DESC')->get();
				if(!empty($cate3)){
					foreach($cate3 as $k => $v)
						array_push($arrCate3, $v['id']);
				}
				$product_all = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3)->orderBy('id', 'DESC')->get();
				$total_page = ceil($product_all->count()/2);
				$product = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3)->orderBy('id', 'DESC')->limit(4)->get();
			}
			else{
				$list_cate_2 = CategoryModel::where('parent_id', $cate_id)->orderBy('id', 'DESC')->get();
				if(!empty($list_cate_2)){
					$arrCate2_id = [];
					$arrCate3 = [];
                    foreach($list_cate_2 as $v){
						array_push($arrCate2_id, $v['id']);
						array_push($arrCate3, $v['id']);
					}
					$cate3 = CategoryModel::whereIn('parent_id', $arrCate2_id)->orderBy('id', 'DESC')->get();
					if(!empty($cate3)){
						foreach($cate3 as $k => $v)
							array_push($arrCate3, $v['id']);
					}
					
					$product_all = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3)->orderBy('id', 'DESC')->get();
					$total_page = ceil($product_all->count()/2);
					$product = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3)->orderBy('id', 'DESC')->limit(4)->get();
                }
			}
			
            return json_encode(array('products' => $product, 'total_page' => $total_page));
        }
    }
    
    public function getProduct(Request $request){
        if($request->ajax()){
            $page    = $request->page;
            $cate_id = $request->cate;
            $cate_2_id = $request->cate_2_id;
            $start = ($page - 1) * 2;
			$arrCate_id = [];
            if(!empty($cate_2_id)){
				$cate3 = CategoryModel::where('parent_id', $cate_2_id)->orderBy('id', 'DESC')->get();
				if(!empty($cate3)){
					$arrCate3 = [];
					foreach($cate3 as $k => $v)
						array_push($arrCate3, $v['id']);
				}
				array_push($arrCate3, $cate_2_id);
				
            }
			else{//all
				$cate2 = CategoryModel::where('parent_id', $cate_id)->orderBy('id', 'DESC')->get();
				
				if(!empty($cate2)){
					$arrCate2 = [];
					$arrCate3 = [];
					foreach($cate2 as $k => $v){
						array_push($arrCate3, $v['id']);
						array_push($arrCate2, $v['id']);
					}
					$cate3 = CategoryModel::whereIn('parent_id', $arrCate2)->orderBy('id', 'DESC')->get();
					if(!empty($cate3)){
						foreach($cate3 as $k => $v)
							array_push($arrCate3, $v['id']);
					}
				}
			}
			
			$product = ProductsModel::where('status','1')->where('check_special', 0)->whereIn('category_id', $arrCate3)->orderBy('id', 'DESC')->offset($start)->limit(2)->get();
            return $product;
        }
    }
    
    public function pushCookie(Request $request){
        if($request->ajax()){
			$product_id = $request->id;
			$list_cookie_products = $request->cookie('list_products');
			
			if(!empty($list_cookie_products)){
				$arrProducts[] = $list_cookie_products;
				$arrProducts_tmp = explode(',', $arrProducts[0]);
				$key = array_search($product_id, $arrProducts_tmp); // $key = 2;
				if(empty($key) && $key == null && count($arrProducts_tmp) <= 20 ){
					array_push($arrProducts, $product_id);
					$strProducts = implode(',', $arrProducts);
					$arrProducts = explode(',', $strProducts);
					if(count($arrProducts) >=20)
						array_shift($arrProducts);
					$arrProducts = implode(',', $arrProducts);
					$minutes = 60;
					return response('1')->withCookie(cookie('list_products', $arrProducts, 60*24*7));
				}
				else
					return 1;
			}
			else{
				return response('1')->withCookie(cookie('list_products', $product_id, 60*24*7));
			}
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
