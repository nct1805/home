<header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>5GIAY</b>.VN</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->
          <?php
            $avatar = \Illuminate\Support\Facades\Auth::user()->avatar;
            $date = \Illuminate\Support\Facades\Auth::user()->created_at;
            $date = date('d-m-Y H:i:s');
            if(!empty($avatar))
              $img = 'public/uploads/avartar/thumbs/'.$avatar;
            else $img = 'public/admin_asset/dist/img/user2-160x160.jpg';
          ?>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ $img }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ $img }}" class="img-circle" alt="User Image">
                <p>
                  {{ \Illuminate\Support\Facades\Auth::user()->name }}
                  <small>Tham gia {{ $date }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin/users/edit/{{ \Illuminate\Support\Facades\Auth::user()->id }}" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin_Logout')}}" class="btn btn-default btn-flat">Thoát</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ $img }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý ngành hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/products/list"><i class="fa fa-circle-o"></i> Danh sách tin đăng</a></li>
            <li><a href="admin/category/list"><i class="fa fa-circle-o"></i> Danh mục ngành hàng</a></li>
          </ul>
        </li>
        <li class="">
          <a href="admin/banner/list"><i class="fa fa-table"></i> Banner</a>
        </li>
        <li class="">
          <a href="admin/slide/list"><i class="fa fa-table"></i> Slide</a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản trị</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/admin_group/list"><i class="fa fa-circle-o"></i> Nhóm quản trị</a></li>
            <li><a href="admin/modules/list"><i class="fa fa-circle-o"></i>Modules</a></li>
            <li><a href="admin/users/list"><i class="fa fa-circle-o"></i> Thành viên</a></li>
            <li><a href="admin/permision/list"><i class="fa fa-circle-o"></i> Phân quyền</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
