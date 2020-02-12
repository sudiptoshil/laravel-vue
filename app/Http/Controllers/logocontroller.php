<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logo;
use Image;

class logocontroller extends Controller
{
    public function index(Request $request){
    	$strpos = strpos($request->logo_image, ';');
        $sub    = substr($request->logo_image, 0,$strpos);
        $Ex     = explode('/', $sub)[1];
        $name   = time().".".$Ex;
        $img = Image::make($request->logo_image)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $logo = new logo();
        $logo->logo_title       = $request->logo_title;
        $logo->logo_image       = $name;
        $logo->save();


    }

    public function get_logo(){
        $logo = logo::all();
        return response()->json([
            "logo" =>$logo
        ],200);
    }

    public function delete_logo($id){
        $logo = logo::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path .$logo->logo_image;
        if (file_exists($image)) {
            unlink($image);
        }
        $logo->delete();

    }
}
