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
<meta name="robots" content="index"/>
<link rel="stylesheet" href="public/frontend/css/fonts.css">
<link rel="stylesheet" href="public/frontend/css/bootstrap.css">
<link rel="stylesheet" href="public/frontend/css/font-awesome.css">
<link href="public/frontend/css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="public/frontend/js/jquery-1.9.1.min.js"></script>
<link href="public/frontend/menu/main_menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="public/frontend/menu/common.js"></script>
<script type="text/javascript" src="public/frontend/menu/jquery_003.js"></script>
</head>
<body>
<div class="content">
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
          <?php if(!empty($val['total_cate2'])){?>
          <?php /*<ul tabindex="5001" class="level_1 f_menu_sub_2">
              <?php foreach($val['total_cate2'] as $v){ if(!empty($v['parent_id']) && ($v['parent_id'] == $val['id']) ){ ?>
               <li><a href="<?=$url_5giay.'/categories/'.$v['alias'].'.'.$v['id'];?>" title="#"><?=$v['name'];?></a></li>
               <?php } } ?>
          </ul> */ ?>
          <?php } ?>
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
<script type="text/javascript" src="public/frontend/dist/js/jquery.mmenu.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.dragopen.min.js"></script>
<script type="text/javascript" src="public/frontend/dist/js_menu.js"></script>
<script type="text/javascript" src="public/frontend/dist/js/addons/jquery.mmenu.fixedelements.min.js"></script>
<script type="text/javascript" src="public/frontend/js/jquery.lazyload.min.js"></script>
<script type="text/javascript">var lazyImage = "/public/frontend/images/loading.gif";</script>
<script src="public/frontend/js/main.js"></script>
<script src="public/frontend/js/home_page.js"></script>
<script src="public/js/homepage.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=487790174697999&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>