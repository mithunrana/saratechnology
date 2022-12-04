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
                <li class="breadcrumb-item active">Appearance</li>
                <li class="breadcrumb-item active">Custom JS</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            <form action="{{route('dashboard.setting.customjs.update')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="header_js">Header JS</label>
                                    <textarea class="form-control {{$errors->has('header_js') ? ' is-invalid' : ''}}" id="header_js" name="header_js" rows="4" >{{ $SettingKey['header_js'] }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="custom_body_js">Body JS</label>
                                    <textarea class="form-control {{$errors->has('custom_body_js') ? ' is-invalid' : ''}}" id="custom_body_js" name="custom_body_js" rows="4" >{{ $SettingKey['custom_body_js'] }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="footer_js">Footer JS</label>
                                    <textarea class="form-control {{$errors->has('footer_js') ? ' is-invalid' : ''}}" id="footer_js" name="footer_js" rows="4" >{{ $SettingKey['footer_js'] }}</textarea>
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