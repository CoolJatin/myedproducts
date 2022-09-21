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
                        <h4 class="card-title">Create Product</h4>
                        <form class="form-sample" action="{{ url('admin/createabout') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" value="{{ $data->title ?? '' }}" />
                                            @if ($errors->has('title'))
                                            <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-10">
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
                                            CKEDITOR.replace('editor2');

                                        </script>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control">
                                            @if($errors->has('image'))
                                            <span class="error">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
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
