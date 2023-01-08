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
      <form action="{{route('dashboard.product.category.update',$GetCategoryData->id)}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$GetCategoryData->name}}" placeholder="Name">
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="name">Permalink</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('permalink') ? ' is-invalid' : ''}}" value="{{$GetCategoryData->permalink}}" id="permalink" name="permalink" placeholder="Permalink">
                  @if ($errors->has('permalink'))
                      <span class="text-danger">{{ $errors->first('permalink') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control summernote-editor {{$errors->has('description') ? ' is-invalid' : ''}}" id="description" name="description" rows="4" placeholder="Enter ...">{{$GetCategoryData->description}}</textarea>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Order</label>
                  <input type="number" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order"  name="order" value="{{$GetCategoryData->order}}">
                </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Addition Information</h3>
              </div>

              <div class="card-body">
                <label>Icon</label>
                <input type="text" class="form-control {{$errors->has('icon') ? ' is-invalid' : ''}}" id="icon"  value="{{$GetCategoryData->icon}}" name="icon" placeholder="icon">
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
                  <input type="text" class="form-control {{$errors->has('seotitle') ? ' is-invalid' : ''}}" id="seotitle" name="seotitle" value="{{$GetCategoryData->seotitle}}">
                </div>

                <div class="form-group">
                    <label>SEO description</label>
                    <textarea class="form-control {{$errors->has('seodescription') ? ' is-invalid' : ''}}" rows="3" id="seodescription" name="seodescription">{{$GetCategoryData->seodescription}}</textarea>
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
                      @foreach($ProductAllCategories as $Category)
                        <option value="{{$Category->id}}" {{$Category->id == $GetCategoryData->parent_id ? 'selected="selected"' : ''}} >{{$Category->name}}</option>
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
                    <select class="form-control" name="status" id="status">
                      <option value="published" @if($GetCategoryData->status == "published") selected @endif>Published</option>
                      <option value="draft" @if($GetCategoryData->status == "draft") selected @endif>Draft</option>
                      <option value="pending" @if($GetCategoryData->status == "pending") selected @endif>Pending</option>
                    </select>
                </div>
              </div>
            </div>

            <single-image-input singleimageurlpass='{{$GetCategoryData->image}}'></single-image-input>
            <p style="margin-top: -16px;padding-left: 5px;">Image size shoud be 152 X 142 px</p>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Is featured</h3>
              </div>

              <div class="card-body">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" name="is_featured"  class="form-check-input" @if($GetCategoryData->is_featured == 1) checked @endif> Is featured
                  </label>
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