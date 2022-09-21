@include('admin/header')


@include('admin/sidebar')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                 @if(\Session::has('success'))
                        <div class="alert alert-info">
                            {!! \Session::get('success') !!} </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Create About</h4>
                        <form class="form-sample" action="{{ url('admin/addproduct') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" value="{{ $data->title ?? '' }}" />
                                             @if ($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">SKU</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="sku" value="{{ $data->sku ?? '' }}" />
                                            @if ($errors->has('sku'))
                                                <span class="error">{{ $errors->first('sku') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                            @if($category->count()> 0)
                                               @foreach($category as $items)
                                                 <option value="{{ $items->id ?? '' }}" <?php if ($items->id == @$data->catid) echo ' selected="selected"'; ?>>{{ $items->name ?? '' }}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                            @if($errors->has('category'))
                                                <span class="error">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">MRP PRICE</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="mrp" value="{{ $data->mrp_price ?? '' }}" />
                                            @if($errors->has('mrp'))
                                            <span class="error">{{ $errors->first('mrp') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sale Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="price" value="{{ $data->price ?? '' }}" />
                                             @if($errors->has('price'))
                                                <span class="error">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sataus</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if (1 == @$data->status ?? '') echo ' selected="selected"'; ?>>Enable</option>
                                                <option value="0" <?php if (0 == @$data->status ?? '') echo ' selected="selected"'; ?>>Disable</option>
                                            </select>
                                            @if($errors->has('status'))
                                                <span class="error">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="slug" value="{{ $data->slug ?? '' }}" />
                                             @if ($errors->has('slug'))
                                                <span class="error">{{ $errors->first('slug') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image"/>
                                             @if ($errors->has('image'))
                                                <span class="error">{{ $errors->first('image') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Short Description</label>
                                        <div class="col-sm-11">
                                            <textarea name="shortdescription" id="editor1">{{ $data->shortdescription ?? '' }}</textarea>
                                            @if($errors->has('shortdescription'))
                                                <span class="error">The short description field is required</span>

                                            @endif
                                        </div>
                                        <script>
                                           CKEDITOR.replace( 'editor1' );
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Description</label>
                                        <div class="col-sm-11">
                                            <textarea name="description" id="editor2">{{ $data->description ?? '' }}</textarea>
                                            @if($errors->has('description'))
                                                <span class="error">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <script>
                                       CKEDITOR.replace( 'editor2' );
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">More Description</label>
                                        <div class="col-sm-11">
                                            <textarea name="moredescription" id="editor3">{{ $data->more_infomation ?? '' }}</textarea>
                                            <script>
                                                CKEDITOR.replace( 'editor3' );
                                            </script>
                                             @if($errors->has('moredescription'))
                                                <span class="error">The more description field is required.</span>
                                            @endif
                                        </div>
                                    </div>
                            </div>

                        @if(empty($data))
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Select Multi Image</label>
                                    <div class="col-sm-11">
                                       <input type="file" name="multiimage[]" class="form-control" multiple>
                                        @if($errors->has('multiimage'))
                                            <span class="error">{{ $errors->first('multiimage') }}</span>
                                        @endif
                                    </div>
                            </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="form-check-label">BEST SELLS</label>
                                <input class="form-check-input" type="checkbox" id="check1" name="type" value="1" @if(@$data->type==1){{"checked"}}@else{{""}}@endif>

                        </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-11">
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin/footer')
