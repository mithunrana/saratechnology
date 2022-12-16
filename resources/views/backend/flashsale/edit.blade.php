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
                            <a href="{{route('dashboard')}}"><i class="fa fa-home"></i><b> Home</b></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a style="color: #212529;" href="{{route('dashboard.flash.sale')}}"><b>Flash Sale</b></a>
                        </li>
                        <li class="breadcrumb-item"><b>Edit</b></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <!-- Flash Sale item add modal -->
        <div class="modal fade" id="newitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="post" action="{{route('dashboard.flash.sale.item.store')}}">
                        @csrf
                        <div class="modal-body bg-light">
                            <input type="hidden" name="flash_sale_id" value="{{$FlashSaleData->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="products_id">Item</label>
                                        <select class="form-control {{$errors->has('products_id') ? ' is-invalid' : ''}} products" name="products_id" id="products_id">
                                            @foreach($Products as $Product)
                                                <option data-left="{{asset('')}}{{$Product->productFirstImageSmallSize($Product->id)}}" value="{{$Product->id}}" @if (old('products_id') == $Product->id) {{ 'selected' }} @endif >{{$Product->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('products_id'))
                                            <span class="text-danger">{{ $errors->first('products_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input class="form-control {{$errors->has('price') ? ' is-invalid' : ''}}" name="price" type="text" id="price" value="{{old('price')}}"  placeholder="price">
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" type="text" name="quantity"  id="quantity" value="{{old('quantity')}}" placeholder="quantity">
                                        @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
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
        <!-- Flash Sale Item Add modal End -->



        <!-- Flash Sale item Edit modal -->
        @foreach($FlashSaleData->item as $Item)
            <div class="modal fade" id="updateitem{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-info text-light border-none" style="padding: 10px 18px;">
                            <h5 class="modal-title" id="exampleModalLabel">Flash Item Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addForm" method="post" action="{{route('dashboard.flash.sale.item.update',$Item->id)}}">
                            @csrf
                            <div class="modal-body bg-light">
                                <input type="hidden" name="flash_sale_id" value="{{$FlashSaleData->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="products_id">Item</label>
                                            <select class="form-control {{$errors->has('products_id') ? ' is-invalid' : ''}} products" name="products_id" id="products_id">
                                                @foreach($Products as $Product)
                                                    <option data-left="{{asset('')}}{{$Product->productFirstImageSmallSize($Product->id)}}" value="{{$Product->id}}" @if ($Item->products_id == $Product->id) {{ 'selected' }} @endif >{{$Product->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('products_id'))
                                                <span class="text-danger">{{ $errors->first('products_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input class="form-control {{$errors->has('price') ? ' is-invalid' : ''}}" name="price" type="text" id="price" value="{{$Item->price}}"  placeholder="price">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" type="text" name="quantity"  id="quantity" value="{{$Item->quantity}}" placeholder="quantity">
                                            @if ($errors->has('quantity'))
                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
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
        <!-- Flash Sale Item Edit modal End -->



        <div class="container-fluid">
            <form action="{{route('dashboard.flash.sale.update',$FlashSaleData->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$FlashSaleData->name}}" placeholder="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Flas Sale Item</h3>
                            </div>
                            <div class="card-body">
                                <button style="margin-top:0px;margin-bottom:10px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#newitem">ADD NEW ITEM <i class="fa fa-plus" aria-hidden="true"></i></button>
                                <table class="table table-border">
                                    <thead>
                                        <tr style="">
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;width:20px;" >#</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">IMAGE</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">NAME</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">PRICE</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">QTY</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">CREATED AT</th>
                                            <th style="background-color:#3985d1cc;color:black;font-size: 14px;text-align:center;" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="attributesection">
                                        @foreach($FlashSaleData->item as $Item)
                                            <tr id="attributerow1">
                                                <th style="background-color: #f0f0f0;text-align: center;font-weight:bold;color:black;font-size:16px;">{{ $loop->iteration }}</th>
                                                <td style="text-align: center">
                                                    <img src="{{asset('')}}{{$Item->products->productFirstImageSmallSize($Item->products->id)}}" style="max-width:80px;">
                                                </td>
                                                <td style="text-align: center;">{{$Item->products->name}}</td>
                                                <td style="text-align: center;">{{$Item->price}}</td>
                                                <td style="text-align: center;">{{$Item->quantity}}</td>
                                                <td style="text-align: center;">{{$Item->created_at->diffForHumans()}}</td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-info" id="1" data-toggle="modal" data-target="#updateitem{{$Item->id}}" title="EDIT"><i class="fa fa-edit" style="font-size: 17px;"></i></button>
                                                    <button href="{{route('dashboard.flash.sale.item.delete',$Item->id)}}" type="button" value="{{$Item->id}}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
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
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">End Date</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Date and time:</label>
                                    <div class="input-group " id="end_date">
                                        <input name="end_date" value="{{$FlashSaleData->end_date}}" type="text" class="form-control flashsaleenddate">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" @if($FlashSaleData->status == "published") selected @endif>Published</option>
                                        <option value="draft" @if($FlashSaleData->status == "draft") selected @endif>Draft</option>
                                        <option value="pending" @if($FlashSaleData->status == "pending") selected @endif>Pending</option>
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
            //Date and time picker
            $('.flashsaleenddate').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });

            $('.products').selectator();
        })

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