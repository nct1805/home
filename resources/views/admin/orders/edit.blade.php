@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Đơn hàng</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('orders_list')}}">Đơn hàng</a></li>
        <li class="active">Xem thông tin</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>
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
              <form action="admin/orders/edit/{{$data->id}}" method="post">
     			    {{ csrf_field() }}
          		<div class="form-group">
	                <label>Họ tên</label>
	                <input type="text" class="form-control" name="name" required="" value="@if(old('name')){{old('name')}}@else{{$data->name}}@endif">
	            </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" name="phone"  value="{{$data->phone}}">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email"  value="{{$data->email}}">
              </div>
              <div class="form-group">
                  <label>Địa chỉ nhận hàng</label>
                  <input type="text" class="form-control" name="addess"  value="{{$data->name}}">
              </div>
              <div class="form-group">
                  <label>Ghi chú</label>
                  <textarea class="form-control" id="editor1" name="notes" rows="30" cols="80">{{$data->notes}}</textarea>
              </div>
              <div class="form-group">
                <table id="table_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th> 
                </tr>
                </thead>
                <tbody>
                @foreach($data_details as $row)
                <tr>
                  <td>1</td>
                  <td>{{$row->product_id}}</td>
                  <td>{{$row->price}}</td>
                  <td>{{$row->qty}}</td>
                  <td>{{$row->qty}}</td>                 
                </tr>
                @endforeach
                </tbody>              
              </table>
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