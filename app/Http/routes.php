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

/**
 * guest available routes
 */
Route::group([], function()
{
    get('/',['as' => 'home','uses' => 'PageController@main']);
    get('/boys',['as' => 'boys','uses' => 'PageController@boys']);
    get('/girls',['as' => 'girls','uses' => 'PageController@girls']);
//get('/last',['as' => 'last','uses' => 'PageController@last']);
    Route::group(['middleware' => ['guest']], function() {
        get('/login',['as' => 'login','uses' => 'PageController@login']);
        get('/registration',['as' => 'user.create','uses' => 'UserController@create']);
    });
    post('/login',['as' => 'user.auth','uses' => 'UserController@auth']);
    post('/registration',['as' => 'user.store','uses' => 'UserController@store']);

    get('/logout',['as' => 'logout','uses' => 'PageController@logout']);
});

/**
 * auth users available routes
 */
Route::group(['prefix' => 'user/{id}'], function()
{
    Route::group(['middleware' => ['auth']], function()
    {
        get('/',['as' => 'user.info','uses' => 'UserController@show']);

    });

    /**
     * owners available routes
     */
    Route::group(['middleware' => ['owner']], function()
    {
        get('/edit',['as' => 'user.edit','uses' => 'UserController@edit']);
        post('/edit',['as' => 'user.update','uses' => 'UserController@update']);

        /* friends */
        get('/subscriptions',['as' => 'user.subscriptions','uses' => 'UserController@subscriptions']);
        get('/proposals',['as' => 'user.proposals','uses' => 'UserController@proposals']);
//        get('/denied',['as' => 'user.denied','uses' => 'UserController@denied']);
        get('/potential',['as' => 'user.potential','uses' => 'UserController@potential']);

        /* friendship controls */
        get('/cancel/{fid}',['as' => 'cancel.friendship','uses' => 'FriendshipController@cancel']);
        get('/approve/{fid}',['as' => 'approve.friendship','uses' => 'FriendshipController@approve']);
        get('/deny/{fid}',['as' => 'deny.friendship','uses' => 'FriendshipController@deny']);
        get('/add/{fid}',['as' => 'add.friendship','uses' => 'FriendshipController@add']);
        get('/remove/{fid}',['as' => 'remove.friendship','uses' => 'FriendshipController@remove']);

        /* messages */
        get('/dialogs',['as' => 'user.dialogs','uses' => 'UserController@dialogs']);
//        get('/dialogs/remove/{fid}',['as' => 'dialog.remove','uses' => 'UserController@removeDialog']);

        get('/chat/{fid}',['as' => 'message.create','uses' => 'MessageController@create']);
        post('/chat/{fid}',['as' => 'message.store','uses' => 'MessageController@store']);


    });
});

//Event::listen('illuminate.query', function($sql)
//{
//    echo($sql) . "<br>";
//});



