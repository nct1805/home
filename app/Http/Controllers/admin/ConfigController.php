<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ConfigModel;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    protected $name = 'config';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),5,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $config = ConfigModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.config.index',
            [   'title'=>'Quản lý Cấu hình',
                'data'=>$config
            ]
        );        
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),5,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $config = ConfigModel::find($id);
        return view('admin.config.edit',['data' => $config]);    
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
        $config = ConfigModel::find($id);
        $config->name = $request->name;     
        $config->email = $request->email;     
        $config->phone = $request->phone;
        $config->title = $request->title;
        $config->keyword = $request->keyword;
        $config->description = $request->description;
        $config->script = $request->script;
        $config->status = $request->status;
        $config->save();
        return redirect('admin/config/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
}
