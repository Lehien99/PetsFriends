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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'category'], function(){
        Route::get('list','CategoryController@getCate_list');

        Route::get('edit/{id}', 'CategoryController@getCate_edit');
        Route::post('edit/{id}', 'CategoryController@postCate_edit');

        Route::get('add', 'CategoryController@getCate_Add');
        Route::post('add', 'CategoryController@postCate_Add');

        Route::post('delete/{id}','CategoryController@destroy');

    });
    Route::group(['prefix'=>'article'], function(){
        Route::get('list','ArticleController@getArt_list');
        // Route::get('add','ArticleController@getArt_Add');
        // Route::post('add','ArticleController@postArt_Add');

        Route::post('delete/{id}','ArticleController@destroy' );

        Route::post('/toggle-approve','ArticleController@post_status');

    });
    Route::group(['prefix'=>'user'], function(){
        Route::get('list','UserController@getUser_list');

        Route::get('add','UserController@getUser_Add');
        Route::post('add','UserController@postUser_Add');

        Route::get('edit/{id}', 'UserController@getUser_edit');
        Route::post('edit/{id}', 'UserController@postUser_edit');

        Route::post('delete/{id}','UserController@destroy');

       
    });
    Route::group(['prefix'=>'roles'],function(){
        Route::get('list','RoleController@getRole_List');

        Route::get('Add','RoleController@getRole_Add');
        Route::post('Add','RoleController@postRole_Add');

        Route::get('edit/{id}', 'RoleController@getRole_edit');
        Route::post('edit/{id}', 'RoleController@postRole_edit');

        Route::post('delete/{id}','RoleController@destroy');
    });
    
});

Route::group(['prefix'=>'user'], function(){
    Route::group(['prefix'=>'article'], function(){
        Route::get('add','ArticleController@getArt_Add');
        Route::post('add','ArticleController@postArt_Add');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//logout
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// gate admin
Route::get('/admin', 'HomeController@admin')->name('admin');

//check status article


