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

Route::get('/login', 'AuthController@login');

Route::post('/login', 'AuthController@loginPost');

Route::post('/sign-up', 'AuthController@signUpPost');

Route::get('/logout', 'AuthController@logout');

Route::group(array('before' => 'auth'), function()
{
    Route::get('/dashboard', 'AuthController@dashboard');

    Route::get('/create', 'PageController@create');

    Route::post('/create', 'PageController@createMake');
});

Route::get('/{name}', 'PageController@view');
