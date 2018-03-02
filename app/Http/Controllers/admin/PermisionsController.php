<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Admin_groupModel;
use App\Models\admin\ModulesModel;
use App\Models\admin\PermisionsModel;
use Illuminate\Support\Facades\DB;

class PermisionsController extends Controller
{
    protected $name = 'admin_group';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),7,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::all();
        return view('admin.permisions.index',
            [   'title'=>'Nhóm Quản trị Admin',
                'data'=>$admin_group
            ]
        );
           
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),7,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $admin_group = Admin_groupModel::find($id);
        $list_modules = ModulesModel::all();
        return view('admin.permisions.edit',['data' => $admin_group,'list_modules' => $list_modules]);    
    }
    public function postEdit(Request $request,$id){
        $admin_group = Admin_groupModel::find($id);
        $arr_module = $request->module_id;
        if(!empty($arr_module)){
            foreach ($arr_module as $key => $value) {
                    $query = DB::table('permission');
                    $query->where('admin_group_id', '=', $id);
                    $query->where('modules_id', '=', $value);
                    $permission = $query->select('id');
                    $total = $permission->count();
                    $permission = $permission->get();
                    if(isset($_POST['view_'.$value]))
                        $view = 1;
                    else $view = 0;
                    if(isset($_POST['add_'.$value]))
                        $add = 1;
                    else $add =  0;
                    if(isset($_POST['edit_'.$value]))
                        $edit = 1;
                    else $edit = 0;
                    if(isset($_POST['delete_'.$value]))
                        $delete = 1;
                    else $delete = 0;
                    if($total > 0){ //update
                         DB::table('permission')
                            ->where('admin_group_id',$id)
                            ->where('modules_id',$value)
                            ->update([
                                    '_view' =>$view,
                                    '_delete' =>$delete,
                                    '_add' =>$add,
                                    '_edit' =>$edit,
                                    ]
                                );
                    }else{ // thêm mới
                        DB::table('permission')
                            ->insert([
                                    'admin_group_id' => $id,
                                    'modules_id' =>$value,
                                    '_view' =>$view,
                                    '_delete' =>$delete,
                                    '_add' =>$add,
                                    '_edit' =>$edit,
                                    'updated_at' =>date('Y-m-d H:i:s'),
                                    'created_at' =>date('Y-m-d H:i:s')
                                ]
                            );
                    }            
            }
        }
        return redirect('admin/permision/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
}
