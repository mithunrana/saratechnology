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
                        <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard.blog.add')}}" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section id="vueapp" class="content">
        <div class="container-fluid">
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
                                    <th style="">EMAIL</th>
                                    <th style="">WEBSITE</th>
                                    <th style="">BLOG NAME</th>
                                    <th style="">CREATED AT</th>
                                    <th style="">STATUS</th>
                                    <th style="">OPERATION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($Comments as $Comment)
                                <tr>
                                    <td><input type="checkbox" name="id[]"></td>
                                    <td>{{$Comment->id }}</td>
                                    <td>@if($Comment->customer_id==''){{$Comment->name }}@else {{$Comment->customer->name}} @endif</td>
                                    <td>@if($Comment->customer_id==''){{$Comment->email }}@else {{$Comment->customer->email}} @endif</td>
                                    <td>{{$Comment->website }}</td>
                                    <td>{{$Comment->blog->name }}</td>
                                    <td>{{$Comment->created_at->diffForHumans()}}</td>
                                    <td>
                                        <span class="badge badge-info">{{$Comment->status}}</span>
                                    </td>
                                    <td style="">
                                        <a href="{{ route('dashboard.blog.comment.edit',$Comment->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                                        <button href="{{route('dashboard.blog.comment.delete',$Comment->id)}}" type="button" value="{{$Comment->id}}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
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
    </section>
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
