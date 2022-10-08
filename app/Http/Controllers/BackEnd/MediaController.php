<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\MediaFile;
use App\Models\MediaFolder;
use App\Models\MediaSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
class MediaController extends Controller
{
    public function fetchMedia($folderid){
        $RefFolder = $folderid;
        $RootFolder = 'uploads/';
        $RootMediaList = MediaFile::where('folder_id',$folderid)->get();
        $RootMediaFolder = MediaFolder::where('parent_id',$folderid)->get();
        $CurrentDirectory = '';
        $BreadCrumb = array();
        while($RefFolder != 0) {
            $GetFolder = MediaFolder::where('id',$RefFolder)->first();
            $BreadCrumb[$GetFolder->id]=$GetFolder->name;
            $RefFolder = $GetFolder->parent_id;
            $CurrentDirectory = $GetFolder->name.'/'.$CurrentDirectory;
        }
        $CurrentDirectory = $RootFolder.$CurrentDirectory;
        return ['MediaFolder'=>$RootMediaFolder,'MediaData'=>$RootMediaList,'BreadCrumb'=>$BreadCrumb,'CurrentPath'=>$CurrentDirectory];
    }


    public function mediaStore(Request $request){

        $ImageSize =  config('ImageSize');

        $file = $request->file('file');
        $DataFolderID = $request->DataFolderID;
        $UploadPath = $request->UploadPath;

        $filetype = $file->getClientMimeType();
        $fileInfo = $file->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'.'.$extension;
        if(!File::isDirectory($UploadPath)){
            File::makeDirectory($UploadPath, 0777, true, true);
        }

        //Intervention Image
        if($extension=='jpg' || $extension=='JPG' || $extension=='jpeg' || $extension=='JPEG' || $extension=='png' || $extension=='PNG' || $extension=='gif' || $extension=='GIF'){
            $img = Image::make($file->getRealPath());
            $img->save($UploadPath.'/'.$file_name,90);
            // if i first convert to small then convert lerge quality it will be loss.
            $img->resize(540, 600)->save($UploadPath.'/'.$filename.$ImageSize[540].".".$extension,90);
            $img->resize(500, 500)->save($UploadPath.'/'.$filename.$ImageSize[500].".".$extension);
            $img->resize(100, 100)->save($UploadPath.'/'.$filename.$ImageSize[150].".".$extension);
        }else{
            $file->move(public_path($UploadPath),$file_name);
        }
        
        $mediaUpload = new MediaFile();
        if($extension=='jpg' || $extension=='JPG' || $extension=='jpeg' || $extension=='JPEG' || $extension=='png' || $extension=='PNG' || $extension=='gif' || $extension=='GIF'){
            $mediaUpload->mime_type = 'image';
        }elseif($extension =='mp4' || $extension=='mkv' || $extension=='avi'){
            $mediaUpload->mime_type = 'video';
        }elseif($extension =='mp3' || $extension=='wav'){
            $mediaUpload->mime_type = 'audio';
        }elseif($extension =='pdf'){
            $mediaUpload->mime_type = 'document';
        }else{
            $mediaUpload->mime_type = 'application';
        }

        $mediaUpload->user_id = 0;
        $mediaUpload->folder_id = $DataFolderID;
        $mediaUpload->name = $file_name;
        $mediaUpload->extension = $extension;
        $mediaUpload->urlwithoutextension = $UploadPath.$filename;
        $mediaUpload->url = $UploadPath.$file_name;
        $mediaUpload->save();
        
        $path = public_path('uploads/gallery');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }  

        return response()->json(['success'=>'Upload Successfully Done']);
    }


    public function mediaFolderCreate(Request $request){
        $RootFolder = 'uploads/';
        $PermanentRefFolder = $request->RefFolder;
        $PermanentFolderName = $request->FolderName;
        $FolderName = $request->FolderName;
        $RefFolder = $request->RefFolder;

        $FolderString = $RootFolder.$FolderName;
        $path = public_path($FolderString);

        if($RefFolder==0){
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);

                $MediaFolderObj = new MediaFolder();
                $MediaFolderObj->user_id = 0;
                $MediaFolderObj->parent_id = $PermanentRefFolder;
                $MediaFolderObj->name = $PermanentFolderName;
                $MediaFolderObj->save();

                return ['success'=>true,'status'=>'1','message'=>'Folder Create Done1'];
            }else{
                return ['success'=>true,'status'=>'0','message'=>'Already exists this name folder1'];
            }
        }else{
            while($RefFolder != 0) {
                $GetFolder = MediaFolder::where('id',$RefFolder)->first();
                $FolderName = $GetFolder->name.'/'.$FolderName;
                $RefFolder = $GetFolder->parent_id;
            }
            $FolderString = $RootFolder.$FolderName;
            $path = public_path($FolderString);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);

                $MediaFolderObj = new MediaFolder();
                $MediaFolderObj->user_id = 0;
                $MediaFolderObj->parent_id = $PermanentRefFolder;
                $MediaFolderObj->name = $PermanentFolderName;
                $MediaFolderObj->save();

                return ['success'=>true,'status'=>'1','message'=>'Folder Create Done2'];
            }else{
                return ['success'=>true,'status'=>'0','message'=>'Already exists this name folder2'];
            }
        }
    }


    /*public function mediaDestroy(){
        $filename =  $request->get('filename');
        MediaFile::where('filename',$filename)->delete();
        $path = public_path('uploads/gallery/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }*/
}
