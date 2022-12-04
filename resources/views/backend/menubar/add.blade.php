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
              <a href="#"><i class="fa fa-home"></i> SLIDER</a>
            </li>
            <li class="breadcrumb-item active">ADD</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.menubar.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-9">
                <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{old('name')}}" placeholder="name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
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
  </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
  $(document).ready(function(){

  })
</script>
@endsection()