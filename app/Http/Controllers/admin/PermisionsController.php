<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Admin_groupModel;

class PermisionsController extends Controller
{
    protected $name = 'admin_group';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {
        $admin_group = Admin_groupModel::all();
        return view('admin.admin_group.index',
            [   'title'=>'Nhóm Quản trị Admin',
                'data'=>$admin_group
            ]
        );
           
    }
    public function getAdd()
    {
        return view('admin.admin_group.add');    
    }
    public function postAdd(Request $request){
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
    public function getEdit($id){
        $admin_group = Admin_groupModel::find($id);
        return view('admin.admin_group.edit',['data' => $admin_group]);    
    }
    public function postEdit(Request $request,$id){
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
    public function getDelete($id)
    {
        $admin_group = Admin_groupModel::find($id);
        $admin_group->delete();
        return redirect('admin/admin_group/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
