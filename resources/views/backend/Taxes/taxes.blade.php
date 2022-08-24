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
                        <li class="breadcrumb-item active">Taxes</li>
                    </ol>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard.product.taxes.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
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
                                    <th>PERCENTAGE</th>
                                    <th>PRIORITY</th>
                                    <th>STATUS</th>
                                    <th style="">CREATED AT</th>
                                    <th style="">OPERATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($GetAllProductTaxes as $ProductTaxes)
                                    <tr>
                                        <td><input type="checkbox" name="id[]"></td>
                                        <td>{{$ProductTaxes->id }}</td>
                                        <td>{{$ProductTaxes->title }}</td>
                                        <td>{{$ProductTaxes->percentage }}</td>
                                        <td>{{$ProductTaxes->priority }}</td>
                                        <td>
                                            <span class="badge badge-info">{{$ProductTaxes->status}}</span>
                                        </td>
                                        <td>{{$ProductTaxes->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('dashboard.product.taxes.edit',$ProductTaxes->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
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
    </section>
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
