<?php

Route::get('/', 'indexController@index');

//facebook用户登录
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login', 'AuthController@getLogin');
    Route::get('logout', 'AuthController@getLogout');
    Route::get('facebook_callback', 'AuthController@facebookCallback');
});

//普通用户
Route::resource('commodity', 'CommodityController');

//管理
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth.admin', 'set.zh.lang']], function()
{
    Config::set('auth.model', App\AdminUser::class);
    Config::set('auth.table', 'users_admin');
    //管理首页
    Route::get('/', 'HomeController@index');

    //认证路由
    Route::get('auth/login', 'AuthController@getLogin');
    Route::post('auth/login', 'AuthController@postLogin');
    Route::get('auth/logout', 'AuthController@getLogout');
    
    //注册路由
    Route::get('auth/register', 'AuthController@getRegister');
    Route::post('auth/register', 'AuthController@postRegister');
    
    Route::resource('order', 'OrderController');
    Route::resource('commodity', 'CommodityController');
    Route::resource('commodity/classify', 'CommodityClassifyController');
    Route::resource('article', 'ArticleController');
    Route::resource('article/classify', 'ArticleClassifyController');
    Route::resource('banner', 'ArticleController');
    Route::resource('user', 'UserController');
    Route::resource('admin', 'AdminUserController');
    Route::resource('feedback', 'FeedbackController');

});

