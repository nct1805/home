@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thành viên</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users_list')}}">Thành viên</a></li>
        <li class="active">Thêm mới</li>
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
              <form action="{{ route('users_add') }}" method="post" enctype="multipart/form-data">
     			{{ csrf_field() }}
            <div class="form-group">
                <label>Danh mục</label>
                <select name="group_id" class="form-control" style="width: 100%;">
                  <option value="">Chọn nhóm quản trị</option>
                  @foreach($group as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach                
                </select>
              </div>
          		<div class="form-group">
	                <label>Họ tên</label>
	                <input type="text" class="form-control" name="name"  value="{{ old('name') }}">
	            </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email"  value="{{ old('email') }}">
              </div>
               <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" name="password"  value="{{ old('password') }}">
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <input type="file" id="image" name="image">
                </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" name="phone"  value="{{ old('phone') }}">
              </div>
              <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="address"  value="{{ old('address') }}">
              </div>
              <div class="form-group">
                  <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios1" value="1" checked>
                          Kích hoạt
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                          <input type="radio" name="status" id="optionsRadios2" value="0">
                          Không kích hoạt
                      </label>
                  </div>
                  
              </div>
	            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Thêm mới</button>
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