@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()


@section('maincontent')
  <div class="container-fluid">
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
      </div>

      <form class="form-horizontal">
        <div class="card-body">
          <table class="table table-striped table-border">
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
            <tr>
              <td>1</td>

              <td>1</td>

              <td>TEST BRAND</td>

              <td>
                <img src="http://localhost:8082/storage/general/mithun-rana-2018-150x150.jpg" width="50" alt="Image">
              </td>

              <td>1TEST BRAND</td>

              <td>1TEST BRAND</td>

              <td>1TEST BRAND</td>

              <td>
                <a href="" class="btn btn-info"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                <a href="" onclick="return ConfirmDelete();" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash"></i></a>
              </td>

            </tr>
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
@endsection()


@section('footer')
	@include('backend.footer')
@endsection()