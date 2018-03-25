@extends('front.master')
@section('content')
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-top-right">
                <div class="homeslider">
                    <ul id="contenhomeslider">
                      <li><img alt="Funky roots" src="{!! asset('uploads/slide/homepage-banner7.jpg') !!}" title="Funky roots" /></li>
                      <li><img alt="Funky roots" src="{!! asset('uploads/slide/banner.jpg') !!}" title="Funky roots" /></li>
                      <li><img  alt="Funky roots" src="{!! asset('uploads/slide/636507957383427128_OPPO-tet-H1.jpg') !!}" title="Funky roots" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<div class="box-products new-arrivals">
    <div class="container">
      @foreach($cate as $value)
        <div class="box-product-head">

            <span class="box-title">{!! $value['name'] !!}</span>
            <ul class="box-tabs nav-tab">
                <?php $active = DB::table('categories')->where('active',1)->where('parent_id',$value['id'])->get() ?>
                @foreach($active as $value1)
                <li class="active"><a  href="{!! URL::route('cate',[$value1->id,$value1->slug]) !!}"> {!! $value1->name !!}  </a></li>
                @endforeach
                <?php $con = DB::table('categories')->where('active',0)->where('parent_id',$value['id'])->get();
                $i=1;
                 ?>
                @foreach($con as $value2)
                <li><a href="{!! URL::route('cate',[$value2->id,$value2->slug]) !!}">{!! $value2->name !!}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="box-product-content">
          @foreach($active as $value4)
          <div class="box-product-adv">
            <ul class="owl-carousel nav-center" data-items="1" data-dots="false" data-autoplay="true" data-loop="true" data-nav="true">
              <?php $image = DB::table('products')->where('category_id',$value4->id)->take(2)->get() ?>
              @foreach($image as $img)
                <li><a href="{!! URL::route('detail',[$img->id,$img->slug]) !!}"><img src="{!! asset('uploads/'.$img->image) !!}" alt="adv"></a></li>
                @endforeach
            </ul>
          </div>
          <div class="box-product-list">
                <div class="tab-container">
                  <?php // active ?>
                    <div id="tab-1" class="tab-panel active">
                        <ul class="product-list owl-carousel nav-center" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                          <?php $productactive = DB::table('products')->where('category_id',$value4->id)->orderBy('id','desc')->take(5)->get() ?>
                          @foreach($productactive as $value5)
                            <li>
                                <div class="left-block">
                                    <a href="{!! URL::route('detail',[$value5->id,$value5->slug]) !!}"><img class="img-responsive" alt="product" src="{!! asset('uploads/'.$value5->image) !!}" /></a>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="{!! URL::route('getmuahang',[$value5->id,$value5->slug]) !!}">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{!! $value5->name !!}</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">{!! number_format($value5->priceold,0,',','.') !!}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
      @endforeach
        </div>
    </div>
</div>
@endsection
