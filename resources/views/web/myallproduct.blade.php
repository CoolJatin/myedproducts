@include('web.header')
    <!-- Hero section -->
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__ animate__fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                <h3>{{ $cats->name ?? '' }}</h3>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">

                       @if($productss->count() > 0)
                        @foreach($productss as $items)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__ animate__fadeIn animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('shop-product').'/'.$items->slug ?? ''}}">
                                            <img class="default-img mb-5" src="{{ asset('public/admin/images/').'/'.$items->image ?? '' }}" alt="">
                                            <!-- <img class="hover-img" src="{{ asset('public/admin/images/').'/'.$items->image ?? '' }}" alt=""> -->
                                        </a>
                                    </div>
                                    {{--  <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-eye"></i></a>
                                    </div>  --}}
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{url('shop-product').'/'.$items->slug ?? ''}}">{{ $items->title ?? '' }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{ $items->price ?? '' }}</span>
                                            <span class="old-price">${{ $items->mrp_price ?? '' }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <!--<a class="add" href=""><i class="fa-solid fa fa-shopping-cart mr-5"></i>Add </a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       @endif
                        <!-- till here -->

                    </div>
                    <!--End product-grid-4-->
                </div>
            </div>
            <!--End tab-content-->
            <nav aria-label="Page navigation">
                {{ $productss->links() }}
                {{--  <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>  --}}
              </nav>
        </div>
    </section>
@include('web.footer')
