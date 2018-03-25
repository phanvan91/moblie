<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{!! asset('') !!}">
    <link rel="stylesheet" type="text/css" href="front/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="front/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="front/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="front/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="front/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="front/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="front/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="front/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="front/css/style.css" />
    <link rel="stylesheet" type="text/css" href="front/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="front/css/option5.css" />
    <title>Kute shop - GFXFree.Net Option 5</title>
</head>
<body class="option5">
<!-- HEADER -->
<div id="header" class="header">
  <div class="top-header">
      <div class="container">
          <div class="currency ">
              <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Dollar</a></li>
                      <li><a href="#">Euro</a></li>
                    </ul>
              </div>
          </div>
          <div class="language ">
            <div class="dropdown">
                  <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                  <img alt="email" src="front/images/fr.jpg" />French

                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><img alt="email" src="front/images/en.jpg" />English</a></li>
                    <li><a href="#"><img alt="email" src="front/images/fr.jpg" />French</a></li>
                </ul>
            </div>
          </div>
          <div class="top-bar-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
          </div>
          <div class="support-link">
              <a href="#">Abount Us</a>
              <a href="#">Support</a>
          </div>

          <div id="user-info-top" class="user-info pull-right">
              <div class="dropdown">
                  <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                  <ul class="dropdown-menu mega_dropdown" role="menu">
                      <li><a href="login.html">Login</a></li>
                      <li><a href="#">Compare</a></li>
                      <li><a href="#">Wishlists</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-5 col-lg-4 header-search-box">
                <form class="form-inline">
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Keyword here...">
                      </div>
                      <button type="submit" class="pull-right btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 logo">
                <a href="index.html"><img alt="Kute shop - GFXFree.Net" src="front/data/option5/logo.png" /></a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 group-button-header">
                <a title="Compare" href="#" class="btn-compare">compare</a>
                <a title="My wishlist" href="#" class="btn-heart">wishlist</a>
                <div class="btn-cart" id="cart-block">
                    <a title="My cart" href="{!! URL::route('getgiohang') !!}">Cart</a>
                    <span class="notify notify-right">{!! $count !!}</span>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title">{!! $count !!} Items in my cart</h5>
                            <div class="cart-block-list">
                                <ul>
                                  @foreach($content as $value)
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="{!! URL::route('xoasanpham',$value->rowId) !!}" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="{!! asset('uploads/'.$value->options->image) !!}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">{!! $value->name !!}</p>
                                        <p class="p-rice">{!! number_format($value->price,0,',','.')  !!} VND</p>
                                        <p>Qty: {!! $value->qty !!}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Total</span>
                                <span class="toal-price pull-right"> VND</span>
                            </div>
                            <div class="cart-buttons">
                                <a href="order.html" class="btn-check-out">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
              <div class="col-sm-3" id="box-vertical-megamenus">
                  <div class="box-vertical-megamenus">
                  <h4 class="title">
                      <span class="btn-open-mobile"><i class="fa fa-bars"></i></span>
                  </h4>
              </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Home</a></li>
                                    <?php $cate = DB::table('categories')->where('parent_id',0)->get(); ?>
                                    @foreach($cate as $value)
                                    <li class="dropdown">
                                        <a href="{!! URL::route('trangchu') !!}" class="dropdown-toggle" data-toggle="dropdown">{!! $value->name !!}</a>
                                        <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                  <?php $menu_con = DB::table('categories')->where('parent_id',$value->id)->get() ?>
                                                  @foreach($menu_con as $value1)
                                                    <li class="link_container"><a href="{!! URL::route('cate',[$value1->id,$value1->slug]) !!}">{!! $value1->name !!}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li><a href="{!! URL::route('getcontact') !!}">Contact</a></li>
                                    <li><a href="{!! URL::route('getgiohang') !!}">Giỏ Hàng</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
        </div>
    </div>
</div>
<!-- end header -->
<!-- Home slideder-->
@yield('content')


<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img src="front/data/option5/logo.png" alt="logo" /></a>
                        <div id="address-list">
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@business.com</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Company</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">My Account</div>
                            <ul id = "introduce-Account" class="introduce-list">
                                <li><a href="#">My Order</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">My Credit Slip</a></li>
                                <li><a href="#">My Addresses</a></li>
                                <li><a href="#">My Personal In</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Support</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">Newsletter</div>
                        <div class="input-group" id="mail-box">
                          <input type="text" placeholder="Your Email Address"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">OK</button>
                          </span>
                        </div><!-- /input-group -->
                        <div class="introduce-title">Let's Socialize</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>

                </div>
            </div><!-- /#introduce-box -->

            <!-- #trademark-box -->
            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Accepted Payment Methods</li>
                        <li>
                            <a href="#"><img src="front/data/trademark-ups.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-qiwi.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-wu.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-cn.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-visa.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-mc.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-ems.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-dhl.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-fe.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="front/data/trademark-wm.jpg"  alt="ups"/></a>
                        </li>
                    </ul>
                </div>
            </div> <!-- /#trademark-box -->

            <!-- #trademark-text-box -->
            <div id="trademark-text-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-search-list" class="trademark-list">
                        <li class="trademark-text-tit">HOT SEARCHED KEYWORDS:</li>
                        <li><a href="#" >Xiaomo Mi3</a></li>
                        <li><a href="#" >Digifli Pro XT 712 Tablet</a></li>
                        <li><a href="#" >Mi 3 Phones</a></li>
                        <li><a href="#" >Iphoneo 6 Plus</a></li>
                        <li><a href="#" >Women's Messenger Bags</a></li>
                        <li><a href="#" >Wallets</a></li>
                        <li><a href="#" >Women's Clutches</a></li>
                        <li><a href="#" >Backpacks Totes</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-tv-list" class="trademark-list">
                        <li class="trademark-text-tit">TVS:</li>
                        <li><a href="#" >Sonyo TV</a></li>
                        <li><a href="#" >Samsing TV</a></li>
                        <li><a href="#" >LGG TV</a></li>
                        <li><a href="#" >Onidai TV</a></li>
                        <li><a href="#" >Toshibao TV</a></li>
                        <li><a href="#" >Philipsi TV</a></li>
                        <li><a href="#" >Micromax TV</a></li>
                        <li><a href="#" >LED TV</a></li>
                        <li><a href="#" >LCD TV</a></li>
                        <li><a href="#" >Plasma TV</a></li>
                        <li><a href="#" >3D TV</a></li>
                        <li><a href="#" >Smart TV</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-mobile-list" class="trademark-list">
                        <li class="trademark-text-tit">MOBILES:</li>
                        <li><a href="#" >Moto E</a></li>
                        <li><a href="#" >Samsing Mobile</a></li>
                        <li><a href="#" >Micromaxi Mobile</a></li>
                        <li><a href="#" >Nokian Mobile</a></li>
                        <li><a href="#" >HTCK Mobile</a></li>
                        <li><a href="#" >Sonyo Mobile</a></li>
                        <li><a href="#" >Appleo Mobile</a></li>
                        <li><a href="#" >LGG Mobile</a></li>
                        <li><a href="#" >Karbonno Mobile</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-laptop-list" class="trademark-list">
                        <li class="trademark-text-tit">LAPTOPS::</li>
                        <li><a href="#" >Appleo Laptop</a></li>
                        <li><a href="#" >Acero Laptop</a></li>
                        <li><a href="#" >Samsing Laptop</a></li>
                        <li><a href="#" >Lenov Laptop</a></li>
                        <li><a href="#" >Sonyo Laptop</a></li>
                        <li><a href="#" >Dello Laptop</a></li>
                        <li><a href="#" >Asuso Laptop</a></li>
                        <li><a href="#" >Toshibao Laptop</a></li>
                        <li><a href="#" >LGG Laptop</a></li>
                        <li><a href="#" >HPO Laptop</a></li>
                        <li><a href="#" >Notebook</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-watches-list" class="trademark-list">
                        <li class="trademark-text-tit">WATCHES:</li>
                        <li><a href="#" >FCUKJ Watches</a></li>
                        <li><a href="#" >Titan Watches</a></li>
                        <li><a href="#" >Casioo Watches</a></li>
                        <li><a href="#" >Fastracki Watches</a></li>
                        <li><a href="#" >Timexe Watches</a></li>
                        <li><a href="#" >Fossill Watches</a></li>
                        <li><a href="#" >Diesel Watches</a></li>
                        <li><a href="#" >Toshibao Laptop</a></li>
                        <li><a href="#" >Luxury Watches</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-shoes-list" class="trademark-list">
                        <li class="trademark-text-tit">FOOTWEAR:</li>
                        <li><a href="#" >Shoes</a></li>
                        <li><a href="#" >Casual Shoes</a></li>
                        <li><a href="#" >Sports Shoes</a></li>
                        <li><a href="#" >Adidas Shoes</a></li>
                        <li><a href="#" >Gas Shoes</a></li>
                        <li><a href="#" >Puma Shoes</a></li>
                        <li><a href="#" >Reebok Shoes</a></li>
                        <li><a href="#" >Woodland Shoes</a></li>
                        <li><a href="#" >Red tape Shoes</a></li>
                        <li><a href="#" >Nike Shoes</a></li>
                    </ul>
                </div>
            </div><!-- /#trademark-text-box -->
            <div id="footer-menu-box">
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Online Shopping</a></li>
                        <li><a href="#" >Promotions</a></li>
                        <li><a href="#" >My Orders</a></li>
                        <li><a href="#" >Help</a></li>
                        <li><a href="#" >Site Map</a></li>
                        <li><a href="#" >Customer Service</a></li>
                        <li><a href="#" >Support</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Most Populars</a></li>
                        <li><a href="#" >Best Sellers</a></li>
                        <li><a href="#" >New Arrivals</a></li>
                        <li><a href="#" >Special Products</a></li>
                        <li><a href="#" >Manufacturers</a></li>
                        <li><a href="#" >Our Stores</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Warantee</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Checkout</a></li>
                        <li><a href="#" >Discount</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Terms & Conditions</a></li>
                        <li><a href="#" >Policy</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Returns</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Warrantee</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>
                <p class="text-center">Copyrights &#169; 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com</p>
            </div><!-- /#footer-menu-box -->
        </div>
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="front/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="front/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="front/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="front/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="front/lib/owl.carousel/owl.carousel.min.js"></script>
<!--<script type="text/javascript" src="assets/lib/jquery.countdown/jquery.countdown.min.js"></script>-->
<!-- COUNTDOWN -->
<script type="text/javascript" src="front/lib/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="front/lib/countdown/jquery.countdown.js"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="front/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="front/js/theme-script.js"></script>

<script type="text/javascript" src="front/lib/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="front/lib/fancyBox/jquery.fancybox.js"></script>
<script type="text/javascript" src="front/lib/jquery.elevatezoom.js"></script>
<script type="text/javascript">
  $(".update").click(function(){
    var rowid = $(this).attr('id');
    var qty = $(this).parent().parent().find(".qty1").val();
    var token = $("input[name= '_token']").val();
    $.ajax({
      url : 'update/'+rowid+'/'+ qty,
      type: 'GET' ,
      cache : false,
      data : {"rowid" : rowid,"qty" : qty,"_token" : token},
      success : function(data){
        if(data = 'ok'){
          window.location = 'gio-hang';
        }
      }
    });
  });
</script>
<script type="text/javascript">
  $(".alert").delay(3000).slideUp();
</script>
</body>
</html>
