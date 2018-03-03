<header id="header">
<div class="container">
<div class="row">
	<div class="col-lg-3 col-md-3 col-xs-12 hidden-sm hidden-xs header-logo">
    <a href="/" title="5 giây cho mỗi lần thấy"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="5 giây cho mỗi lần thấy" alt="5 giây cho mỗi lần thấy"/></a>    
    </div>    
    <div class="col-lg-3 col-md-3 register pull-right hidden-sm hidden-xs">    
    	<div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="text-btn">Đăng nhập & đăng ký</span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="https://www.5giay.vn/login/login" title="Đăng ký">Đăng ký</a></li>
            <li><a href="https://www.5giay.vn/login/login" title="Đăng nhập">Đăng nhập</a></li>
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
<a href="https://www.5giay.vn" title="5 giây cho mỗi lần thấy"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="5 giây cho mỗi lần thấy" alt="5 giây cho mỗi lần thấy"/></a>
<a href="https://www.5giay.vn/login/login" title="Tài khoản" class="register"><img src="public/frontend/images/icon-register.png"></a>
</span>
</div>
</div>
<!--/end header fix mobile/-->
<div id="menu">
<ul> 
<li><a href="https://www.5giay.vn/" title="Diễn đàn">Diễn đàn</a></li>
<li><a href="https://www.5giay.vn/forums/gioi-thieu-ve-5giay-vn.68/" title="Giới thiệu">Giới thiệu</a></li>
<li><a href="" title="Danh mục ngành hàng">Danh mục ngành hàng</a>
<ul>
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
<li><a href="https://sohot.vn/auctions/" title="SOHOT" target="_blank">SOHOT</a></li>
<li><a href="https://www.5giay.vn/forums/cong-nghe.191/" title="PR NEWS">PR NEWS</a></li>
<li><a href="https://www.haravan.com/harapage?ref=dangkypage" title="HARAPAGE" target="_blank">HARAPAGE</a></li>
<li><a href="https://www.haravan.com/?ref=dangkypage" title="LÀM WEB RẺ" target="_blank">LÀM WEB RẺ</a></li>
<li><a href="https://www.5giay.vn/threads/dieu-khoan-ve-bao-ve-thong-tin-ca-nhan.5775002/" title="Điều khoản">Điều khoản</a></li>
<li><a href="https://www.5giay.vn/igo/trangchu/Qui-che-quan-ly-hoat-dong-5giay.pdf" title="Quy chế">Quy chế</a></li>
<li><a href="https://new.5giay.vn/threads/noi-quy-cua-5giay-vn.357/" title="Nội quy">Nội quy</a></li>
<li><a href="https://new.5giay.vn/help/" title="Nội quy">Trợ giúp</a></li>
</ul>
</div>
</header>