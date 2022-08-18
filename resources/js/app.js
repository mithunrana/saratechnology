import './bootstrap';
import Vue from "vue";
import Dropzone  from "dropzone";
import miniToastr from 'mini-toastr'
import axios from 'axios'
import VueAxios from 'vue-axios'
miniToastr.init()
Vue.use(VueAxios, axios)

Vue.component('counter',require('./components/counter.vue').default);
Vue.component('image-input',require('./components/imageinput.vue').default);
Vue.component('mediamodal',require('./components/mediamodal.vue').default);

var VueObj = new Vue({
  mounted() {
    this.init();
  },
  props: {
    InputArrayImageList:null,
  },
  data(){
    return{
      mediaitempreviewiconshowhide:"block",
      mediaitempreviewmediashowhide:"none",
      mediaitempreviewiconname:"far fa-image",
      FolderCreationData:{FolderName:null,RefFolder:0},
      activeItem: null,
      CurrentPath:'uploads/',
      BaseUrl: window.location.origin,
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
  created: function () {
    
  },
  methods:{
    init(){
      Vue.axios.get('/admin/media/'+this.DataFolderID).then((response) => {
        this.MediaList = response.data.MediaData;
        this.MediaRootFolder = response.data.MediaFolder;
        this.BreadCrumbList = response.data.BreadCrumb;
        this.CurrentPath = response.data.CurrentPath;
      })
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
    GetFolderMedia(folderid){ 
      this.DataFolderID = folderid;
      this.FolderCreationData.RefFolder = folderid;
      this.init();
    },
    mediaRefresh(){
      this.init();
    },
    inputImagePush(){
      if(this.ImageInsertButtonEnableDisable=='disabled'){
        miniToastr.error('Please Select Image','Error');
      }else{
        this.InputArrayImage.push(this.MediaData);
      }
    },
  }

  
}).$mount('#vueapp')


Dropzone.autoDiscover = false;
import "dropzone/dist/dropzone.css";
const myDropzone = new Dropzone("#ImgDropzone",{
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
        miniToastr.success(response.success,'Upload Complete');
        VueObj.init();
    },
    error: function(file, message) {
        console.log(file);
        miniToastr.error(message,'Error');
    },
    init: function() {
      this.on("sending", function(file, xhr, formData) {
        formData.append("UploadPath", VueObj.CurrentPath);
        formData.append("DataFolderID", VueObj.DataFolderID);
      });
    }
});


