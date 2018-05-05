@extends('admin.layouts.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Tin đăng</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products_list')}}">Tin đăng</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           	<div class="box-header">
				<form action="admin/products/list" method="get">
					<div class="col-md-3" style="padding-left: 0px">
						<label for="">Ngành hàng cấp 1</label>
						<select class="form-control" style="width: 100%;" id="cate_1" name="cate_1">
							<option value="">Ngành hàng cấp 1</option>
							@if($list_cate1) 
								@foreach($list_cate1 as $row)
									<option value="<?=$row->node_id;?>" <?=$row->node_id == $cate_1 ? 'selected' : '';?>><?=$row->title;?></option>
								@endforeach    
							@endif
						</select>
					</div>
					<div class="col-md-2" style="padding-left: 0px">
						<label for="">Ngành hàng cấp 2</label>
						<select class="form-control" style="width: 100%;" id="cate_2" name="cate_2">
							<option value="">Ngành hàng cấp 2</option>
							@if($list_cate2) 
								@foreach($list_cate2 as $row2)
								<option value="<?=$row2->node_id;?>" <?=$row2->node_id == $cate_2 ? 'selected' : '';?> ><?=$row2->title;?></option>
								@endforeach    
							@endif
						</select>
					</div>
					<div class="col-md-2" style="padding-left: 0px">
						<label for="">Ngành hàng cấp 3</label>
						<select class="form-control" style="width: 100%;" id="cate_3" name="cate_3">
							<option value="">Ngành hàng cấp 3</option>
							@if($list_cate3) 
								@foreach($list_cate3 as $row3)
								<option value="<?=$row3->node_id;?>" <?=$row3->node_id == $cate_3 ? 'selected' : '';?> ><?=$row3->title;?></option>
								@endforeach    
							@endif
						</select>
					</div>
					<div class="col-md-2" style="padding-left: 0px">
						<label for="">Trạng thái</label>
						<select class="form-control" style="width: 100%;" id="strStatus" name="strStatus">
							<option value="" <?=$strStatus =='' ? 'selected' : '';?>>Tất cả</option>
							<option value="1" <?=!empty($strStatus) && $strStatus == 1 ? 'selected' : '';?> >Kích hoạt</option>
							<option value="0" <?=$strStatus == '0' ? 'selected' : '';?>>Không kích hoạt</option>
						</select>
					</div>
					<div class="col-md-3" style="padding-left: 0px">
						<div class="row">
							<div class="col-md-8">
								<label for="">Từ khóa</label>
								<input type="text" name="keyword" id="keyword" value="<?=!empty($keyword) ? $keyword : '';?>" class="form-control" placeholder="Nhập mã tin đăng" >
							</div>

							<div class="col-md-4">
							<label for="">&nbsp;</label>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" style="width: 100%;" value="Tìm" id="btnSearch">
								</div>
							</div>
						</div>
					</div>
					</form>
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
                  <th>Image</th>
                  <th>Tin đăng</th>
                  <th style="width: 120px">Loại tin</th>
                  <th style="width: 120px">Trạng thái</th>
                  <th style="width:70px">Action</th>
                </tr>
                </thead>
                <tbody id="list_product">
                @foreach($data as $row)
                <tr>
                 <?php $image = !empty($row->image) ? 'public/uploads/san-pham/'.$row->image : 'public/frontend/images/images/logo.png';  ?>
                  <td><img src="<?=$image;?>" width="50px"></td>
                  <td><?=!empty($row->name) ? $row->name : $row->title;?></td>
                  <td>@if($row->check_special == 1)<span class="label label-warning">{{'Tin VIP'}}</span>@else <span class="label label-primary">{{'Tin thường'}}</span>@endif</td>
                  <td>@if($row->status == 1)<span class="label label-success">{{'Đã kích hoạt'}}</span>@else <span class="label label-danger">{{'Chưa kích hoạt'}}</span>@endif</td>
                  <td><a href="admin/products/edit/{{$row->thread_id}}"><i class="fa fa-fw fa-edit"></i></a></td>
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
<script>
$(document).ready(function(){
	$('#cate_1').on('change', function(){
		var val = $(this).val();
		if(val){
			 $.ajax({
				type : "get",
				dataType : "json",
				url : "admin/category/get_list_cate/"+val,
				success : function( data )
				{
					if(data){
						var html = '<option value="">Chọn danh mục cấp 2</option>';
						$.each(data, function( key, val )
						{
							html += '<option value="'+val['node_id']+'">'+val['title']+'</option>'
						});
						$('#cate_2').html(html);
					}
				}
			 });
		}
	});
	
	$('#cate_2').on('change', function(){
		var val = $(this).val();
		if(val){
			 $.ajax({
				type : "get",
				dataType : "json",
				url : "admin/category/get_list_cate/"+val,
				success : function( data )
				{
					if(data){
						var html = '<option value="">Chọn danh mục cấp 3</option>';
						$.each(data, function( key, val )
						{
							html += '<option value="'+val['node_id']+'">'+val['title']+'</option>'
						});
						$('#cate_3').html(html);
					}
				}
			 });
		}
	});
	
//	$('#btnSearch').on('click', function(){
//		var cate = $('#cate_3').val();
//		var keyword = $('#keyword').val();
//		if(!cate)
//			cate = 0;
//		if(!keyword)
//			keyword = 0;
//		if(cate || keyword){
//			$.ajax({
//				type : "get",
//				dataType : "json",
//				url : "admin/products/search_products/"+keyword+"/"+cate,
//				success : function( data )
//				{
//					if(data){
//						var html = '';
//						$.each(data, function( key, val )
//						{
//							var img = val['image'] ? 'public/uploads/san-pham/'+val['image'] : 'public/frontend/images/images/logo.png';
//							var status = val['name'] ? "Activated" : "";
//							html += '<tr>';
//							html += '<td><img src="'+img+'" width="50px"></td>';
//							html += '<td>'+val['title']+'</td>';
//							html += '<td>'+status+'</td>';
//							html += '<td><a href="admin/products/edit/'+val['thread_id']+'"><i class="fa fa-fw fa-edit"></i></a></td>';
//							html += '</tr>';
//						});
//						$('#list_product').html(html);
//					}
//				}
//			 });
//		}
//		
//	});
})
</script>
@endsection