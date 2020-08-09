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

// Covid-19
Route::get('/registratie-covid-19', 'Covid19Controller@show')->name('covid-19');
Route::post('/registratie-covid-19', 'Covid19Controller@register');

//Menu
Route::get('/menu', 'MenuController@show')->name('menu');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
