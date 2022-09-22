@include('web.header')
<style>
   .row:after{
  content: "";
  display: table;
  clear: both; 

   }
   .column1{
     float: left;
     width: 25%;
   }
   .column2{
     float: left;
     width: 25%;      
     }
   .column3{
     float: right;
     width: 25%;     
   }
   .column4{
     float: right;
     width: 25%;
   }
   .column7{
     float: left;
     width: 50%;
   }
    .column8{
     float: right;
     width: 50%;
   }
   .abc{
      text-align: center;
   }
      </style>
      <!-- Hero-Banner -->
      <div class="hero-banner">
         <div class="container">
            <div class="row">
               <div class="col mx-auto">
                  <h1 class="text-white text-center">
                     <span>WELCOME TO My Medicine Products</span>
                    <span class="text-white"> 20% Off For all Orders with Bitcoin </span>
                  </h1>
               </div>
            </div>
           <a href="/product"> <h1><span><button type="button" class="btn btn-lg text-white btn-success">SHOP NOW<i class="ml-5 fa fa-shopping-cart mr-5"></i></button></span></h1></a>
            
         </div>
      </div>
      <!-- Hero-Banner -->
      <br><br><br><br><br><br><br><br>
      <div class="hero-bottom ">
         <div class="container">
            <div class="row">
               <div class="column1 text-center hero-child">
               <div><i class="fa fa-truck"></i></div>
                     <br>
                     
                     <h5 class=""><span>FAST SHIPPING</span></h5> <span class="text-muted"> US TO US 3 DAYS DELIVERY</span>

               </div>
               <div class="column2 text-center hero-child">
               <div>
                  <i class="fa-solid fa-cart-shopping"></i>
                  </div>
                  <br>
                     <h5 class=""><span>DISCRETE</span></h5> <span class="text-muted"> PLAIN PACKAGING</span>

               </div>
               <div class="column3 text-center hero-child">
               <div>
                  <i class="fa-solid fa-location-arrow"></i>
                  </div>
                  <br>
                     <h5 class=""><span>Highest Quality</span></h5> <span class="text-muted"> GENUINE PRODUCTS</span>

               </div>
               <div class="column4 text-center hero-child">
               <div>
                  <i class="fa fa-shield" aria-hidden="true"></i>
                  </div>
                  <br>
                     <h5 class=""><span>ENCRYPTED SECURE</span></h5> <span class="text-muted"> CHECKOUT SYSTEM</span>


               </div>
               <!-- <div class="col text-center">
                  <div class="hero-child hero-first py-md-5">
                     <div><i class="fa fa-truck"></i></div>
                     <br>
                     
                     <h5 class=""><span>FAST SHIPPING</span></h5> <span class="text-muted"> US TO US 3 DAYS DELIVERY</span>
                  </div>
               </div>
               <div class="col text-center">
                  <div class="hero-child py-md-5">
                     <div>
                  <i class="fa-solid fa-cart-shopping"></i>
                  </div>
                  <br>
                     <h5 class=""><span>DISCRETE</span></h5> <span class="text-muted"> PLAIN PACKAGING</span>
                  </div>
               </div>
               <div class="col text-center">
                  <div class="hero-child py-md-5">
                     <div>
                  <i class="fa-solid fa-location-arrow"></i>
                  </div>
                  <br>
                     <h5 class=""><span>Highest Quality</span></h5> <span class="text-muted"> GENUINE PRODUCTS</span>
                  </div>
                  <div class="col text-center">
                  <div class="hero-child py-md-5">
                     <div>
                  <i class="fa fa-shield" aria-hidden="true"></i>
                  </div>
                  <br>
                     <h5 class=""><span>ENCRYPTED SECURE</span></h5> <span class="text-muted"> CHECKOUT SYSTEM</span>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
      <br><br><br><br>
      <div class="row">
         <img src="{{asset('public/assets/imgs')}}/HP_Slider02OP-1536x440.jpg" alt="" style="width:100%;">
      </div>
<br><br><br>
      <div class="container">
         <div class="row">
            <div class="column7">
               <h2>USA Best Online Pharmacy: <br>
Fast Delivery Available in US</h2> <br>
<div class="text-center">
<img src="{{asset('public/assets/imgs')}}/FDA-approved-Pills.png" alt="" style="width: 240px; height:180px">
</div>
            </div>
            <div class="column8">
               <p style="color:black; font-size: 17px;">
            Thank you for visiting OnlinePharmas.com – the US’s One Stop Shop for Top Quality <span style="color:rgba(105,202,71,1);"><b> ED Medication </b></span>,<span style="color:rgba(105,202,71,1);"><b> Anxiety Medication </b></span> and <span style="color:rgba(105,202,71,1);"><b> Painkillers </b></span>.
            <br><br>
            If you are visiting for the first time and you want to buy cheap sleeping tablets, Anxiety & Painkillers online in the USA you have come to the right place! We accept payments on all major platforms <span style="color:blue;"><b> PayPal, (Western Union/Bitcoin ) and Bank Transfer</b></span> – we offer the best deals on bulk orders.
   <br><br>
After payment is received goods are sent immediately in plain padded envelopes, and delivered to locations in USA in just 3 – 4 working days!
</p>
            </div>
         </div>
      </div>
      <br><br>
      <div class="row">
         <div class="abc">
      <img src="{{asset('public/assets/imgs')}}/Safety-Web-Banner-2.jpg" alt="" style="width: 700px; height:400px">
      </div>
      </div>

</div>

      <main class="main">
         <!--End banners-->

@if($homecategory->count()> 0)
    @foreach($homecategory as $itemshome)
         <section class="product-tabs section-padding position-relative py-5">
            <div class="container">
               <div class="section-title style-2 wow animate__animated animate__fadeIn">
                  <h3>{{ $itemshome->name ?? '' }}</h3>
               </div>
               <!--End nav-tabs-->
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                     <div class="row product-grid-4">
                @php
                    $producthome = DB::table('product')->where('catid',$itemshome->id)->get();
                @endphp
                    @if($producthome->count()>0)
                       @foreach($producthome as $itemspro)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                           <div class="product-cart-wrap wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                              <div class="product-img-action-wrap mb-4 ">
                                 <div class="product-img product-img-zoom">
                                    <a href="{{ url('shop-product').'/'.$itemspro->slug ?? '' }}">
                                       <img class="default-img" src="{{ asset('public/admin/images').'/'.$itemspro->image ?? '' }}" alt="" />
                                       <!-- <img class="hover-img" src="{{ asset('public/admin/images').'/'.$itemspro->image ?? '' }}" alt="" /> -->
                                    </a>
                                 </div>
                                 @php
                                 $perc = (($itemspro->mrp_price - $itemspro->price)*100) /$itemspro->mrp_price;
                                @endphp
                                 <div class="product-badges product-badges-position product-badges-mrg">

                                    <span class="best">{{ round($perc ?? '') }}%</span>
                                 </div>
                              </div>
                              <div class="product-content-wrap">
                                 <h2><a href="">{{ $itemspro->title ?? '' }}</a></h2>
                                 <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                 </div>
                                 <div class="product-card-bottom">
                                    <div class="product-price">
                                       <span>${{ $itemspro->price ?? '' }} – ${{ $itemspro->mrp_price ?? '' }}</span>
                                       <!-- <span class="old-price">$37.8</span> -->
                                    </div>
                                    <div class="add-cart">
                                       {{--  <a class="add" href="#"><i class="fa fa-shopping-cart mr-5"></i>Add </a>  --}}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                     <!--End product-grid-4-->
                  </div>
               </div>
               <!--End tab-content-->
            </div>
         </section>
    @endforeach
@endif
<div class="description-section py-4">
         <div class="container">
            <div class="row">
               <div class="col-md-10 mx-auto py-4">
                  <div class="head-1">
                     <h2 class="text-center">  24/7 CUSTOMER SERVICE
                        Buy From My Med Products Online Without Prescription
                     </h2>
                  </div>
               </div>
            </div>
            <p class="text-center mb-4">Do you want to save time, money and worry? Let My Med Product help you get all your medications safely delivered to your door.</p>
         </div>
      </div>
      <div class="description-section-2 py-4">
         <div class="container">
            <div class="row">
               <div class="col py-4">
                  <div class="head-2">
                     <h2 class="text-center mb-4">Best place to Buy Medicine online | Purchase Medicine online</h2>
                     <p>Drug interactions and patient health profiles are carefully reviewed by both licensed physicians and pharmacists during the fulfillment process.There are thousands of drugstores available online and offline, but many of them attract customers with the help of cheap prices and fail to take proper care of the quality of goods. As a result, they may distribute contaminated medications, which cause the outbursts of dangerous infections, or even counterfeit products made of pure chalk that produce no effect at all. </p>
                     <ul class="list-parent">
                        <li class="list-child" style="list-style: disc;">to form an assortment meeting all the needs of our customers;</li>
                        <li class="list-child" style="list-style: disc;">to provide safe and quick delivery services;</li>
                        <li class="list-child" style="list-style: disc;">a severe breathing problem;</li>
                        <li class="list-child" style="list-style: disc;">to provide safe and quick delivery services;</li>
                        <li class="list-child" style="list-style: disc;">alcoholism, or addiction to drugs similar to diazepam.</li>
                        <li class="list-child" style="list-style: disc;">to reliably protect the security of customers’ money and personal information;</li>
                        <li class="list-child" style="list-style: disc;">glaucoma;</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="li-section py-5">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section-head text-center mx-auto mb-4">
                     <h2>How should I take Medicine? | Order Medicine online </h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <ul>
                     <li style="list-style: disc;" class="mb-3">Take Valium exactly as prescribed by your doctor. Follow all directions on your prescription label. Your doctor may occasionally change your dose. Do not take this medicine in larger or smaller amounts or for longer than recommended.
                        Buy Valium Online Without Prescription
                     </li>
                     <li style="list-style: disc;" class="mb-3">If you are taking the solution, use an oral syringe or measuring spoon or cup to measure the correct amount of liquid needed for each dose. Do not use a regular household spoon to measure your dose. Ask your doctor or pharmacist if you need help getting or using a measuring device,
                     </li>
                     <li style="list-style: disc;" class="mb-3">Do not start and stop taking Medicine without talking to your doctor. Your doctor will probably decrease your dose gradually. 
                     </li>
                     <li style="list-style: disc;" class="mb-3">
                        Valium should be used for only a short time. Do not take this medicine for longer than 4 months without your doctor’s advice.
                        Order Valium online.
                     </li>
                  </ul>
               </div>
               <div class="col-md-6">
                  <ul>
                     <li style="list-style: disc;" class="mb-3">Do not stop using Valium suddenly, or you could have increased seizures or unpleasant
                        withdrawal symptoms. Ask your doctor how to safely stop using this medicine.
                     </li>
                     <li style="list-style: disc;" class="mb-3">Call your doctor at once if you feel that this medicine is not working as well as usual,
                        or if you think you need to use more than usual.
                     </li>
                     <li style="list-style: disc;" class="mb-3">Store at room temperature away from moisture, heat, and light. Keep track of your medicine. Diazepam is a drug of abuse and you should
                        be aware if anyone is using your medicine improperly or without a prescription.
                     </li>
                     <li style="list-style: disc;" class="mb-3">
                        Do not keep leftover diazepam. Just one dose can cause death in someone using Valium accidentally or improperly. Ask your pharmacist where to locate a drug take-back disposal program.
                        If there is no take-back program, flush the unused medicine down the toilet. Order Valium online
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>

      <section class="bank-transfer py-5">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section-head text-center col-md-10 mx-auto">
                     <h2>WE ACCEPT BANK TRANSFERS</h2>
                     <p>*By Selecting Bank Transfer, Please make sure your order is above $1000. We do not accept Credit card payments below this amount. You will be making payments from your bank into our bank account manually.
                        When you place your order, we will contact you on how to complete the payment.*
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
         <!-- About Us -->
         <section class="about-us">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 about-col">
                     <figure><img src="{{ asset('public/admin/images').'/'.$about->image ?? '' }}" alt=""></figure>
                  </div>
                  <div class="col-md-6">
                     <h2 class="mb-20">{{ $about->title ?? '' }}</h2>
                     <p class="mb-15"><?= $about->description ?? '' ?></p>
                     </p>
                  </div>
               </div>
            </div>
         </section>
         <!-- About Us -->
         <!--Products Tabs-->
         <section class="section-padding pb-5">
            <div class="container">
               <div class="section-title wow animate__animated animate__fadeIn">
                  <h3 class="">Daily Best Sells</h3>
               </div>
               <div class="row">
                  <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                     <div class="banner-img style-2" style="background-image: url('{{ asset('public/admin/images').'/'.@$saleoffer->thumbnail ?? '' }}');">
                        <div class="banner-text">
                           <h2 class="mb-100 text-white">{{@$saleoffer->name }}</h2>
                           <a href="{{ url($saleoffer->slug ?? '') }}" class="btn btn-xs text-white btn-success">Shop Now<i class="fa fa-angle-right ml-5"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                     <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                           <div class="carausel-4-columns-cover arrow-center position-relative">
                              <!-- <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"><span class="slider-btn slider-prev slick-arrow" style=""><i class="fa fa-angle-left"></i></span>
                                 <span class="slider-btn slider-next slick-arrow" style=""><i class="fa fa-angle-right"></i></span>
                                 </div> -->
                              <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                            @if($sale->count()> 0)
                                @foreach($sale as $saleitem)
                                 <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap mb-4 ">
                                       <div class="product-img product-img-zoom">
                                          <a href="{{url('shop-product').'/'.$saleitem->slug ?? ''}}">
                                             <img class="default-img" src="{{ asset('public/admin/images').'/'.$saleitem->image ?? '' }}" alt="" />
                                             <!-- <img class="hover-img" src="{{ asset('public/admin/images').'/'.$saleitem->image ?? '' }}" alt="" /> -->
                                          </a>
                                       </div>
                                       @php
                                        $percent = (($saleitem->mrp_price - $saleitem->price)*100) /$saleitem->mrp_price;
                                       @endphp
                                       <div class="product-badges product-badges-position product-badges-mrg">
                                          <span class="hot">Save {{ round($percent) }}%</span>
                                       </div>
                                    </div>

                                    <div class="product-content-wrap">
                                       <h2><a href="{{url('shop-product').'/'.$saleitem->slug ?? ''}}"> {{ $saleitem->title ?? '' }} </a></h2>
                                    </div>
                                 </div>
                                 @endforeach
                            @endif


                                 <!--End product Wrap-->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End tab-content-->
                  </div>
                  <!--End Col-lg-9-->
               </div>
            </div>
         </section>
         <!--End 4 columns-->
      </main>
     
@include('web.footer')
