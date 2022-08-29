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
            <li class="breadcrumb-item active">Attribute</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{route('dashboard.product.attribute.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
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
                <th>TITLE</th>
                <th style="">SLUG</th>
                <th style="">ORDER</th>
                <th style="">STATUS</th>
                <th style="">CREATED AT</th>
                <th style="">OPERATION</th>
              </tr>
            </thead>

            <tbody>
              @foreach($GetAllProductAttribute as $ProductAttribute)
                <tr>
                  <td style="width: 10px"><input type="checkbox" name="id[]"></td>
                  <td>{{$ProductAttribute->id }}</td>
                  <td>{{$ProductAttribute->title }}</td>
                  <td style="">{{$ProductAttribute->slug }}</td>
                  <td style="">{{$ProductAttribute->order }}</td>
                  <td style=""><span class="badge badge-info">{{$ProductAttribute->status }}</span></td>
                  <td style="">{{$ProductAttribute->created_at->diffForHumans()}}</td>
                  <td style="">
                    <a href="{{ route('dashboard.product.attribute.edit',$ProductAttribute->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
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
