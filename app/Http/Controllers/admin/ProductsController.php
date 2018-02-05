<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ProductsModel;
use App\Models\admin\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductsController extends Controller
{
    protected $name = 'products';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {

        $products = ProductsModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.products.index',
            [   'title'=>'Sản phẩm',
                'data'=>$products
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
        $products = ProductsModel::find($id);
        $category = CategoryModel::all();
        return view('admin.products.edit',['data' => $products,'category'=>$category]);    
    }
    public function postEdit(Request $request,$id){
        
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
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
        $products = ProductsModel::find($id);
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
        }
        $products->save();
        return redirect('admin/products/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $products = ProductsModel::find($id);
        $products->delete();
        return redirect('admin/products/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
