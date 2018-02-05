<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\CategoryModel;

class HomeController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $models = ProductsModel::orderBy('id','DESC')->paginate(20);
        return view('frontend.home.index', ['models' => $models, 'des'=>'Đồ trang trí nội thất','title' => 'Đồ trang trí nội thất','device' => 'desktop']);
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
