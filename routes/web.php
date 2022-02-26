<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => ['web']], function (){
    Route::get("/admin/login", function (){
        return view("auth/login");
    });

    Route::get("/admin/register", function (){
        return view("auth/register");
    });
});

Auth::routes();

//Route::get('/home', function (){dd(Auth::id());})->name('home');
Route::redirect('/', '/home');
Route::get('/home', function (){
    return view('vueWebsite.index');
});
Route::get("admin/manage", function (){
    return view("admin/manage");
})->middleware("auth");


//->middleware("manager"); 暂留 怕出事儿
Route::post('admin/longs/creation', 'ArticleController@createLong')
    ->middleware("auth");
Route::get('admin/longs/deletion/{id}', 'ArticleController@deleteLong')
    ->middleware("auth");

Route::post('admin/chapters/creation', 'ArticleController@createChapter')
    ->middleware("auth");
Route::get('admin/chapters/deletion/{id}', 'ArticleController@deleteChapter')
    ->middleware("auth");

//创建article -> 创建article_and_tag关系表时 自动搜索tag是否存在，如果没有就会再创建一个tag表信息
Route::post('admin/articles/creation', 'ArticleController@createArticle')
    ->middleware("auth");

Route::get("admin/articles/deletion/{id}", "ArticleController@deleteArticle")
    ->middleware("auth");
