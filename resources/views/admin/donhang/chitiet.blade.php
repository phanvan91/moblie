@extends('admin.master')
@section('title','Chi Tiết Đơn Hàng')
@section('content')
<div class="row">
    <div class="col-md-12">
      @if(Session::has('flash_message'))
        <div class="alert alert-{!! Session::get('flash_level') !!}">
          {!! Session::get('flash_message') !!}
        </div>
      @endif
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=0 ?>
                      @foreach($chitiet as $value)
                      <?php $i+=1 ?>
                        <tr class="odd gradeX">
                            <td>{!! $i !!}</td>
                            <td>{!! $value['name'] !!}</td>
                            <td>{!! $value['soluong'] !!}</td>
                            <td> {!! number_format($value['soluong'] * $value['price'],0,',','.') !!} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
