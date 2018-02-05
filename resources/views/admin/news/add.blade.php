@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Tin tức</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('news_list')}}">Tin tức</a></li>
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
              <form action="{{ route('news_add') }}" method="post" enctype="multipart/form-data">
     			{{ csrf_field() }}
            
          		<div class="form-group">
	                <label>Tiêu đề</label>
	                <input type="text" class="form-control" name="name"  value="{{ old('name') }}">
	            </div>
              
              <div class="form-group">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <input type="file" id="image" name="image">
                </div>
              <div class="form-group">
                  <label>Chi tiết</label>
                  <textarea class="form-control" id="editor1" name="details" rows="30" cols="80"></textarea>
              </div>
              <div class="form-group">
                  <label>Meta title</label>
                  <input type="text" class="form-control" name="meta_title"  value="{{ old('meta_title') }}">
              </div>
              <div class="form-group">
                  <label>Meta keyword</label>
                  <input type="text" class="form-control" name="meta_key"  value="{{ old('meta_key') }}">
              </div>
              <div class="form-group">
                  <label>Meta Description</label>
                  <input type="text" class="form-control" name="meta_des"  value="{{ old('meta_des') }}">
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