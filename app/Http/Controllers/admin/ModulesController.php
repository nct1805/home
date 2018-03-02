<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ModulesModel;

class ModulesController extends Controller
{
    protected $name = 'modules';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),7,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $modules = ModulesModel::all();
        return view('admin.modules.index',
            [   'title'=>'Modules',
                'data'=>$modules
            ]
        );
           
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),7,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        return view('admin.modules.add');    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),7,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $this->validate($request,
            [
                'name' => 'required|unique:modules,name|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $modules = new ModulesModel;
        $modules->name = $request->name;
        $modules->save();
        return redirect('admin/modules/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),7,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $modules = ModulesModel::find($id);
        return view('admin.modules.edit',['data' => $modules]);    
    }
    public function postEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),7,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $modules = ModulesModel::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên danh mục đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $modules->name = $request->name;
        $modules->save();
        return redirect('admin/modules/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),7,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $modules = ModulesModel::find($id);
        $modules->delete();
        return redirect('admin/modules/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
