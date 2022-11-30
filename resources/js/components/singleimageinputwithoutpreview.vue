<template>
    <div>
        <!-------------- MEDIA GALLERY MODAL START --------------------->
        <div class="modal fade" id="SingleImageMedia">
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
                        
                        <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" data-toggle="modal" data-target="#downloadModal" type="button"><i class="fas fa-cloud-download-alt"></i> Download</button>
                        <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" data-toggle="modal" data-target="#CreateFolder" type="button"><i class="fa fa-folder"></i> Create Folder</button>
                        <button style="background-color:#003d4f;border:none;margin-right: 5px;" class="btn btn-success rounded-0" @click="mediaRefresh()" type="button"> <i class="fas fa-sync" ></i> Refresh</button>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb" style="padding:0px 15px;">
                        <ol class="breadcrumb" style="margin-bottom:0px;background-color:white;padding:3px;" id="breadCrumb">
                        <li class="breadcrumb-item">
                            <a href="#" style="color:#003d4f" @click="GetFolderMedia(0)"><i class="fa fa-user-secret"></i> All Media</a>
                        </li>
                        <li v-for="(GetBreadCrumb, index) in BreadCrumbList" class="breadcrumb-item">
                            <a href="#" style="color:#003d4f" @click="GetFolderMedia(index)">{{GetBreadCrumb}}</a>
                        </li>
                        </ol>
                    </nav>
                
                    <!-- Modal body -->
                    <div class="modal-body" style="overflow-y: scroll;overflow-x: scroll;padding:3px 10px;">
                        <form action="" enctype="multipart/form-data"  style="max-width:100%" class="dropzone" id="ImgDropzonePreview">
                        </form>

                        <div style="margin-right: 0px;margin-left: 0px;margin-top:10px;border-top:1px solid gray;padding-top:5px;min-width:1250px;" class="row" id="uploaded_image">
                        <div style="" class="media-list-view">
                            <div style="margin-right:0px;margin-left:0px; position: relative;" class="row">

                                <!-- loader show hide div -->
                                <div style="" class="loader" v-if="loading"></div>
                            
                                <div style="" v-for="GetFolder in MediaRootFolder" class="media-item-box">
                                    <div class="media-item-thi" v-bind:style= "[activeItem === GetFolder.id ? {'border':'2px solid #007bff'} : {'border':'2px solid #fbfbfb'}]" @dblclick="GetFolderMedia(GetFolder.id)"  @click="clickFolder(GetFolder)">
                                    <div class="media-item-thumbnil">
                                        <i style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="fa fa-folder"></i>
                                    </div>
                                    <div style="background-color: rgb(221, 221, 221); padding: 6px 6px; text-align: center;height: 35px;transition: all 0.1s ease-in-out 0s; width: 100%;" class="media-item-description">
                                        <div style="overflow: hidden;height:100%;">{{GetFolder.name}}</div>
                                    </div>
                                    </div>
                                </div>

                                <div style="" v-for="GetMedia in MediaList" class="media-item-box">
                                    <div class="media-item-thi" v-bind:style= "[activeItem === GetMedia.id ? {'border':'2px solid #007bff'} : {'border':'2px solid #fbfbfb'}]"  @click="clickView(GetMedia)">
                                    <div class="media-item-thumbnil">
                                        <img v-if="GetMedia.mime_type === 'image'" style="width:98%;height:100%" :mediaid="GetMedia.id"  :src="BaseUrl+'/'+GetMedia.url" alt="">
                                        <i v-else-if="GetMedia.mime_type === 'document'" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-alt"></i>
                                        <i v-else-if="GetMedia.mime_type === 'video'" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-video"></i>
                                        <i v-else-if="GetMedia.mime_type === 'audio'" style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="far fa-file-audio"></i>
                                        <i v-else style="font-size:70px;position:absolute;top:30%;left:30%;display:block;" class="fa fa-file"></i>
                                    </div>
                                    <div style="background-color: rgb(221, 221, 221); padding: 6px 6px; text-align: center;height: 35px;transition: all 0.1s ease-in-out 0s; width: 100%;" class="media-item-description">
                                        <div style="overflow: hidden;height:100%;">{{GetMedia.url}}</div>
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
                        <button id="imagepush" style="background-color:#f24d23;border-radius:0px;border:none;" type="button" v-bind:class="ImageInsertButtonEnableDisable" class="btn btn-secondary" @click="inputImagePush()" >Insert</button>
                    </div>
                </div>
            </div>
        </div>
        <!-------------- MEDIA GALLERY MODAL END --------------------->
    </div>
</template>


<style>
    .loader{  /* Loader Div Class */
        position: absolute;
        top:0px;
        right:0px;
        width:100%;
        height:100%;
        background-color:#eceaea;
        background-image: url('https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921');
        background-size: 50px;
        background-repeat:no-repeat;
        background-position:center;
        z-index:10000000;
        opacity: 0.4;
        filter: alpha(opacity=40);
    }
</style>


<script>
    import Vue from "vue";
    import miniToastr from 'mini-toastr'
    import axios from 'axios'
    import VueAxios from 'vue-axios'
    import "dropzone/dist/dropzone.css"
    import Dropzone  from "dropzone"
    miniToastr.init()
    Vue.use(VueAxios, axios)

    export default{
        name:'imagemodal',
        props:['singleimageurlpass'],
        data(){
            return{
                mediaitempreviewiconshowhide:"block",
                mediaitempreviewmediashowhide:"none",
                mediaitempreviewiconname:"far fa-image",
                FolderCreationData:{FolderName:null,RefFolder:0},
                activeItem: null,
                loading: true,
                CurrentPath:'uploads/',
                BaseUrl: window.location.origin,
                SingleImageUrl:this.singleimageurlpass,
                DataFolderID:0,
                MediaList: [],
                MediaRootFolder:[],
                BreadCrumbList:[],
                InputArrayImage:[],
                ImageInsertButtonEnableDisable:"disabled",
                FolderData: {id:null,name:null,parent_id:null},
                MediaData: {id:null,name:null,folder_id:null,mime_type:null,size:null,url:null,},
            }
        },
        methods:{
            init(){
                Vue.axios.get('/admin/media/'+this.DataFolderID).then((response) => {
                    this.MediaList = response.data.MediaData;
                    this.MediaRootFolder = response.data.MediaFolder;
                    this.BreadCrumbList = response.data.BreadCrumb;
                    this.CurrentPath = response.data.CurrentPath;
                }).finally(() => {
                    this.loading =  false
                });
            },
            clickView(data){
                this.MediaData = data;
                this.activeItem = this.MediaData.id;
                if(this.MediaData.mime_type==='image'){
                    this.mediaitempreviewiconshowhide = "none";
                    this.mediaitempreviewmediashowhide = "block";
                    this.ImageInsertButtonEnableDisable = "";
                }else{
                    this.mediaitempreviewiconshowhide = "block";
                    this.mediaitempreviewmediashowhide = "none";
                    this.ImageInsertButtonEnableDisable = "disabled";
                    if(this.MediaData.mime_type ==='image'){
                    this.mediaitempreviewiconname = "far fa-image";
                    }else if(this.MediaData.mime_type ==='document'){
                    this.mediaitempreviewiconname = "far fa-file-alt";
                    }else if(this.MediaData.mime_type === 'video'){
                    this.mediaitempreviewiconname = "far fa-file-video";
                    }else if(this.MediaData.mime_type === 'audio'){
                    this.mediaitempreviewiconname = "far fa-file-audio"
                    }else{
                    this.mediaitempreviewiconname = "fa fa-file"
                    }
                }
            },
            clickFolder(folderdata){
                this.FolderData = folderdata;
                this.activeItem = this.FolderData.id
                this.mediaitempreviewiconshowhide = "block";
                this.mediaitempreviewmediashowhide = "none";
                this.mediaitempreviewiconname = "fa fa-folder"
            },
            folderCreated(){
                Vue.axios.post('/admin/media-folder-create',this.FolderCreationData).then((response) => {
                    if(response.data.status == '0'){
                        miniToastr.error(response.data.message,'Error');
                    }else{
                        miniToastr.success(response.data.message,'Success');
                        this.FolderCreationData.FolderName=null;
                        this.init();
                        $('#CreateFolder').modal('hide');
                    }
                })
            },
            GetFolderMedia(folderid){
                this.DataFolderID = folderid;
                this.FolderCreationData.RefFolder = folderid;
                this.init();
            },
            inputImagePush(){
                if(this.ImageInsertButtonEnableDisable=='disabled'){
                    miniToastr.error('Please Select Image','Error');
                }else{
                    this.SingleImageUrl = this.MediaData.url;
                    $('#SingleImageMedia').modal('hide')
                }
            },
            inputImageRemove(imagedata){
                this.InputArrayImage.splice(imagedata,1);
            },
            mediaRefresh(){
                this.init();
            },
        },
        mounted(){
            const self = this;
            self.init();
            Dropzone.autoDiscover = false;
            
            const myDropzone = new Dropzone(".dropzone",{
                url: '/admin/media-upload',
                method: "post",
                acceptedFiles: ".jpeg,.JPEG,.jpg,.JPG,.png,.PNG,.gif,.GIF,.pdf,.mp4,.mkv,.avi,.mp3,.wav,.exe",
                addRemoveLinks:true,
                maxFilesize: 500,
                dictFileTooBig:"File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
                dictInvalidFileType: "You can't upload files of this type.",
                dictResponseError: "Server responded with {{statusCode}} code.",
                dictCancelUpload: "Cancel upload",
                dictUploadCanceled: "Upload canceled.",
                dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
                dictRemoveFile: "Remove file",
                clickable: true,
                dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",
                dictDefaultMessage: "Drop files here to upload",
                previewsContainer: "#ImgDropzonePreview",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(file, response) {
                    miniToastr.success(response.success,'Upload');
                    self.init();
                },
                error: function(file, message) {
                    miniToastr.error(message,'Upload');
                },
                init: function() {
                    this.on("sending", function(file, xhr, formData) {
                        formData.append("UploadPath", self.CurrentPath);
                        formData.append("DataFolderID",self.DataFolderID);
                    });
                }
            });
        },
    };
</script>