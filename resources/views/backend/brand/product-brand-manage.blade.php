@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()


@section('maincontent')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">
              <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item ">Products</li>
            <li class="breadcrumb-item active">Brand</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{route('dashboard.product.brand.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section id="vueapp" class="content">
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('message')}}
            </div>
        @endif
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Horizontal Form</h3>
        </div>

        <form class="form-horizontal">
          <div class="card-body">
            <table class="table table-striped table-border" id="brandtable">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>ID</th>
                <th>NAME</th>
                <th style="">LOGO</th>
                <th style="">IS FEATURED</th>
                <th style="">CREATED AT</th>
                <th style="">STATUS</th>
                <th style="">OPERATION</th>
              </tr>
            </thead>
            <tbody>
              @foreach($GetAllProductBrand as $ProductBrand)
                <tr>
                  <td><input type="checkbox" name="id[]"></td>
                  <td>{{$ProductBrand->id }}</td>
                  <td>{{$ProductBrand->name }}</td>
                  <td>
                    <img src="{{asset('')}}{{$ProductBrand->logo }}" width="50" alt="Image">
                  </td>
                  <td>
                    @if($ProductBrand->is_featured == 1)
                      YES
                    @else
                      NO
                    @endif
                  </td>
                  <td>{{$ProductBrand->created_at->diffForHumans()}}</td>
                  <td>
                    <span class="badge badge-info">{{$ProductBrand->status}}</span>
                  </td>
                  <td>
                    <a href="{{ route('dashboard.product.brand.edit',$ProductBrand->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                    <a href="" onclick="return ConfirmDelete();" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Sign in</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection()


@section('customjs')
<script>
  $(document).ready( function () {
    $('#brandtable').DataTable();
});
</script>
@endsection()

@section('footer')
	@include('backend.footer')
@endsection()
