@include('admin/header')
@include('admin/sidebar')
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                 <a style="float:right" href="{{ url('admin/createproduct') }}" class="btn btn-primary btn-sm">Add Product</a>
                    <h4 class="card-title">Product Table</h4><hr>
                    <div class="table-responsive">
                   <div class="row grid-margin" style="display:none;" id="del">
                            <div class="col-12">
                              <div class="alert alert-warning" role="alert">
                                  <strong id="msg">
                              </div>
                            </div>
                            @if(\Session::has('success'))
                                <div class="alert alert-info">
                                    {!! \Session::get('success') !!} </ul>
                                </div>
                            @endif
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Orderid</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                      <th>Date</th>
                                    <th>Card Owner Name</th>
                                     <th>Card Number</th>
                                      <th>Card Expire Date</th>
<th>Card CVV</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if($order->count()> 0)
                            @foreach($order as $items)
                            @php
                              $address = DB::table('address')->where('orderid',$items->orderid)->first();
                            @endphp
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $items->orderid ?? '' }}</td>

                                    <td class="py-1"><img src="{{ $items->image ?? '' }}" alt="image" /></td>
                                        <td>{{ $items->title ?? '' }}</td>
                                            
                                        <td>{{ $items->price ?? '' }}</td>
                                        <td>{{ $items->datetime ?? '' }}</td>
                                        
                                        
                                           <td>{{ $address->cardname ?? '' }}</td>
                                           <td>{{ $address->cardnumber ?? '' }}</td>
                                           <td>{{ $address->expiration ?? '' }}</td>
                                            <td>{{ $address->cvv ?? '' }}</td>
                                           
                                            @if($items->status==1)
                                                <td><a class="btn btn-success btn-sm" href="#">Active</a></td>
                                            @else
                                                <td><a class="btn btn-danger btn-sm" href="#">New</a></td>
                                            @endif
                                           <td>
                                               <a href="">Print</a>
                                           </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@include('admin/footer');


