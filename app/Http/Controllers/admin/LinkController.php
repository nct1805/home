<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\LinkModel;
use App\Models\admin\Category_linkModel;
use Illuminate\Support\Facades\Auth;
use Image;

class LinkController extends Controller
{
    protected $name = 'link';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),5,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $link = LinkModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.link.index',
            [   'title'=>'Quản lý Text Link',
                'data'=>$link
            ]
        );        
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),5,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $category = Category_linkModel::all();
        return view('admin.link.add',['category' => $category]);    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),5,'_add') != 1)
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
        $link = new LinkModel;
        $link->name = $request->name;     
        $link->url = $request->url;
        $link->target = $request->target;
        $link->ordering = $request->ordering;
        $link->status = $request->status;
        $link->catid = $request->category;
        $link->save();
        return redirect('admin/link/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),5,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $link = LinkModel::find($id);
        $category = Category_linkModel::all();
        return view('admin.link.edit',['data' => $link,'category'=>$category]);    
    }
    public function postEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),5,'_edit') != 1)
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
        $link = LinkModel::find($id);
        $link->name = $request->name;     
        $link->url = $request->url;     
        $link->target = $request->target;
        $link->ordering = $request->ordering;
        $link->status = $request->status;
        $link->catid = $request->category;
        $link->save();
        return redirect('admin/link/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),5,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $link = LinkModel::find($id);
        $link->delete();
        return redirect('admin/link/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
