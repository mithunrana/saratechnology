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
                            <a href="{{route('dashboard.contact')}}">Contact</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            
            <div class="modal" id="ReplyWindwos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reply Message</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('dashboard.contact.reply',$ContactData->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{route('dashboard.contact.update',$ContactData->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-primary">
                                <i class="fas fa-text-width text-primary"></i> Contact information</h3>
                            </div>

                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-2">Time</dt>
                                    <dd class="col-sm-10">{{$ContactData->created_at}}</dd>

                                    <dt class="col-sm-2">Name</dt>
                                    <dd class="col-sm-10">{{$ContactData->name}}</dd>

                                    <dt class="col-sm-2">Email</dt>
                                    <dd class="col-sm-10">{{$ContactData->email}}</dd>

                                    <dt class="col-sm-2">Phone:</dt>
                                    <dd class="col-sm-10">{{$ContactData->phone}}</dd>
                                    
                                    <dt class="col-sm-2">Address:</dt>
                                    <dd class="col-sm-10">{{$ContactData->address}}</dd>

                                    <dt class="col-sm-2">Subject:</dt>
                                    <dd class="col-sm-10"> {{$ContactData->subject}}</dd>

                                    <dt class="col-sm-2">Content:</dt>
                                    <dd class="col-sm-10"> {{$ContactData->content}}</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-primary">
                                <i class="fa fa-reply"></i> Replies</h3>
                            </div>

                            <div class="card-body">
                                <dl class="row">
                                    @foreach($ContactData->reply as $Reply)
                                        <dt class="col-sm-2">Titme: </dt>
                                        <dd class="col-sm-10">{{$Reply->created_at}}</dd>

                                        <dt class="col-sm-2">Content: </dt>
                                        <dd class="col-sm-10">{{$Reply->message}}</dd>
                                    @endforeach()
                                </dl>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ReplyWindwos">Reply</button>
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
                                        <option value="read" @if($ContactData->status == "read") selected @endif>Read</option>
                                        <option value="unread" @if($ContactData->status == "unread") selected @endif>Unread</option>
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