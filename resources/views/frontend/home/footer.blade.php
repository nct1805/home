<footer>
<div class="container">
<div class="col-xs-12 hidden-md hidden-lg text-right"><div class="col-xs-9" style="text-align: left;">© 5giay.vn</div>
            <div class="col-xs-3"><i data-toggle="collapse" data-target="#more-footer" class="fa fa-info-circle"></i></div>
          </div>
</div>
    <div class="container">
    <div id="more-footer" class="collapse">
        <div class="row ">
            <div class="col-md-3 col-xs-6 col-sm-3">
                <div class="title_footer">Về chúng tôi</div>
                <ul class="ul-footer ul_about">
                    <li><a href="https://www.5giay.vn/forums/gioi-thieu-ve-5giay-vn.68/" title="Giới thiệu 5giay.vn">Giới thiệu 5giay.vn</a></li>
                    <li><a href="https://www.5giay.vn/igo/trangchu/Qui-che-quan-ly-hoat-dong-5giay.pdf" title="Quy chế hoạt động">Quy chế hoạt động</a></li>
<li><a href="https://www.5giay.vn/threads/noi-quy-cua-5giay-vn.357/" title="Nội quy">Nội quy</a></li>
<li><a href="https://www.5giay.vn/help/" title="Nội quy">Trợ giúp</a></li>
                    <li class="hidden-xs"><a href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=218" title="đăng ký bộ công thương" target="_blank"><img class="lazyload img-thumbnail" src="public/frontend/images/bct.png"></a></li>
                </ul>
            </div>
            <?php 
      $category_link=\App\Models\frontend\Category_linkModel::where('status', 1)->select('id','name')->orderBy('ordering', 'ASC')->orderBy('id', 'DESC')->limit(2)->get();
      if(!empty($category_link)){ 
        foreach($category_link as $k => $val){
            $id = $val->id;
         ?>
            <div class="col-md-3 col-xs-6 col-sm-3">
                <div class="title_footer">{{ $val->name}}</div>
                <ul class="ul-footer">
                    <?php 
      $link=\App\Models\frontend\LinkModel::where('status', 1)->where('catid',$id)->select('id','name','url','target')->orderBy('ordering', 'ASC')->orderBy('id', 'DESC')->limit(10)->get();
      ?>
                <?php
                if(!empty($link)){ 
                    foreach($link as $k => $val){ ?>
                    <li><a href="<?=$val->url?>" title="<?=$val->name?>" target="<?=$val->target?>"><?=$val->name?></a></li>
                    <?php }} ?>
                </ul>
            </div>
            <?php }} ?>
            
            <div class="col-md-3 col-xs-6 col-sm-3">
                <div class="title_footer">Kết nối với 5giay.vn</div>
                <ul class="ul-footer share-footer">
                    <li><div class="fb-page" data-href="https://www.facebook.com/5GiayVietNam/" data-tabs="timeline" data-width="240" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/5GiayVietNam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/5GiayVietNam/">5Giây.vn</a></blockquote></div> </li>
                    
                </ul>
            </div>
        </div>        
        
        <div class="col-md-12 col-xs-12 address-footer">        
            © 2010 - 2018 - Cty CP TM và DV Tin Học Nhật Nguyệt  Trụ sở: 11<br>
            <b>Trụ sở:</b> 114 Đường số 2 Cư Xá Đô Thành Phường 4, Quận 3, Tp.HCM<br>
            <b>ĐKKD số:</b> 4102048497 - <b>Đăn ký ngày:</b> 26/03/2007 - <b>Cơ quan cấp ĐKKD:</b> Sở Kế Hoạch & Đầu Tư Tp.HCM<br>
            <b>Tel:</b> (028)66.520.052 - 0903.94.5050 - 0906.566.777 - <b>Email:</b> 123@nhatnguyet.vn
            <p><a href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=218" title="đăng ký bộ công thương" target="_blank" class="hidden-sm hidden-md hidden-lg"><img class="img-thumbnail" src="public/frontend/images/bct.png"></a></p>
        </div>
        </div>
            
        </div>
    </div>
</footer>