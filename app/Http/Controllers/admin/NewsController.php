<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\NewsModel;
use App\Models\admin\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Image;

class NewsController extends Controller
{
    protected $name = 'tbl_posts';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {

        $news = NewsModel::orderBy('id','DESC')->paginate(20);;
        return view('admin.news.index',
            [   'title'=>'Sản phẩm',
                'data'=>$news
            ]
        );
           
    }
    public function getAdd()
    {
        $category = CategoryModel::all();
        return view('admin.news.add',['category' => $category]);    
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
                'image.mimes' =>'Hình không đúng định dạng',
            ]
        );
        $news = new NewsModel;
        $news->title = $request->name;     
        $news->alias = ceo($request->name);
        $news->content = $request->details;
        $news->meta_title = $request->meta_title;
        $news->meta_key = $request->meta_key;
        $news->meta_des = $request->meta_des;

        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/bai-viet/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/bai-viet/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/bai-viet');
            $file->move($destinationPath, $image_name);
            $news->image = $image_name;
        }else{
            $news->image = '';
        }
        $news->save();
        return redirect('admin/news/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
        $news = NewsModel::find($id);
        $category = CategoryModel::all();
        return view('admin.news.edit',['data' => $news,'category'=>$category]);    
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
        $news = NewsModel::find($id);
        $news->title = $request->name;     
        $news->alias = ceo($request->name);
        $news->content = $request->details;
        $news->meta_title = $request->meta_title;
        $news->meta_key = $request->meta_key;
        $news->meta_des = $request->meta_des;
        if($request->hasFile('image')){
            $file = $request->file('image');            
            $name = $file->getClientOriginalName();
            $image_name = str_random(4)."_".$name;
            while (file_exists("uploads/bai-viet/".$image_name)) {
                $image_name = str_random(4)."_".$name;
            }
            $destinationPath = public_path('uploads/bai-viet/thumbs');
            $img = Image::make($file->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            $destinationPath = public_path('uploads/bai-viet');
            $file->move($destinationPath, $image_name);
            //@unlink("uploads/bai-viet/thumbs/".$news->image);
            //@unlink("uploads/bai-viet/".$news->image);
            $news->image = $image_name;
        }
        $news->save();
        return redirect('admin/news/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $news = NewsModel::find($id);
        $news->delete();
        return redirect('admin/news/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
