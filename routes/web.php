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

Route::get('/', function () {
    $posts = App\Post::all();
    return view('main', compact('posts'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('post/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('post', compact('post'));
});


Route::get('product/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('product', compact('post'));
});
Route::get('/blog', function () {
    $posts = App\Post::where('category_id', '=', 4)->get();
    return view('blog', compact('posts'));
});
Route::get('blog/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('singleblog', compact('post'));
});