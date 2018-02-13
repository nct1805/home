@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
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
<!--
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" name="description" value="{{$data->description}}">
                </div>
-->
               <div class="form-group">
					  <label for="exampleInputFile">Trạng thái</label>
					  <div class="row">
						<div class="col-md-12">
							<input type="radio" name="status" value="1" <?=!empty($data->status) ? 'checked' : '';?>> Active
							<input type="radio" name="status" value="0" <?=empty($data->status) ? 'checked' : '';?> > Deactive
						</div>
					  </div>
				  </div>
                @if($data->parent_node_id == 0)
                <div class="form-group">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <p><img width="150" src="<?=!empty($data->image) ? 'public/uploads/danh-muc/'.$data->image : '' ;?>"></p>
                  <input type="file" id="image" name="image">
                  <p style="color:red" id="img_err"></p>
                </div>
                @endif
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
				}
            };
            img.src = _URL.createObjectURL(file);
        }
    }
    return false;
});
</script>
@endsection