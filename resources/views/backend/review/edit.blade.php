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
      <form action="{{route('dashboard.review.update',$ReviewDetails->id)}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Customer Name</label>
                  <input type="text" class="form-control" name="name" value="{{$ReviewDetails->Customer->name}}">
                </div>

                <div class="form-group">
                  <label for="name">Product</label>
                  <input type="text" class="form-control" value="{{$ReviewDetails->Product->name}}">
                </div>
                
                <div class="form-group">
                  <label for="rating">Rating</label>
                  <input type="text" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" name="star" value="{{$ReviewDetails->star}}" id="rating">
                  @if ($errors->has('star'))
                    <span class="text-danger">{{ $errors->first('star') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Comment</label>
                  @if ($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                  @endif
                  <textarea class="form-control {{$errors->has('comment') ? ' is-invalid' : ''}}" id="comment" name="comment" rows="6" placeholder="Enter ...">{{$ReviewDetails->comment}}</textarea>
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
                      <option value="Published" @if($ReviewDetails->status == "Published") selected @endif>Published</option>
                      <option value="Draft" @if($ReviewDetails->status == "Draft") selected @endif>Draft</option>
                      <option value="Pending" @if($ReviewDetails->status == "Pending") selected @endif>Pending</option>
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