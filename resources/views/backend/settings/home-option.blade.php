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
                <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> HOME</a>
                </li>
                <li class="breadcrumb-item active">Appearance</li>
                <li class="breadcrumb-item active">Home Page</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <div class="col-md-12">
            <single-image-input-without-preview>
        </div>

        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="background-color: #f0ad4e;color: #fff!important;display: inline-block;font-weight: 700;padding: 0.2em 0.5em;"><i class="fas fa-edit"></i> Developer Mode Enable </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link active" id="vert-tabs-exclusive-tab" data-toggle="pill" href="#vert-tabs-exclusive" role="tab" aria-controls="vert-tabs-exclusive" aria-selected="true">
                                    <i class="fa fa-home"></i> Side Banner
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-3column-bannder-first-tab" data-toggle="pill" href="#vert-tabs-3column-bannder-first" role="tab" aria-controls="vert-tabs-3column-bannder-first" aria-selected="false">
                                    <i class="fa fa-image"></i> 3 Column Banner First
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-trending-products-tab" data-toggle="pill" href="#vert-tabs-trending-products" role="tab" aria-controls="vert-tabs-trending-products" aria-selected="false">
                                    <i class="fa fa-camera"></i> Trending Products
                                </a>
                            </div>
                        </div>

                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-exclusive" role="tabpanel" aria-labelledby="vert-tabs-exclusive-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.home.exclusive.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="home_exclusive_section_title">Exclusive Section Title:</label>
                                                <input type="text" class="form-control" id="home_exclusive_section_title" placeholder="Exclusive Title" value="{{ $SettingKey['home_exclusive_section_title'] }}" name="home_exclusive_section_title">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_exclusive_section_side_banner_url">Exclusive Section URL:</label>
                                                <input type="text" class="form-control" id="home_exclusive_section_side_banner_url" placeholder="Banner Url" value="{{ $SettingKey['home_exclusive_section_side_banner_url'] }}" name="home_exclusive_section_side_banner_url">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_exclusive_section_side_banner">Side Banner:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_exclusive_section_side_banner'] }}" id="home_exclusive_section_side_bannerpreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_exclusive_section_side_banner" id="home_exclusive_section_side_banner" value="{{ $SettingKey['home_exclusive_section_side_banner'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_exclusive_section_side_banner" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_trending_section_title">Trending Section Title:</label>
                                                <input type="text" class="form-control" id="home_trending_section_title" placeholder="Exclusive Title" value="{{ $SettingKey['home_trending_section_title'] }}" name="home_trending_section_title">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_trending_section_side_banner_url">Trending Section URL:</label>
                                                <input type="text" class="form-control" id="home_trending_section_side_banner_url" placeholder="Banner Url" value="{{ $SettingKey['home_trending_section_side_banner_url'] }}" name="home_trending_section_side_banner_url">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_trending_section_side_banner">Side Banner:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_trending_section_side_banner'] }}" id="home_trending_section_side_bannerpreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_trending_section_side_banner" id="home_trending_section_side_banner" value="{{ $SettingKey['home_trending_section_side_banner'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_trending_section_side_banner" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="home_page_top_categories_text">Top Ctegories Text:</label>
                                                <textarea class="form-control" rows="6" id="home_page_top_categories_text" name="home_page_top_categories_text">{{ $SettingKey['home_page_top_categories_text'] }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-3column-bannder-first" role="tabpanel" aria-labelledby="vert-tabs-3column-bannder-first-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.home.threecolumnfirstbanner.update')}}" method="post">
                                            @csrf
                                            <!-- Home  Page Banner 1 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image1">First Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image1'] }}" id="home_page_first_banner_image1preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image1" id="home_page_first_banner_image1" value="{{ $SettingKey['home_page_first_banner_image1'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image1" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                        
                                            <div class="form-group">
                                                <label for="home_page_first_banner_title1">Title 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title1" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title1'] }}" name="home_page_first_banner_title1">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle1">Sub Title 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle1" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle1'] }}" name="home_page_first_banner_subtitle1">
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="home_page_first_banner_url1">Url 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url1" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url1'] }}" name="home_page_first_banner_url1">
                                            </div>
                                            

                                            <!-- Home  Page Banner 2 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image2">Second Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image2'] }}" id="home_page_first_banner_image2preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image2" id="home_page_first_banner_image2" value="{{ $SettingKey['home_page_first_banner_image2'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image2" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_title2">Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title2" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title2'] }}" name="home_page_first_banner_title2">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle2">Sub Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle2" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle2'] }}" name="home_page_first_banner_subtitle2">
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="home_page_first_banner_url2">Url 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url2" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url2'] }}" name="home_page_first_banner_url2">
                                            </div>


                                            <!-- Home  Page Banner 3 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image3">Third Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image3'] }}" id="home_page_first_banner_image3preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image3" id="home_page_first_banner_image3" value="{{ $SettingKey['home_page_first_banner_image3'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image3" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_title3">Title 3:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title3" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title3'] }}" name="home_page_first_banner_title3">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle3">Sub Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle3" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle3'] }}" name="home_page_first_banner_subtitle3">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_url3">Url 3:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url3" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url3'] }}" name="home_page_first_banner_url3">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>

                                
                                <div class="tab-pane fade" id="vert-tabs-trending-products" role="tabpanel" aria-labelledby="vert-tabs-trending-products-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.trending.item.store')}}" method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="products_id">Item</label>
                                                    <select class="form-control {{$errors->has('products_id') ? ' is-invalid' : ''}} products" name="products_id" id="products_id">
                                                        @foreach($Products as $Product)
                                                            <option data-left="{{asset('')}}{{$Product->productFirstImageSmallSize($Product->id)}}" {{ in_array($Product->id, $TrendigItems) ? 'data-right=Added' : '' }}  value="{{$Product->id}}" >{{$Product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('products_id'))
                                                        <span class="text-danger">{{ $errors->first('products_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>

                                        <div class="row" style="margin-top:10px;">
                                            @foreach($TrendingProducts as $Product)
                                                <div class="col-sm-3">
                                                    <div class="card">
                                                        <img class="card-img-top" src="{{asset('')}}{{$Product->product->productFirstImageSmallSize($Product->product->id)}}" alt="Card image" style="width:100%">
                                                        <div class="card-body">
                                                            <h4 class="card-title"> <b><del>{{$Product->product->price}}</del></b> | <b>{{$Product->product->sale_price}}</b></h4>
                                                            <p class="card-text">{{$Product->product->name}}</p>
                                                            <button href="{{ route('dashboard.setting.trending.item.remove',$Product->product->id) }}" type="button" value="{{ $Product->product->id }}" class="btn btn-danger delete" data-toggle="tooltip" title="Delete">
                                                                <i aria-hidden="true" class="fa fa-trash"></i>
                                                            </button>
                                                            @if($Product->product->status=='published')
                                                                <span class="btn btn-success">{{$Product->product->status}}</span>
                                                            @else
                                                                <span class="btn btn-danger">{{$Product->product->status}}</span>
                                                            @endif()
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach()
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
    var action = 'ADD'
    var DataID = null;
    var baseurl = window.location.origin+'/';

    $(document).on("click", "#imagepush", function (e){
        var imageurl = $('#mediaurl').val();
        $('#'+DataID+'preview').attr('src',baseurl+imageurl);
        $('#'+DataID).val(imageurl);
    });

    $(document).on("click", ".addImage", function (e) {
        var datavalue = $(this).attr('data-value');
        DataID = datavalue;
    });

    $(document).ready(function(){
        $('.summernote-editor').summernote();
        $('.products').selectator();

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
    })
</script>
@endsection()