  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{'/plugins/jquery/jquery.min.js'}}"></script>
<!-- Bootstrap 4 -->
<script src="{{'/plugins/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
<!-- AdminLTE App -->
<script src="{{'/dist/js/adminlte.min.js'}}"></script>
<!-- Toastr -->
<script src="{{'/plugins/toastr/toastr.min.js'}}"></script>
<!-- ChartJs -->
<script src="{{'/plugins/chart.js/Chart.min.js'}}"></script>

@include('layouts.msg')

<script>
  tinymce.init({
    selector:'textarea.bodyfield',
    height:300,
    menubar:false,
    plugins:['links','table','image','autoresize','list','lists advlist'],
    toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
    content_css:[
      '{{asset('assets/css/content.css')}}'
    ],
    images_upload_url:'{{route('imageupload')}}',
    images_upload_credentials:true,
    convert_urls:false
    });
  </script>


<script>
  $(document).on('click','a',function(){
    var del = $(this).attr('user');
    $('#idUser').val(del);
  });
</script>

<script>
  $(document).on('click','a',function(){
    var del = $(this).attr('page');
    $('#idPage').val(del);
  });
</script>


