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
            <li class="breadcrumb-item">
              <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{route('dashboard')}}">Testimonials</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.testimonial.update',$TestimonialData->id)}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$TestimonialData->name}}" placeholder="Name">
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="name">Position/Company</label>
                  <input type="text"  class="form-control {{$errors->has('company') ? ' is-invalid' : ''}}" id="company" name="company" value="{{$TestimonialData->company}}" placeholder="Position And Company">
                  @if ($errors->has('company'))
                      <span class="text-danger">{{ $errors->first('company') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Content</label>
                  <textarea class="form-control summernote-editor {{$errors->has('content') ? ' is-invalid' : ''}}" id="content" name="content" rows="6"  placeholder="Enter ...">{{$TestimonialData->content}}</textarea>
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
                    <select class="form-control {{$errors->has('status') ? ' is-invalid' : ''}}" name="status" id="status">
                      <option value="published" @if($TestimonialData->status == "published") {{ 'selected' }} @endif >Published</option>
                      <option value="draft" @if($TestimonialData->status == "draft") {{ 'selected' }} @endif >Draft</option>
                      <option value="pending" @if($TestimonialData->status == "pending") {{ 'selected' }} @endif >Pending</option>
                    </select>
                </div>
              </div>
            </div>

            <single-image-input singleimageurlpass="{{$TestimonialData->image}}"></single-image-input>

          </div>
        </div>
      </form>

    </div>
  </div>
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