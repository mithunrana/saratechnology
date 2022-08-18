@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()

@section('maincontent')

  
  <div class="container-fluid">

      <!-------------- MEDIA GALLERY MODAL START --------------------->
      <div class="modal fade" id="myModal">
      <!-------------- Dowanload Modal ---------------->
      <div class="modal" id="downloadModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div style="background: #003d4f;border: none;border-radius: 0!important;padding: 3px 8px;" class="modal-header">
              <h4 style="color: #fff;font-size: 15px;padding: 10px 15px;font-weight: 600;" class="modal-title"><i class="fas fa-cloud-download-alt"></i> Download</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form class="rv-form form-download-url" method="post" action="" onkeydown="return event.key != 'Enter';">
                <div id="download-form-wrapper">
                  <div class="form-group">
                    <textarea style="border-radius:0px;" rows="4" name="urls" class="form-control" placeholder="http://example.com/image1.jpg...">
                    </textarea>
                  </div>
                  <div style="background-color: #d9edf7;border: 1px solid #bce8f1;cursor: help;display: block;font-size: .9em;margin-bottom: 10px;margin-top: 5px;padding: 5px;" class="help-ts">
                    <i class="fa fa-info-circle"></i><span>Enter one URL per line.</span>
                  </div>
                </div>
                <button style="background: #003d4f;border-radius:0px;border:none;" class="btn btn-success w-100" type="submit">Download</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!------------- Folder Creation Modal -------------------->
      <div class="modal" id="CreateFolder">
        <div class="modal-dialog">
          <div class="modal-content">
            <div style="background: #003d4f;border: none;border-radius: 0!important;padding: 3px 8px;" class="modal-header">
              <h4 style="color: #fff;font-size: 15px;padding: 10px 15px;font-weight: 600;" class="modal-title"><i class="fa fa-folder"></i> Create folder</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form class="rv-form form-download-url" method="post" action="" onkeydown="return event.key != 'Enter';">
                @csrf
                <div id="download-form-wrapper">
                  <div class="form-group">
                    <input type="text" class="form-control" style="border-radius:0px;" v-model="FolderCreationData.FolderName" name="FolderName" placeholder="folder name">
                    <input type="hidden" class="form-control" style="border-radius:0px;" v-model="FolderCreationData.RefFolder" name="RefFolder">
                  </div>
                </div>
                <button style="background: #003d4f;border-radius:0px;border:none;" class="btn btn-success w-100"  @click="folderCreated()" type="button">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div style="max-width: 90%;height:90%" class="modal-dialog modal-lg">
        <div class="modal-content" style="height:100%;border-radius:0px;">
          <div class="modal-header" style="background: #d64635;border: none;border-radius: 0!important;min-height:15px;padding:12px 12px 12px 14px;">
            <span><i style="color:white;padding-right:25px;font-size:36px;" class="fa fa-image"></i></span>
              <h5 class="modal-title"><strong style="color:white;font-size:13px;font-family: inherit;font-weight:bolder">Media Gallary</strong></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
      
          <div class="modal-header" style="padding-top:5px;padding-bottom:5px;">
            <div class="right-side d-flex justify-content-start">
              <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success  rounded-0" id="ImgDropzone"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
              <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" data-toggle="modal" data-target="#downloadModal"><i class="fas fa-cloud-download-alt"></i> Download</button>
              <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" data-toggle="modal" data-target="#CreateFolder"><i class="fa fa-folder"></i> Create Folder</button>
              <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" @click="mediaRefresh()" > <i class="fas fa-sync"></i> Refresh</button>
            </div>
          </div>

          <nav aria-label="breadcrumb" style="padding:0px 15px;">
            <ol class="breadcrumb" style="margin-bottom:0px;background-color:white;padding:3px;" id="breadCrumb">
              <li class="breadcrumb-item">
                <a href="#" style="color:#003d4f" @click="GetFolderMedia(0)"><i class="fa fa-user-secret"></i> All Media</a>
              </li>
              <li v-for="(GetBreadCrumb, index) in BreadCrumbList" class="breadcrumb-item">
                <a href="#" style="color:#003d4f" @click="GetFolderMedia(index)">@{{GetBreadCrumb}}</a>
              </li>
            </ol>
          </nav>
          
          <!-- Modal body -->
          <div class="modal-body" style="overflow-y: scroll;overflow-x: scroll;padding:3px 10px;">
            <form action="" enctype="multipart/form-data"  style="max-width:100%" class="dropzone" id="ImgDropzonePreview">
              {{ csrf_field() }}
            </form>

            <div style="margin-right: 0px;margin-left: 0px;margin-top:10px;border-top:1px solid gray;padding-top:5px;min-width:1250px;" class="row" id="uploaded_image">
              <div style="" class="media-list-view">
                <div style="margin-right:0px;margin-left:0px;" class="row">

                  <div style="" v-for="GetFolder in MediaRootFolder" class="media-item-box">
                    <div class="media-item-thi" v-bind:style= "[activeItem === GetFolder.id ? {'border':'2px solid #007bff'} : {'border':'2px solid #fbfbfb'}]" @dblclick="GetFolderMedia(GetFolder.id)"  @click="clickFolder(GetFolder)">
                      <div class="media-item-thumbnil">
                        <i v-bind:style="" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="fa fa-folder"></i>
                      </div>
                      <div style="background-color: rgb(221, 221, 221); padding: 6px 6px; text-align: center;height: 35px;transition: all 0.1s ease-in-out 0s; width: 100%;" class="media-item-description">
                        <div style="overflow: hidden;height:100%;">@{{GetFolder.name}}</div>
                      </div>
                    </div>
                  </div>

                  <div style="" v-for="GetMedia in MediaList" class="media-item-box">
                    <div class="media-item-thi" v-bind:style= "[activeItem === GetMedia.id ? {'border':'2px solid #007bff'} : {'border':'2px solid #fbfbfb'}]"  @click="clickView(GetMedia)">
                      <div class="media-item-thumbnil">
                        <img v-if="GetMedia.mime_type === 'image'" style="width:98%;height:100%" :mediaid="GetMedia.id"  :src="BaseUrl+'/'+GetMedia.url" alt="">
                        <i v-else-if="GetMedia.mime_type === 'document'" v-bind:style="" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-alt"></i>
                        <i v-else-if="GetMedia.mime_type === 'video'" v-bind:style="" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-video"></i>
                        <i v-else-if="GetMedia.mime_type === 'audio'" v-bind:style="" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-audio"></i>
                        <i v-else v-bind:style="" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="fa fa-file"></i>
                      </div>
                      <div style="background-color: rgb(221, 221, 221); padding: 6px 6px; text-align: center;height: 35px;transition: all 0.1s ease-in-out 0s; width: 100%;" class="media-item-description">
                        <div style="overflow: hidden;height:100%;">@{{GetMedia.url}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div style="" class="media-details-view">
                <div style="margin-right:0px;margin-left:0px;" class="row">
                  <div style="width:100%" class="media-item-preview">
                    <i v-bind:style="{ display: mediaitempreviewiconshowhide }" style="font-size:70px;width:30%;height:30%;position:absolute;top:35%;left:35%;display:block;" v-bind:class="mediaitempreviewiconname" class=""></i>
                    <img v-bind:style="{ display: mediaitempreviewmediashowhide }" style="display:none;height:100%;width:100%;" :src="BaseUrl+'/'+MediaData.url" alt="">
                  </div>
                  <div style="width:100%" class="media-item-spec-view">
                    <p style="font-weight: 700;margin: 0;font-size:15px;">Name:</p>
                    <span>demo some thing.jpg</span>
                    <input type="text" class="form-control rounded-0" id="mediaurl" v-model="MediaData.url" readonly>
                    <input type="hidden" class="form-control rounded-0" id="UploadPath" v-model="CurrentPath" readonly>
                    <input type="hidden" class="form-control rounded-0" id="CurrentFolderID" v-model="DataFolderID" readonly>
                    <p style="font-weight: 700;margin: 0px;font-size: 15px;">Uploaded at:</p>
                    <span>2022-08-10 04:42:45</span>
                    <p style="font-weight: 700;margin: 0px;font-size: 15px;">File Type:</p>
                    <span>2022-08-10 04:42:45</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Modal footer -->
          <div style="border-radius: 0px !important;padding:2px;" class="modal-footer">
            <button style="background-color:#f24d23;border-radius:0px;border:none;" type="button" v-bind:class="ImageInsertButtonEnableDisable" class="btn btn-secondary" @click="inputImagePush()" >Insert</button>
          </div>
        </div>
      </div>
    </div>
    <!-------------- MEDIA GALLERY MODAL END --------------------->

    <form action="{{route('dashboard.product.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-sm-9">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="name">NameName</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>

              <div class="form-group">
                <label for="name">Permalink</label>
                <input type="text" class="form-control" id="permalink" name="permalink" placeholder="Permalink">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control summernote-editor" id="description" name="description" rows="3" placeholder="Enter ..."></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Website</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Ex: https://example.com">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Order</label>
                <input type="number" class="form-control" id="order"  name="order">
              </div>
            </div>
          </div>

          <image-input v-bind:InputArrayImageList="this.InputArrayImage" ></image-input>

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Search Engine Optimize</h3>
              <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold">Edit SEO meta</span>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">SEO Title</label>
                <input type="text" class="form-control" id="SeoTitle" name="SeoTitle" placeholder="SEO Title">
              </div>

              <div class="form-group">
                  <label>SEO description</label>
                  <textarea class="form-control" rows="3" id="SeoDescription" name="SeoDescription" placeholder="SEO description"></textarea>
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
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Logo</h3>
            </div>

            <div class="card-body">
              <img src="http://localhost:8082/storage/general/mithun-rana-2018.jpg" style="max-width:150px" alt="">
              <input type="hidden" name="logo" value="" class="image-data">
              <div class="image-box-actions">
                <a href="#" class="btn_gallery" data-result="logo" data-action="select-image" data-toggle="modal" data-target="#myModal">Choose image</a>
              </div>
            </div>
          </div>

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Is featured</h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                  <input type="hidden" name="is_featured" value="0">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3"></label>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
@endsection()


@section('footer')
	@include('backend.footer')
@endsection()