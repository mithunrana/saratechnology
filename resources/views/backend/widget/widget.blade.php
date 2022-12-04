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
            <li class="breadcrumb-item ">Slider</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#" data-target="#setwidget" data-toggle="modal" class="btn btn-info"> ADD NEW &nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section id="vueapp" class="content">


    <!-- Widget add modal -->
    <div class="modal fade" id="newwidget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                    <h5 class="modal-title" id="exampleModalLabel">Create a new widget</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" method="post" action="{{route('dashboard.widget.store')}}">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="text">Text</option>
                                        <option value="menu">Menu</option>
                                        <option value="model">Model</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" type="text" name="name"  id="name" value="{{old('name')}}" placeholder="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model">Model Name</label>
                                    <input class="form-control {{$errors->has('model') ? ' is-invalid' : ''}}" type="text" name="model" value="{{old('model')}}" id="model" placeholder="model">
                                    @if ($errors->has('model'))
                                        <span class="text-danger">{{ $errors->first('model') }}</span>
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
    <!-- Widget add modal End -->


    <!-- Widget Bar add modal -->
    <div class="modal fade" id="newwidgetbar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                    <h5 class="modal-title" id="exampleModalLabel">Create widget Bar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" method="post" action="{{route('dashboard.widget.bar.store')}}">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" type="text" name="name"  id="name" value="{{old('name')}}" placeholder="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="key">Widget Bar KEY</label>
                                    <input class="form-control {{$errors->has('key') ? ' is-invalid' : ''}}" type="text" name="key" value="{{old('key')}}" id="key" placeholder="key">
                                    @if ($errors->has('key'))
                                        <span class="text-danger">{{ $errors->first('key') }}</span>
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
    <!-- Widget add modal End -->


    <!-- Widget set edit modal -->
    @foreach($WidgetSets as $SetAttribute)
        <div class="modal fade" id="widgetbarwidgetedit{{$SetAttribute->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                        <h5 class="modal-title" id="exampleModalLabel">WIDGET BAR WIDGET EDIT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="post" action="{{route('dashboard.widget.set.update',$SetAttribute->id)}}">
                        @csrf
                        <input type="hidden" value="{{$SetAttribute->id}}" name="widgetsetid">
                        <div class="modal-body bg-light">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Widget</label>
                                        <select class="form-control" name="widget_id" id="widget_id">
                                            @foreach($Widgets as $Widget)
                                                <option value="{{$Widget->id}}" @if($SetAttribute->widget_id == $Widget->id) selected @endif>{{$Widget->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('widget_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="widget_bar_id">Widget Bar</label>
                                        <select class="form-control" name="widget_bar_id" id="widget_bar_id">
                                            @foreach($WidgetBars as $WidgetBar)
                                                <option value="{{$WidgetBar->id}}" @if($SetAttribute->widget_bar_id == $WidgetBar->id) selected @endif>{{$WidgetBar->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('widget_bar_id'))
                                            <span class="text-danger">{{ $errors->first('widget_bar_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="widgetshowname">Widget Show Name</label>
                                        <input class="form-control {{$errors->has('widgetshowname') ? ' is-invalid' : ''}}" type="text" name="widgetshowname" value="{{$SetAttribute->widgetshowname}}" id="widgetshowname" placeholder="Text Show">
                                        @if ($errors->has('widgetshowname'))
                                            <span class="text-danger">{{ $errors->first('widgetshowname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu_id">Menu Bar</label>
                                        <select class="form-control" name="menu_id" id="menu_id">
                                            <option value="">None</option>
                                            @foreach($MenuList as $Menu)
                                                <option value="{{$Menu->id}}" @if($SetAttribute->menu_id == $Menu->id) selected @endif>{{$Menu->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('menu_id'))
                                            <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelnamespace">Model Namespace</label>
                                        <input class="form-control {{$errors->has('modelnamespace') ? ' is-invalid' : ''}}" type="text" name="modelnamespace" value="{{$SetAttribute->modelnamespace}}" id="modelnamespace" placeholder="Model Namespace">
                                        @if ($errors->has('modelnamespace'))
                                            <span class="text-danger">{{ $errors->first('modelnamespace') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order">Order</label>
                                        <input class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" type="text" name="order" value="{{$SetAttribute->order}}" id="order" placeholder="Order">
                                        @if ($errors->has('order'))
                                            <span class="text-danger">{{ $errors->first('order') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number_placement">Number Placement</label>
                                        <input class="form-control {{$errors->has('number_placement') ? ' is-invalid' : ''}}" type="text" name="number_placement" value="{{$SetAttribute->number_placement}}" id="number_placement" placeholder="number placement">
                                        @if ($errors->has('number_placement'))
                                            <span class="text-danger">{{ $errors->first('number_placement') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea class="form-control" rows="3" id="content" name="content">{{$SetAttribute->content}}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="text-danger">{{ $errors->first('content') }}</span>
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
    @endforeach()
    <!-- Widget set edit modal End -->


    <!-- Widget set add modal -->
    <div class="modal fade" id="setwidget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                    <h5 class="modal-title" id="exampleModalLabel">SET WIDGET</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" method="post" action="{{route('dashboard.widget.set.store')}}">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Widget</label>
                                    <select class="form-control" name="widget_id" id="widget_id">
                                        @foreach($Widgets as $Widget)
                                            <option value="{{$Widget->id}}">{{$Widget->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('widget_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="widget_bar_id">Widget Bar</label>
                                    <select class="form-control" name="widget_bar_id" id="widget_bar_id">
                                        @foreach($WidgetBars as $WidgetBar)
                                            <option value="{{$WidgetBar->id}}">{{$WidgetBar->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('widget_bar_id'))
                                        <span class="text-danger">{{ $errors->first('widget_bar_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="widgetshowname">Widget Show Name</label>
                                    <input class="form-control {{$errors->has('widgetshowname') ? ' is-invalid' : ''}}" type="text" name="widgetshowname" value="{{old('widgetshowname')}}" id="widgetshowname" placeholder="Text Show">
                                    @if ($errors->has('widgetshowname'))
                                        <span class="text-danger">{{ $errors->first('widgetshowname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu_id">Menu Bar</label>
                                    <select class="form-control" name="menu_id" id="menu_id">
                                        <option value="">None</option>
                                        @foreach($MenuList as $Menu)
                                            <option value="{{$Menu->id}}">{{$Menu->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('menu_id'))
                                        <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modelnamespace">Model Namespace</label>
                                    <input class="form-control {{$errors->has('modelnamespace') ? ' is-invalid' : ''}}" type="text" name="modelnamespace" value="{{old('modelnamespace')}}" id="modelnamespace" placeholder="Model Namespace">
                                    @if ($errors->has('modelnamespace'))
                                        <span class="text-danger">{{ $errors->first('modelnamespace') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_placement">Number Placement</label>
                                    <input class="form-control {{$errors->has('number_placement') ? ' is-invalid' : ''}}" type="text" name="number_placement" value="{{old('number_placement')}}" id="number_placement" placeholder="number placement">
                                    @if ($errors->has('number_placement'))
                                        <span class="text-danger">{{ $errors->first('number_placement') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" type="text" name="order" value="{{old('order')}}" id="order" placeholder="order">
                                    @if ($errors->has('order'))
                                        <span class="text-danger">{{ $errors->first('order') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content:</label>
                                    <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                                    @if ($errors->has('content'))
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
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
    <!-- Widget set add modal End -->


    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Widget List</h3>
                        <button class="btn float-sm-right" type="button" data-toggle="modal" data-target="#newwidget">Add New +</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($Widgets as $Widget)
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-dark">{{$Widget->name}}</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Widget Bar</h3>
                        <button class="btn float-sm-right" type="button" data-toggle="modal" data-target="#newwidgetbar">Add New +</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($WidgetBars as $WidgetBar)
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-dark">{{$WidgetBar->name}}</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Widget Bar With Widget</h3>
            </div>

            <form class="form-horizontal">
                <div class="card-body">
                    <table class="table table-striped table-border" id="brandtable">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>ID</th>
                            <th>WIDGET</th>
                            <th style="">WIDGET BAR</th>
                            <th style="">WIDGET TYPE</th>
                            <th style="">CREATED AT</th>
                            <th style="">OPERATION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($WidgetSets as $SetAttribute)
                                <tr>
                                    <td><input type="checkbox" name="id[]"></td>
                                    <td>{{$SetAttribute->id}}</td>
                                    <td>{{$SetAttribute->widget->name}}</td>
                                    <td style="">{{$SetAttribute->widgetbar->name}}</td>
                                    <td style="">{{$SetAttribute->widget->type}}</td>
                                    <td style="">{{$SetAttribute->created_at->diffForHumans()}}</td>
                                    <td style="">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#widgetbarwidgetedit{{$SetAttribute->id}}" title="Edit"><i class="fa fa-edit" style="font-size: 17px;"></i></a>
                                        <button href="{{route('dashboard.widget.set.delete',$SetAttribute->id)}}" type="button" value="{{$SetAttribute->id}}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
                                        <i aria-hidden="true" class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach()
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
