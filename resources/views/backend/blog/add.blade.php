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
                <a href="{{route('dashboard.blog')}}"> Blog</a>
            </li>
            <li class="breadcrumb-item active">Add</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.blog.store')}}" method="POST">
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
                  <label for="name">Permalink</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('permalink') ? ' is-invalid' : ''}}" id="permalink" name="permalink" value="{{old('permalink')}}" placeholder="Permalink">
                  @if ($errors->has('permalink'))
                      <span class="text-danger">{{ $errors->first('permalink') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control  {{$errors->has('description') ? ' is-invalid' : ''}} " id="description" name="description" rows="4"  placeholder="Enter ...">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                  <label>Content</label>
                  <textarea class="form-control summernote-editor {{$errors->has('content') ? ' is-invalid' : ''}}" id="content" name="content" rows="4"  placeholder="Enter ...">{{old('content')}}</textarea>
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
                    <label>Meta Description</label>
                    <textarea class="form-control {{$errors->has('metadescription') ? ' is-invalid' : ''}}" rows="3" id="metadescription" name="metadescription" value="" placeholder="Meta description">{{old('metadescription')}}</textarea>
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
                      <option value="published" @if (old('status') == "published") {{ 'selected' }} @endif >Published</option>
                      <option value="draft" @if (old('status') == "draft") {{ 'selected' }} @endif >Draft</option>
                      <option value="pending" @if (old('status') == "pending") {{ 'selected' }} @endif >Pending</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Blog Category</h3>
                </div>

                <div style="padding: 15px;max-height:350px;overflow:scroll;" class="card-body">
                    <ul class="list-group">
                        @foreach($BlogCategories as $Category)
                            <li style="padding: 2px;border: none;" class="list-group-item">
                                <label style="margin-bottom: 0px;font-weight: 500;">
                                    <input type="checkbox" value="{{$Category->id}}" name="categories[]">&nbsp {{$Category->name}}
                                        <ul style="padding-left: 18px;" class="list-group">
                                            @if(count($Category->childItems))
                                                @foreach ($Category->childItems as $childItems)
                                                    @include('backend.blog.child_category', ['sub_items' => $childItems])
                                                @endforeach 
                                            @endif
                                        </ul>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Blog Tags</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control {{$errors->has('tags') ? ' is-invalid' : ''}}" name="tags[]" id="tags" multiple>
                            @foreach($BlogTags as $Tag)
                              <option value="{{$Tag->id}}">{{$Tag->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tags'))
                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            

            <single-image-input singleimageurlpass="{{old('imageurl')}}"></single-image-input>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Order</h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order" name="order" value="{{old('order')}}" placeholder="order">
                  @if ($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                  @endif
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
                    <input type="checkbox" name="is_featured" class="form-check-input" @if (old('is_featured') == "on") {{ 'checked' }} @endif> Is featured
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
    $('.summernote-editor').summernote({
      height: 200     
    })

    $('#tags').select2({
      placeholder: 'select tags'
    });
  })

  
</script>
@endsection()