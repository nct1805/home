<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\SlidesModel;
use App\Models\admin\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Image;

class SlidesController extends Controller
{
    protected $name = 'slide';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {

        $slide = SlidesModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.slide.index',
            [   'title'=>'Quản lý Slide',
                'data'=>$slide
            ]
        );
           
    }
    public function getAdd()
    {
        $category = CategoryModel::all();
        return view('admin.slide.add',['category' => $category]);    
    }
    public function postAdd(Request $request){
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
        $slide = new SlidesModel;
        $slide->name = $request->name;     
        $slide->url = $request->url;
        $slide->target = $request->target;
        $slide->ordering = $request->ordering;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/slide/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/slide/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/slide');
            $file->move($destinationPath, $image_name);
            $slide->image = $image_name;
        }else{
            $slide->image = '';
        }
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
        $slide = SlidesModel::find($id);
        $category = CategoryModel::all();
        return view('admin.slide.edit',['data' => $slide,'category'=>$category]);    
    }
    public function postEdit(Request $request,$id){
        
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
        $slide = SlidesModel::find($id);
        $slide->name = $request->name;     
        $slide->url = $request->url;     
        $slide->target = $request->target;
        $slide->ordering = $request->ordering;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/slide/".$image_name)){
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/slide/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/slide');
            $file->move($destinationPath, $image_name);
            $slide->image = $image_name;
        }
        $slide->save();
        return redirect('admin/slide/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $slide = SlidesModel::find($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
