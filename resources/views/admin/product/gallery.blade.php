@include('admin/header')
@include('admin/sidebar')
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                 <button style="float:right" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add Gallery</button>
                    <h4 class="card-title">Gallery Table</h4><hr>
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
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($image->count()> 0)
                            @foreach($image as $items)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    @php
                                        $gallery = DB::table('product')->where('id',$items->productid)->first();
                                    @endphp
                                        <td>{{ $gallery->title ?? '' }}</td>
                                        <td class="py-1"><img src="{{ asset('public/admin/images').'/'.$items->image ?? '' }}" alt="image" /></td>

                                        
                                        <td><button onclick="MyEditFunction({{ $items->id }})" class="btn btn-success btn-sm">Edit</button> || <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{ url('admin/removegallery').'/'.$items->id ?? '' }}">Delete</a></td>
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
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="#" id="SaveGallery" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="id" name="id">  
            <input type="hidden" name="proid" value="{{ $proid ?? '' }}">             
                <div class="form-group">
                        <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <span style="color:red;" id="thumbnail"></span>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
         </form>
        </div>
      </div>
    </div>
  </div>
<script>
    $(function(){
          $('#SaveGallery').on('submit', function (e) {
            e.preventDefault();
            var token = $(this).data("token");
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            $.ajax({
              type: 'Post',
              url:"{{ url('admin/updategallery') }}",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
                if(data.status==201){
                    $('#thumbnail').html(data.error.image);
                    return false;
                 }if(data.status==202){
                    $('#slug').html(data.error);
                    return false;
                 }else {
                  $('#del').show();
                  $("#del,msg").show().delay(5000).fadeOut();
                  $('#msg').html(data.success);
                  $('#myModal').modal('hide');
                     setTimeout(function(){
                       window.location.reload(1);
                    }, 1000);
                }
              }
             });
            });
          });

  function MyEditFunction(id){
     $.ajax({
        type:"get",
        url:"{{url('admin/editgallery')}}/"+id,
        success:function(data){
             if(data.status==200){
                $('#id').val(data.sussess.id);
                $('#myModal').modal('show');
            } else {
              alert('data not Found!');
            }
        }
     });
  }

</script>

