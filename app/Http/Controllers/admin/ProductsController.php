<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ProductsModel;
use App\Models\admin\ProductsInternalModel;
use App\Models\admin\CategoryModel;
use App\Models\admin\CategoryInternalModel;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductsController extends Controller
{
    protected $name = 'products';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        
        if(check_permision($request->session()->get('data_session'),2,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $products = ProductsInternalModel::orderBy('thread_id','DESC')->leftjoin('products', 'xf_thread.thread_id', '=', 'products.id')->paginate(20);
        return view('admin.products.index',
            [   'title'=>'Sản phẩm',
                'data'=>$products,
            ]
        );
    }
    public function getAdd()
    {
        $category = CategoryModel::all();
        return view('admin.products.add',['category' => $category]);    
    }
    public function postAdd(Request $request){
       $this->validate($request,
            [
                'name' => 'required|unique:tbl_products,title|min:3|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'category_id' =>'required',
            ],
            [
                'name.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên sản phẩm đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'category_id.required' => 'Chọn danh mục',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'image.required' =>'Vui lòng chọn hình',
                'image.mimes' =>'Hình không đúng định dạng',
            ]
        );
        if($request->category_id!=''){
                    $img_or4 = $request->category_id;
                    $mang4 = '';
                    $count =count($img_or4);
                    $i=0;
                    foreach($img_or4 as $v1)
                    {
                        $i++;
                        if($i < $count){
                            $mang4.=$v1.',';
                        }else{
                            $mang4.=$v1;
                        }
                    }
                }
        $products = new ProductsModel;
        $products->title = $request->name;
        $products->parent_id = $mang4;
        $products->alias = ceo($request->name);
        $products->price = $request->price;
        $products->content = $request->details;
        $products->meta_title = $request->meta_title;
        $products->meta_key = $request->meta_key;
        $products->meta_des = $request->meta_des;
        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/san-pham/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/san-pham/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(260, 260, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/san-pham');
            $file->move($destinationPath, $image_name);
            $products->image = $image_name;
        }else{
            $products->image = '';
        }
        $products->save();
        return redirect('admin/products/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
        $products = ProductsInternalModel::select(['products.*' , 'xf_thread.thread_id as thread_id', 'xf_thread.title as thread_title', 'xf_thread.node_id as node_id', 'xf_node.title as node_title', 'xf_node.node_type_id as node_type_id'])
			->where('thread_id',$id)->orderBy('thread_id', 'desc')
			->leftjoin('products', 'xf_thread.thread_id', '=', 'products.id')
			->leftjoin('xf_node', 'xf_node.node_id', '=', 'xf_thread.node_id')->first();
        return view('admin.products.edit',['data' => $products]);    
    }
    public function postEdit(Request $request,$id){
        $image_name_wap = '';
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
				'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
				'image.mimes' =>'Hình không đúng định dạng',
            ]
        );
        $products = ProductsModel::find($id);
		if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/san-pham/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/san-pham');
            $img = Image::make($file->getRealPath());
			$width  = $img->width();
			$height = $img->height();
			//Resize image special product
			if($request->check_special == 1){
				if($width > 263 || $height > 350)
					$img->resize(263, 350);
			}
			else{
				if($width > 202 || $height > 204)
					$img->resize(202, 204);
            		
			}
            $img->save(public_path('uploads/san-pham/' .$image_name));
        }
		else{
			$image_name = $products->image;
			$img_path_tmp = public_path('uploads/san-pham/' .$image_name);
			$img_tmp = Image::make($img_path_tmp);
			$width  = $img_tmp->width();
			$height = $img_tmp->height();
			if($request->check_special == 1){
				$img_tmp->resize(263, 350);
			}
			else{
				$img_tmp->resize(202, 204);
			}
			$img_tmp->save(public_path('uploads/san-pham/' .$image_name));
		}
        
        if($request->hasFile('image_wap')){
            $file = $request->file('image_wap');            
            $name = $file->getClientOriginalName();
            $image_name_wap = str_random(4)."_".$name;
            while (file_exists("uploads/san-pham/".$image_name_wap)) {
                $image_name_wap = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/san-pham');
            $img = Image::make($file->getRealPath());
			$width  = $img->width();
			$height = $img->height();
            if($width > 710 || $height > 220)
                $img->resize(710, 220);
            $img->save(public_path('uploads/san-pham/' .$image_name_wap));
        }
		else
			$image_name_wap = !empty($products->image_wap) ? $products->image_wap : '';
		//Add new
		if(empty($products)){
			$product_new = new ProductsModel;
			$product_new->id            = $id;
			$product_new->name          = html_entity_decode($request->name);
			$product_new->alias         = ceo($request->name);
			$product_new->category_id   = $request->category_id;
			$product_new->shop_name     = $request->shop_name;
			$product_new->price         = $request->price;
			$product_new->status        = $request->status;
			$product_new->check_special = $request->check_special;
			$product_new->image         = $image_name;
            if(!empty($image_name_wap) && !empty($request->check_special) )
                $product_new->image_wap = $image_name_wap;
			$product_new->save();
		}
		else{
			$products->id            = $id;
			$products->name          = html_entity_decode($request->name);
			$products->alias         = ceo($request->name);
			$products->category_id   = $request->category_id;
			$products->shop_name     = $request->shop_name;
			$products->price         = $request->price;
			$products->status        = $request->status;
			$products->check_special = $request->check_special;
			$products->image         = $image_name;
            if(!empty($image_name_wap) && !empty($request->check_special) )
                $products->image_wap = $image_name_wap;
			$products->save();
		}
        return redirect('admin/products/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $products = ProductsModel::find($id);
        $products->delete();
        return redirect('admin/products/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
