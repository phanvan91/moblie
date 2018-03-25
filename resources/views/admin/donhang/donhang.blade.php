@extends('admin.master')
@section('title','Danh Sách Đơn Hàng')
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
                            <th>Tên Khách Hàng</th>
                            <th>Email</th>
                            <th>Điện Thoại</th>
                            <th>Xem Thông Tin</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($customer as $value)
                        <tr class="odd gradeX">
                            <td>1</td>
                            <td>{!! $value['name'] !!}</td>
                            <td>{!! $value['email'] !!}</td>
                            <td>+84{!! $value['sodienthoai'] !!}</td>
                            <td class="center"> <a href="{!! URL::route('getchitiet',$value['id']) !!}"> <span class="glyphicon glyphicon-edit"></span> </a> </td>
                            <td class="center"> <a href="{!! URL::route('getdel',$value['id']) !!}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
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
