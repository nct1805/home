<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <base href="{{asset('')}}">
  <link rel="stylesheet" href="public/admin_asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="public/admin_asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="public/admin_asset/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/admin_asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="public/admin_asset/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="public/admin_asset/plugins/select2/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="public/admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="public/js/jquery.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.layouts.header')
  @yield('content')
  @include('admin.layouts.footer')
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 2.2.3 -->
<script src="public/admin_asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="public/admin_asset/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="public/admin_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/admin_asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="public/admin_asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/admin_asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/admin_asset/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/admin_asset/dist/js/demo.js"></script>
<script src="public/admin_asset/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="public/admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="public/admin_asset/plugins/select2/select2.full.min.js"></script>

<script>
  $(function () {
    $(".select2").select2();
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- page script -->
<script>
  $(function () {
    $('#table_list').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
                        CKEDITOR.replace( 'editor1' ,{
                          filebrowserBrowseUrl : 'http://ironstyle.net/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                          filebrowserUploadUrl : 'http://ironstyle.net/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                          filebrowserImageBrowseUrl : 'http://ironstyle.net/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
                        });
                      </script>
                      <script>
                        CKEDITOR.replace( 'editor2' ,{
                          filebrowserBrowseUrl : 'http://ironstyle.net/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                          filebrowserUploadUrl : 'http://ironstyle.net/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                          filebrowserImageBrowseUrl : 'http://ironstyle.net/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
                        });
                      </script>
@yield('script')
</body>
</html>
