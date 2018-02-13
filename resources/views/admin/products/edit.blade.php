@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sản phẩm</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products_list')}}">Sản phẩm</a></li>
        <li class="active">Cập nhật</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border"></div>
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
              <form action="admin/products/edit/{{$data->thread_id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
             <div class="form-group">
                  <label>Danh mục</label>
                  <p><?=!empty($data->node_type_id) && !empty($data->node_title) ? $data->node_type_id.' '.$data->node_title : $data->title;?></p>
              </div>
              <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name"  value="<?=!empty($data->name) ? $data->name : $data->thread_title;?>">
              </div>
              <div class="form-group">
              	  <label for="exampleInputFile">Sản phẩm đặc biệt</label>
              	  <div class="row">
              	  	<div class="col-md-12">
						<input type="radio" name="check_special" value="1" <?=!empty($data->check_special) ? 'checked' : '';?>> Active
						<input type="radio" name="check_special" value="0" <?=empty($data->check_special) ? 'checked' : '';?> > Deactive
              	  	</div>
              	  </div>
              </div>
              <div class="form-group">
              	  <label for="exampleInputFile">Trạng thái</label>
              	  <div class="row">
              	  	<div class="col-md-12">
						<input type="radio" name="status" value="1" <?=!empty($data->status) ? 'checked' : '';?>> Active
						<input type="radio" name="status" value="0" <?=empty($data->status) ? 'checked' : '';?> > Deactive
              	  	</div>
              	  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <p><img width="150" src="public/uploads/san-pham/{{$data->image}}"></p>
                  <input type="file" id="image" name="image">
              </div>
              <p style="color:red" id="img_err"></p>
              <div class="box-footer">
                <button type="submit" id="btn_submit" class="btn btn-info pull-right">Cập nhật</button>
                <input type="hidden" name="category_id" value="<?=!empty($data->node_id) ? $data->node_id : '';?>">
              </div>
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
                if(wid < 263 || ht < 350){
					$('#img_err').text('Vui lòng chọn hình với kích thước tối thiểu 263 x 350 pixel.');
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
@section('script')
  <script>
    $(document).ready(function(){
    });
  </script>
@endsection