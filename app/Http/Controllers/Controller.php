<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccess($msg){
        Session::flash('type','success');
        Session::flash('message',$msg);
    }
    public function setError($msg){
        Session::flash('type','danger');
        Session::flash('message',$msg);
    }
    public function makeImage($folder,$prefix,$imageFile,$width,$height){

        //make random image
        $avaternewName = $prefix.Str::random(20).".".$imageFile->extension();

        //store image in public disk
        $avater        = $imageFile->storeAs($folder,$avaternewName,'public');

         //resize the image width and height
         $image_lg    = Image::make('storage/'.$avater)->fit($width,$height);
         $image_lg->save('storage/'.$avater);
         return $avater;
    }
}
