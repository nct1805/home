<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\BannersModel;
use App\Models\admin\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Image;

class BannersController extends Controller
{
    protected $name = 'banner';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),5,'_view') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $banner = BannersModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.banner.index',
            [   'title'=>'Quản lý banner',
                'data'=>$banner
            ]
        );        
    }
    public function getAdd(Request $request)
    {
        if(check_permision($request->session()->get('data_session'),5,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $category = CategoryModel::all();
        return view('admin.banner.add',['category' => $category]);    
    }
    public function postAdd(Request $request){
        if(check_permision($request->session()->get('data_session'),5,'_add') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
       $this->validate($request,
            [
                'name' => 'required|unique:tbl_posts,title|min:3|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                
            ],
            [
                'name.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên sản phẩm đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'image.required' =>'Vui lòng chọn hình',
                'image.mimes' =>'Banner không đúng định dạng',
            ]
        );
        $banner = new BannersModel;
        $banner->name = $request->name;     
        $banner->url = $request->url;
        $banner->target = $request->target;
        $banner->ordering = $request->ordering;
        $banner->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/banner/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/banner/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/banner');
            $file->move($destinationPath, $image_name);
            $banner->image = $image_name;
        }else{
            $banner->image = '';
        }
        $banner->save();
        return redirect('admin/banner/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit(Request $request,$id){
        if(check_permision($request->session()->get('data_session'),5,'_edit') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $banner = BannersModel::find($id);
        $category = CategoryModel::all();
        return view('admin.banner.edit',['data' => $banner,'category'=>$category]);    
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
        $banner = BannersModel::find($id);
        $banner->name = $request->name;     
        $banner->url = $request->url;     
        $banner->target = $request->target;
        $banner->ordering = $request->ordering;
        $banner->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/banner/".$image_name)){
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/banner/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/banner');
            $file->move($destinationPath, $image_name);
            $banner->image = $image_name;
        }
        $banner->save();
        return redirect('admin/banner/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete(Request $request,$id)
    {
        if(check_permision($request->session()->get('data_session'),5,'_delete') != 1)
            return redirect('admin/permision')->with('thongbao','Bạn không có quyền thực hiện chức năng này');
        $banner = BannersModel::find($id);
        $banner->delete();
        return redirect('admin/banner/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
