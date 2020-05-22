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
Route::get('/editbase', function () {
    return view('editbase');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::get('google', function () {
//     return view('googleAuth');
// });
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->name('google');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::any('/getConversion', 'CurrencyController@currencyPost');

Route::any('/editbase', 'CurrencyController@editbase');
Route::any('/editbaseValue', 'CurrencyController@editbaseValue');

Route::any('/editCurrView', 'CurrencyController@editcv');
Route::any('/editCurr', 'CurrencyController@editCurr');

// Route::any('/refreshApi', 'CurrencyController@refreshApi');
// Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
// Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
