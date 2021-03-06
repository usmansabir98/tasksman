<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/{path?}', 'app');

Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');

Route::get('empadd','EmployeesController@create');
Route::post('empadd','EmployeesController@store');
Route::get('emp','EmployeesController@index');

Route::get('compadd','ComponentController@create');
Route::post('compadd','ComponentController@store');
Route::get('comp','ComponentController@index');