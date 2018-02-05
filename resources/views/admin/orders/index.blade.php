@extends('admin.layouts.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Danh mục</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('orders_list')}}">Đơn hàng</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary pull-right" href="{{ route('category_add')}}">Thêm mới</a>
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
                  <th>Họ tên</th>
                  <th>SĐT</th>
                  <th>Email</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th style="width:90px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->qty}}</td>
                  <td>{{$row->total}}</td>
                  <td>{{$row->status}}</td>           
                  <td><a href="admin/orders/edit/{{$row->id}}"><i class="fa fa-fw fa-edit"></i></a> :: <a href="admin/orders/delete/{{$row->id}}"><i class="fa fa-fw fa-trash-o"></i></a></td>
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