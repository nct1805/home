@extends('admin.layouts.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Banner</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('banner_list')}}">Quản lý Banner</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary pull-right" href="{{ route('banner_add')}}">Thêm mới</a>
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
                  <th style="width:40px">ID</th>
                  <th >Hình ảnh</th>
                  <th>Tiêu đề</th>
                  <th style="width:120px">Trạng thái</th>             
                  <th style="width:70px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td><img src="public/uploads/banner/{{$row->image}}" width="50px"></td>
                  <td>{{$row->name}}</td>
                  <td>@if($row->status == 1)<span class="label label-success">{{'Đã kích hoạt'}}</span>@else <span class="label label-danger">{{'Chưa kích hoạt'}}</span>@endif</td>
                  <td><a href="admin/banner/edit/{{$row->id}}"><i class="fa fa-fw fa-edit"></i></a> :: <a href="admin/banner/delete/{{$row->id}}"><i class="fa fa-fw fa-trash-o"></i></a></td>
                </tr>
                @endforeach
                </tbody>              
              </table>
              {{$data->links()}}
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