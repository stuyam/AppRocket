<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AuthController@signUp');

Route::get('/login', ['as'=>'login', 'uses'=>'AuthController@login']);
Route::post('/login', ['as'=>'post.login', 'uses'=>'AuthController@loginPost']);

Route::get('/signup', ['as'=>'signup', 'uses'=>'AuthController@signUp']);
Route::post('/signup', ['as'=>'post.signup', 'uses'=>'AuthController@signUpPost']);

Route::get('/logout', ['as'=>'logout', 'uses'=>'AuthController@logout']);





Route::group(['before' => 'auth'], function()
{
    Route::get('/billing', ['as'=>'pick.billing', 'uses'=>'BillingController@billing']);

//    Route::post('/billing/free', ['as'=>'billing.starter','uses'=>'BillingController@billingStarter']);

    Route::post('/billing/pro', ['as'=>'billing.pro', 'uses'=>'BillingController@billingPro']);
//});
//
//Route::group(array('before' => 'auth|subscribed'), function()
//{
    Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'AuthController@dashboard']);

    Route::get('/edit', ['as'=>'edit', 'uses'=>'PageController@edit']);
    Route::get('/{id?}/edit', ['as'=>'edit.existing', 'uses'=>'PageController@editExisting']);
    Route::post('/edit', ['as'=>'post.edit', 'uses'=>'PageController@editPost']);
});

Route::get('/{name}', 'PageController@view');
