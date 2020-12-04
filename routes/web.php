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
//マイページ
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
Route::get('/show/{id}/edit', 'DanceController@edit')->name('dance.edit');
Route::PATCH('/show/{id}','DanceController@update')->name('dance.update');//投稿内容更新
Route::delete('/show/{id}','DanceController@delete')->name('dance.destroy');//削除
//コメント
Route::group(['middleware' => 'auth'], function(){ 
Route::post('/comments','CommentController@store');
Route::delete('/delete/{id}','CommentController@delete')->name('comment.destroy');
});
//いいね
Route::get('/show/like/{id}', 'DanceController@like')->name('dance.like');
Route::get('/show/unlike/{id}', 'DanceController@unlike')->name('dance.unlike');
//説明
Route::get('/manual','DanceController@manual')->name('manual');
//ユーザーごとの投稿内容
