<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','DanceController@index')->name('dance');
Route::group(['middleware' => 'auth'], function(){
  Route::get('/mypage/{id}','DanceController@mypage')->name('mypage');
});
//投稿ページ
Route::group(['middleware' => 'auth'], function(){ 
  Route::get('/create','DanceController@createform')->name('form');
  Route::post('/create','DanceController@create');
});
//詳細画面
Route::get('/show/{id}','DanceController@show')->name('show');
//コメント
Route::group(['middleware' => 'auth'], function(){ 
Route::post('/comments','CommentController@store');
});
