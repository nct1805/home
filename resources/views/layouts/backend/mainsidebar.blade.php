<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ getAsset('bk') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Liên kết</li>
            <li><a href="{{ route('Bk_Order_Index') }}"><i class="glyphicon glyphicon-shopping-cart"></i> Đơn hàng</a></li>
            <li><a href="{{ route('Bk_Slider_Index') }}"><i class="glyphicon glyphicon-picture"></i> Banner</a></li>
            <li class="treeview active">
                <a href="#"><i class="fa fa-edit"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Bk_Product_Category_Index') }}">Danh mục</a></li>
                    <li><a href="{{ route('Bk_Product_Index') }}">Sản phẩm</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#"><i class="fa fa-edit"></i> <span>Bài viết</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    {{--<li><a href="{{ route('Bk_Category_Index') }}">Danh mục</a></li>--}}
                    <li><a href="{{ route('Bk_Post_Index') }}">Bài viết</a></li>
                </ul>
            </li>
           {{-- <li><a href="{{ route('Bk_Video_Index') }}"><i class="fa fa-youtube"></i> Videos</a></li>--}}
            <li><a href="{{ route('Bk_User_Index') }}"><i class="fa fa-group"></i> <span>Quản trị</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>