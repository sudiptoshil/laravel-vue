<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;


class categorycontroller extends Controller
{
	// for save category-----------
   public function index(Request $request){
   	$category = new category();
   	$category->category_name = $request->category_name;
   	$category->save();
   }
   // for get all category---------
   public function get_category(){
   	$categories = category::all();
   	return response()->json([
   		'categories'=>$categories

   	],200);
   }

   // for delete category-----------
   public function delete_category($id){
   	$deletecategory = category::find($id);
   	$deletecategory->delete();
   }
   // for edit category-------------
   public function edit_category($id){
   	$editcategory = category::find($id);
   	return response()->json([
   		'editcategory' => $editcategory

   	],200);

   }
   // for category update
   public function update_category(Request $request,$id){
      $updatecategory = category::find($id);
      $updatecategory->category_name = $request->category_name;
      $updatecategory->save();


   }

}
