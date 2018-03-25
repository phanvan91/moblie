@extends('admin.master')
@section('title','Dashboard')
@section('content')

    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <a href="{!! URL::route('getadduser') !!}" class="thumbnail text-center" >
            <span class="fa fa-user-plus" style="font-size:700%"></span>
            <p>Thêm User</p>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{!! URL::route('getlistuser') !!}" class="thumbnail text-center" >
            <span class="fa fa-user" style="font-size:700%"></span>
            <p>Quản lí User</p>
          </a>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <a href="{!! URL::route('getcateadd') !!}" class="thumbnail text-center" >
          <span class="fa fa-calendar-plus-o" style="font-size:700%"></span>
          <p>Thêm Danh Mục</p>
        </a>
      </div>
      <div class="col-md-3">
        <a href="{!! URL::route('getcatelist') !!}" class="thumbnail text-center" >
          <span class="fa fa-calendar-o" style="font-size:700%"></span>
          <p>Quản lí Danh Mục</p>
        </a>
      </div>
      <div class="col-md-3"></div>
  </div>

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
      <a href="{!! URL::route('getproductadd') !!}" class="thumbnail text-center" >
        <span class="fa fa-cart-plus" style="font-size:700%"></span>
        <p>Thêm Sản Phẩm</p>
      </a>
    </div>
    <div class="col-md-3">
      <a href="{!! URL::route('getproductlist') !!}" class="thumbnail text-center" >
        <span class="fa fa-shopping-cart" style="font-size:700%"></span>
        <p>Quản lí Sản Phẩm</p>
      </a>
    </div>
    <div class="col-md-3"></div>
</div>



    </div>

    <div class="col-lg-4">
      <h3><i class="fa fa-comments-o" aria-hidden="true"></i> Thống Kê</h3>
      <ul>
        <?php $countuser = DB::table('users')->count(); $countcate = DB::table('categories')->count(); $countpro = DB::table('products')->count() ?>
        <li> Tổng số User : {!! $countuser !!}  </li>
        <li> Tổng số Danh Mục : {!! $countcate !!} </li>
        <li> Tổng số Sản Phẩm : {!! $countpro !!} </li>
      </ul>
    </div>


</div>
@endsection
