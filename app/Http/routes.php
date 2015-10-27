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
$router->pattern('fid', '[0-9]+');
/******************************/

get('/',['as' => 'home','uses' => 'UserController@index']);
get('/boys',['as' => 'boys','uses' => 'UserController@boys']);
get('/girls',['as' => 'girls','uses' => 'UserController@girls']);
//get('/last',['as' => 'last','uses' => 'UserController@last']);
get('/registration',['as' => 'user.create','uses' => 'UserController@create']);
post('/registration',['as' => 'user.store','uses' => 'UserController@store']);
get('/login',['as' => 'user.login','uses' => 'UserController@login']);
post('/login',['as' => 'user.auth','uses' => 'UserController@auth']);
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
        get('/{id}/subscriptions',['as' => 'user.subscriptions','uses' => 'UserController@subscriptionFriends']);
        get('/{id}/subscriptions/cancel',['as' => 'cancel.friendship','uses' => 'UserController@cancelFriendship']);
//        get('/{id}/cancel/{$fid}',['as' => 'cancel.friendship','uses' => 'UserController@cancelFriendshipAlt']);
        get('/{id}/proposals',['as' => 'user.proposals','uses' => 'UserController@proposalFriends']);
        get('/{id}/proposals/approve',['as' => 'approve.friendship','uses' => 'UserController@approveFriendship']);
        get('/{id}/proposals/deny',['as' => 'deny.friendship','uses' => 'UserController@denyFriendship']);
//        get('/{id}/denied',['as' => 'user.denied','uses' => 'UserController@deniedFriends']);
        get('/{id}/add',['as' => 'add.friendship','uses' => 'UserController@addFriendship']);
        get('/{id}/remove',['as' => 'remove.friendship','uses' => 'UserController@removeFriendship']);
        get('/{id}/dialogs',['as' => 'user.dialogs','uses' => 'UserController@dialogs']);
        get('/{id}/chat',['as' => 'message.create','uses' => 'MessageController@create']);
        post('/{id}/chat',['as' => 'message.store','uses' => 'MessageController@store']);

    });
});

//Event::listen('illuminate.query', function($sql)
//{
//    echo($sql) . "<br>";
//});



