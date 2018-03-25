@extends('admin.master')
@section('title','List Product')
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
                            <th>Loại sản phẩm</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php $i=0 ?>
                      @foreach($product as $value)
                      <?php $cate = DB::table('categories')->where('id',$value['category_id'])->first() ?>
                      <?php $parentcate = DB::table('categories')->where('id',$cate->parent_id)->first() ?>
                      <?php $i+=1 ?>
                      <tr>
                        <td>{!!$i!!}</td>
                        <td>{!! $value['name'] !!}</td>
                        <td> {!! $parentcate->name !!} : {!! $cate->name !!} </td>
                        <td class="center"> <a href="{!! URL::route('getproductedit',$value['id']) !!}"> <span class="glyphicon glyphicon-edit"></span> </a> </td>
                        <td class="center"> <a onclick="return confirm('Bạn chắc muốn xóa không?')" href="{!! URL::route('getproductdel',$value['id']) !!}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
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
