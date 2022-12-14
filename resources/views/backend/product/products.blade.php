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
          </ol>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{route('dashboard.product.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
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
                <th style="">THUMBNIL</th>
                <th style="">PRICE</th>
                <th style="">STOCK STATUS</th>
                <th style="">QUANTITY</th>
                <th style="">SKU</th>
                <th style="">ORDER</th>
                <th style="">CREATED AT</th>
                <th style="">STATUS</th>
                <th style="">OPERATION</th>
              </tr>
            </thead>
            <tbody>
              @foreach($GetAllProduct as $Product)
                <tr>
                  <td><input type="checkbox" name="id[]"></td>
                  <td>{{$Product->id }}</td>
                  <td>{{$Product->name }}</td>
                  @if($Product->productImages->count() > 0)
                    @foreach($Product->productImages as $Image)
                    <td>
                      <img src="{{asset('')}}{{$Image->urlwithoutextension }}{{$ImageSize[150]}}.{{$Image->extension }}" width="50" alt="Image">
                      @break
                    </td>
                    @endforeach
                  @else
                  <td>{{$Product->price }}</td>
                  @endif
                  <td>{{$Product->price }}</td>
                  <td>{{$Product->stock_status }}</td>
                  <td>{{$Product->quantity }}</td>
                  <td>{{$Product->sku }}</td>
                  <td>{{$Product->order }}</td>
                  <td>{{$Product->created_at->diffForHumans()}}</td>
                  <td>
                    <span class="badge badge-info">{{$Product->status}}</span>
                  </td>
                  <td>
                    <a href="{{ route('dashboard.product.edit',$Product->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                    <button href="{{asset('')}}admin/product-delete/{{$Product->id}}" type="button" value="{{$Product->id}}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
                      <i aria-hidden="true" class="fa fa-trash"></i>
                    </button>
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

  $(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            window.location.href = link;
            Swal.fire("Deleted!", "Data has been deleted.", "success");
        }
    });
  });

</script>
@endsection()

@section('footer')
	@include('backend.footer')
@endsection()
