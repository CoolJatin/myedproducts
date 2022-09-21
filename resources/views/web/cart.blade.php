@include('web.header')
<!-- Hero section -->
 @if($cart->count()> 0)
    <section class="cart-main py-5">
        @if(\Session::has('success'))
        <div class="alert alert-info">
           {!! \Session::get('success') !!} </ul>
        </div>
        @endif
        <div class="container">
            <h1>Shopping Cart</h1>

            <div class="shopping-cart">

            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>
            @php
                $total = 0;
            @endphp
          
            @foreach($cart as $itemcart)
                @php
                    $total += $itemcart->price*$itemcart->qty;
                @endphp
                <div class="product">
                    <div class="product-image">
                        <img src="{{ $itemcart->image ?? '' }}">
                    </div>
                    <div class="product-details">
                        <div class="product-title">{{ $itemcart->title ?? '' }}</div>

                    </div>
                    <div class="product-price">{{ $itemcart->price ?? '' }}</div>
                        <div class="product-quantity qty">
                            <input type="number" class="myqtys" value="{{ $itemcart->qty ?? '' }}" min="1" onchange="myQty({{$itemcart->id}})">
                        </div>
                    <div class="product-removal">
                        <a href="{{ url('remove').'/'.$itemcart->id ?? '' }}" class="remove-product">
                            Remove
                        </a>
                    </div>
                    <div class="product-line-price">{{ $itemcart->qty*$itemcart->price  }}</div>
                </div>
            @endforeach
       



            <div class="totals">
                <div class="totals-item">
                 <label>Subtotal</label>
                <div class="totals-value" id="cart-subtotal">{{ $total ?? '' }}</div>
                </div>
                <div class="totals-item">
                    @php
                        $new_width = (5 / 100)*$total;
                    @endphp
                <label>Tax (5%)</label>
                <div class="totals-value" id="cart-tax">{{ $new_width ?? '' }}</div>
                </div>
                <div class="totals-item">
                <label>Shipping</label>
                <div class="totals-value" id="cart-shipping">20</div>
                </div>
                <div class="totals-item totals-item-total">
                <label>Grand Total</label>
                <div class="totals-value" id="cart-total">{{ $total+20+$new_width }}</div>
                </div>
            </div>
                <a href="{{ url('checkout') }}" class="checkout">Proceed to checkout</a>
            </div>
        </div>
    </section>
    
@else 
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="#" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
    
    <!-- Hero section -->

    @include('web.footer')
<script>
    function myQty(id){
       var qty = $(".myqtys").val(); 
       $.ajax({
          url:"{{url('qtyrun')}}/"+id+'/'+qty,
          type:"get",
          success:function(data){
              location.reload();
          }
       });
    }
</script>