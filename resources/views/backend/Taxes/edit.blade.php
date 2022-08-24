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
                            <a style="color: #212529;" href="{{route('dashboard.product.taxes')}}" >Product Taxes</a>
                        </li>
                        <li class="breadcrumb-item active">Taxes Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            <form action="{{route('dashboard.product.taxes.update',$GetTaxesData->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" id="title" name="title" value="{{$GetTaxesData->title}}" placeholder="title">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="percentage">Percentage %</label>
                                    <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('percentage') ? ' is-invalid' : ''}}" value="{{$GetTaxesData->percentage}}" id="percentage" name="percentage" placeholder="percentage">
                                    @if ($errors->has('percentage'))
                                        <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="priority">Priority %</label>
                                    <input type="text" oninput="this.value=this.value.toLowerCase()" class="form-control {{$errors->has('priority') ? ' is-invalid' : ''}}" value="{{$GetTaxesData->priority}}" id="priority" name="priority" placeholder="priority">
                                    @if ($errors->has('priority'))
                                        <span class="text-danger">{{ $errors->first('priority') }}</span>
                                    @endif
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
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                    <option value="Published" @if($GetTaxesData->status == "Published") selected @endif>Published</option>
                                    <option value="Draft" @if($GetTaxesData->status == "Draft") selected @endif>Draft</option>
                                    <option value="Pending" @if($GetTaxesData->status == "Pending") selected @endif>Pending</option>
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