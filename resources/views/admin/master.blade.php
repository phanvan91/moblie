<!DOCTYPE html>
<html lang="en">

@include('admin.include.head')

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.include.nav')

        <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">@yield('title')</h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-12">
                <ul class="nav nav-pills">
                  <li role="presentation" class="active"><a href="{!! URL::route('dashboard') !!}">Trang Chính</a></li>
                  <li role="presentation"><a href="{!! URL::route('getlistuser') !!}">Quản lí User</a></li>
                  <li role="presentation"><a href="{!! URL::route('getcatelist') !!}">Quản lí Danh mục</a></li>
                  <li role="presentation"><a href="#">Quản lí Sản phẩm</a></li>
                  <li class="pull-right"> <a href="#">Xin chào {!! Auth::user()->name !!} </a> </li>
                </ul>
                <hr>
              </div>
            @yield('content')



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morrisjs/morris.min.js"></script>
    <script src="admin/data/morris-data.js"></script>


    <!-- DataTables JavaScript -->
    <script src="admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
    <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
    </script>

    <script type="text/javascript">
      $(".alert").delay(3000).slideUp();
    </script>
    <script type="text/javascript">
      $("#addimage").click(function(){
        $("#insert").append('<div class="form-group"><input type="file" name="fadd[]"></div>');
      });
    </script>

    <script type="text/javascript">
      $("a#del_img").click(function(){
        var url = "http://localhost/mobile/public/admin/product/delimg/";
        var _token = $("form[name = 'editform']").find("input[name = '_token']").val();
        var idhinh = $(this).parent().find("img").attr("idhinh");
        var urlhinh = $(this).parent().find("img").attr("src");
        var rem = $(this).parent().find("img").attr("id");
        $.ajax({
          url : url + idhinh,
          type : 'GET',
          cache : false,
          data : {"_token":_token,"idhinh":idhinh,"urlhinh":urlhinh},
          success : function(data){
            if(data == 'ok'){
              $("#"+rem).remove();
            }else{
              alert('errors');
            }
          }
        });
      });
    </script>
</body>

</html>
