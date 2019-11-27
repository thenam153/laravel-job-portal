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

Route::get('/login', 'AccountController@getLogin');
Route::post('/login', 'AccountController@postLogin')->name('login');
Route::get('/register', 'AccountController@getRegister');
Route::post('/register', 'AccountController@postRegister')->name('register');
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
});
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});
Route::get('/confirmuser/{code}', 'AccountController@confirm');

Route::get('/confirm', function() {
    return view('mail.confirm');
});
Route::get('/forget', 'AccountController@getForget');

Route::post('/forget', 'AccountController@postForget')->name('forget');

Route::post('/reset', 'AccountController@postReset')->name('reset');

Route::get('/', 'ProductController@index');
Route::get('/index', 'ProductController@index');
Route::get('/category', 'ProductController@getCategory');
Route::get('/postproject', 'ProductController@getSubmitProject');
Route::get('/myproject', 'ProductController@getMyProject');

Route::post('/category', 'ProductController@postCategory');
Route::post('/postproject', 'ProductController@postSubmitProject')->name('postproject');
Route::post('/myproject', 'ProductController@postMyProject');


