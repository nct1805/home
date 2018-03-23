@extends('frontend.home.index')
@section('content')
<style>
	.back-top-btn{
		display: none;
		position: fixed;
		right: 25px;
		bottom: 120px;
		z-index: 9;
		min-width: auto;
		width: 40px;
		height: 40px;
		text-align: center;
		border-radius: 100%;
/*		background-color: #2bc5f8;*/
		line-height: 0;
		padding-right: 10px;
		padding-left: 10px;
		line-height: 1.4;
/*		background-image:url("public/frontend/images/up-arrow-icon.png");*/
		background: #2bc5f8 url(public/frontend/images/cd-top-arrow.svg) no-repeat center 50%;
	}
    
    input[type=checkbox].css-checkbox {
    position: absolute;
    z-index: -1000;
    left: -1000px;
    overflow: hidden;
    clip: rect(0 0 0 0);
    height: 1px;
    width: 1px;
    margin: -1px;
    padding: 0;
    border: 0;
}

input[type=checkbox].css-checkbox+label.css-label {
    padding-left: 20px;
    height: 15px;
    display: inline-block;
    line-height: 15px;
    background-repeat: no-repeat;
    background-position: 0 0;
    font-size: 15px;
    vertical-align: middle;
    cursor: pointer;
}

input[type=checkbox].css-checkbox:checked+label.css-label {
    background-position: 0 -15px;
}

label.css-label {
    background-image: url(http://csscheckbox.com/checkboxes/u/csscheckbox_1437560032a3e1345ce3a7bb5fec77cc.png);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
    label {
            margin-right: 5px;
        }
    
</style>
<?php if(!empty($data)){ $k_tmp = 1; foreach($data as $key => $value){ ?>
<section class="quangcao">
<div class="container">
<a href="javascript:void(0)"><img class=" img-responsive" src="public/uploads/danh-muc/<?=$value['cate1']['image'];?>"></a>
</div>
</section>
<section class="content-home">
<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 category">
    	<div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="javasript:void(0)" title="<?=$value['cate1']['name'];?>"><img src="public/uploads/danh-muc/<?=$value['cate1']['icon'];?>"><input type="checkbox" <?=!empty($value['cate1']['checked']) ? 'checked' : '';?> value="<?=$value['cate1']['id'];?>" id="checkbox<?=$key;?>" class="css-checkbox check_cate" /><label for="checkbox<?=$key;?>" class="css-label"></label><?=$value['cate1']['name'];?></a>
        
        </div>
        <?php if(!empty($value['total_cate2'])){  ?>
        <ul class="col-md-9 col-sm-12 col-xs-12 right-category">
            <div id="carousel" class="carousel slide carousel-all carousel<?=$k_tmp;?>" data-ride="carousel" data-type="multi" data-interval="false">
                <div class="all-pr" ><a href="javascript:void(0)" data-type="1" data-cate="<?=$value['cate1']['id'];?>" data-key="<?=$k_tmp;?>">Tất cả</a></div>
				<div class="carousel-inner">     
				    <?php foreach($value['total_cate2'] as $k => $cate){ ?>           
					<div class="item <?=$k==0?'active' : '';?>">
						<div class="carousel-col"><a href="<?=$url_5giay.'/categories/'.$cate['alias'].'.'.$cate['id'];?>" data-cate="<?=$cate['id']?>" data-type="2" data-key="<?=$k_tmp;?>" ><?=$cate['name'];?></a></div>
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
<!--    <div id="list_product_<?=$k_tmp;?>">-->
   <div class="col-md9">
      <button class="slider_prev_item1 prev-slide"></button>
      <button class="slider_next_item1 prev-slide next-slide"></button>
        <div class="slide-product unselect">
        <div class="product_1_<?=$k_spc;?>">
    <?php foreach($value['products'] as $products){ ?>
    <figure class="item-product">
    <div class="box-item">
        <a class="redirect_detail" data-id="<?=$products['id'];?>" data-alias="<?=$products['alias'];?>" href="javascript:void(0);">
        <picture>
          <source media="(max-width: 1199px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <source media="(min-width: 1200px)" srcset="public/uploads/san-pham/<?=$products['image'];?>">
          <img class=" img-responsive image-default" src="public/uploads/san-pham/<?=$products['image'];?>" alt="#">
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
            <h2 class="title_h2">
            	<a class="redirect_detail" href="javascript:void(0);" data-id="<?=$products['id'];?>" data-alias="<?=$products['alias'];?>" href="javascript:void(0);"><?=$products['name'];?></a>
            </h2>
            <div class="price"><i class="fa fa-tags"></i><?=number_format($products['price'],0,",",".");?>đ</div>
        </figcaption>
    </figure>
    <?php } ?>
    <script>
        $(document).ready(function(){	
            var owl1 = $(".product_1_<?=$k_spc;?>"); 
            owl1.owlCarousel({
              items :4, //10 items above 1000px browser width
              itemsDesktop : [4030,4], //5 items between 1000px and 901px
              itemsDesktopSmall : [1024,4], // betweem 900px and 601px
              itemsTablet: [768,3], //2 items between 600 and 0
              itemsMobile : [375,2], // itemsMobile disabled - inherit from itemsTablet option
              autoPlay: false,
              lazyLoad : true,
              slideSpeed: 300
            });
            $('.slider_prev_item1').click(function(e) {
                owl1.trigger('owl.prev');
            });
            $('.slider_next_item1').click(function(e) {
                owl1.trigger('owl.next');
            });
        });        	
    </script>
    </div>                
        </div>	
   </div><!--end col-md9-->  
<!--    </div>-->
    <input type="hidden" id="cate_id_<?=$k_tmp;?>" value="0">
    <input type="hidden" id="page_<?=$k_tmp;?>" value="3">
    <input type="hidden" id="total_page_<?=$k_tmp;?>" value="<?=!empty($value['total_page']) ? $value['total_page'] : 1;?>">
<!--
    <?php if(!empty($value['total_page']) && $value['total_page'] > 2 ){ ?>
    <div class="col-md-12 col-xs-12 lear_more btn_load_more_<?=$k_tmp;?> btn btn-info hidden-lg hidden-md" data-key="<?=$k_tmp;?>" data-cate="<?=$key;?>">Xem thêm <i class="fa fa-angle-right"></i></div>
    <?php } ?>
-->
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
<a href="#" class="back-top-btn" >
</a>
</section>
<?php } ?>
<?php if(!empty($data)){ ?>

<div class="modal fade" id="global-modal1" role="dialog">
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <div class="modal-header">Topic/Forum List
        <button type="button" class="close" style="margin-top:-15px;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">      
      	<div class="toppic">	
            <div class="input-topic">Select the title where you want to write...</div>
            <div class="box-topic">
                <ul>
                   <?php  $k_tmp = 1; foreach($data as $key => $value){ ?>
                       <li><a href="<?=$url_5giay.'/categories/'.$cate['alias'].'.'.$cate['id'];?>" title="#"><?=$value['cate1']['name']?></a>
                       <?php if(!empty($value['total_cate2'])){?>
                           <ul>
                           <?php foreach($value['total_cate2'] as $k => $cate){ ?>
                               <li><a href="<?=$url_5giay.'/categories/'.$cate['alias'].'.'.$cate['id'];?>" title="#"><?=$cate['name']?></a></li>
                           <?php } ?>
                            </ul>
                       <?php } ?>
                       </li>
                   <?php } ?>
                </ul>
            </div><!--end box-topic-->
        </div><!--end toppic-->
      </div>
    </div>
  </div>
</div>
<?php } ?>
@endsection