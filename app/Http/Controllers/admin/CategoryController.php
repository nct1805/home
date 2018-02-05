<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CategoryModel;

class CategoryController extends Controller
{
    protected $name = 'tbl_pcategories';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {
        $category = CategoryModel::all();
        return view('admin.category.index',
            [   'title'=>'Category',
                'data'=>$category
            ]
        );
           
    }
    public function getAdd()
    {
        return view('admin.category.add');    
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required|unique:tbl_pcategories,title|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên danh mục đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $category = new CategoryModel;
        $category->title = $request->name;
        $category->alias = ceo($request->name);
        $category->parent_id = $request->category;
        $products->content = $request->details;
        $products->meta_title = $request->meta_title;
        $products->meta_key = $request->meta_key;
        $products->meta_des = $request->meta_des;
        
        $category->save();
        return redirect('admin/category/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
        $category = CategoryModel::find($id);
        return view('admin.category.edit',['data' => $category]);    
    }
    public function postEdit(Request $request,$id){
        $category = CategoryModel::find($id);
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
        $category->title = $request->name;
        $category->alias = ceo($request->name);
        $category->parent_id = $request->category;
        $products->content = $request->details;
        $products->meta_title = $request->meta_title;
        $products->meta_key = $request->meta_key;
        $products->meta_des = $request->meta_des;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $category = CategoryModel::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
