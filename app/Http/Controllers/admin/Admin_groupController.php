<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Admin_groupModel;

class Admin_groupController extends Controller
{
    protected $name = 'admin_group';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),10,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::all();
        return view('admin.admin_group.index',
            [   'title'=>'Nhóm Quản trị Admin',
                'data'=>$admin_group
            ]
        );
           
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),10,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        return view('admin.admin_group.add');    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),10,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $this->validate($request,
            [
                'name' => 'required|unique:admin_group,name|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $admin_group = new Admin_groupModel;
        $admin_group->name = $request->name;
        $admin_group->save();
        return redirect('admin/admin_group/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),10,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::find($id);
        return view('admin.admin_group.edit',['data' => $admin_group]);    
    }
    public function postEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),10,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::find($id);
        $this->validate($request,
            [
                'name' => 'required|unique:admin_group,name|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên danh mục đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $admin_group->name = $request->name;
        $admin_group->save();
        return redirect('admin/admin_group/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),10,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::find($id);
        $admin_group->delete();
        return redirect('admin/admin_group/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
