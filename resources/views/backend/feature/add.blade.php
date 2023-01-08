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
                            <a href="#"><i class="fa fa-home"></i>DASHBOARD</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a style="color: #212529;" href="{{route('dashboard.our.feature')}}" >FEATURES</a>
                        </li>
                        <li class="breadcrumb-item active">FEATURE ADD</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
        <form action="{{route('dashboard.our.feature.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" id="title" name="title" value="{{old('title')}}" placeholder="title">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control {{$errors->has('content') ? ' is-invalid' : ''}}" id="content" name="content" rows="4"  placeholder="Enter content...">{{old('content')}}</textarea>
                                @if ($errors->has('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
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
                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Icon</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('icon') ? ' is-invalid' : ''}}" id="icon" name="icon" value="{{old('icon')}}" placeholder="icon">
                            </div>
                            @if ($errors->has('icon'))
                                <span class="text-danger">{{ $errors->first('icon') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Order</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order" name="order" value="{{old('order')}}" placeholder="order">
                            </div>
                            @if ($errors->has('order'))
                                <span class="text-danger">{{ $errors->first('order') }}</span>
                            @endif
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
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
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
                            @if ($errors->has('is_featured'))
                                <span class="text-danger">{{ $errors->first('is_featured') }}</span>
                            @endif
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
@endsection()