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
    return redirect('/login');
});

//前台登录and注册and个人设置
//register
Route::get('/register', "\App\Http\Controllers\RegisterController@index");
Route::post('/register', "\App\Http\Controllers\RegisterController@register");
//login
Route::group(['middleware' => 'checklogin'],function (){
    Route::get('/login', "\App\Http\Controllers\LoginController@index")->name('login');
});
Route::post('/login', "\App\Http\Controllers\LoginController@login");
Route::get('/logout', "\App\Http\Controllers\LoginController@logout");

Route::group(['middleware' => 'auth:web'], function(){
// 个人设置
Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');

//个人主页
Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
Route::get('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
Route::get('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');

//评论
Route::post('post/comment','\App\Http\Controllers\PostController@comment');
//赞
Route::get('/post/{post}/zan', '\App\Http\Controllers\PostController@zan');
Route::get('/post/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

//文章列表页
Route::get('post/{post}/delete','\App\Http\Controllers\PostController@delete');
Route::resource('post', '\App\Http\Controllers\PostController');

//专题模块
Route::get('/topic/{topic}','\App\Http\Controllers\TopicController@show');
Route::post('/topic/{topic}/submit','\App\Http\Controllers\TopicController@submit');
});

include_once 'admin.php';