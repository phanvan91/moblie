@extends('front.master')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->

                <!-- ./block category  -->
                <!-- block filter -->

                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <!-- category-slider -->
                <div class="category-slider">
                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                        <li>
                            <img src="{!! asset('uploads/slide/homepage-banner7.jpg') !!}" alt="category-slider">
                        </li>
                        <li>
                            <img src="{!! asset('uploads/slide/banner.jpg') !!}" alt="category-slider">
                        </li>
                    </ul>
                </div>
                <!-- ./category-slider -->
                <!-- subcategories -->
                <div class="subcategories">
                    <ul>
                        <li class="current-categorie">
                            <a href="{!! URL::route('trangchu') !!}">Trang Chủ</a>
                        </li>
                        @foreach($cate_cungloai1 as $value)
                        <li>
                            <a href="{!! URL::route('cate',[$value['id'],$value['slug']]) !!}">{!! $value['name'] !!}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- ./subcategories -->
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title">{!! $title_cate['name'] !!}</span>
                    </h2>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                      @foreach($product_cate as $value)
                        <li class="col-sx-12 col-sm-3">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="{!! URL::route('detail',[$value['id'],$value['slug']]) !!}">
                                        <img class="img-responsive" alt="product" src="{!! asset('uploads/'.$value['image']) !!}" />
                                    </a>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="{!! URL::route('getmuahang',[$value['id'],$value['slug']]) !!}">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{!! $value['name'] !!}</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">{!! number_format($value['pricesale'],0,',','.') !!}</span>
                                        <span class="price old-price">{!! number_format($value['priceold'],0,',','.') !!}</span>
                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                      <?php  $product_cate->lastpage() ?>
                        <nav>
                          <ul class="pagination">
                            @for($i=1; $i<= $product_cate->lastpage() ;$i++)
                            <li class="{!! ($product_cate->currentPage() == $i)? 'active': ''  !!}"><a href="{!! $product_cate->url($i) !!}">{!! $i !!}</a></li>
                            @endfor
                            @if($product_cate->currentPage() !=  $product_cate->lastpage())
                            <li><a href="{!! $product_cate->url($product_cate->currentPage() +1) !!}" aria-label="Next"><span aria-hidden="true">Next &raquo;</span></a></li>
                            @endif
                          </ul>
                        </nav>
                    </div>


                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection
