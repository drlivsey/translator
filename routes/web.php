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

Route::get('/', 'NewsController@ShowNews');
Route::post('/reg', 'Auth\RegisterController@Register');
Route::get('/reg', 'Auth\RegisterController@showRegisterForm')->name('reg')->middleware('guest');
Route::post('/login','Auth\LoginController@Login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
Route::get('/home', 'NewsController@ShowNews')->name('home');
Route::view('/rules', 'rules')->name('rules');
Route::view('/help', 'help')->name('help');
Route::view('/about', 'about')->name('about');
Route::get('/translate', 'TranslationController@showWorkspace')->name('translate');
Route::post('/translate', 'TranslationController@GetCode');
