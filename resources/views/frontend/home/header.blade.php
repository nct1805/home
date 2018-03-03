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