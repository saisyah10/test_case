<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','AccountController@login');

Route::get('/account','AccountController@index')->middleware('auth.account');
Route::get('/account/{id}','AccountController@show')->middleware('auth.account');
Route::post('/account','AccountController@store');
Route::put('/account/{id}','AccountController@update')->middleware('auth.account');
Route::delete('/account/{id}','AccountController@destroy')->middleware('auth.account');
Route::post('/account/{id}/restore','AccountController@restore')->middleware('auth.account');

Route::get('/finance','FinanceController@index');
Route::get('/finance/{id}','FinanceController@show');
Route::post('/finance','FinanceController@store');
Route::put('/finance/{id}','FinanceController@update');
Route::delete('/finance/{id}','FinanceController@destroy');
Route::post('/finance/{id}/restore','FinanceController@restore');