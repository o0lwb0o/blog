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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/prompt',function (){

    return view('admin.prompt');
});
//后台
Route::group(['namespace' => 'Admin','prefix' => 'admin'], function(){
    include 'admin.php';
});
//前台
Route::group(['namespace' => 'Web'], function(){
    include 'liu.php';
});