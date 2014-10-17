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

Route::get('/logout', 'AuthController@logout');

Route::group(array('before' => 'auth'), function()
{
    Route::get('/billing', 'BillingController@billing');

    Route::post('/billing/starter', 'BillingController@billingStarter');

    Route::post('/billing/pro', 'BillingController@billingPro');
});

Route::group(array('before' => 'auth|subscribed'), function()
{
    Route::get('/dashboard', 'AuthController@dashboard');

    Route::get('/create', 'PageController@create');

    Route::post('/create', 'PageController@createMake');
});

Route::get('/{name}', 'PageController@view');
