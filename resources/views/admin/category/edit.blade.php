@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Danh mục ngành hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="admin/category/list">Ngành hàng</a></li>
        <li class="active">Cập nhật</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit {{$data->node_type_id}}: {{$data->title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">          
              <div class="col-md-12">
              @if(count($errors) > 0)
              	@foreach($errors->all() as $err)
              		{{$err}}<br/>
              	@endforeach
              @endif
              @if(session('thongbao'))             	
              	<div class="alert alert-success alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{session('thongbao')}}
                </div>
              @endif
              <form action="admin/category/edit/{{$data->node_id}}" method="post" enctype="multipart/form-data">
     			    {{ csrf_field() }}
          		<div class="form-group">
	                <label>Tên danh mục</label>
	                <input type="text" class="form-control" name="name" required="" value="<?=!empty($data->name) ? $data->name : $data->title;?>">
	            </div>
	            @if(!empty($data->node_name))
	            <div class="form-group">
                    <label>Alias</label>
                    <input class="form-control" name="alias" value="<?=!empty($data->alias) ? $data->alias : $data->node_name;?>">
                </div>
	            @endif()
               
                @if($data->parent_node_id == 0)
                <div class="form-group" >
                  <label for="exampleInputFile">Icon đại diện</label>
                  <p ><img id="img_icon" style="background-color:black;" width="30" src="<?=!empty($data->icon) ? 'public/uploads/danh-muc/'.$data->icon : '' ;?>"></p>
                  <input type="file" id="icon" name="icon">
                  <p style="color:red" id="icon_err"></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Banner</label>
                  <p><img id="img_banner" width="550" src="<?=!empty($data->image) ? 'public/uploads/danh-muc/'.$data->image : '' ;?>"></p>
                  <input type="file" id="image" name="image">
                  <p style="color:red" id="img_err"></p>
                </div>
                
                <div class="form-group">
                      <label for="exampleInputFile">Check hiển thị menu</label>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="radio">
                      <label>
                          <input type="radio" name="check_menu" id="optionsRadios1" value="1" <?=!empty($data->check_menu) ? 'checked' : '';?> >
                          Hiển thị menu
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                          <input type="radio" name="check_menu" id="optionsRadios2" value="0" <?=empty($data->check_menu) ? 'checked' : '';?>>
                          Không hiển thị menu
                      </label>
                  </div>
                      </div>
                  </div>
                </div>
                @endif
                <div class="form-group">
                  <label>Thứ tự</label>
                  <input type="text" class="form-control" name="ordering"  value="{{$data->ordering}}">
              </div>
                <div class="form-group">
                      <label for="exampleInputFile">Trạng thái</label>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios1" value="1" <?=!empty($data->status) ? 'checked' : '';?> >
                          Kích hoạt
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios2" value="0" <?=empty($data->status) ? 'checked' : '';?>>
                          Không kích hoạt
                      </label>
                  </div>
                      </div>
                  </div>
                </div>
                <div class="box-footer">
                    <button id="btn_submit" type="submit" class="btn btn-info pull-right">Cập nhật</button>
                  </div>
                  <input type="hidden" name="type_id" value="<?=!empty($data->type_id) ? $data->type_id : $data->node_type_id;?>">
                  <input type="hidden" name="parent_id" value="<?=!empty($data->parent_node_id) ? $data->parent_node_id : 0;?>">
              </form>
              </div>  
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
<script>
var _URL = window.URL || window.webkitURL;
var file, img;
img = new Image();
//Upload image avatar
$(document).on('change', '#image', function()
{
    var fileExtension = [ 'jpeg', 'jpg', 'png', 'gif' ];
    if( $.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1 )
    {
        $('#img_err').text('Bạn vui lòng chọn hình ảnh dạng ' + fileExtension.join(', '));
		$('#btn_submit').attr('disabled', true);
        return false;
    }
    else
    {
        if ((file = this.files[0])){
            img.onload = function () {
                var wid = this.width;
                var ht = this.height;
                if(wid < 1140 || ht < 149){
					$('#img_err').text('Vui lòng chọn hình với kích thước tối thiểu 1140 x 149 pixel.');
					$('#btn_submit').attr('disabled', true);
                    return false;
                }
                else{
					$('#img_err').text('');
					$('#btn_submit').attr('disabled', false);
                    $('#img_banner').attr('src',img.src);
				}
            };
            img.src = _URL.createObjectURL(file);
        }
    }
    return false;
});
$(document).on('change', '#icon', function()
{
    var fileExtension = [ 'jpeg', 'jpg', 'png', 'gif' ];
    if( $.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1 )
    {
        $('#img_err').text('Bạn vui lòng chọn hình ảnh dạng ' + fileExtension.join(', '));
		$('#btn_submit').attr('disabled', true);
        return false;
    }
    else
    {
        if ((file = this.files[0])){
            img.onload = function () {
                $('#icon_err').text('');
//					$('#btn_submit').attr('disabled', false);
                $('#img_icon').attr('src',img.src);
            };
            img.src = _URL.createObjectURL(file);
        }
    }
    return false;
});
</script>
@endsection