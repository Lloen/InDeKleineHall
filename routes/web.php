<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Controller@show');
Route::get('/registratie-covid-19', 'Covid19Controller@show');
Route::post('/registratie-covid-19', 'Covid19Controller@register');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
