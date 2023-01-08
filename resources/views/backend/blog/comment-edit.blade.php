@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()

@section('maincontent')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            <form action="{{route('dashboard.blog.comment.update',$CommentData->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" name="name" value="@if($CommentData->customer_id !=''){{$CommentData->customer->name}}@else{{$CommentData->name}}@endif" @if($CommentData->customer_id !='') readonly @endif>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <input type="text" class="form-control {{$errors->has('email') ? ' is-invalid' : ''}}" name="email" value="@if($CommentData->customer_id !=''){{$CommentData->customer->email}}@else{{$CommentData->email}}@endif" @if($CommentData->customer_id !='') readonly @endif>
                                </div>

                                <div class="form-group">
                                    <label for="webite">Webite</label>
                                    @if($errors->has('webite'))
                                        <span class="text-danger">{{ $errors->first('webite') }}</span>
                                    @endif
                                    <input type="text" class="form-control {{$errors->has('webite') ? ' is-invalid' : ''}}" name="website" value="{{$CommentData->website}}">
                                </div>

                                <div class="form-group">
                                    <label for="blogpost">Blog Post</label>
                                    <input type="text" class="form-control {{$errors->has('blogpost') ? ' is-invalid' : ''}}" value="{{$CommentData->blog->name}}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    @if ($errors->has('comment'))
                                        <span class="text-danger">{{ $errors->first('comment') }}</span>
                                    @endif
                                    <textarea class="form-control {{$errors->has('comment') ? ' is-invalid' : ''}}" id="comment" name="comment" rows="6" placeholder="Enter ...">{{$CommentData->comment}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Publish</h3>
                            </div>

                            <div class="card-body">
                                <button type="submit" value="save" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                                <button type="submit" value="apply" class="btn btn-success"><i class="fa fa-check-circle"></i> Save & Edit</button>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" @if($CommentData->status == "published") selected @endif>Published</option>
                                        <option value="draft" @if($CommentData->status == "draft") selected @endif>Draft</option>
                                        <option value="pending" @if($CommentData->status == "pending") selected @endif>Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
  $(document).ready(function(){
    $('.summernote-editor').summernote()
  })
</script>
@endsection()