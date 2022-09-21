<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8" />
      <title>MyMedProducts</title>
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta property="og:title" content="" />
      <meta property="og:type" content="" />
      <meta property="og:url" content="" />
      <meta property="og:image" content="" />
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/main.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/normalize.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/perfect-scrollbar.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/select2.min.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/uicons-regular-straight.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/slick.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/owl.theme.green.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/owl.carousel.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/owl.theme.green.css">
      <link rel="stylesheet" href="{{ asset('public/') }}/assets/css/mdb.min.css">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <!-- Font Awesome -->
      <link
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
         rel="stylesheet"
         />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
      <!-- MDB -->
      <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"  rel="stylesheet" /> -->
      <!-- MDB -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

      <style>
      .eroor{
          color:red;
      }
      </style>
      
      
      <style>
      
      button.dropbtn {
    padding: 0px 0px !important;
    font-size: 16px;
    font-weight: 700;
    color: #253D4E;
    font-family: "Quicksand", sans-serif;
}
      
       .dropbtn {
  font-size: 16px;
  border: none;
  background:none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
      display: block;
    margin: -10px 10px;
    /* padding: 0px 0px; */
    padding: 0px 0px !important;
    font-size: 15px;
    font-weight: 700;
    color: #253D4E;
    font-family: "Quicksand", sans-serif;
}

/*.dropdown-content a:hover {background-color: #ddd;}*/

.dropdown:hover .dropdown-content {display: block;}


      </style>
      
      
      
   </head>
   <body>
      <!-- Quick view -->
      <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                           <!-- MAIN SLIDES -->
                           <div class="product-image-slider">
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-2.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-1.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-3.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-4.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-5.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/img/product-16-6.jpg" alt="product image" />
                              </figure>
                              <figure class="border-radius-10">
                                 <img src="{{ asset('public/') }}/assets/imgs/product-16-7.jpg" alt="product image" />
                              </figure>
                           </div>
                           <!-- THUMBNAILS -->
                           <div class="slider-nav-thumbnails">
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-3.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-4.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-5.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-6.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-7.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-8.jpg" alt="product image" /></div>
                              <div><img src="{{ asset('public/') }}/assets/imgs/thumbnail-9.jpg" alt="product image" /></div>
                           </div>
                        </div>
                        <!-- End Gallery -->
                     </div>
                     <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                           <span class="stock-status out-stock"> Sale Off </span>
                           <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Modal Dummy Text</a></h3>
                           <div class="product-detail-rating">
                              <div class="product-rate-cover text-end">
                                 <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                 </div>
                                 <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                              </div>
                           </div>
                           <div class="clearfix product-price-cover">
                              <div class="product-price primary-color float-left">
                                 <span class="current-price text-brand">$38</span>
                                 <span>
                                 <span class="save-price font-md color3 ml-15">26% Off</span>
                                 <span class="old-price font-md ml-15">$52</span>
                                 </span>
                              </div>
                           </div>
                           <div class="detail-extralink mb-30">
                              <div class="detail-qty border radius">
                                 <a href="#" class="qty-down"><i class="fas fa-angle-down"></i></a>
                                 <span class="qty-val">1</span>
                                 <a href="#" class="qty-up"><i class="fas fa-angle-up"></i></a>
                              </div>
                              <table class="variations " cellspacing="0">
                                 <tbody>
                                    <tr>
                                       <td class="label quantity-td "><label class="modal-cart" for="select-quantity ">SELECT QUANTITY</label></td>
                                       <td class="value">
                                          <select id="select-quantity" class="" name="attribute_select-quantity" data-attribute_name="attribute_select-quantity" data-show_option_none="yes">
                                             <option value="">Choose an option</option>
                                             <option value="250 ML" class="attached enabled">250 ML</option>
                                             <option value="500 ML" class="attached enabled">500 ML</option>
                                             <option value="1000 ML" class="attached enabled">1000 ML</option>
                                          </select>
                                          <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="product-extra-link2">
                                 <button type="submit" class="button button-add-to-cart text-white"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                              </div>
                           </div>
                           <div class="font-xs">
                              <ul>
                                 <li class="mb-3">SKU: <span class="text-brand"></span></li>
                                 <li class="mb-3">N/A:<span class="text-brand"> </span></li>
                                 <li class="mb-3">CATEGORY:<span class="text-brand"> RESEARCH CHEMICALS</span></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Detail Info -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <header class="header-area header-style-1 header-height-2">
         <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <a class="navbar-brand" href="#">"myedproductss.com is not responsible for any misuse of the products"</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mb-2  ms-auto">
                        <li class="nav-item">
                           <a class="nav-link active" href="#"></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{  url('/') }}">Home </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('about') }}" tabindex="-1" aria-disabled="true">About Us </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('product') }}" tabindex="-1" aria-disabled="true">Shop </a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
         <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
               <div class="header-wrap">
                  <div class="logo logo-width-1">
                     <a href="{{ url('/') }}"><img src="{{ asset('public') }}/assets/imgs/16.png" alt="logo"></a>
                  </div>
                  <div class="header-right">
                     <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                           <ul class="nav-space">
                              <li><a class="active" href="{{ url('/') }}">HOME</a></li>
                              <li><a href="{{ url('product') }}">SHOP</a></li>
                              <li><a href="{{ url('faq') }}">FAQ</a></li>
                              <li><a href="{{ url('delivery-info') }}">DELIVERY INFO</a></li>
                              <li><a href="{{ url('cart') }}">CART</a></li>
                              <li><a href="{{ url('checkout') }}">CHECKOUT</a></li>
                              @if(empty(Session::get('id')))
                               <li><a href="{{ url('myaccount') }}">LOGIN</a></li>
                             @else
                               <li>
                                   
                               <div class="dropdown">
                                <button class="dropbtn">MY ACCOUNT</button>
                                <div class="dropdown-content">
                                  <a href="{{ url('myorder') }}">MY ORDER</a>
                                  <a href="{{ url('logoutuser') }}">LOGOUT</a>
                                </div>
                              </div>
                                   
                                   <!--<a href="{{ url('logoutuser') }}">MY ACCOUNT</a>-->
                               
                                   </li>
                              @endif
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="hotline d-none d-lg-flex">
                     <img src="{{ asset('public') }}/assets/imgs/icon-headphone.svg" alt="hotline">
                     <p>+17473341571, 321-586-1213 <span><a href="mailto:contact@myedproductss.com">contact@myedproductss.com</a></span></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
               <div class="header-wrap header-space-between position-relative">
                  <div class="logo logo-width-1 d-block d-lg-none">
                     <a href="{{ url('/') }}"><img src="{{ asset('public/') }}/assets/imgs/16.png" alt="logo" /></a>
                  </div>
                  <div class="header-nav d-none d-lg-flex">
                     <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#"> Main Categories <i class="fa fa-angle-down ml-5"></i></a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                           <div class="d-flex categori-dropdown-inner">
                           @foreach($category->chunk(3) as $chunk)
                              <ul>
                              @foreach($chunk as $catItem)
                                 <li>
                                    <a href="{{ url($catItem->slug ?? '') }}"> <img src="{{ asset('public/admin/images').'/'.$catItem->thumbnail ?? '' }}" alt="" />{{ $catItem->name ?? '' }}</a>
                                 </li>
                              @endforeach

                              </ul>
                           @endforeach
                           </div>
                           <div class="more_slide_open" style="display: none">
                              <div class="d-flex categori-dropdown-inner">
                           @foreach($second->chunk(3) as $chunks)
                              <ul>
                              @foreach($chunks as $catItemSecond)
                                 <li>
                                    <a href="{{ url($catItemSecond->slug ?? '') }}"> <img src="{{ asset('public/admin/images').'/'.$catItemSecond->thumbnail ?? '' }}" alt="" />{{ $catItemSecond->name ?? '' }}</a>
                                 </li>
                              @endforeach

                              </ul>
                           @endforeach
                              </div>
                           </div>
                           <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                     </div>
                     <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <form action="#" class="">
                           <div class="input-group mb-3 mt-3">
                              <input type="text" class="form-control form-control-lg" placeholder="Search Here">
                              <button type="submit" class="input-group-text btn-success"> Search<i class="fa fa-search ml-5"></i></button>
                           </div>
                        </form>
                     </div>
                  </div>

                  @php
                    @$cart = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.qty');
                    @$price = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.price');

                    @$cart1 = DB::table('add_to_cart')->where('userid',Session::get('id'))->sum('add_to_cart.qty');
                    @$price1 = DB::table('add_to_cart')->where('userid', Session::get('id'))->sum('add_to_cart.price');
                  @endphp
                  <div class="hotline d-none d-lg-flex">
                     <ul>
                       @if(empty(session::get('id')))
                        <li class="">
                           <a class="cart-contents" href="{{ url('cart') }}" title="View your shopping cart">
                           <i class="fas fa-shopping-basket"></i>
                           <span class="count cartsss">{{ $cart ?? "" }}</span>
                           <span class="amount">$<span class="total">{{ $price ?? "" }}</span></span>
                           </a>
                        </li>
                        @else
                        <li class="">
                            <a class="cart-contents" href="{{ url('cart') }}" title="View your shopping cart">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="count cartsss">{{ $cart1 ?? "" }}</span>
                            <span class="amount">$<span class="total">{{ $price1 ?? "" }}</span></span>
                            </a>
                         </li>
                        @endif
                     </ul>
                  </div>
                  <div class="header-action-icon-2 d-block d-lg-none">
                     <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                     </div>
                  </div>
                  <div class="header-action-right d-block d-lg-none">
                     <div class="header-action-2">
                        <!--<div class="header-action-icon-2">-->
                        <!--   <a href="shop-wishlist.html">-->
                        <!--   <img alt="" src="{{asset('public/assets/imgs/icon-heart.svg')}}" />-->
                        <!--   <span class="pro-count white">4</span>-->
                        <!--   </a>-->
                        <!--</div>-->
                        <div class="header-action-icon-2">
                           <a class="mini-cart-icon" href="{{ url('cart') }}">
                           <img alt="" src="{{asset('public/assets/imgs/icon-cart.svg')}}" />
                           <span class="pro-count white">2</span>
                           </a>
                           <!--<div class="cart-dropdown-wrap cart-dropdown-hm2">-->
                           <!--   <ul>-->
                           <!--      <li>-->
                           <!--         <div class="shopping-cart-img">-->
                           <!--            <a href="{{ url('cart') }}"><img alt="" src="{{ asset('public') }}assets/imgs/thumbnail-3.jpg" /></a>-->
                           <!--         </div>-->
                           <!--         <div class="shopping-cart-title">-->
                           <!--            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>-->
                           <!--            <h3><span>1 × </span>$800.00</h3>-->
                           <!--         </div>-->
                           <!--         <div class="#">-->
                           <!--            <a href="#"><i class="fi-rs-cross-small"></i></a>-->
                           <!--         </div>-->
                           <!--      </li>-->
                           <!--      <li>-->
                           <!--         <div class="shopping-cart-img">-->
                           <!--            <a href="#"><img alt="Nest" src="assets/imgs/thumbnail-4.jpg" /></a>-->
                           <!--         </div>-->
                           <!--         <div class="shopping-cart-title">-->
                           <!--            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>-->
                           <!--            <h3><span>1 × </span>$3500.00</h3>-->
                           <!--         </div>-->
                           <!--         <div class="shopping-cart-delete">-->
                           <!--            <a href="#"><i class="fi-rs-cross-small"></i></a>-->
                           <!--         </div>-->
                           <!--      </li>-->
                           <!--   </ul>-->
                           <!--   <div class="shopping-cart-footer">-->
                           <!--      <div class="shopping-cart-total">-->
                           <!--         <h4>Total <span>$383.00</span></h4>-->
                           <!--      </div>-->
                           <!--      <div class="shopping-cart-button">-->
                           <!--         <a href="cart.html">View cart</a>-->
                           <!--         <a href="shop-checkout.html">Checkout</a>-->
                           <!--      </div>-->
                           <!--   </div>-->
                           <!--</div>-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
  <div class="mobile-header-active mobile-header-wrapper-style">
         <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
               <div class="mobile-header-logo">
                  <a href="{{ url('/') }}"><img src="{{ asset('public/') }}/assets/imgs/16.png" alt="logo" /></a>
               </div>
               <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                  <button class="close-style search-close">
                  <i class="icon-top"></i>
                  <i class="icon-bottom"></i>
                  </button>
               </div>
            </div>
            <div class="mobile-header-content-area">
               <div class="mobile-search search-style-3 mobile-header-border">
                  <form action="#">
                     <input type="text" placeholder="Search for items…" />
                     <button type="submit"><i class="fa fa-search ml-5"></i></button>
                  </form>
               </div>
               <div class="mobile-menu-wrap mobile-header-border">
                  <nav>
                     <ul class="mobile-menu">
                        <li class="menu-item-has-children">
                           <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li><a href="{{ url('cart') }}">Cart</a></li>
                        <li><a href="{{ url('shop') }}">Shop</a></li>
                     </ul>
                  </nav>
               </div>
               <!--<div class="mobile-social-icon mb-50">-->
               <!--   <h6 class="mb-15">Follow Us</h6>-->
               <!--   <a href="#"><img src="{{ asset('public/') }}/assets/imgs/icon-facebook-white.svg" alt="" /></a>-->
               <!--   <a href="#"><img src="{{ asset('public/') }}/assets/imgs/icon-twitter-white.svg" alt="" /></a>-->
               <!--   <a href="#"><img src="{{ asset('public/') }}/assets/imgs/icon-instagram-white.svg" alt="" /></a>-->
               <!--   <a href="#"><img src="{{ asset('public/') }}/assets/imgs/icon-pinterest-white.svg" alt="" /></a>-->
               <!--   <a href="#"><img src="{{ asset('public/') }}/assets/imgs/icon-youtube-white.svg" alt="" /></a>-->
               <!--</div>-->
               <div class="site-copyright">Copyright 2022 © My Med Product. All rights reserved</div>
            </div>
         </div>
      </div>
      <!--End header-->

      <!-- Owl -->
      <div class="owl-carousel owl-theme py-3">

@if($productss->count()> 0)
    @foreach($productss as $itembanner)
    <div class="item">
        <div class="highlight-product-wrap">
              <div class="highlight-image">
                  <a href="{{url('shop-product').'/'.$itembanner->slug ?? ''}}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <img width="150" height="150" src="{{ asset('public/admin/images').'/'.$itembanner->image ?? '' }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="{{ asset('public/admin/images').'/'.$itembanner->image ?? '' }}" sizes="(max-width: 150px) 100vw, 150px"></a>
              </div>
              <div class="highlight-content-wrap">
                  <a href="{{url('shop-product').'/'.$itembanner->slug ?? ''}}">{{ $itembanner->title ?? '' }}</a>
                  <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $itembanner->price ?? '' }}</bdi></span> – <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $itembanner->mrp_price ?? '' }}</bdi></span></span>
              </div>
          </div>
    </div>
    @endforeach
@endif


      </div>
      <!-- Owl -->
