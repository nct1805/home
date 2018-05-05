<!Doctype html>
<html lang='vn'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>{{ $meta_title}}</title>
<meta name="keywords" content="{{ $meta_keyword }}" />
<meta name="description" content="{{ $meta_description}}" />
<meta property="og:title" content="{{ $meta_keyword }}" />
<meta property="og:description" content="{{ $meta_description}}" />
<meta property="og:site_name" content="5giay.vn" />
<meta property="og:type" content="article" />
<link href="public/frontend/images/logo.og.png" rel="icon"/>
<link href="{{ $get_base_url}}" rel="canonical" />
<meta name="robots" content="index"/>
<link rel="stylesheet" href="public/frontend/css/fonts.css">
<link rel="stylesheet" href="public/frontend/css/bootstrap.css">
<link rel="stylesheet" href="public/frontend/css/font-awesome.css">
<link href="public/frontend/css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="public/frontend/js/jquery-1.9.1.min.js"></script>
<link href="public/frontend/menu/main_menu.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="public/frontend/slide-product/owl.carousel.css" />
<script type="text/javascript" src="public/frontend/menu/common.js"></script>
<script type="text/javascript" src="public/frontend/menu/jquery_003.js"></script>
<link rel="stylesheet" href="public/frontend/menu/style.css">
<link href="public/frontend/menu/idangerous.swiper.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="content-block">
@include('frontend.home.header')
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
          <a href="<?=$url_5giay.'/categories/'.$val['alias'].'.'.$val['id'];?>" title="<?=$val['name']?>">
          	<img src="public/uploads/danh-muc/<?=$val['icon'];?>" alt="<?=$val['name']?>" class="icon"><?=$val['name']?></a>
      </li>
    <?php } } ?>  
</ul>
</div>
</div>
</div>	
</div>
@include('frontend.home.slide_banner')
</div>
</div>
</section>
@yield('content')
@include('frontend.home.footer')
</div>
<script>
	var url_5giay = '<?=!empty($url_5giay) ? $url_5giay : "";?>';
</script>
<script src="public/frontend/js/bootstrap.min.js"></script>
<script src="public/frontend/menu/idangerous.swiper.min.js"></script>
<script src="public/frontend/menu/global.js"></script>
<?php /*?><script type="text/javascript" src="public/frontend/dist/js/jquery.mmenu.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.dragopen.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js_menu.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.fixedelements.min.js"></script><?php */?>
<script type="text/javascript" src="public/frontend/js/jquery.lazyload.min.js"></script>
<script type="text/javascript">var lazyImage = "public/frontend/images/loading.gif";</script>
<script src="public/frontend/js/main.js"></script>
<script src="public/frontend/slide-product/owl.carousel.min.js"></script>
<script src="public/frontend/js/homepage.js"></script>
{!!html_entity_decode($meta_script)!!}
</body>
</html>