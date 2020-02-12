<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// for frontend-------------

Route::get('/', function () {
    return view('public/master');
});




Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	
// FOR ADMIN --------------
Route::get('/home', 'HomeController@index')->name('home');
 // for  category--------------
Route::post('/add-category', 'categorycontroller@index')->name('add-category');
Route::get('/get-category', 'categorycontroller@get_category')->name('get-category');
Route::get('/delete-category/{id}', 'categorycontroller@delete_category')->name('delete-category');
Route::get('/edit-category/{id}', 'categorycontroller@edit_category')->name('edit-category');
Route::post('/update-category/{id}', 'categorycontroller@update_category')->name('update-category');

// for post 
Route::post('/save-post', 'postcontroller@index')->name('save-post');
Route::get('/get-post', 'postcontroller@get_post')->name('get-post');
Route::get('/delete-post/{id}', 'postcontroller@delete_post')->name('delete-post');
Route::get('/edit-post/{id}', 'postcontroller@edit_post')->name('edit-post');
Route::post('/update-post/{id}', 'postcontroller@update_post')->name('update-post');

// for about us
Route::post('/add-about-us', 'aboutuscontroller@index')->name('add-about-us');
Route::get('/get-aboutus', 'aboutuscontroller@get_about')->name('get-aboutus');
Route::get('/delete-about/{id}', 'aboutuscontroller@delete_about')->name('delete-about');

Route::get('/edit-aboutus/{id}', 'aboutuscontroller@edit_aboutus')->name('edit-aboutus');
Route::post('/update-about-us/{id}', 'aboutuscontroller@update_post')->name('update-about-us');
Route::post('/add-logo', 'logocontroller@index')->name('add-logo');
Route::get('/get-logo', 'logocontroller@get_logo')->name('get-logo');
Route::get('/delete-logo/{id}', 'logocontroller@delete_logo')->name('delete-logo');

    
});


