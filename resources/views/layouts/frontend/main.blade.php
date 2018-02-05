<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <base href="http://localhost/lume/cms/">
    <link href="public/ft/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="Shortcut Icon" href="public/ft/img/favicon.jpg" type="image/x-icon"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" defer></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" defer></script>
    <![endif]-->

    <link rel="stylesheet" href="public/ft/style.css"/>
    <meta property="article:author" content="https://www.facebook.com/ironstyle.vn/" />
    @yield('meta')
</head>
<body class="body-{{ $device }}">
<div>

    <div class="top">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('Ft_Home_Index') }}" class="logo">
                            <img src="public/ft/img/logo.png" alt="Cửa hàng đồ trang trí nội thất"
                                 class="img-responsive"/>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('Ft_Home_Search') }}" method="get" class="form-inline top-search">
                            <div class="input-group">
                                <input name="keywords" type="text" class="form-control" placeholder="Nội dung tìm kiếm">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 hidden-xs">
                        <div class="top-hotline">
                            <img src="public/ft/img/hotline.png" alt="Liên hệ tư vấn"
                                 class="img-responsive"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end top --}}
    <div class="top-menu">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-menuw">
                            <ul class="menu">
                                <li><a href="{{ route('Ft_Home_Index') }}" title="Trang chủ"><i
                                                class="glyphicon glyphicon-home"></i> Trang chủ</a></li>
                                @if(!isMobile())
                                    <li class="categories-menu-list"><a href="http://ironstyle.net" title="Sản phẩm đồ trang trí"><i class="glyphicon glyphicon-list"></i> Sản phẩm</a>
                                                                                    <ul><li><a href="http://ironstyle.net/dong-ho-trang-tri.html">ĐỒNG HỒ TREO TƯỜNG</a></li><li><a href="http://ironstyle.net/tranh-treo-tuong.html">TRANH TREO TƯỜNG</a></li><li><a href="http://ironstyle.net/do-trang-tri-dep.html">ĐỒ TRANG TRÍ ĐẸP</a></li><li><a href="http://ironstyle.net/binh-hoa-chau-hoa-cam-san.html">BÌNH HOA, CHẬU HOA CẮM SẴN</a></li><li><a href="http://ironstyle.net/binh-chau-cam-hoa.html">BÌNH CHẬU CẮM HOA</a></li><li><a href="http://ironstyle.net/do-gia-dung.html">ĐỒ GIA DỤNG</a></li><li><a href="http://ironstyle.net/den-ngu-dep-sang-trong-va-phong-cach-tai-tphcm.html">ĐÈN NGỦ TRANG TRÍ</a></li><li><a href="http://ironstyle.net/sach-mau-trung-bay.html">SÁCH GIẢ TRƯNG BÀY</a></li></ul>

                                        @endif
                                    </li>
                                    <li><a href="{{ route('Ft_Post_Index') }}"
                                           title="Tư vấn sản phẩm">Tư vấn</a></li>
                                    <li><a href="{{ route('Ft_Content_Detail',['slug'=>'gioi-thieu']) }}"
                                           title="Giới thiệu">Giới thiệu</a></li>
                                    <li><a href="{{ route('Ft_Content_Detail',['slug'=>'phuong-thuc-thanh-toan']) }}"
                                           title="Liên hệ">Liên
                                            hệ</a></li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($device == 'mobile')
        <div class="navbar-wrapper">
            <nav id="main-menu" class="main-menu">
                <ul>
                    <li class="categories-menu-list"><span>Danh mục sản phẩm</span>
                        {!! showNestedSetModelTree($preDatas['productCategories'],false) !!}
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    {{-- end top menu --}}
    <div class="slider">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <img src="public/ft/img/slide.jpg" alt="Cửa hàng đồ trang trí tại Hồ Chí Minh" class="img-responsive"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end slider --}}
    <div class="main">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="aside">
                                                                                                <div class="block">
                                        <h3><span><i class="glyphicon glyphicon-list"></i> Danh mục sản phẩm</span></h3>
                                        <div class="category-list">
                                            <ul><li><a href="http://ironstyle.net/dong-ho-trang-tri.html">ĐỒNG HỒ TREO TƯỜNG<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/dong-ho-treo-tuong.html">Đồng hồ treo tường</a></li></ul></div></li><li><a href="http://ironstyle.net/tranh-treo-tuong.html">TRANH TREO TƯỜNG<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/tranh-treo-tuong-phong-be.html">Tranh Treo Tường Phòng Bé</a></li><li><a href="http://ironstyle.net/tranh-treo-tuong-phong-chung.html">Tranh Treo Tường Phòng Chung</a></li><li><a href="http://ironstyle.net/tranh-treo-tuong-phong-khach.html">Tranh Treo Tường Phòng Khách</a></li><li><a href="http://ironstyle.net/tranh-treo-tuong-phong-an.html">Tranh Treo Tường Phòng Ăn</a></li><li><a href="http://ironstyle.net/tranh-treo-tuong-phong-ngu.html">Tranh Treo Tường Phòng Ngủ</a></li></ul></div></li><li><a href="http://ironstyle.net/do-trang-tri-dep.html">ĐỒ TRANG TRÍ ĐẸP</a></li><li><a href="http://ironstyle.net/binh-hoa-chau-hoa-cam-san.html">BÌNH HOA, CHẬU HOA CẮM SẴN<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/hoa-treo-tuong.html">Hoa treo tường</a></li><li><a href="http://ironstyle.net/chau-hoa-nho-de-ban.html">Chậu hoa nhỏ để bàn </a></li><li><a href="http://ironstyle.net/binh-chau-hoa-lon.html">Bình chậu hoa lớn</a></li></ul></div></li><li><a href="http://ironstyle.net/binh-chau-cam-hoa.html">BÌNH CHẬU CẮM HOA<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/binh-su-chau-su.html">Bình sứ, Chậu sứ</a></li><li><a href="http://ironstyle.net/binh-thuy-tinh.html">Bình thủy tinh</a></li></ul></div></li><li><a href="http://ironstyle.net/do-gia-dung.html">ĐỒ GIA DỤNG<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/hop-khan-giay.html">Hộp khăn giấy</a></li><li><a href="http://ironstyle.net/bo-dung-gia-vi.html">Bộ đựng gia vị</a></li><li><a href="http://ironstyle.net/hu-dung-muong-dua.html">Hũ đựng muỗng đũa</a></li></ul></div></li><li><a href="http://ironstyle.net/den-ngu-dep-sang-trong-va-phong-cach-tai-tphcm.html">ĐÈN NGỦ TRANG TRÍ<i class="glyphicon glyphicon-menu-right"></i></a><div class="sub-menuw"><ul class="sub-menu"><li><a href="http://ironstyle.net/den-ngu-hoa-van.html">Đèn Ngủ Để Bàn</a></li><li><a href="http://ironstyle.net/den-dung-trang-tri.html">Đèn Đứng Trang Trí</a></li><li><a href="http://ironstyle.net/den-nam-trang-tri.html">Đèn Nằm Trang trí</a></li></ul></div></li><li><a href="http://ironstyle.net/sach-mau-trung-bay.html">SÁCH GIẢ TRƯNG BÀY</a></li></ul>
                                        </div>
                                    </div>
                                                                <div class="block">
                                    <a href="tel:0908.115.916" title="Liên hệ 0908.115.916" target="_blank">
                                        <img src="http://ironstyle.net/ft/img/hotline.png" alt="Liên hệ tư vấn để lấy giá chính xác nhất" class="img-center img-responsive">
                                    </a>
                                </div>
                                                    </div>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end main --}}
    <div class="note">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="note-items note-items-1">
                            <h5>
                                <span>Miễn phí vận chuyển</span>
                            </h5>
                            <p>Miễn phí vận chuyển cho đơn hàng &gt; 400.000 vnđ tại Tp.Hồ Chí
                                Minh</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="note-items note-items-2">
                            <h5>
                                <span>Đổi trả miễn phí</span>
                            </h5>
                            <p>Đổi trả miễn phí cho đơn hàng không vừa ý.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="note-items note-items-3">
                            <h5>
                                <span>Sản phẩm được bảo hành</span>
                            </h5>
                            <p>Sản phẩm được đổi trả miễn phí trong 3 ngày nếu không vừa.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="note-items note-items-4">
                            <h5>
                                <span>Tư vấn sản phẩm miễn phí</span>
                            </h5>
                            <p>
                                Liên hệ với chúng tôi để được tư vấn sản phẩm <strong>Hotline:
                                    0908.115.916</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end note --}}
    <div class="notes">
        <div class="pagew">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="items">
                            <div class="items-title">
                                <h5><span>Thông tin liên hệ</span></h5>
                            </div>
                            <ul class="list-content">
                                <li><strong>Tel:</strong> 0906 617 553 (Miss.Quyên)</li>
                                <li><strong>Tel:</strong> 0908 115 916 (Miss.Bắc)</li>
                                <li><strong>Địa chỉ:</strong> 25C Trần Quang Khải, Q.1, TP.HCM</li>
                                <li><strong>Email:</strong> tananhcorp@gmail.com</li>
                                <li><strong>Website:</strong> https://ironstyle.net</li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="items">
                            <div class="items-title">
                                <h5><span>Quy định sử dụng</span></h5>
                            </div>
                            <ul class="list-content">
                                <li><a href="{{ route('Ft_Content_Detail',['slug'=>'gioi-thieu']) }}" target="_blank"
                                       title="Giới thiệu">Giới thiệu</a></li>
                                <li><a href="{{ route('Ft_Content_Detail',['slug'=>'dieu-khoang-mua-ban-hang-hoa']) }}"
                                       target="_blank" title="Điều khoảng mua bán hàng hóa">Điều khoảng mua bán hàng
                                        hóa</a></li>
                                <li><a href="{{ route('Ft_Content_Detail',['slug'=>'van-chuyen-va-giao-nhan-hang']) }}"
                                       target="_blank" title="Vận chuyển và giao nhận hàng">Vận chuyển và giao nhận
                                        hàng</a></li>
                                <li><a href="{{ route('Ft_Content_Detail',['slug'=>'phuong-thuc-thanh-toan']) }}"
                                       target="_blank"
                                       title="Phương thức thanh toán">Phương thức thanh toán</a></li>
                                <li><a href="{{ route('Ft_Content_Detail',['slug'=>'chinh-sach-bao-mat']) }}"
                                       target="_blank"
                                       title="Chính sách bảo mật">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="items">
                            <div class="items-title">
                                <h5><span>Ghi chú</span></h5>
                            </div>
                            <ul class="list-content">
                                <li><span>Đang tiến hành đăng ký với bộ công thương</span></li>
                            </ul>
                            <div class="protected">
                                <p>
                                    <a href="http://www.dmca.com/Protection/Status.aspx?ID=d930726f-1faf-498b-9643-1345299e6c8f&amp;refurl=https://ironstyle.net/"
                                       title="DMCA.com Protection Status" class="dmca-badge"> <img
                                                src="//images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=d930726f-1faf-498b-9643-1345299e6c8f"
                                                alt="DMCA.com Protection Status"></a>
                                    <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js" defer></script>
                                </p>
                                <div class="google-like-share">
                                    <script src="https://apis.google.com/js/platform.js" async="" defer="true"
                                            gapi_processed="true"></script>
                                    <div id="___plusone_0"
                                         style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 24px;">
                                        <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0"
                                                marginwidth="0" scrolling="no"
                                                style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;"
                                                tabindex="0" vspace="0" width="100%" id="I0_1493784604345"
                                                name="I0_1493784604345"
                                                src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;annotation=inline&amp;width=300&amp;origin=https%3A%2F%2Fironstyle.net&amp;url=https%3A%2F%2Fironstyle.net%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.W7MNXYX1kFg.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCO0PKgX5Lf5rXLLDRcg_3nDyyXKeg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1493784604345&amp;parent=https%3A%2F%2Fironstyle.net&amp;pfname=&amp;rpctoken=36742657"
                                                data-gapiattached="true" title="+1"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="image">
                            <img src="https://cdnironstylenet.r.worldssl.net/ft/img/bo-cong-thuong.png" alt="Đã đăng ký với bộ công thương" class="img-responsive img-center" />
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" defer></script>
<script src="public/ft/js/jquery.unveil.js" defer></script>

<script src="public/ft/js/bootstrap.min.js" defer></script>

@yield('script')
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 968395577;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="google pixcel" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/968395577/?guid=ON&amp;script=0"/>
    </div>
</noscript>

</body>
</html>
