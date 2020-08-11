<?php

use App\Http\Middleware\DaySession;
use Illuminate\Support\Facades\Auth;
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
Route::get('/registratie-covid-19', 'Covid19Controller@show')->name('covid-19')->middleware(DaySession::class); //->middleware('cache.headers:private;max_age=3600;etag');
Route::post('/registratie-covid-19', 'Covid19Controller@register');
Route::post('/registratie-covid-19/afmelden', 'Covid19Controller@signOut')->name('covid19SignOut');
Route::get('/registratie-covid-19/registraties', 'Covid19Controller@index')->name('covid19Registraties')->middleware('auth');


//Menu
Route::get('/menu', 'MenuController@show')->name('menu');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');
