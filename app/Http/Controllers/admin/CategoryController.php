<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CategoryModel;
use App\Models\admin\CategoryInternalModel;
use Image;
class CategoryController extends Controller
{
    protected $name = 'tbl_pcategories';
    public function __construct(){
        $this->middleware('auth');
    }
//    public function getList()
//    {
//        $category = CategoryModel::all();
//        return view('admin.category.index',
//            [   'title'=>'Category',
//                'data'=>$category
//            ]
//        );
//           
//    }
	public function getListAjax(Request $request){
		if($request->ajax()){
			$cate_id = $request->id;
			$data = CategoryInternalModel::where('parent_node_id',$cate_id)->orderBy('lft', 'ASC')->get();
			return $data;
		}
	}
    public function getAdd()
    {
        return view('admin.category.add');    
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required|unique:tbl_pcategories,title|min:3|max:255'
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.unique' =>'Tên danh mục đã tồn tại',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự'
            ]
        );
        $category = new CategoryModel;
        $category->title = $request->name;
        $category->alias = ceo($request->name);
        $category->parent_id = $request->category;
        $products->content = $request->details;
        $products->meta_title = $request->meta_title;
        $products->meta_key = $request->meta_key;
        $products->meta_des = $request->meta_des;
        
        $category->save();
        return redirect('admin/category/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
		$data = CategoryInternalModel::where('node_id',$id)->orderBy('node_id', 'desc')->leftjoin('category', 'xf_node.node_id', '=', 'category.id')->first();
        return view('admin.category.edit', ['data' => $data]);    
    }
    public function postEdit(Request $request,$id){
        $category_exten = CategoryModel::find($id);
		$image_name = '';
		$icon_name = '';
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'nam.required' =>'Vui lòng nhập tên',
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'icon.mimes' =>'Hình không đúng định dạng',
            ]
        );
        if(!empty($request->alias)){
            if(!preg_match("/^[_a-zA-Z0-9- ]+$/", $request->alias))
                return redirect('admin/category/edit/'.$id)->with('thongbao','Vui lòng nhập alias không có ký tự đặc biệt');    
        }
		if((empty($category_exten) || empty($category_exten->image)) && empty($request->file('image')) && $request->parent_id == 0)
			return redirect('admin/category/edit/'.$id)->with('thongbao','Vui lòng chọn hình');  
        $alias = !empty($request->alias) ? $request->alias : '';
		
        if($request->parent_id == 0){
            //Banner
			if($request->hasFile('image')){
				$file = $request->file('image');            
				$name = $file->getClientOriginalName();
				$image_name = str_random(4)."_".$name;
				while (file_exists("uploads/danh-muc/".$image_name)) {
					$image_name = str_random(4)."_".$name;
				}
				$destinationPath = public_path('uploads/danh-muc');
				$img = Image::make($file->getRealPath());
				$width  = $img->width();
				$height = $img->height();
				if($width > 1140 || $height > 149)
					$img->resize(1140, 149);
				$img->save(public_path('uploads/danh-muc/' .$image_name));
			}
			else
				$image_name = $category_exten->image;
            
            //Icon
            if($request->hasFile('icon')){
				$file_icon = $request->file('icon');            
				$name_icon = $file_icon->getClientOriginalName();
				$icon_name = str_random(4)."_".$name_icon;
				while (file_exists("uploads/danh-muc/".$icon_name)) {
					$icon_name = str_random(4)."_".$name_icon;
				}
				$destinationPath = public_path('uploads/danh-muc');
				$icon = Image::make($file_icon->getRealPath());
				$width_icon  = $icon->width();
				$height_icon = $icon->height();
				if($width_icon > 23 || $height_icon > 25)
					$icon->resize(23, 25);
				$icon->save(public_path('uploads/danh-muc/' .$icon_name));
			}
			else
				$icon_name = $category_exten->icon;
		}
        //Add new
        if(empty($category_exten)){
            
            $category = new CategoryModel;
			$category->id          = $id;
            $category->name        = $request->name;
            $category->status      = $request->status;
			$category->type_id     = $request->type_id;
			$category->parent_id   = $request->parent_id;
            $category->check_menu   = $request->check_menu;
            $alias = !empty($alias) ? $alias : ceo($request->name);//If cate 1
            $category->alias       = $alias;
            $category->image       = $image_name;
            $category->icon        = $icon_name;
            $category->save();
        }
        else{
            $category_exten->id          = $id;
            $category_exten->name        = $request->name;
            $category_exten->status      = $request->status;
            $category_exten->type_id     = $request->type_id;
            $category_exten->parent_id   = $request->parent_id;
            $category_exten->check_menu   = $request->check_menu;
            $alias = !empty($alias) ? $alias : ceo($request->name);
            $category_exten->alias       = $alias;
            $category_exten->image       = $image_name;
            $category_exten->icon        = $icon_name;
            $category_exten->save();
        }
        return redirect('admin/category/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $category = CategoryModel::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}
