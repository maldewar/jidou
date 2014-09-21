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

/* Admin */
Route::get('products/view/{id}', 'ProductsController@view');
Route::resource('products', 'ProductsController');

Route::resource('terminals', 'TerminalsController');

Route::resource('stocks', 'StocksController');

/* API */
Route::resource('product', 'ProductController');

Route::get('terminal/{id}/messages/{ts}', 'TerminalController@messages');
Route::resource('terminal', 'TerminalController');

Route::get('hw/creditAdded', 'HwController@creditAdded');
Route::get('hw/dispenseDone', 'HwController@dispenseDone');
