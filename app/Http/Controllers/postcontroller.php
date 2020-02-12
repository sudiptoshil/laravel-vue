<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
use Auth;
use Image;

class postcontroller extends Controller
{
    public function all_post(){
    	// $category = category::with('posts')->get();
    	// return $category;
    	$category = category::with('posts')->get();
    	return $category;
    }
    public function index(Request $request){
    	

    	  $this->validate($request, [
            'post_title' => 'required |min:5|max:200',
            'category_id' => 'required',
            'post_description' => 'required |min:10|max:2000',
            'post_image' => 'required',
        ]);

        $strpos = strpos($request->post_image, ';');
        $sub    = substr($request->post_image, 0,$strpos);
        $Ex     = explode('/', $sub)[1];
        $name   = time().".".$Ex;
        $img = Image::make($request->post_image)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $addpost = new post();
        $addpost->post_title       = $request->post_title;
        $addpost->category_id      = $request->category_id;
        $addpost->user_id          = Auth::User()->id;
        $addpost->post_description = $request->post_description;
        $addpost->post_image = $name;

        $addpost->save();
    }

    public function get_post(){
    	$posts = post::with("category","User")->orderBy('id','desc')->get();
    	return response()->json([
    		'posts' =>$posts

    	],200);
    }



    public function delete_post($id){
        $post = post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path .$post->post_image;
        if (file_exists($image)) {
            unlink($image);
        }
        $post->delete();
    }

    public function edit_post($id){
        $post = post::find($id);
        return response()->json([
            "post" =>$post

        ],200);
    }

    public function update_post(Request $request,$id){
        $post = post::find($id);
        // $this->validate($request, [
        //     'post_title'       => 'required |min:5|max:50',
        //     'category_id'      => 'required',
        //     'post_description' => 'required |min:10|max:700',
        //     'post_image'       => 'required',
        // ]);


        if ($request->post_image != $post->post_image) {
         $strpos = strpos($request->post_image, ';');
        $sub     = substr($request->post_image, 0,$strpos);
        $Ex      = explode('/', $sub)[1];
        $name    = time().".".$Ex;
        $img     = Image::make($request->post_image)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $image       = $upload_path .$post->post_image;
        $img->save($upload_path.$name);
            if (file_exists($image)) {
            unlink($image);
        }
        }
        else{
            $name = $post->post_image;
        }

        $post->post_title       = $request->post_title;
        $post->category_id      = $request->category_id;
        $post->user_id          = Auth::User()->id;
        $post->post_description = $request->post_description;
        $post->post_image       = $name;

        $post->save();



    }
}
