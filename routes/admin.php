<?php


Route::get('login','LoginController@showLoginForm');
Route::any('loginPost','LoginController@login');
//Route::get('login','HomeController@login');
//Route::any('loginPost','HomeController@loginPost');


Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('/','HomeController@index');
    Route::get('blogger','HomeController@blogger');
    Route::post('uploads','HomeController@upload');
    Route::get('getMenu/{id}','MenuController@getMenu')->where('id', '[0-9]+');

    Route::get('menu/getlist','MenuController@getList');
    Route::get('menu/add/{id}','MenuController@add')->where('id', '[0-9]+');
    Route::get('menu/eidt/{id}','MenuController@eidt')->where('id', '[0-9]+');
    Route::get('menu/del/{id}','MenuController@del')->where('id', '[0-9]+');
    Route::post('menu/menuPost','MenuController@menuPost');

    Route::get('column/getlist','ColumnController@getList');
    Route::get('column/add','ColumnController@add');
    Route::get('column/eidt/{id}','ColumnController@eidt')->where('id', '[0-9]+');
    Route::get('column/del/{id}','ColumnController@del')->where('id', '[0-9]+');
    Route::post('column/columnPost','ColumnController@columnPost');

    Route::get('article/getlist','ArticleController@getList');
    Route::get('article/add','ArticleController@add');
    Route::get('article/eidt/{id}','ArticleController@eidt')->where('id', '[0-9]+');
    Route::get('article/del/{id}','ArticleController@del')->where('id', '[0-9]+');
    Route::post('article/articlePost','ArticleController@articlePost');


});