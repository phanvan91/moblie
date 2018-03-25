@extends('front.master')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <!-- ../page heading-->
        <div class="page-content page-order">
            <div class="heading-counter warning">Your shopping cart contains:
                <span>1 Product</span>
            </div>
            <div class="col-md-6 col-md-offset-3">
              @if(count($errors) > 0)
                <ul class="alert alert-danger">
                  @foreach($errors->all() as $value)
                    <li>{!! $value !!}</li>
                  @endforeach
                </ul>
              @endif
            </div>

            <div class="order-detail-content">
              <form class="" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Image</th>
                            <th>Name</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th  class="action">Action</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($content as $value)
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="{!! url('uploads/'.$value->options->image )!!}" ></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">{!! $value->name !!} </a></p>
                                <input type="hidden" name="productname[]" value="{!! $value->name !!}">
                            </td>
                            <td class="price"><span>{!! number_format($value->price,0,',','.') !!} VND</span></td>
                            <td class="qty">
                                <input class="form-control input-sm qty1" name="qty[]"  type="text" value="{!! $value->qty !!}">
                            </td>
                            <td style="text-align:center;font-size:150%">
                                <a id="{!! $value->rowId !!}" class="update"> <i class="glyphicon glyphicon-refresh "></i> </a>
                                <a href="{!! URL::route('xoasanpham',$value->rowId) !!}"> <i class="glyphicon glyphicon-remove"></i> </a>

                            </td>
                            <td class="price">
                                <span>{!! number_format($value->price*$value->qty,0,',','.')  !!} VND</span>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                          <td colspan="2" rowspan="2"></td>
                            <td colspan="3"><strong>Total</strong></td>
                            <td colspan="2"><strong>{!! $total !!}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="col-md-6 col-md-offset-3">

                  <h3 style="text-align:center;padding:20px">Thông tin khách hàng mua sản phẩm</h3>
                  <input type="text" class="form-control" placeholder="Tên Khách Hàng" name="ten" value="{!! old('ten') !!}">
                  <input type="text" style="margin:10px 0px" class="form-control" placeholder="Email Khách Hàng" name="email" value="{!! old('email') !!}">
                  <input type="text" class="form-control" placeholder="Số Điện Thoại Khách Hàng" name="sdt" value="{!! old('sdt') !!}">
                </div>
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" > <input type="submit" name="submit" value="Proceed to checkout"> </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
