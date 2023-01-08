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
                            <a style="color: #212529;" href="{{route('dashboard.city')}}" >CITY</a>
                        </li>
                        <li class="breadcrumb-item">EDIT</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
        <form action="{{route('dashboard.country.update',$CityObj->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$CityObj->name}}" placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text"  class="form-control {{$errors->has('zipcode') ? ' is-invalid' : ''}}" value="{{$CityObj->zipcode}}" id="zipcode" name="zipcode" placeholder="zipcode">
                                @if ($errors->has('zipcode'))
                                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                @if ($errors->has('country'))
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                @endif
                                <div class="form-group">
                                    <select class="form-control" name="country" id="country">
                                        @foreach($CountryList as $Country)
                                            <option value="{{$Country->id}}" @if($CityObj->id == $Country->id) selected @endif() >{{$Country->name}}</option>
                                        @endforeach()
                                    </select>
                                </div>
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
                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Order</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order" name="order" value="{{$CityObj->order}}" placeholder="order">
                            </div>
                            @if ($errors->has('order'))
                                <span class="text-danger">{{ $errors->first('order') }}</span>
                            @endif
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