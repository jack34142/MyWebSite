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


//使用middleware前，一定要去app/kernel 中修改$routeMiddleware 的設定
Route::group(['middleware'=>['LoginCheck']],function(){
    
//如果controller 也要group 的話 就在prefix 後加上'namespace'=>'xxx'就好了
//Route::group(['prefix'=>''],function(){
    Route::get('', 'IndexController@home');
    Route::get('/introduce', 'IndexController@introduce');
    Route::get('/resume', 'IndexController@resume');
    
    Route::resource('click', 'ClickController', ['only' => ['index', 'update']]);
    
    Route::get('memo/{id?}', 'MemoController@index');
//    Route::post('memo', 'MemoController@search');
    
    Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);
    Route::resource('register', 'RegisterController', ['only' => ['index', 'store']]);
    Route::get('logout', 'LoginController@logout');
//});
    
});



