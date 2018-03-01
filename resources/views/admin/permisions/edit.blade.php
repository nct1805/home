@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Nhóm quản trị Admin</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('permision_list')}}">Nhóm quản trị Admin</a></li>
        <li class="active">Cập nhật</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Phân quyền nhóm : <strong>{{ $data->name }}</strong></h3>
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
              <form action="admin/permision/edit/{{$data->id}}" method="post">
                <input type="hidden" name="group_id" value="{{ $data->id }}">
     			    {{ csrf_field() }}
              @if($list_modules)
                @foreach($list_modules as $item)
              <div class="box-header with-border" style="float: left; width: 100%">
              <h3 class="box-title">{{ $item->name }}</h3>
              <input type="hidden" name="module_id[]" value="{{ $item->id }}">
              <?php 
                  $add_checked ="";
                  $view_checked ="";
                  $edit_checked ="";
                  $delete_checked ="";
                  $data_check = array();
                  $permision=\App\Models\admin\PermisionsModel::where('modules_id',$item->id)->where('admin_group_id',$data->id)->select('_view','_delete','_add','_edit')->get();
                  if(!empty($permision[0])){
                    $data_check = $permision[0];
                  }
                  if(!empty($data_check)){
                    if($data_check->_view == 1)
                      $view_checked = 'checked="checked"';
                    if($data_check->_add == 1)
                      $add_checked = 'checked="checked"';
                    if($data_check->_edit == 1)
                      $edit_checked = 'checked="checked"';
                    if($data_check->_delete == 1)
                      $delete_checked = 'checked="checked"';
                  }
              ?>

            </div>
          		<div class="form-group">
                <div class="col-md-12">
	                <div class="checkbox col-md-3">
                    <label>
                      <input type="checkbox" name="view_{{ $item->id }}" value="1" {{ $view_checked }} >
                      Xem danh sách
                    </label>
                  </div>
                  <div class="checkbox col-md-3" style="margin-top: 10px;">
                    <label>
                      <input type="checkbox" name="add_{{ $item->id }}" value="1" {{ $add_checked }}>
                      Thêm mới
                    </label>
                  </div>
                  <div class="checkbox col-md-3" style="margin-top: 10px;">
                    <label>
                      <input type="checkbox" name="edit_{{ $item->id }}" value="1" {{ $edit_checked }}>
                      Cập nhật
                    </label>
                  </div>
                  <div class="checkbox col-md-3" style="margin-top: 10px;">
                    <label>
                      <input type="checkbox" name="delete_{{ $item->id }}" value="1" {{ $delete_checked }}>
                      Xóa thông tin
                    </label>
                  </div>
                </div>
	            </div>
              @endforeach
              @endif
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