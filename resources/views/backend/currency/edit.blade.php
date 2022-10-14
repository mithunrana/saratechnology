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
                    <li class="breadcrumb-item">Country</li>
                    <li class="breadcrumb-item">
                        <a style="color: #212529;" href="{{route('dashboard.country')}}" >Country List</a>
                    </li>
                    <li class="breadcrumb-item active">Country Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  
  <section id="vueapp" class="content">
    <div class="container-fluid">
        <form action="{{route('dashboard.currency.update',$CurrencyObj->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" id="title" name="title" value="{{$CurrencyObj->title}}" placeholder="Title">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Symbol</label>
                                <input type="text"  class="form-control {{$errors->has('symbol') ? ' is-invalid' : ''}}" value="{{$CurrencyObj->symbol}}" id="symbol" name="symbol" placeholder="Symbol">
                                @if ($errors->has('symbol'))
                                    <span class="text-danger">{{ $errors->first('symbol') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Symbol After Before</label>
                                <input type="text"  class="form-control {{$errors->has('is_prefix_symbol') ? ' is-invalid' : ''}}" value="{{$CurrencyObj->is_prefix_symbol}}" id="is_prefix_symbol" name="is_prefix_symbol" placeholder="1 FOR AFTER 0 FOR BEFORE">
                                @if ($errors->has('is_prefix_symbol'))
                                    <span class="text-danger">{{ $errors->first('is_prefix_symbol') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Decimal Places</label>
                                <input type="text"  class="form-control {{$errors->has('decimals') ? ' is-invalid' : ''}}" value="{{$CurrencyObj->decimals}}" id="decimals" name="decimals" placeholder="Decimal Places">
                                @if ($errors->has('decimals'))
                                    <span class="text-danger">{{ $errors->first('decimals') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Order</label>
                                <input type="text" class="form-control {{$errors->has('order') ? ' is-invalid' : ''}}" id="order" name="order" value="{{$CurrencyObj->order}}" placeholder="Order Priority">
                                @if ($errors->has('order'))
                                    <span class="text-danger">{{ $errors->first('order') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">Exchange Rate</label>
                                <input type="text" class="form-control {{$errors->has('exchange_rate') ? ' is-invalid' : ''}}" id="exchange_rate" name="exchange_rate" value="{{$CurrencyObj->exchange_rate}}" placeholder="Exchange Rate">
                                @if ($errors->has('exchange_rate'))
                                    <span class="text-danger">{{ $errors->first('exchange_rate') }}</span>
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