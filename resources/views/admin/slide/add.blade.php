@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Slide</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('slide_list')}}">Quản lý Slide</a></li>
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
              <form action="{{ route('slide_add') }}" method="post" enctype="multipart/form-data">
     			{{ csrf_field() }}
            
          		<div class="form-group">
	                <label>Tiêu đề</label>
	                <input type="text" class="form-control" name="name"  value="{{ old('name') }}">
	            </div>
              
              <div class="form-group">
                  <label for="exampleInputFile">Ảnh banner</label>
                  <input type="file" id="image" name="image">
                </div>
             
              <div class="form-group">
                  <label>Url</label>
                  <input type="text" class="form-control" name="url"  value="{{ old('url') }}">
              </div>
              <div class="form-group">
                  <label>Target</label>
                  <input type="text" class="form-control" name="target"  value="{{ old('target') }}">
              </div>
              <div class="form-group">
                  <label>Thứ tự</label>
                  <input type="text" class="form-control" name="ordering"  value="{{ old('ordering') }}">
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