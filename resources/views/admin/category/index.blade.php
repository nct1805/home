@extends('admin.layouts.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Danh mục</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Danh mục</a></li>
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
                  <th>Name</th>
                  
                  
                  <th style="width:90px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->title}}
                  </td>
                  
                  <td><a href="admin/category/edit/{{$row->id}}">sửa</a> :: <a href="admin/category/delete/{{$row->id}}">Xóa</a></td>
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