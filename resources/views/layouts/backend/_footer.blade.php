<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ getAsset('bk') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ getAsset('bk') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ getAsset('bk') }}/plugins/ckeditor/ckeditor.js"></script>

<script src="{{ getAsset('bk') }}/dist/js/app.min.js"></script>
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

</body>
</html>
