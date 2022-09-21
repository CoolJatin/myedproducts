@include('web.header')
<!-- Hero section -->
<section class="product-details-section py-5">
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <!--<div class="tab-pane active" id="pic-1">-->
                            <!--    <img src="{{ asset('public/admin/images').'/'.$singaldata->image ?? '' }}" alt="product image" />-->
                            <!--</div>-->
                          @php
                            $gallery = DB::table('gallery')->where('productid',$singaldata->id)->get();
                             $i = 2;
                        @endphp          
                        <div class="preview col-md-6">
                        <div class="w3-content" style="max-width:1200px">
                            
                          <img class="mySlides" src="{{ asset('public/admin/images/').'/'.$singaldata->image ?? '' }}" >
                          @if($gallery->count()>0)
                          @foreach($gallery as $itss)
                            
                            <img class="mySlides" src="{{ asset('public/admin/images/').'/'.$itss->image ?? '' }}" style="width:100%;display:none">
                          @endforeach
                          @endif
                          <div class="w3-row-padding w3-section">
                            <div class="w3-col s4">
                              <img class="demo w3-opacity w3-hover-opacity-off" src="{{ asset('public/admin/images/').'/'.$singaldata->image ?? '' }}" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
                            </div>
                       
                           @if($gallery->count() > 0)
                              @foreach($gallery as $itemsgallrty)
                            <div class="w3-col s4">
                              <img class="demo w3-opacity w3-hover-opacity-off" src="{{ asset('public/admin/images/').'/'.$itemsgallrty->image ?? '' }}" style="width:100%;cursor:pointer" onclick="currentDiv({{$i++}})">
                            </div>
                           @endforeach
                           @endif
                          </div>
                        </div>
                        </div>
                        </div>
                       

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $singaldata->title ?? '' }}</h3>
                        <div class="rating mb-3">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description"><?= $singaldata->shortdescription ?? '' ?></p>
                        <h4 class="price hidesmy">current price: <span>${{ $singaldata->price ?? '' }} – ${{ $singaldata->mrp_price ?? '' }}</span></h4>
                           <h4 style="display:none;" class="price showmy">current price: <span > $ <span class="pricesss"></span></span></span></h4>
                          @php
                             $percent = (($singaldata->mrp_price - $singaldata->price)*100) /$singaldata->mrp_price;
                          @endphp
                        <p class="vote"><strong>{{ round($percent ?? '') }}%</strong> of buyers enjoyed this product!</p>

                        @php
                           $size = DB::table('multisize')->where('productid',$singaldata->id)->get();
                          
                        @endphp
                        @if($size->count()> 0)
                            <table class="variations" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="label quantity-td"><label for="select-quantity">SELECT QUANTITY</label></td>
                                        <td class="value">
                                            <select id="select-quantity" class="myDataPrice" name="attribute_select-quantity" data-attribute_name="attribute_select-quantity" data-show_option_none="yes">
                                                <option value="0">Choose an option</option>
                                                    @foreach($size as $itemssize)
                                                        <option value="{{ $itemssize->id ?? '' }}" class="attached enabled">{{ $itemssize->size ?? '' }}</option>
                                                    @endforeach
                                            </select><a class="reset_variations" href="#" style="visibility: hidden;">Clear</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                        <div class="single_variation_wrap">
                            <div class="quantity">
                                <label class="screen-reader-text ml-5" for="quantity_6218afe6b0631">Quantity</label>
                                <div class="div-container row ml-5 mr-5">

                                    <form class="AddCart"  method="post" enctype='multipart/form-data'>
                                        @csrf
                                        @php
                                          $digits = 4;
                                        @endphp
                                        <input type="number" name="qty" id="quantity_6218afe6b0631" class="input-text qty text product-input col-7" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                                        <input type="hidden" name="cartid" class="cartid" value="{{ rand(pow(10, $digits-1), pow(10, $digits)-1) }}">
                                        <input type="hidden" name="image" value="{{ asset('public/admin/images') }}/{{ $singaldata->image ?? '' }}">
                                        <input name="title" class="title" id="titless" type="hidden" value="{{ $singaldata->title ?? '' }}">
                                        <input name="price" class="price prices"  type="hidden" value="@if(empty($singaldata->price)){{ $singaldata->mrp_price }} @else {{ $singaldata->price }} @endif ">
                                        <input type="hidden" class="id" name="id" value="{{ $singaldata->id ?? '' }}">
                                        <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed product-button col-5">Add to cart<i class="ml-5 fa fa-shopping-cart ml-5" aria-hidden="true"></i></button>

                                     </form>


                                </div>
                            </div>
                        </div>
                        <div class="product_meta mt-3 ml-5">
                            <span class="sku_wrapper mb-1">SKU: <span class="sku mb-1">{{ $singaldata->sku ?? '' }}</span></span>
                            {{--  <span class="posted_in">Category: <a href="" rel="tag">Nicotine</a></span>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section -->
<section class="tab-section py-5">
    <div class="container">
        <div class="container cont-2">
            <!-- tab-section -->
            <ul class="tab-navigation">
                <li class="active">Description</li>
                <li>More Information</li>
            </ul>
            <!-- tab-section -->
            <!-- Tab-Content -->
            <div class="tab-container-area">
                <div class="tab-container py-4 px-4 bg-white">
                    <h2>Description</h2>
                    <hr>
                    <?= $singaldata->description ?? '' ?>
                </div>
                <div class="tab-container py-4 px-4 bg-white">
                    <h2>Additional information</h2>
                       <?= $singaldata->more_infomation ?>
                </div>
            </div>
            <!-- Tab-Content -->
        </div>
    </div>
</section>
@php
   $related = DB::table('product')->where('catid',$singaldata->catid)->get();
@endphp
@if($related->count()> 0)
<section class="product-tabs related-products section-padding position-relative pb-5">
    <div class="container">
        <div class="section-title style-2 wow animate__ animate__fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
            <h3>Related products</h3>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    <!--end product card-->
                    @foreach($related as $itemsrelated)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__ animate__fadeIn animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('shop-product').'/'.$itemsrelated->slug ?? ''}}">
                                        <img class="default-img mb-5" src="{{ asset('public/admin/images').'/'.$itemsrelated->image ?? '' }}" alt="">
                                        <!-- <img class="hover-img" src="{{ asset('public/admin/images').'/'.$itemsrelated->image ?? '' }}" alt=""> -->
                                    </a>
                                </div>
                                {{--  <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-eye"></i></a>
                                </div>  --}}
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{url('shop-product').'/'.$itemsrelated->slug ?? ''}}">{{ $itemsrelated->title ?? '' }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>${{ $itemsrelated->price ?? '' }}</span>
                                        <!-- <span class="old-price">${{ $itemsrelated->mrp_price ?? '' }}</span> -->
                                    </div>
                                    <div class="add-cart">


                                        {{--  <a class="add" href="{{url('shop-product').'/'.$itemsrelated->slug ?? ''}}"><i class="fa-solid fa fa-shopping-cart mr-5"></i>Add </a>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- till here -->



                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
    </div>
</section>
@endif

@include('web.footer')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script>
     $(document).ready(function(){
        $('.tab-container:first').show();
        $('.tab-navigation li:first').addClass('active');
        $('.tab-navigation li').click(function(event){
            index = $(this).index();
            $('.tab-navigation li').removeClass('active')
            $(this).addClass('active');
            $('.tab-container').hide();
            $('.tab-container').eq(index).show();
        });
     });
    </script>
    
      <script>
function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>
    
<script>

    $(function () {

        $('.AddCart').submit(function(e){
            e.preventDefault();
          var token = $(this).data("token");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
          $.ajax({
            type: 'post',
            url:"{{ url("addtocart") }}",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
             if(data.status==200){
             $('.cartsss').html(data.cart);
             $('.total').html(data.total);
             }
             if(data.status==203){
                window.location = login;
             }
            }
           });
         });
        });
        
      $(function(){
         $(".myDataPrice").change(function(){
            var id = $(this).val();
            $.ajax({
               type:'get',
               url:"{{ url('myprice') }}/"+id,
               success:function(data){
                   if(data.status==200){
                    $(".hidesmy").hide();
                    $(".showmy").show();
                   var titls = "{{ $singaldata->title ?? '' }} "+data.data.size;
                   $("#titless").val(titls);
                   $(".prices").val(data.data.prices);
                   $(".pricesss").html(data.data.prices);
                   } else {
                       $(".hidesmy").show();
                    $(".showmy").hide();
                    var titls = "{{ $singaldata->title ?? '' }}";
                    var price = "{{ $singaldata->price ?? '' }}";
                    $("#titless").val(titls);
                    $(".prices").val(price);
                    $(".pricesss").html(price);
                   }
               }
            });
         }); 
      });
        
</script>
