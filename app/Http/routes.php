<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/******************************/
$router->pattern('id', '[0-9]+');
/******************************/

get('/',['as' => 'home','uses' => 'UserController@index']);
get('/boys',['as' => 'boys','uses' => 'UserController@boys']);
get('/girls',['as' => 'girls','uses' => 'UserController@girls']);
//get('/last',['as' => 'last','uses' => 'UserController@last']);
get('/registration',['as' => 'user.create','uses' => 'UserController@create']);
post('/registration',['as' => 'user.store','uses' => 'UserController@store']);
get('/login',['as' => 'user.login','uses' => 'UserController@login']);
post('/login',['as' => 'user.auth','uses' => 'UserController@auth']);

//get('/user/{id}',['middleware' => 'auth', 'as' => 'user.info','uses' => 'UserController@show']);
//get('/user/{id}/edit',['as' => 'user.edit','uses' => 'UserController@edit']);
//post('/user/{id}/edit',['as' => 'user.update','uses' => 'UserController@update']);

get('/logout',['as' => 'logout','uses' => 'UserController@logout']);

Route::group(['prefix' => 'user'], function()
{
    Route::group(['middleware' => ['auth']], function()
    {
        get('/{id}',['as' => 'user.info','uses' => 'UserController@show']);

    });

    Route::group(['middleware' => ['auth', 'owner']], function()
    {
        get('/{id}/edit',['as' => 'user.edit','uses' => 'UserController@edit']);
        post('/{id}/edit',['as' => 'user.update','uses' => 'UserController@update']);

    });
});

//Route::group(['middleware' => ['auth']], function()
//{
//    get('/user/{id}',['as' => 'user.info','uses' => 'UserController@show']);
//
//});

//Route::group(['middleware' => ['auth', 'owner']], function()
//{
//    get('/user/{id}/edit',['as' => 'user.edit','uses' => 'UserController@edit']);
//    post('/user/{id}/edit',['as' => 'user.update','uses' => 'UserController@update']);
//
//});



