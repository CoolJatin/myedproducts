@include('admin/header')
@include('admin/sidebar')
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                 <button style="float:right" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add CATEGORY</button>
                    <h4 class="card-title">Category Table</h4><hr>
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
                                <th>Name</th>
                                <th>Sub Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($category->count()> 0)
                            @foreach($category as $items)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="py-1"><img src="{{ asset('public/admin/images').'/'.$items->thumbnail ?? '' }}" alt="image" /></td>
                                        <td>{{ $items->name ?? '' }}</td>
                                          @if($items->parent_id==0)
                                              <td>None</td>
                                           @else
                                          <td>Sub Category</td>
                                          @endif
                                        <td>{{ $items->slug ?? '' }}</td>
                                        @if($items->status==1)
                                            <td><a class="btn btn-success btn-sm" href="#">Active</a></td>
                                        @else
                                            <td class="btn btn-danger btn-sm">Hold</td>
                                        @endif
                                        <td><button onclick="MyEditFunction({{ $items->id }})" class="btn btn-success btn-sm">Edit</button> || <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{ url('admin/removecategory').'/'.$items->id ?? '' }}">Delete</a></td>
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
          <form action="#" id="SaveCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="id" name="id">

            <div class="form-group">
            <select name="type" class="form-control" id="typesss">
                <option value="normal">Normal</option>
                <option value="home">Home</option>
                <option value="sale">Sale</option>
            </select>
            </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" id="names">
                    <span style="color:red;" id="name"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Enter unique slug name" id="slugs">
                        <span style="color:red;" id="slug"></span>
                </div>
                  <div class="form-group">
                    <select class="form-control" name="category" id="parent_id">
                    <option value="0"><--Top--></option>
                       @foreach($dropdown as $items)
                         <option value="{{ $items->id ?? '' }}">{{ $items->name ?? '' }}</option>
                         <?php
                         if($items->parent_id!==0){
                             $subCategory=DB::table('categorys')->select('id','name')->where('parent_id',$items->id)->where('status','1')->get();
                             if(count($subCategory)>0){
                                 foreach ($subCategory as $subCate){
                                     echo '<option value="'.$subCate->id.'">&nbsp;&nbsp;--'.ucfirst($subCate->name).'</option>';
                                     $subCategorychild=DB::table('categorys')->select('id','name')->where('parent_id',$subCate->id)->where('status','1')->get();
                                 if(count($subCategorychild)>0){
                                   foreach ($subCategorychild as $items){
                                       echo '<option value="'.$items->id.'">&nbsp;&nbsp;----'.ucfirst($items->name).'</option>';
                                   }
                                 }
                               }
                             }
                          }
                         ?>
                   @endforeach
                    </select>
               </div>
                <div class="form-group">
                        <label for="">Banner</label>
                    <input type="file" name="thumbnail" class="form-control">
                    <span style="color:red;" id="thumbnail"></span>
                </div>

            <div class="form-group">
            <select name="status" class="form-control" id="statuss">
                <option value="1">Enabel</option>
                <option value="0">Disable</option>
            </select>
            <span class="error" id="status"></span>
         </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
         </form>
        </div>
      </div>
    </div>
  </div>
<script>
    $(function(){
          $('#SaveCategory').on('submit', function (e) {
            e.preventDefault();
            var token = $(this).data("token");
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            $.ajax({
              type: 'Post',
              url:"{{ url('admin/addcategory') }}",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
                if(data.status==201){
                    $('#name').html(data.error.name);
                    $('#category').html(data.error.category);
                    $('#slug').html(data.error.slug);
                    $('#status').html(data.error.status);
                    $('#thumbnail').html(data.error.thumbnail);
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
        url:"{{url('admin/editcategory')}}/"+id,
        success:function(data){
             if(data.status==200){
                $('#id').val(data.sussess.id);
                $('#names').val(data.sussess.name);
                $('#slugs').val(data.sussess.slug);
                $('#statuss').val(data.sussess.status);
                $('#parent_id').val(data.sussess.parent_id);
                $('#thumbnails').val(data.sussess.thumbnail);
                $('#typesss').val(data.sussess.type);
                $('#myModal').modal('show');
            } else {
              alert('data not Found!');
            }
        }
     });
  }

</script>

