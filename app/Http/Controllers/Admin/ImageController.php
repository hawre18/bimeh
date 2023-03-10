<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/plane',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
       // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
    public function uploadLogo(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/logo',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
        // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
    public function uploadSession(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/session',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
        // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
    public function uploadType(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/type',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
        // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
    public function uploadPlane(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/plane',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
        // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
    public function uploadSample(Request $request){

        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/photos/sample',$uploadedFile,$filename
        );
        $photo=new Image();
        $photo->name=$original_name;
        $photo->path=$filename;
        // $photo->user_id=auth()->guard('web')->user()->id;;
        $photo->save();
        return response()->json([
            'photo_id'=>$photo->id
        ]);

    }
}
