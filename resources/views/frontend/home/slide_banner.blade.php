<div class="col-md-9 col-sm-12 col-xs-12">
	<nav class="menu-top hidden-sm hidden-xs">
    	<ul>
            <li><a href="https://www.5giay.vn/mobile/" title="SẢN PHẨM NỔI BẬT">SẢN PHẨM NỔI BẬT</a></li>
            <li><a href="https://sohot.vn/auctions/" title="SOHOT" target="_blank">SOHOT</a></li>
            <li><a href="https://www.5giay.vn/forums/cong-nghe.191/" title="PR NEWS">PR NEWS</a></li>
            <li><a href="https://www.haravan.com/harapage?ref=dangkypage" title="HARAPAGE" target="_blank">HARAPAGE</a></li>
            <li><a href="https://www.haravan.com/?ref=dangkypage" title="LÀM WEB RẺ" target="_blank">LÀM WEB RẺ</a></li>
        </ul>
    </nav>
    <div class="slide-home">
      <div id="carousel-example-generic" class="carousel-fade carousel slide" data-ride="carousel">
      <div class="carousel-inner">
		  <?php 
      $slide=\App\Models\frontend\SlidesModel::where('status', 1)->select('id','url','name','image')->orderBy('ordering', 'ASC')->orderBy('id', 'DESC')->get();
      if(!empty($slide)){ foreach($slide as $k => $val){ ?>
		  <div class="item <?=$k==0?'active' : '';?>">
			<a href="<?=$val->url;?>" title="<?=$val->name;?>"><img class="img-responsive" alt="<?=$val->name;?>" src="public/uploads/slide/<?=$val->image;?>" title="<?=$val->name;?>" ></a>
		  </div>
     	  <?php } } ?>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control" href="#carouheaderample-generic" role="button" data-slide="next">
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
      </div>
    </div>
    <div class="row">
    <?php 
    $banner=\App\Models\frontend\BannersModel::where('status', 1)->select('id','url','name','image','target')->orderBy('ordering', 'ASC')->orderBy('id', 'DESC')->limit(3)->get();
    if(!empty($banner)){ foreach($banner as $k => $v){ ?>
    	<div class="col-md-4 col-sm-4 col-xs-4 ads">
        	<a href="<?=$v->url;?>" title="<?=$v->name;?>" target="<?=$v->target;?>">
           		<img class="lazyload img-responsive" src="public/uploads/banner/<?=$v->image;?>">
            	<div class="interactive_overlay">
					<div class="interactive_content">
					</div>
				</div>
            </a>
        </div>
       <?php } } ?>
    </div>
</div>