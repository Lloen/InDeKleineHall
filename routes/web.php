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

// Covid-19
Route::get('/registratie-covid-19', 'Covid19Controller@show')->name('covid-19')->middleware(DaySession::class); //->middleware('cache.headers:private;max_age=3600;etag');
Route::post('/registratie-covid-19', 'Covid19Controller@register');
Route::get('/registratie-covid-19/afmelden', 'Covid19Controller@signOut')->name('covid19SignOut');

// Menu
Route::get('/menu', 'MenuController@show')->name('menu');

// Authentication
//Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
Route::get('/dashboard/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/login', function () {
    return redirect()->route('login');
});
Route::post('/dashboard/login', 'Auth\LoginController@login');
Route::post('/dashboard/logout', 'Auth\LoginController@logout')->name('logout');

// Dashboard
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::post('/registraties-covid-19', 'Covid19Controller@getDateList');
    Route::get('/registraties-covid-19', 'Covid19Controller@index')->name('covid19Registraties');
});

Route::get('/', 'Controller@show');
