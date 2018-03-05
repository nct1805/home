<!Doctype html>
<html lang='vn'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Trang chủ 5 giây</title>
<meta name="keywords" content="#" />
<meta name="description" content="#" />
<meta property="og:title" content="#" />
<meta property="og:description" content="#" />
<meta property="og:site_name" content="#" />
<meta property="og:type" content="article" />
<link href="public/frontend/images/logo.og.png" rel="icon"/>
<meta name="robots" content="index"/>
<link rel="stylesheet" href="public/frontend/css/fonts.css">
<link rel="stylesheet" href="public/frontend/css/bootstrap.css">
<link rel="stylesheet" href="public/frontend/css/font-awesome.css">
<link href="public/frontend/css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="public/frontend/js/jquery-1.9.1.min.js"></script>
<!--................begin menu left.....................-->
<link href="public/frontend/menu/main_menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="public/frontend/menu/common.js"></script>
<script type="text/javascript" src="public/frontend/menu/jquery_003.js"></script>
</head>
<body>
<div class="content">
<header id="header">
<div class="container">
<div class="row">
	<div class="col-lg-3 col-md-3 col-xs-12 hidden-sm hidden-xs header-logo">
    <a href="/5giay" title="#"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="#" alt="#"/></a>    
    </div>    
    <div class="col-lg-3 col-md-3 register pull-right hidden-sm hidden-xs">    
    	<div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" onclick="location.href='<?=$url_5giay;?>';">
            <span class="text-btn">Đăng nhập & đăng ký</span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Đăng ký</a></li>
            <li><a href="#">Đăng nhập</a></li>
          </ul>
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12 search-hidden">
      	<form id="form" class="search-box" name="form" action="#">
                 <input type="text" name="tukhoa" id="tukhoa" class="form-control" placeholder="Tìm sản phẩm hoặc thương hiệu bạn mong muốn...">
                 <i class="fa fa-search"></i>
                 <input type="button" id="tk" value="" class="btn_search">
              </form>  
	</div>    
</div>
<link type="text/css" rel="stylesheet" href="public/frontend/dist/demo.css" />
<link type="text/css" rel="stylesheet" href="public/frontend/dist/css/jquery.mmenu.css" />
<link type="text/css" rel="stylesheet" href="public/frontend/dist/css/addons/jquery.mmenu.dragopen.css" />
<div class="header Fixed">
<div class="container" style="position:relative;">
<a href="#menu" class="menu_mobile" title="#">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<span class="sologan_mobile">
<a href="#" title="#"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="#" alt="#"/></a>
<a href="#" title="Tài khoản" class="register"><img src="public/frontend/images/icon-register.png"></a>
</span>
</div>
</div>
<!--/end header fix mobile/-->
<div id="menu">
<ul> 
<li><a href="#" title="Trang chủ">Trang chủ</a></li>
<li><a href="#" title="Giới thiệu">Giới thiệu</a></li>
<li><a href="#" title="#">Sản phẩm</a>
<ul>
<!--
<li><a href="#" title="#"><img src="public/frontend/images/images/icon-thoitrang.png" alt="#" class="icon"> Thời trang</a>
    <ul>
      <li><a href="#" title="#">aaThời trang nam</a>
        <ul>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
      <li><a href="#" title="#">Thời trang nữ</a>
        <ul>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
      <li><a href="#" title="#">Phụ kiện</a>
        <ul>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
    </ul>
  </li>
-->
  <?php if(!empty($menu)){ foreach($menu as $k => $val){ ?>
  <li>
      <a href="<?=$url_5giay.'/categories/'.$val['alias'].'.'.$val['id'];?>" title="#"><img src="public/frontend/images/images/icon-dt.png" alt="#" class="icon"><?=$val['name']?></a>
      <?php if(!empty($val['total_cate2'])){?>
      <ul>
          <?php foreach($val['total_cate2'] as $v){ if(!empty($v['parent_id']) && ($v['parent_id'] == $val['id']) ){ ?>
           <li><a href="<?=$url_5giay.'/categories/'.$v['alias'].'.'.$v['id'];?>" title="#"><?=$v['name'];?></a></li>
           <?php } } ?>
      </ul>
      <?php } ?>
  </li>   
  <?php } }?> 
</ul>
</li>
<li><a href="#" title="Diễn đàn">Diễn đàn</a></li>
<li><a href="#" title="#">Sàn đấu giá</a></li>
<li><a href="#" title="#">Khu vực giữ trật tự cho diễn đàn</a></li>
<li><a href="#" title="#">Dành cho người mua</a></li>
<li><a href="#" title="#">Dành cho người bán</a></li>
</ul>
</div>
</header>
<section class="menu-slide">
<div class="container">
<div class="row">
<div class="col-md-3 hidden-sm hidden-xs">
<div class="title_category"><i class="fa fa-bars"></i> Danh mục ngành hàng</div>
<div class="f_menu_sub">
<div class="f_submenu_item">
<div class="slimScrollDiv">
<ul class="block_category menu_slim_1 f_submenu_list">
    <?php if(!empty($menu)){ foreach($menu as $k => $val){ ?>
      <li>
          <a href="<?=$url_5giay.'/categories/'.$val['alias'].'.'.$val['id'];?>" title="#">
          	<img src="public/uploads/danh-muc/<?=$val['icon'];?>" alt="#" class="icon"><?=$val['name']?></a>
          <?php if(!empty($val['total_cate2'])){?>
          <ul tabindex="5001" class="level_1 f_menu_sub_2">
              <?php foreach($val['total_cate2'] as $v){ if(!empty($v['parent_id']) && ($v['parent_id'] == $val['id']) ){ ?>
               <li><a href="<?=$url_5giay.'/categories/'.$v['alias'].'.'.$v['id'];?>" title="#"><?=$v['name'];?></a></li>
               <?php } } ?>
          </ul>
          <?php } ?>
      </li>
    <?php } } ?>
<!--
    <li>
    <ul tabindex="5001" class="level_1 f_menu_sub_2">
      <li><a href="#" title="#">Thời trang nam</a>
        <ul class="level_2 f_menu_sub_2">
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
      <li><a href="#" title="#">Thời trang nữ</a>
        <ul class="level_2 f_menu_sub_2">
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
      <li><a href="#" title="#">Phụ kiện</a>
        <ul class="level_2 f_menu_sub_2">
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
          <li><a href="#" title="#">Quần thể thao</a></li>
        </ul>
      </li>
    </ul>
  </li>
-->
  
</ul>
</div>
</div>
</div>	
</div><!--end col-md-3-->
<div class="col-md-9 col-sm-12 col-xs-12">
	<nav class="menu-top hidden-sm hidden-xs">
    	<ul>
        	<li><span>Tết 2018 - Mậu Tuất</span></li>
            <li><a href="<?=$url_5giay;?>/categories/gioi-thieu-gop-y.67/" title="#">Giới thiệu - Góp ý</a></li>
            <li><a href="<?=$url_5giay;?>/" title="#">Diễn đàn</a></li>
            <li><a href="<?=$url_5giay;?>/categories/san-dau-gia.72/" title="#">Sàn đấu giá</a></li>
            <li><a href="<?=$url_5giay;?>/categories/khu-vuc-giu-trat-tu-cho-dien-dan.8/" title="#">Khu vực giữ trật tự cho diễn đàn</a></li>
        </ul>
    </nav><!--end menu top-->
    <div class="slide-home">
      <div id="carousel-example-generic" class="carousel-fade carousel slide" data-ride="carousel">
      <div class="carousel-inner">
		  <?php if(!empty($slide)){ foreach($slide as $k => $val){ ?>
		  <div class="item <?=$k==0?'active' : '';?>">
			<a href="<?=$val['url'];?>" title="<?=$val['name'];?>"><img class="img-responsive" alt="#" src="public/uploads/danh-muc/<?=$val['image'];?>" ></a>
		  </div>
     	  <?php } } ?>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
      </div>
    </div><!--end slide-home-->
    <div class="row">
    <?php if(!empty($banner)){ foreach($banner as $k => $v){ ?>
    	<div class="col-md-4 col-sm-4 col-xs-4 ads">
        	<a href="<?=$v['url'];?>" title="<?=$v['name'];?>" target="<?=$v['target'];?>">
           		<img class="lazyload img-responsive" src="public/uploads/danh-muc/<?=$v['image'];?>">
            	<div class="interactive_overlay">
					<div class="interactive_content">

					</div>
				</div>
            </a>
        </div>
       <?php } } ?>
    </div>
</div><!--end col-md-9-->
</div>
</div>
</section>
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
                <div class="all-pr"><a href="#1">Tất cả</a></div>
				<div class="carousel-inner">     
				    <?php foreach($value['total_cate2'] as $k => $cate){ ?>           
					<div class="item <?=$k==0?'active' : '';?>">
						<div class="carousel-col"><a href="#1" class="category_2" data-cate="<?=$cate['id']?>" data-key="<?=$k_tmp;?>" ><?=$cate['name'];?></a></div>
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
    <input type="hidden" id="cate_id" value="0">
    <input type="hidden" id="page_<?=$k_tmp;?>" value="3">
    <input type="hidden" id="total_page_<?=$k_tmp;?>" value="<?=!empty($value['total_page']) ? $value['total_page'] : 1;?>">
    <?php if(!empty($value['total_page']) && $value['total_page'] > 2 ){ ?>
    <div class="col-md-12 col-xs-12 lear_more btn btn-info hidden-lg hidden-md" data-key="<?=$k_tmp;?>" data-cate="<?=$key;?>">Xem thêm <i class="fa fa-angle-right"></i></div>
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
<footer>
	<div class="container">
    	<div class="row hidden-sm hidden-xs">
        	<div class="col-md-3">
            	<div class="title_footer">Về chúng tôi</div>
                <ul class="ul-footer">
                	<li><a href="<?=$url_5giay;?>/categories/gioi-thieu-gop-y.67/" title="#">Giới thiệu 5giay.vn</a></li>
                    <li><a href="#" title="<?=$url_5giay;?>/forums/noi-quy-thong-bao.71/">Quy chế hoạt động</a></li>
                    <li><a href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=218" title="#" target="_blank"><img class="lazyload img-thumbnail" src="public/frontend/images/bct.png"></a></li>
                </ul>
            </div><!--end col-md-3-->
            <div class="col-md-3">
            	<div class="title_footer">Dành cho người mua</div>
                <ul class="ul-footer">
                	<li><a href="#" title="#">Giải quyết khiếu nại</a></li>
                    <li><a href="#" title="#">Hướng dẫn mua hàng</a></li>
                    <li><a href="#" title="#">Chính sách đổi trả</a></li>
                    <li><a href="#" title="#">Chăm sóc khách hàng</a></li>
                    <li><a href="#" title="#">Nạp tiền điện thoại</a></li>
                </ul>
            </div><!--end col-md-3-->
            <div class="col-md-3">
            	<div class="title_footer">Dành cho người bán</div>
                <ul class="ul-footer">
                	<li><a href="#" title="#">Mở shop trên 5giay.vn</a></li>
                    <li><a href="#" title="#">Quy định đối với người bán</a></li>
                    <li><a href="#" title="#">Chính sách bán hàng</a></li>
                    <li><a href="#" title="#">Hệ thống tiêu chí kiểm duyệt</a></li>
                   
                </ul>
            </div><!--end col-md-3-->
            <div class="col-md-3">
            	<div class="title_footer">Kết nối với 5giay.vn</div>
                <ul class="ul-footer">
                	<li><img class="lazyload img-thumbnail" src="public/frontend/images/images/fb.png"></li>
                    
                </ul>
            </div><!--end col-md-3-->
        </div>
        <div class="row hidden-lg hidden-md">
        	<figure class="col-sm-4 col-xs-4 taglink">
            	<a href="#" title="#"><img src="public/frontend/images/icon-about.png" alt="#"><br>Về 5giay.vn</a>
            </figure>
            <figure class="col-sm-4 col-xs-4 taglink">
            	<a href="#" title="#"><img src="public/frontend/images/nguoiban.png" alt="#"><br>Dành cho người bán</a>
            </figure>
            <figure class="col-sm-4 col-xs-4 taglink">
            	<a href="#" title="#"><img src="public/frontend/images/nguoimua.png" alt="#"><br>Dành cho người mua</a>
            </figure>
        </div>
        <div class="col-md-12 address-footer">
        	© 2010 - 2018 - Cty CP TM và DV Tin Học Nhật Nguyệt  Trụ sở: 11<br>
            <b>Trụ sở:</b> 114 Đường số 2 Cư Xá Đô Thành Phường 4, Quận 3, Tp.HCM<br>
            <b>ĐKKD số:</b> 4102048497 - <b>Đăn ký ngày:</b> 26/03/2007 - <b>Cơ quan cấp ĐKKD:</b> Sở Kế Hoạch & Đầu Tư Tp.HCM<br>
            <b>Tel:</b> (028)66.520.052 - 0903.94.5050 - 0906.566.777 - <b>Email:</b> 123@nhatnguyet.vn
        </div>
        	
        </div>
    </div>
</footer>
</div>
<script>
	var url_5giay = '<?=!empty($url_5giay) ? $url_5giay : "";?>';
</script>
<script src="public/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/jquery.mmenu.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.dragopen.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js_menu.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.fixedelements.min.js"></script>
<script type="text/javascript" src="public/frontend/js/jquery.lazyload.min.js"></script>
<script type="text/javascript">var lazyImage = "/public/frontend/images/404.png";</script>
<script src="public/frontend/js/main.js"></script>
<script src="public/frontend/js/home_page.js"></script>
<script src="public/js/homepage.js"></script>
</body>
</html>