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
              <a href="#"><i class="fa fa-home"></i> DASHBOARD</a>
            </li>
            <li class="breadcrumb-item active">COUNTRY</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{route('dashboard.country.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
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
                                <th>EMAIL</th>
                                <th style="">CREATED AT</th>
                                <th style="">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($CountryList as $Country)
                              <tr>
                                  <td><input type="checkbox" name="id[]"></td>
                                  <td>{{$Country->id }}</td>
                                  <td>{{$Country->name }}</td>
                                  <td>{{$Country->countrycode }}</td>
                                  <td>{{$Country->shortname }}</td>
                                  <td>{{$Country->created_at->diffForHumans()}}</td>
                                  <td>
                                    <a href="{{ route('dashboard.country.edit',$Country->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                                    <button href="{{ route('dashboard.country.delete',$Country->id) }}" type="button" value="{{ $Country->id }}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
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
