<header id="header">
<div class="container">
<div class="row">
	<div class="col-lg-3 col-md-3 col-xs-12 hidden-sm hidden-xs header-logo">
    <a href="/" title="5 giây cho mỗi lần thấy"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="5 giây cho mỗi lần thấy" alt="5 giây cho mỗi lần thấy"/></a>    
    </div>    
    <div class="col-lg-3 col-md-3 register pull-right hidden-sm hidden-xs">    
    	<div class="btn-group">
    		<?php if(!empty($isOnline)){ ?>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="text-btn"><?=$isOnline['username'];?></span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
				<li><a href="javascipt:void(0);" class="btnAddNews" title="Đăng tin">Đăng tin</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/privacy';?>" title="Chi tiết liên hệ">Chi tiết liên hệ</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/prefenrences';?>" title="Bảo mật cá nhân">Bảo mật cá nhân</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/prefenrences';?>" title="Tùy chọn">Tùy chọn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/alert-prefenrences';?>" title="Thiết lập thông báo">Thiết lập thông báo</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/external-accounts';?>" title="External Accounts">External Accounts</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/security';?>" title="Mật khẩu">Mật khẩu</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/news-feeed';?>" title="Thông tin bạn">Thông tin bạn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/conversations';?>" title="Đối thoại">Đối thoại</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/alerts';?>" title="Thông báo">Thông báo</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/likes';?>" title="Được thích">Được thích</a></li>
				<li><a href="<?=$url_5giay.'/'.'search/member?userid='.$isOnline['user_id'];?>" title="Nội dung của bạn">Nội dung của bạn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/following';?>" title="Theo dõi">Theo dõi</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/ignored';?>" title="Danh sách đen">Danh sách đen</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/seller';?>" title="Sửa thông tin liên hệ">Sửa thông tin liên hệ</a></li>
				<li><a href="logout" title="Thoát">Thoát</a></li>
          </ul>
          <?php }else {?>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="text-btn">Đăng nhập & đăng ký</span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="https://www.5giay.vn/login/login" title="Đăng ký">Đăng ký</a></li>
				<li><a href="https://www.5giay.vn/login/login" title="Đăng nhập">Đăng nhập</a></li>
          </ul>
          <?php } ?>
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12 search-hidden">
      	<form id="form" class="search-box" name="form" method="get" action="#">
            <select class="form-control border-search" name="category" id="category">  
                 <option value="0">Tất cả</option>               
                 <option value="1">Thời trang nam</option>
                  <option value="2">Thời trang nữ</option>
               </select>
        <input type="text" name="tukhoa" id="tukhoa" class="form-control border-search" placeholder="Tìm sản phẩm...">
         <i class="fa fa-search"></i>
         <input type="submit" id="tk" value=" ">
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
<a href="https://www.5giay.vn" title="5 giây cho mỗi lần thấy" class="logo-mobile"><img class="img-thumbnail" src="public/frontend/images/images/logo.png" title="5 giây cho mỗi lần thấy" alt="5 giây cho mỗi lần thấy"/></a>

<!-- start quick-access -->
<div class="quick-access pull-right">
<div class="quickaccess-toggle" data-toggle="collapse" data-target="#inner-toggle"> 
<img class="img-thumbnail" src="public/frontend/images/icon-register.png" title="#" alt="#"/>
</div>
<div class="inner-toggle collapse" id="inner-toggle">
<ul class="links pull-left ">
	<?php if(!empty($isOnline)){ ?>
	<li><a href="<?=$url_5giay.'/'.'account/';?>" title="Đăng tin">Đăng tin</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/privacy';?>" title="Chi tiết liên hệ">Chi tiết liên hệ</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/prefenrences';?>" title="Bảo mật cá nhân">Bảo mật cá nhân</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/prefenrences';?>" title="Tùy chọn">Tùy chọn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/alert-prefenrences';?>" title="Thiết lập thông báo">Thiết lập thông báo</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/external-accounts';?>" title="External Accounts">External Accounts</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/security';?>" title="Mật khẩu">Mật khẩu</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/news-feeed';?>" title="Thông tin bạn">Thông tin bạn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/conversations';?>" title="Đối thoại">Đối thoại</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/alerts';?>" title="Thông báo">Thông báo</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/likes';?>" title="Được thích">Được thích</a></li>
				<li><a href="<?=$url_5giay.'/'.'search/member?userid='.$isOnline['user_id'];?>" title="Nội dung của bạn">Nội dung của bạn</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/following';?>" title="Theo dõi">Theo dõi</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/ignored';?>" title="Danh sách đen">Danh sách đen</a></li>
				<li><a href="<?=$url_5giay.'/'.'account/seller';?>" title="Sửa thông tin liên hệ">Sửa thông tin liên hệ</a></li>
				<li><a href="logout" title="Thoát">Thoát</a></li>
	<?php } else{?>
	<li><a href="https://www.5giay.vn/login/login" title="đăng ký"><i class="fa fa-heart"></i>Đăng ký</a></li>
	<li><a href="https://www.5giay.vn/login/login" title="đăng nhập"><i class="fa fa-user"></i>Đăng nhập</a></li>
	<?php } ?>
</ul>
</div>
</div>
<!-- end quick-access -->
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
      <a href="<?=$url_5giay.'/categories/'.$val['alias'].'.'.$val['id'];?>" title="<?=$val['name']?>"><img src="public/uploads/danh-muc/<?=$val['icon'];?>" alt="<?=$val['name']?>" class="icon"><?=$val['name']?></a>
      <?php if(!empty($val['total_cate2'])){?>
      <?php /*<ul>
          <?php foreach($val['total_cate2'] as $v){ if(!empty($v['parent_id']) && ($v['parent_id'] == $val['id']) ){ ?>
           <li><a href="<?=$url_5giay.'/categories/'.$v['alias'].'.'.$v['id'];?>" title="#"><?=$v['name'];?></a></li>
           <?php } } ?>
      </ul>
      */ ?>
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