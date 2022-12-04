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
                            <a href="{{route('dashboard.menubar')}}"><i class="fa fa-home"></i> Menubar</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a style="color: #212529;" href="" >Menubar Edit</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <!-- menu item EDIT modal -->
        @foreach($MenuItemsAll as $Item)
            <div class="modal fade" id="updatemenu{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT MENU INFO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addForm" method="post" action="{{route('dashboard.menubar.item.update',$Item->id)}}">
                            @csrf
                            <div class="modal-body bg-light">
                                <input type="hidden" name="menu_id" value="{{$MenuObj->id}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name="title" type="text" id="title" value="{{$Item->title}}"  placeholder="title">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input class="form-control {{$errors->has('url') ? ' is-invalid' : ''}}" type="text" name="url"  id="url" value="{{$Item->url}}" placeholder="link">
                                            @if ($errors->has('url'))
                                                <span class="text-danger">{{ $errors->first('url') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="icon_font">Icon</label>
                                            <input class="form-control {{$errors->has('icon_font') ? ' is-invalid' : ''}}" type="text" name="icon_font" value="{{$Item->icon_font}}" id="icon_font" placeholder="icon font">
                                            @if ($errors->has('icon_font'))
                                                <span class="text-danger">{{ $errors->first('icon_font') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="css_class">CSS</label>
                                            <input class="form-control {{$errors->has('css_class') ? ' is-invalid' : ''}}" type="text" name="css_class" value="{{$Item->css_class}}" id="css_class" placeholder="CSS Class">
                                            @if ($errors->has('css_class'))
                                                <span class="text-danger">{{ $errors->first('css_class') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dropdownmega">If drop down mega Enter Yes</label>
                                            <input class="form-control {{$errors->has('dropdownmega') ? ' is-invalid' : ''}}" type="text" name="dropdownmega" value="{{$Item->dropdownmega}}" id="dropdownmega" placeholder="YES OR NO ONLY">
                                            @if ($errors->has('dropdownmega'))
                                                <span class="text-danger">{{ $errors->first('dropdownmega') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="button_text">Target</label>
                                            @if ($errors->has('target'))
                                                <span class="text-danger">{{ $errors->first('target') }}</span>
                                            @endif
                                            <select name="target" class="form-control {{$errors->has('target') ? ' is-invalid' : ''}}" id="sel1">
                                                <option value="_self" @if ($Item->target == "_self") {{ 'selected' }} @endif>Open link directly</option>
                                                <option value="_blank" @if ($Item->target == "_blank") {{ 'selected' }} @endif>Open link in new tab</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="parent_id">Parent Menu</label>
                                            @if ($errors->has('parent_id'))
                                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                                            @endif
                                            <select name="parent_id" class="form-control {{$errors->has('parent_id') ? ' is-invalid' : ''}}">
                                                <option value="0" @if ($Item->parent_id == 0) {{ 'selected' }} @endif>None</option>
                                                @foreach($MenuItemsAll as $ParentMenu)
                                                    <option value="{{$ParentMenu->id}}" @if ($ParentMenu->id == $Item->parent_id) {{ 'selected' }} @endif>{{$ParentMenu->title}} | #{{$ParentMenu->id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order">Order</label>
                                            <input class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" type="text" name="order" value="{{$Item->order}}" id="order" placeholder="Order No">
                                            @if ($errors->has('order'))
                                                <span class="text-danger">{{ $errors->first('order') }}</span>
                                            @endif
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
        <!-- menu Item EDIT modal End -->


        <!-- menu item add modal -->
        <div class="modal fade" id="newmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                        <h5 class="modal-title" id="exampleModalLabel">Create a new menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="post" action="{{route('dashboard.menubar.item.store')}}">
                        @csrf
                        <div class="modal-body bg-light">
                            <input type="hidden" name="menu_id" value="{{$MenuObj->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name="title" type="text" id="title" value="{{old('title')}}"  placeholder="title">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input class="form-control {{$errors->has('url') ? ' is-invalid' : ''}}" type="text" name="url"  id="url" value="{{old('url')}}" placeholder="link">
                                        @if ($errors->has('url'))
                                            <span class="text-danger">{{ $errors->first('url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon_font">Icon</label>
                                        <input class="form-control {{$errors->has('icon_font') ? ' is-invalid' : ''}}" type="text" name="icon_font" value="{{old('icon_font')}}" id="icon_font" placeholder="icon font">
                                        @if ($errors->has('icon_font'))
                                            <span class="text-danger">{{ $errors->first('icon_font') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="css_class">CSS</label>
                                        <input class="form-control {{$errors->has('css_class') ? ' is-invalid' : ''}}" type="text" name="css_class" value="{{old('css_class')}}" id="css_class" placeholder="CSS Class">
                                        @if ($errors->has('css_class'))
                                            <span class="text-danger">{{ $errors->first('css_class') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dropdownmega">If drop down mega Enter Yes</label>
                                        <input class="form-control {{$errors->has('dropdownmega') ? ' is-invalid' : ''}}" type="text" name="dropdownmega" value="{{old('dropdownmega')}}" id="dropdownmega" placeholder="YES OR NO ONLY">
                                        @if ($errors->has('dropdownmega'))
                                            <span class="text-danger">{{ $errors->first('dropdownmega') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="button_text">Target</label>
                                        @if ($errors->has('target'))
                                            <span class="text-danger">{{ $errors->first('target') }}</span>
                                        @endif
                                        <select name="target" class="form-control {{$errors->has('target') ? ' is-invalid' : ''}}" id="sel1">
                                            <option value="_self" @if (old('target') == "_self") {{ 'selected' }} @endif>Open link directly</option>
                                            <option value="_blank" @if (old('target') == "_blank") {{ 'selected' }} @endif>Open link in new tab</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="parent_id">Parent Menu</label>
                                        @if ($errors->has('parent_id'))
                                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                                        @endif
                                        <select name="parent_id" class="form-control {{$errors->has('parent_id') ? ' is-invalid' : ''}}" id="sel1">
                                            <option value="0" @if (old('parent_id') == 0) {{ 'selected' }} @endif>None</option>
                                            @foreach($MenuItemsAll as $Item)
                                                <option value="{{$Item->id}}" @if (old('parent_id') == $Item->id) {{ 'selected' }} @endif>{{$Item->title}} | #{{$Item->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="order">Order</label>
                                        <input class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" type="text" name="order" value="{{old('order')}}" id="order" placeholder="Order No">
                                        @if ($errors->has('order'))
                                            <span class="text-danger">{{ $errors->first('order') }}</span>
                                        @endif
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
        <!-- menu Item Add modal End -->


        <div class="container-fluid">
            <form action="{{route('dashboard.menubar.update',$MenuObj->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$MenuObj->name}}" placeholder="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Menu Structure</h3>
                                        <button style="margin-top:0px;" class="btn btn-info float-sm-right" type="button" data-toggle="modal" data-target="#newmenu">ADD NEW MENU <i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-border">
                                            <thead>
                                                <tr style="">
                                                    <th style="background-color:#3985d1cc;color:black;font-size: 14px;width:20px;" >#</th>
                                                    <th style="background-color:#3985d1cc;color:black;font-size: 14px;">Menu Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="attributesection">
                                                @foreach($MenuItems as $Item)
                                                    <tr id="attributerow1">
                                                        <td style="background-color: #f0f0f0;text-align: center;font-weight:bold;color:black;font-size:16px;">{{ $loop->iteration }}</td>
                                                        <td style="">
                                                            <p style="margin-bottom: 2px"> 
                                                                {{$Item->title}}
                                                                &nbsp <i class="fa fa-edit" data-toggle="modal" data-target="#updatemenu{{$Item->id}}" style="font-size: 14px;color:#007bff;cursor:pointer"></i> | <i aria-hidden="true" href="{{route('dashboard.menubar.item.delete',$Item->id)}}" type="button" value="{{$Item->id}}" class="fa fa-trash delete" style="font-size: 14px;color:red;"></i> 
                                                            </p>
                                                            @if(count($Item->childItems))
                                                                @foreach ($Item->childItems as $childItems)
                                                                    @include('backend.menubar.child_menu', ['sub_items' => $childItems])
                                                                @endforeach 
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Menu Setting</h3>
                            </div>
                            <div style="padding: 10px;" class="card-body">
                                <span style="color:#007bff;font-weight:bold">Display Location</span> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="locations[]" value="header-menu" {{ in_array('header-menu', $Locations) ? 'checked' : '' }}>Header Navigation
                                    </label>
                                    <br/>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="locations[]" value="main-menu" {{ in_array('main-menu', $Locations) ? 'checked' : '' }}>Main Navigation
                                    </label>
                                    <br/>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="locations[]" value="footer-menu" {{ in_array('footer-menu', $Locations) ? 'checked' : '' }}>Footer Navigation
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status {{$MenuObj->status}}</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="Published" @if($MenuObj->status == "Published") selected @endif>Published</option>
                                        <option value="Draft" @if($MenuObj->status == "Draft") selected @endif>Draft</option>
                                        <option value="Pending" @if($MenuObj->status == "Pending") selected @endif>Pending</option>
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
    var action = 'ADD'
    var SlideNo = null;
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
</script>
@endsection()