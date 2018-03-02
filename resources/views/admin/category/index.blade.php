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
<!--                  <th>ID</th>-->
                  <th>Name</th>
                  <th style="width:120px">Trang thái</th>
                  <th style="width:90px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                @php $style = ''; @endphp
                @if($row->depth == 1)
                   @php
                        $style = 'padding-left:20px';
                    @endphp
                @elseif($row->depth == 2)
                   @php
                        $style = 'padding-left:40px';
                    @endphp
                @endif
                <tr>
                  <td style="{{$style}}"><?=!empty($row->name) ? $row->name : $row->title;?> <span style="font-size:11px; color:rgb(200,200,200);">{{$row->node_type_id}}</span></td>
                  <td>@if($row->status == 1)<span class="label label-success">{{'Đã kích hoạt'}}</span>@else <span class="label label-danger">{{'Chưa kích hoạt'}}</span>@endif</td>
                  <td><a href="admin/category/edit/{{$row->node_id}}"><i class="fa fa-fw fa-edit"></i></a>
                  </td>
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