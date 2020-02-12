<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aboutus;
use Image;


class aboutuscontroller extends Controller
{
    public function index(Request $request)
    {
    	// $about = new aboutus();
    	// $about->aboutus_title       = $request->aboutus_title;
    	// $about->aboutus_description = $request->aboutus_description;
    	// $about->save();

    	 // $this->validate($request, [
      //       'post_title' => 'required |min:5|max:200',
      //       'category_id' => 'required',
      //       'post_description' => 'required |min:10|max:2000',
      //       'post_image' => 'required',
      //   ]);

        $strpos = strpos($request->about_us_image, ';');
        $sub    = substr($request->about_us_image, 0,$strpos);
        $Ex     = explode('/', $sub)[1];
        $name   = time().".".$Ex;
        $img = Image::make($request->about_us_image)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $aboutus = new aboutus();
        $aboutus->aboutus_title       = $request->aboutus_title;
        $aboutus->aboutus_description = $request->aboutus_description;
        $aboutus->about_us_image       = $name;
        $aboutus->save();
    }
    

    public function get_about(){
        $abouts = aboutus::all();
        return response()->json([
        "abouts"=>$abouts

        ],200);
    }

    public function delete_about($id){
        $about = aboutus::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path .$about->about_us_image;
        if (file_exists($image)) {
            unlink($image);
        }
        $about->delete();
    }
    public function edit_aboutus($id){
        $about = aboutus::find($id);
         return response()->json([
        "about"=>$about

        ],200);

    }

    public function update_post(Request $request,$id){
        $about = aboutus::find($id);
        // $this->validate($request, [
        //     'post_title'       => 'required |min:5|max:50',
        //     'category_id'      => 'required',
        //     'post_description' => 'required |min:10|max:700',
        //     'post_image'       => 'required',
        // ]);


        if ($request->about_us_image != $about->about_us_image) {
        $strpos = strpos($request->about_us_image, ';');
        $sub     = substr($request->about_us_image, 0,$strpos);
        $Ex      = explode('/', $sub)[1];
        $name    = time().".".$Ex;
        $img     = Image::make($request->about_us_image)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $image       = $upload_path .$about->about_us_image;
        $img->save($upload_path.$name);
            if (file_exists($image)) {
            unlink($image);
        }
        }
        else{
            $name = $about->post_image;
        }

        $about->aboutus_title       = $request->aboutus_title;
        $about->aboutus_description = $request->aboutus_description;
        $about->about_us_image       = $name;

        $about->save();


    }
}
