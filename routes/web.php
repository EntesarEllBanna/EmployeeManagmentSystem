<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return redirect("/sticky");
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/rola', function () {
    return redirect("/hello");
});
Route::get('/welcome', function () {
    return "Welcome to Laravel";
});
Route::get('/details/{id}', function ($id) {
    return "Article details for $id";
});
Route::get('/details2/{id?}', function ($id="") {
    return "Article details for $id";
});
Route::get("/home","HomeController@index");
Route::get("/about","HomeController@about");
Route::get("/home/contact","HomeController@contact");
Route::get("/home/sendtoview","HomeController@sendtoview");



Route::get("/sticky","StickyController@index");
Route::get("/sticky/about","StickyController@about");
Route::get("/sticky/contact","StickyController@contact");

Route::get("/casual","CasualController@index");
Route::get("/casual/about","CasualController@about");
Route::get("/casual/store","CasualController@store");
Route::get("/casual/products","CasualController@products");
Route::get("/database/intro","DatabaseController@intro");


//For Resource Controller
Route::resource("/country","CountryController");
Route::resource("/account","AccountController");
Route::resource("/accountrq","AccountRQController");
Route::get("/accounteq/{id}/delete","AccountEQController@destroy");
Route::get("/accounteq/paging","AccountEQController@paging");
Route::get("/accounteq/searchpagingadv","AccountEQController@searchpagingadv");
Route::get("/accounteq/searchpaging","AccountEQController@searchpaging");
Route::get("/accounteq/search","AccountEQController@search");
Route::resource("/accounteq","AccountEQController");


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
