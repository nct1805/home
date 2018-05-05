@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thành viên</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users_list')}}">Thành viên</a></li>
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
              <form action="admin/users/edit/{{$data->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="form-group">
                <label>Nhóm Admin</label>
                <select name="group_id" class="form-control" style="width: 100%;">
                  <option value="">Chọn nhóm</option>
                  @foreach($group as $row)
                  <option 
                  @if($data->group_id == $row->id)
                    {{"selected"}}
                  @endif
                  value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach                
                </select>
              </div>
              <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="name"  value="{{$data->name}}">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email"  value="{{$data->email}}" disabled="">
              </div>
              <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" name="password"  value="">
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <p><img width="50" src="public/uploads/avatar/thumbs/{{$data->avatar}}"></p>
                  <input type="file" id="image" name="image">
                </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" name="phone"  value="{{$data->phone}}">
              </div>
              <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="address"  value="{{$data->address}}">
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