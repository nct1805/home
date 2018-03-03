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
		  <?php 


      if(!empty($slide)){ foreach($slide as $k => $val){ ?>
		  <div class="item <?=$k==0?'active' : '';?>">
			<a href="<?=$val['url'];?>" title="<?=$val['name'];?>"><img class="img-responsive" alt="#" src="public/uploads/danh-muc/<?=$val['image'];?>" ></a>
		  </div>
     	  <?php } } ?>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control" href="#carouheaderample-generic" role="button" data-slide="next">
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