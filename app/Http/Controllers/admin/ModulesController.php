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
    public function getList()
    {
        $modules = ModulesModel::all();
        return view('admin.modules.index',
            [   'title'=>'Modules',
                'data'=>$modules
            ]
        );
           
    }
    public function getAdd()
    {
        return view('admin.modules.add');    
    }
    public function postAdd(Request $request){
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
    public function getEdit($id){
        $modules = ModulesModel::find($id);
        return view('admin.modules.edit',['data' => $modules]);    
    }
    public function postEdit(Request $request,$id){
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
    public function getDelete($id)
    {
        $modules = ModulesModel::find($id);
        $modules->delete();
        return redirect('admin/modules/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
