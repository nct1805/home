@include('layouts.backend.header')
    <!-- Main Header -->
    @include('layouts.backend.mainheader')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.backend.mainsidebar');
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
               {{ isset( $pageTitle ) ? $pageTitle : 'Dashboard' }}
            </h1>
            @include('layouts.backend.breadcrumb')
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    @include('layouts.backend.mainfooter')
    <!-- Control Sidebar -->
    @include('layouts.backend.sidebar')
@include('layouts.backend.footer')