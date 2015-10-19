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
get('/login',['as' => 'login','uses' => 'UserController@login']);

get('/user/{id}',['as' => 'user.info','uses' => 'UserController@show']);


