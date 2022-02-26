<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['web']], function () {
    Route::post("/login", "Auth\LoginController@login")->name("login");

    Route::post("/register", "Auth\RegisterController@register")->name("register");

    Route::get('/logout', "Auth\LoginController@logout")->name("logout");
});

//Route::get('/home', 'HomeController@index');
//getAboutMe 返回的是标题为 AboutMe 的文章
Route::get('/article/index', 'ArticleController@getAboutMe');

Route::get('/tags/view_all/{page}', 'TagController@viewAll');
Route::get('/tags/view/{tag_id}/{page}', 'ArticleController@viewInTag');

Route::get('/shorts/brief/{page}', 'ArticleController@briefShort');
Route::get('/longs/brief/{page}', 'ArticleController@briefLong');

Route::get('/article/view/{id}', 'ArticleController@getArticle');
Route::get('/longs/view/{id}', 'ArticleController@getLong');


//Route::get('/admin/login/{user_name}/{password}',);





