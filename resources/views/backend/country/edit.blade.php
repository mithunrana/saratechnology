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
                    <li class="breadcrumb-item">Country</li>
                    <li class="breadcrumb-item">
                        <a style="color: #212529;" href="{{route('dashboard.country')}}" >Country List</a>
                    </li>
                    <li class="breadcrumb-item active">Country Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
        <form action="{{route('dashboard.country.update',$CountryObj->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$CountryObj->name}}" placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Country Code</label>
                                <input type="text"  class="form-control {{$errors->has('countrycode') ? ' is-invalid' : ''}}" value="{{$CountryObj->countrycode}}" id="countrycode" name="countrycode" placeholder="Country Code">
                                @if ($errors->has('countrycode'))
                                    <span class="text-danger">{{ $errors->first('countrycode') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Short Name</label>
                                <input type="text"  class="form-control {{$errors->has('shortname') ? ' is-invalid' : ''}}" value="{{$CountryObj->shortname}}" id="shortname" name="shortname" placeholder="Short Name">
                                @if ($errors->has('shortname'))
                                    <span class="text-danger">{{ $errors->first('shortname') }}</span>
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