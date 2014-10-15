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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/filler', function()
{
	return View::make('test');
});

Route::post('/filler', function() 
{
	$input = Input::all();
	return Pre::r($input, 'test stuff');
});

Route::get('/user', function()
{
	return View::make('test');
});

Route::post('/user', function() 
{
	$input = Input::all();
	return Pre::r($input, 'some more test stuff');
});
