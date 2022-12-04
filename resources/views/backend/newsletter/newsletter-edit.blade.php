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
                            <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{route('dashboard.newsletter')}}">Newsletter</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            <form action="{{route('dashboard.newsletter.update',$NewsletterData->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-primary">
                                <i class="fas fa-text-width text-primary"></i>Information</h3>
                            </div>

                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-2">Time</dt>
                                    <dd class="col-sm-10">{{$NewsletterData->created_at}}</dd>

                                    <dt class="col-sm-2">Name</dt>
                                    <dd class="col-sm-10">{{$NewsletterData->name}}</dd>

                                    <dt class="col-sm-2">Email</dt>
                                    <dd class="col-sm-10">{{$NewsletterData->email}}</dd>
                                </dl>
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
                                    <select class="form-control" name="status" id="status">
                                        <option value="subscribed" @if($NewsletterData->status == "subscribed") selected @endif>Subscribed</option>
                                        <option value="unsubscribed" @if($NewsletterData->status == "unsubscribed") selected @endif>Unsubscribed</option>
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
    $('.summernote-editor').summernote()
  })
</script>
@endsection()