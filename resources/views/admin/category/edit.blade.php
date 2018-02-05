@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
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
              <form action="admin/category/edit/{{$data->id}}" method="post">
     			    {{ csrf_field() }}
          		<div class="form-group">
	                <label>Tên danh mục</label>
	                <input type="text" class="form-control" name="name" required="" value="@if(old('name')){{old('name')}}@else{{$data->title}}@endif">
	            </div>
              <div class="form-group">
                  <label>Chi tiết</label>
                  <textarea class="form-control" id="editor1" name="details" rows="30" cols="80">{{$data->content}}</textarea>
              </div>
              <div class="form-group">
                  <label>Meta title</label>
                  <input type="text" class="form-control" name="meta_title"  value="{{$data->meta_title}}">
              </div>
              <div class="form-group">
                  <label>Meta keyword</label>
                  <input type="text" class="form-control" name="meta_key"  value="{{$data->meta_key}}">
              </div>
              <div class="form-group">
                  <label>Meta Description</label>
                  <input type="text" class="form-control" name="meta_des"  value="{{$data->meta_des}}">
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