@extends('admin.layouts.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Thành viên</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users_list')}}">Thành viên</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary pull-right" href="{{ route('users_add')}}">Thêm mới</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(session('thongbao'))              
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{session('thongbao')}}
                </div>
              @endif
              <table id="table_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Nhóm</th>
                  <th>Phone</th>
                  <th>Trạng thái</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>
                  @if($row->avatar != NULL)
                  <img width="50" src="public/uploads/avartar/thumbs/{{$row->avatar}}">
                  @else
                      <img width="50" src="public/admin_asset/dist/avatar.png">
                  @endif
                  </td>
                  <td>{{$row->name}}</td>
                  <td>@if($row->group_id != NULL){{$row->getGroup->name}}@endif</td>
                  <td>{{$row->phone}}</td>
                  <td>@if($row->status == 1){{'Đã kích hoạt'}}@else {{'Chưa kích hoạt'}}@endif</td>
                  <td><a href="admin/users/edit/{{$row->id}}"><i class="fa fa-fw fa-edit"></i></a> :: <a href="admin/users/delete/{{$row->id}}"><i class="fa fa-fw fa-trash-o"></i></a></td>
                </tr>
                @endforeach
                </tbody>              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection