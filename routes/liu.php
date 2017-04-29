<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 10:44
 */

Route::get('/','HomeController@index');
Route::get('/{page}','HomeController@index')->where('id', '[0-9]+');
Route::get('column/{id}','ColumnController@getList')->where('id', '[0-9]+');
Route::get('article/{id}','ArticleController@getList')->where('id', '[0-9]+');
Route::get('getinfo/{id}','ArticleController@getInfo')->where('id', '[0-9]+');
