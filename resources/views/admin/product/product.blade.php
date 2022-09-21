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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Mrp Price</th>
                                    <th>Price</th>
                                    <th>Edit Image</th>
                                    <th>Add Multi Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if($product->count()> 0)
                            @foreach($product as $items)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="py-1"><img src="{{ asset('public/admin/images').'/'.$items->image ?? '' }}" alt="image" /></td>
                                        <td>{{ $items->title ?? '' }}</td>
                                        <td>{{ $items->mrp_price ?? '' }}</td> 
                                        <td>{{ $items->price ?? '' }}</td> 
                                        <td><a href="{{ url('admin/editimage').'/'.$items->id ?? '' }}" class="btn btn-success btn-sm">Edit</a></td>
                                        <td><a href="{{ url('admin/addmultiprice').'/'.$items->id ?? '' }}" class="btn btn-info btn-sm">Add Price</a></td>
                                            @if($items->status==1)
                                                <td><a class="btn btn-success btn-sm" href="#">Active</a></td>
                                            @else
                                                <td><a class="btn btn-danger btn-sm" href="#">Hold</a></td>
                                            @endif
                                            <td>
                                                <div class="dropdown">
                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="ti-user"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                <a href="{{ url('admin/editproduct').'/'.$items->id ?? '' }}" class="btn btn-success btn-sm">Edit</a>
                                                <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{ url('admin/removeproduct').'/'.$items->id ?? '' }}">Delete</a>
                                                 
                                                </div>
                                              </div>
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


