<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category_linkModel;
use App\Models\admin\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Image;

class Category_linkController extends Controller
{
    protected $name = 'banner';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),9,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $category_link = Category_linkModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.category_link.index',
            [   'title'=>'Quản lý Danh mục text link',
                'data'=>$category_link
            ]
        );        
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),9,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        return view('admin.category_link.add',['category' => []]);    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),9,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
       $this->validate($request,
            [
                'name' => 'required|unique:tbl_posts,title|min:3|max:255'
                
            ],
            [
                'name.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên sản phẩm đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
            ]
        );
        $category_link = new Category_linkModel;
        $category_link->name = $request->name;     
        $category_link->ordering = $request->ordering;
        $category_link->status = $request->status;
        $category_link->save();
        return redirect('admin/category_link/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),9,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $category_link = Category_linkModel::find($id);
        return view('admin.category_link.edit',['data' => $category_link]);    
    }
    public function postEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),9,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        
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
        $category_link = Category_linkModel::find($id);
        $category_link->name = $request->name;     
        $category_link->ordering = $request->ordering;
        $category_link->status = $request->status;

        $category_link->save();
        return redirect('admin/category_link/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),9,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $category_link = Category_linkModel::find($id);
        $category_link->delete();
        return redirect('admin/category_link/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
