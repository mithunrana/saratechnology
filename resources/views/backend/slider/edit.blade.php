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
                            <a href="{{route('dashboard.slider')}}"><i class="fa fa-home"></i>Slider</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a style="color: #212529;" href="{{route('dashboard.product.attribute')}}" >Slider Edit</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <!-- slider item EDIT modal -->
        @foreach($SliderItems as $Item)
            <div class="modal fade" id="updateslide{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT SLIDE INFO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addForm" method="post" action="{{route('dashboard.slider.item.update',$Item->id)}}">
                            @csrf
                            <div class="modal-body bg-light">
                                <input type="hidden" name="slider_id" value="{{$SliderObj->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" name="title" type="text" id="title" value="{{$Item->title}}" placeholder="title">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                            @if ($errors->has('imageurl'))
                                                <span class="text-danger">{{ $errors->first('imageurl') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input class="form-control" type="text" name="link"  id="link" value="{{$Item->link}}" placeholder="link">
                                            @if ($errors->has('link'))
                                                <span class="text-danger">{{ $errors->first('link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_text">Button Text</label>
                                            <input class="form-control" type="text" name="button_text" id="button_text" value="{{$Item->button_text}}" placeholder="button text">
                                            @if ($errors->has('button_text'))
                                                <span class="text-danger">{{ $errors->first('button_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Decription:</label>
                                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="short description">{{$Item->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order">Order</label>
                                            <input class="form-control" type="number" name="order" id="order" value="{{$Item->order}}" placeholder="order">
                                            @if ($errors->has('order'))
                                                <span class="text-danger">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div style="padding:10px;" class="form-group">
                                                <label for="{{$Item->id}}slideimage">Slide Image</label><br>
                                                <img src="{{asset('')}}{{$Item->image}}" id="{{$Item->id}}slideimagepreview" style="width: 150px;height:150px;border:2px solid #17a2b8!important;">
                                                <input type="hidden" name="imageurl" id="{{$Item->id}}slideimage" class="image-data" value="{{$Item->image}}"><br>
                                                <a href="#" data-value="{{$Item->id}}slideimage" class="addslide" data-toggle="modal" data-target="#SingleImageMedia">Choose image</a>
                                            </div>
                                            <div style="padding:10px;" class="form-group">
                                                <label for="{{$Item->id}}backgroundimage">Background Image</label><br>
                                                <img src="{{asset('')}}{{$Item->background}}" id="{{$Item->id}}backgroundimagepreview" style="width: 150px;height:150px;border:2px solid #17a2b8!important;">
                                                <input type="hidden" name="backgroundimage" id="{{$Item->id}}backgroundimage" class="image-data" value="{{$Item->background}}"><br>
                                                <a href="#" data-value="{{$Item->id}}backgroundimage" class="addslide" data-toggle="modal" data-target="#SingleImageMedia">Choose image</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Slider Item EDIT modal End -->



        <!-- slider item add modal -->
        <div class="modal fade" id="newslide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                        <h5 class="modal-title" id="exampleModalLabel">Create a new slide</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="post" action="{{route('dashboard.slider.item.store')}}">
                        @csrf
                        <div class="modal-body bg-light">
                            <input type="hidden" name="slider_id" value="{{$SliderObj->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name="title" type="text" id="title" value="{{old('title')}}"  placeholder="title">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                        @if ($errors->has('imageurl'))
                                            <span class="text-danger">{{ $errors->first('imageurl') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input class="form-control {{$errors->has('link') ? ' is-invalid' : ''}}" type="text" name="link"  id="link" value="{{old('link')}}" placeholder="link">
                                        @if ($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="button_text">Button Text</label>
                                        <input class="form-control {{$errors->has('button_text') ? ' is-invalid' : ''}}" type="text" name="button_text" value="{{old('button_text')}}" id="button_text" placeholder="button text">
                                        @if ($errors->has('button_text'))
                                            <span class="text-danger">{{ $errors->first('button_text') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Decription:</label>
                                        <textarea class="form-control {{$errors->has('description') ? ' is-invalid' : ''}}" rows="3" id="description" name="description" placeholder="short description">{{old('description')}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">Order</label>
                                        <input class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" type="number" name="order" id="order" value="{{old('order')}}" placeholder="order">
                                        @if ($errors->has('order'))
                                            <span class="text-danger">{{ $errors->first('order') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div style="padding:10px;" class="form-group">
                                            <label for="slideimage">Slide Image</label><br>
                                            <img src="{{asset('')}}demo-image.png" id="slideimagepreview" style="width: 150px;height:150px;border:2px solid #17a2b8!important;">
                                            <input type="hidden" name="imageurl" id="slideimage" class="image-data" value=""><br>
                                            <a href="#" data-value="slideimage" class="addslide" data-toggle="modal" data-target="#SingleImageMedia">Choose image</a>
                                        </div>
                                        <div style="padding:10px;" class="form-group">
                                            <label for="backgroundimage">Background Image</label><br>
                                            <img src="{{asset('')}}demo-image.png" id="backgroundimagepreview" style="width: 150px;height:150px;border:2px solid #17a2b8!important;">
                                            <input type="hidden" name="backgroundimage" id="backgroundimage" class="image-data" value=""><br>
                                            <a href="#" data-value="backgroundimage" class="addslide" data-toggle="modal" data-target="#SingleImageMedia">Choose image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Slider Item Add modal End -->

        <div class="col-md-12">
            <single-image-input-without-preview>
        </div>


        <div class="container-fluid">
            <form action="{{route('dashboard.slider.update',$SliderObj->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$SliderObj->name}}" placeholder="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="key">KEY</label>
                                    <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('key') ? ' is-invalid' : ''}}" value="{{$SliderObj->key}}" id="key" name="key" placeholder="key">
                                    @if ($errors->has('key'))
                                        <span class="text-danger">{{ $errors->first('key') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Decription:</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="short description">{{$SliderObj->description}}</textarea>
                                    @if ($errors->has('key'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Attribute List</h3>
                                <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold">Edit Attribute</span>
                            </div>
                            <div class="card-body">

                                <button style="margin-top:0px;margin-bottom:10px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#newslide">ADD NEW SLIDE <i class="fa fa-plus" aria-hidden="true"></i></button>
                                
                                <table class="table table-border">
                                    <thead>
                                    <tr style="">
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;width:20px;" >#</th>
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">IMAGE</th>
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">TITLE</th>
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">ORDER</th>
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">CREATED AT</th>
                                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="attributesection">
                                        @foreach($SliderItems as $Item)
                                            <tr id="attributerow1">
                                                <th style="background-color: #f0f0f0;text-align: center;font-weight:bold;color:black;font-size:16px;">{{ $loop->iteration }}</th>
                                                <td style="text-align: center">
                                                    <img src="{{asset('')}}{{$Item->image}}" style="max-width:80px;">
                                                </td>
                                                <td style="text-align: center;">{{$Item->title}}</td>
                                                <td style="text-align: center;">{{$Item->order}}</td>
                                                <td style="text-align: center;">{{$Item->created_at->diffForHumans()}}</td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-info" id="1" data-toggle="modal" data-target="#updateslide{{$Item->id}}" title="EDIT"><i class="fa fa-edit" style="font-size: 17px;"></i></button>
                                                    <button href="{{route('dashboard.slider.item.delete',$Item->id)}}" type="button" value="{{$Item->id}}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
                                                    <i aria-hidden="true" class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status {{$SliderObj->status}}</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="Published" @if($SliderObj->status == "Published") selected @endif>Published</option>
                                        <option value="Draft" @if($SliderObj->status == "Draft") selected @endif>Draft</option>
                                        <option value="Pending" @if($SliderObj->status == "Pending") selected @endif>Pending</option>
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
    var DataID = null;
    var baseurl = window.location.origin+'/';

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

    $(document).on("click", "#imagepush", function (e) {
        var imageurl = $('#mediaurl').val();
        $('#'+DataID+'preview').attr('src',baseurl+imageurl);
        $('#'+DataID).val(imageurl);
    });

    $(document).on("click", ".addslide", function (e) {
        var datavalue = $(this).attr('data-value');
        DataID = datavalue;
    });

    $(document).on("click", ".editslide", function (e) {
        var datavalue = $(this).attr('data-value');
        DataID = datavalue;
    });
</script>
@endsection()