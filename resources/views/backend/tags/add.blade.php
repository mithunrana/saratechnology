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
              <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">
              <a style="color: #212529;" href="{{route('dashboard.product.tags.add')}}" >Tags</a>
            </li>
            <li class="breadcrumb-item active">Brand Add</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.product.tags.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{old('name')}}" placeholder="Name">
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('slug') ? ' is-invalid' : ''}}" id="slug" name="slug" value="{{old('slug')}}" placeholder="slug">
                  @if ($errors->has('slug'))
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control summernote-editor {{$errors->has('description') ? ' is-invalid' : ''}}" id="description" name="description" rows="4"  placeholder="Enter ...">{{old('description')}}</textarea>
                </div>
              </div>
            </div>


            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Search Engine Optimize</h3>
                <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold">Edit SEO meta</span>
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="seotitle">SEO Title</label>
                  <input type="text" class="form-control {{$errors->has('seotitle') ? ' is-invalid' : ''}}" id="seotitle" name="seotitle" value="{{old('seotitle')}}" placeholder="SEO Title">
                </div>

                <div class="form-group">
                    <label>SEO description</label>
                    <textarea class="form-control {{$errors->has('seodescription') ? ' is-invalid' : ''}}" rows="3" id="seodescription" name="seodescription" value="" placeholder="SEO description">{{old('seodescription')}}</textarea>
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
                      <option value="Published" @if (old('status') == "Published") {{ 'selected' }} @endif >Published</option>
                      <option value="Draft" @if (old('status') == "Draft") {{ 'selected' }} @endif >Draft</option>
                      <option value="Pending" @if (old('status') == "Pending") {{ 'selected' }} @endif >Pending</option>
                    </select>
                </div>
              </div>
            </div>
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