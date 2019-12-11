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
Route::get('/search', 'ProductController@getSearch');
Route::get('/category/{id?}', 'ProductController@getCategory');
// Route::get('/postproject', 'ProductController@getSubmitProject');
// Route::get('/myproject', 'ProductController@getMyProject');

Route::post('/category', 'ProductController@postCategory');
// Route::post('/postproject', 'ProductController@postSubmitProject')->name('postproject');
// Route::post('/myproject', 'ProductController@postMyProject');
Route::get('/project/{id}', 'ProductController@getProject');
Route::any('/get-request', 'ProductController@anyRequest');

Route::post('/get-comment', 'ProductController@postGetComment');


Route::middleware('user')->group(function() {
    Route::get('/postproject', 'ProductController@getSubmitProject');

    Route::get('/myproject', 'ProductController@getMyProject');

    Route::post('/postproject', 'ProductController@postSubmitProject')->name('postproject');

    Route::post('/myproject', 'ProductController@postMyProject');

    Route::any('/myproject/delete/{id}', 'ProductController@deleteMyProject');

    Route::get('/notify', 'ProductController@getNotify');

    Route::get('/received', 'ProductController@getReceived');

    Route::post('/received', 'ProductController@postReceived');

    Route::post('/response-request', 'ProductController@postResponseRequest');

    Route::post('/comment', 'ProductController@postComment');

    Route::get('/user/{id?}', 'ProductController@getUser');

    Route::post('/done', 'ProductController@postDone');

    Route::post('/edit-user', 'ProductController@postEditUser');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index');

    Route::get('/index', 'AdminController@index');

    Route::get('/project', 'AdminController@getProject');
    
    Route::post('/project', 'AdminController@postProject');
        
    Route::get('/category', 'AdminController@getCategory');
    
    Route::post('/category', 'AdminController@postCategory');
        
    Route::get('/user', 'AdminController@getUser');
    
    Route::post('/user', 'AdminController@postUser');
        
    Route::get('/comment', 'AdminController@getComment');
    
    Route::post('/comment', 'AdminController@postComment');
        
    Route::get('/extension', 'AdminController@getExtension');
    
    Route::post('/extension', 'AdminController@postExtension');
        
    Route::any('/get-data-project', 'AdminController@getDataProject');

    Route::any('/delete/project', 'AdminController@deleteProject');

    Route::any('/get-data-category', 'AdminController@getDataCategory');

    Route::post('/edit-data-category', 'AdminController@editDataCategory');

    Route::any('/delete/category', 'AdminController@deleteCategory');

    Route::post('/create/category', 'AdminController@createCategory');

    Route::any('/get-data-user', 'AdminController@getDataUser');
    
    Route::any('/edit-data-user', 'AdminController@editDataUser');

    Route::any('/delete/user', 'AdminController@deleteUser');

    Route::any('/get-data-comment', 'AdminController@getDataComment');

    Route::any('/delete/comment', 'AdminController@deleteComment');
});