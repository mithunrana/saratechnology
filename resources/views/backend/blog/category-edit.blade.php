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
            <li class="breadcrumb-item">
                <a style="color: #212529;" href="{{route('dashboard.blog.category')}}" >Category</a>
            </li>
            <li class="breadcrumb-item active">Update</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.blog.category.update',$CategoryData->id)}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$CategoryData->name}}" placeholder="Name">
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="name">Permalink</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('permalink') ? ' is-invalid' : ''}}" id="permalink" name="permalink" value="{{$CategoryData->permalink}}" placeholder="Permalink">
                  @if ($errors->has('permalink'))
                      <span class="text-danger">{{ $errors->first('permalink') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Order</label>
                  <input type="number" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order"  value="{{$CategoryData->order}}" name="order" placeholder="order">
                </div>

                <div class="form-group">
                    <label>Category Details</label>
                    <textarea class="form-control {{$errors->has('content') ? ' is-invalid' : ''}} summernote-editor" rows="3" id="content" name="content" value="" placeholder="content">{{$CategoryData->content}}</textarea>
                </div>

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control {{$errors->has('icon') ? ' is-invalid' : ''}}" id="icon"  value="{{$CategoryData->icon}}" name="icon" placeholder="Ex: fa fa-home">
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
                    <input type="text" class="form-control {{$errors->has('seotitle') ? ' is-invalid' : ''}}" id="seotitle" name="seotitle" value="{{$CategoryData->seotitle}}" placeholder="SEO Title">
                </div>

                <div class="form-group">
                    <label>SEO description</label>
                    <textarea class="form-control {{$errors->has('metadescription') ? ' is-invalid' : ''}}" rows="3" id="metadescription" name="metadescription" value="" placeholder="SEO description">{{$CategoryData->metadescription}}</textarea>
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
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Parent Category</h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                    <select class="form-control {{$errors->has('parent_id') ? ' is-invalid' : ''}}" name="parent_id" id="parent_id">
                      <option value="">No Category</option>
                      @foreach($BlogAllCategory as $Category)
                        <option value="{{$Category->id}}" @if ($CategoryData->parent_id == $Category->id) {{ 'selected' }} @endif >{{$Category->name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status</h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                    <select class="form-control {{$errors->has('status') ? ' is-invalid' : ''}}" name="status" id="status">
                      <option value="published" @if ($CategoryData->status == "published") {{ 'selected' }} @endif >Published</option>
                      <option value="draft" @if ($CategoryData->status == "draft") {{ 'selected' }} @endif >Draft</option>
                      <option value="pending" @if ($CategoryData->status == "pending") {{ 'selected' }} @endif >Pending</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Is featured</h3>
              </div>

              <div class="card-body">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" name="is_featured" class="form-check-input" @if ($CategoryData->is_featured == 1) {{ 'checked' }} @endif> Is featured
                  </label>
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