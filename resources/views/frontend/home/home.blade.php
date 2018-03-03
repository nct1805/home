@extends('frontend.home.index')
@section('content')
<?php if(!empty($data)){ $k_tmp = 1; foreach($data as $key => $value){ ?>
<section class="quangcao">
<div class="container">
<a href="javascript:void(0)"><img class="lazyload img-responsive" src="public/uploads/danh-muc/<?=$value['cate1']['image'];?>"></a>
</div>
</section>
<section class="content-home">
<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 category">
    	<div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="#" title="#"><img src="public/uploads/danh-muc/<?=$value['cate1']['icon'];?>"><?=$value['cate1']['name'];?></a>
        </div>
        <?php if(!empty($value['total_cate2'])){  ?>
        <ul class="col-md-9 col-sm-12 col-xs-12 right-category">
            <div id="carousel" class="carousel slide carousel-all carousel<?=$k_tmp;?>" data-ride="carousel" data-type="multi" data-interval="false">
                <div class="all-pr" ><a href="javascript:void(0)" class="category_2" data-type="1" data-cate="<?=$value['cate1']['id'];?>" data-key="<?=$k_tmp;?>">Tất cả</a></div>
				<div class="carousel-inner">     
				    <?php foreach($value['total_cate2'] as $k => $cate){ ?>           
					<div class="item <?=$k==0?'active' : '';?>">
						<div class="carousel-col"><a href="javascript:void(0)" class="category_2" data-cate="<?=$cate['id']?>" data-type="2" data-key="<?=$k_tmp;?>" ><?=$cate['name'];?></a></div>
					</div>
					<?php } ?>
				</div>
				<div class="right carousel-control next-right">
					<a href="#carousel" role="button" data-slide="next">
						<i class="fa fa-chevron-right"></i>
						<span class="sr-only">Next</span>
					</a>
				</div>
                <ol class="carousel-indicators hidden-sm hidden-xs">
                    <li data-target=".carousel<?=$k_tmp;?>" data-slide-to="0" class="active"></li>
                    <li data-target=".carousel<?=$k_tmp;?>" data-slide-to="1"></li>
                    <li data-target=".carousel<?=$k_tmp;?>" data-slide-to="2"></li>
                  </ol>
			</div>
        </ul>
        <?php } ?>
        </div>
    </div>
    <?php if(!empty($value['special_products'])){ ?>
    <div class="col-md3">      
      <div id="carousel-example-generic1" class="carousel-fade carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <?php foreach($value['special_products'] as $k_spc => $special_products){ ?>
      <div class="item <?=$k_spc == 0 ? 'active':'';?>">
      	<a href="<?=$url_5giay.'/'.'threads'.'/'.$special_products['alias'].'.'.$special_products['id'];?>">
        <picture>
              <source media="(max-width: 992px)" srcset="public/uploads/san-pham/<?=$special_products['image_wap']?>">
              <source media="(min-width: 1200px)" srcset="public/uploads/san-pham/<?=$special_products['image']?>">
              <img class="img-responsive" src="public/uploads/san-pham/<?=$special_products['image']?>" alt="#">
          </picture>
          </a>      
      </div>
      <?php } ?>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
      </a>
      </div>       
    </div>
    <?php } ?>
    <div id="list_product_<?=$k_tmp;?>">
    <?php foreach($value['products'] as $products){ ?>
    <figure class="item-product">
    <div class="box-item">
        <a class="redirect_detail" data-id="<?=$products['id'];?>" data-alias="<?=$products['alias'];?>" href="javascript:void(0);">
        <picture>
          <source media="(max-width: 1199px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <source media="(min-width: 1200px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <img class="lazyload img-responsive image-default" src="public/uploads/san-pham/<?=$products['image'];?>" alt="#">
      </picture>
        <picture>
          <source media="(max-width: 1199px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <source media="(min-width: 1200px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <img class="img-responsive image-hover" src="public/uploads/san-pham/<?=$products['image'];?>" alt="#">
      </picture>
        </a>
        </div>
        <figcaption>
            <div class="home-store"><?=$products['shop_name'];?></div>
            <div class="date"><?=!empty($products['updated_at']) ? date_format($products['updated_at'],'d/m/Y'): '';?></div>
            <h2 class="title_h2"><a href="#"><?=$products['name'];?></a></h2>
            <div class="price"><i class="fa fa-tags"></i><?=number_format($products['price'],0,",",".");?>đ</div>
        </figcaption>
    </figure>
    <?php } ?>
    </div>
    <input type="hidden" id="cate_id_<?=$k_tmp;?>" value="0">
    <input type="hidden" id="page_<?=$k_tmp;?>" value="3">
    <input type="hidden" id="total_page_<?=$k_tmp;?>" value="<?=!empty($value['total_page']) ? $value['total_page'] : 1;?>">
    <?php if(!empty($value['total_page']) && $value['total_page'] > 2 ){ ?>
    <div class="col-md-12 col-xs-12 lear_more btn_load_more_<?=$k_tmp;?> btn btn-info hidden-lg hidden-md" data-key="<?=$k_tmp;?>" data-cate="<?=$key;?>">Xem thêm <i class="fa fa-angle-right"></i></div>
    <?php } ?>
</div>
</section>
<?php $k_tmp++; } }?>
<?php if(!empty($product_seen)){ ?>
<section id="session_product_seen">
	<div class="container">
    	<div class="new-home">
            	<div class="col-md2 title-view">Sản phẩm vừa xem:</div>
                <div class="col-md10">
                    <div id="carousel" class="carousel slide carousel4" data-ride="carousel" data-type="multi4" data-interval="false">        
						<div class="carousel-inner" id="list_products_seen">   
						<?php foreach($product_seen as $k => $v){ ?>
							<div class="item item4 <?=$k == 0 ? 'active' : '';?>">
								<div><a href="javascript:void(0)" class="view-new redirect_detail" data-id="<?=$v['id'];?>" data-alias="<?=$v['alias'];?>"><img style="width:76px;" src="public/uploads/san-pham/<?=$v['image'];?>"></a></div>
							</div> 
						<?php } ?>            
						</div>
						<div class="right carousel-control next-right next-right-new">
							<a href=".carousel4" role="button" data-slide="next">
								<i class="fa fa-chevron-right"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
                </div>
        </div>
    </div>
</section>
<?php } ?>
@endsection