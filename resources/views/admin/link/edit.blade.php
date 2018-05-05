@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Text Link</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('link_list')}}">Text Link</a></li>
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
              <form action="admin/link/edit/{{$data->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
                  <label>Danh mục</label>
                  <select class="form-control" style="width: 100%;" id="category" name="category">
              <option value="">Chọn danh mục</option>
              @if($category) 
                @foreach($category as $row)
                  <option value="<?=$row->id;?>" <?=$row->id == $data->catid ? 'selected' : '';?>><?=$row->name;?></option>
                @endforeach    
              @endif
            </select>
              </div>
            
              <div class="form-group">
                  <label>Tiêu đề</label>
                  <input type="text" class="form-control" name="name"  value="{{$data->name}}">
              </div>
              
              
              <div class="form-group">
                  <label>Url</label>
                  <input type="text" class="form-control" name="url"  value="{{$data->url}}">
              </div>
              <div class="form-group">
                  <label>Target</label>
                  
                  <select class="form-control" style="width: 100%;" id="target" name="target">
                    <option value="_blank"  <?php if($data->target == '_blank') echo 'selected="selected"' ?>>Mở trang mới</option>
                    <option value="_self" <?php if($data->target == '_self') echo 'selected="selected"' ?>>Mở trang hiện tại</option>          
                  </select>
              </div>
              <div class="form-group">
                  <label>Thứ tự</label>
                  <input type="text" class="form-control" name="ordering"  value="{{$data->ordering}}">
              </div>
              <div class="form-group">
                  <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios1" value="1" <?php if($data->status ==1) echo 'checked="checked"' ?> >
                          Kích hoạt
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios2" value="0" <?php if($data->status ==0) echo 'checked="checked"' ?>>
                          Không kích hoạt
                      </label>
                  </div>
                  
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cập nhật</button>
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
@endsection
@section('script')
  <script>
    $(document).ready(function(){
    });
  </script>
@endsection