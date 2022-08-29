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
              <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">
              <a style="color: #212529;" href="{{route('dashboard.product.attribute')}}" >Attribute</a>
            </li>
            <li class="breadcrumb-item active">Attribute Add</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
      <form action="{{route('dashboard.product.attribute.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" id="title" name="title" value="{{old('title')}}" placeholder="title">
                  @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="name">Slug</label>
                  <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('slug') ? ' is-invalid' : ''}}" id="slug" name="slug" value="{{old('slug')}}" placeholder="slug">
                  @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                </div>
              </div>
            </div>


            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Attribute List</h3>
                    <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold">Edit SEO meta</span>
                </div>

                <div class="card-body">
                  <table class="table table-border">
                    <thead>
                      <tr>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">#</th>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">Is default?</th>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">Title</th>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">Slug</th>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">Color</th>
                        <th style="background-color:#3985d1cc;color:black;font-size: 14px;" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="attributesection">

                    </tbody>
                  </table>
                  <button style="margin-top:10px;" class="btn btn-info" type="button" id="addmoreattribute">ADD NEW ATTRIBUTE <i class="fa fa-plus" aria-hidden="true"></i></button>
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
                    <select class="form-control {{$errors->has('status') ? ' is-invalid' : ''}}" name="status" id="status">
                      <option value="Published" @if (old('status') == "Published") {{ 'selected' }} @endif >Published</option>
                      <option value="Draft" @if (old('status') == "Draft") {{ 'selected' }} @endif >Draft</option>
                      <option value="Pending" @if (old('status') == "Pending") {{ 'selected' }} @endif >Pending</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Display Layout</h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                    <select class="form-control {{$errors->has('display_layout') ? ' is-invalid' : ''}}" name="display_layout" id="display_layout">
                      <option value="visual" @if (old('display_layout') == "visual") {{ 'selected' }} @endif >Visual Swatch</option>
                      <option value="text" @if (old('display_layout') == "text") {{ 'selected' }} @endif >Text Swatch</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Searchable</h3>
              </div>

              <div class="card-body">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" name="is_searchable" class="form-check-input">Is Searchable
                  </label>
                </div>
              </div>
            </div>


            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Comparable</h3>
              </div>

              <div class="card-body">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" name="is_comparable" class="form-check-input"> Is Comparable
                  </label>
                </div>
              </div>
            </div>


            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Used in product listing</h3>
                </div>

                <div class="card-body">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="is_use_in_product_listing" class="form-check-input"> Used in product listing
                        </label>
                    </div>
                </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Order</h3>
              </div>

              <div class="card-body">
                  <div class="form-check-inline col-sm-12">
                    <input type="hidden" value="" class="inputradiobuttonid" name="is_defaulthidden">
                    <input type="text" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order" name="order" value="{{old('order')}}" placeholder="order">
                  </div>
                  @if ($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                  @endif
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
    var i = 0;
    function colorPickerReload(dataid){
      $(".input-color-picker"+dataid).spectrum({
        color: "#f00",
        showInput: true,
        preferredFormat: "hex",
        allowEmpty:true,
      });
    }
    

    $('#addmoreattribute').click(function(){
      i++
      $('#attributesection').append('<tr id="attributerow' + i + '"><th style="background-color: #f0f0f0;text-align: center;font-weight:bold;color:black;font-size:16px;" scope="row">'+i+'</th><td style="text-align: center"><input style="height: 18px;width: 18px;" class="form-check-input defaultvalueradio" type="radio" radiobuttonvalue="'+i+'" name="is_default" checked> <input type="hidden" name="fordefaultselect[]" value="'+i+'"> </td><td><input type="text"  class="form-control" value="" id="title" name="attributetitle[]" placeholder="title"></td><td><input type="text"  class="form-control" value="" id="slug" name="attributeslug[]" placeholder="slug"></td><td><input type="text"  class="form-control input-color-picker'+i+'" value="#f00"  name="attributecolor[]" placeholder="color"></td><td><button type="button" class="btn btn-danger removeattributerow" id="'+i+'" data-toggle="tooltip" title="Delete"><i aria-hidden="true" class="fa fa-trash"></i></button></td></tr>');
      colorPickerReload(i);
      $('.inputradiobuttonid').val(i);
    });


    $(document).on('click','.defaultvalueradio',function(){
      $('.inputradiobuttonid').val($(this).attr('radiobuttonvalue'));
    });


    $(document).on('click','.removeattributerow',function(){
      var button_id = $(this).attr("id");
      $('#attributerow'+button_id).remove();
    });

  })
</script>
@endsection()