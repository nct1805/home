<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\UsersModel;
use App\Models\admin\Admin_groupModel;
use Illuminate\Support\Facades\Auth;
use Image;

class UsersController extends Controller
{
    protected $name = 'users';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),3,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $users = UsersModel::orderBy('id','DESC')->get();
        return view('admin.users.index',
            [   'title'=>'Thành viên',
                'data'=>$users
            ]
        );
           
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),3,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $group = Admin_groupModel::all();
        return view('admin.users.add',['group' => $group]);    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),3,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
       $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|string|email|unique:users,email',
                'group_id' =>'required',
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã tồn tại',
                'group_id.required' => 'Vui lòng chọn nhóm'
            ]
        );
        $users = new UsersModel;
        $users->name = $request->name;
        $users->group_id = $request->group_id;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/avartar/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/avartar/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/avartar');
            $file->move($destinationPath, $image_name);
            $users->avatar = $image_name;
        }else{
            $users->avatar = '';
        }
        $users->save();
        return redirect('admin/users/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),3,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $users = UsersModel::find($id);
        $group = Admin_groupModel::all();
        return view('admin.users.edit',['data' => $users,'group'=>$group]);    
    }
    public function postEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),3,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'group_id' =>'required',
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'group_id.required' => 'Vui lòng chọn nhóm'
            ]
        );
        $users = UsersModel::find($id);
        $users->name = $request->name;
        $users->group_id = $request->group_id;
        $users->status = $request->status;
        if($request->password != ''){
            $users->password = bcrypt($request->password);
        }       
        $users->address = $request->address;
        $users->phone = $request->phone;
        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/avatar/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/avatar/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/avatar');
            $file->move($destinationPath, $image_name);
            @unlink("uploads/avatar/thumbs/".$products->image);
            @unlink("uploads/avatar/".$products->image);
            $users->avatar = $image_name;
        }
        $users->save();
        return redirect('admin/users/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),3,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $users = UsersModel::find($id);
        $users->delete();
        return redirect('admin/users/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
