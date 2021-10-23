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

//page admin
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
    Route::group(['prefix'=>'manage'], function(){
        route::get('article/{id}', 'ManageController@index');
    
    });   
    route::get('dashboard','DashboardController@barchart');

});
//pages user
Route::group(['prefix'=>'user'], function(){
    Route::group(['prefix'=>'article'], function(){

        Route::get('add','ArticleController@getArt_Add');
        Route::post('add','ArticleController@postArt_Add');
        
        Route::get('detail/{article}','PagesController@detail')->name('article.detail');

        Route::get('edit/{id}', 'ArticleController@getArt_edit');
        Route::post('edit/{id}', 'ArticleController@postArt_edit');
    });
    Route::group(['prefix'=>'manage'],function(){
        route::get('list', 'ArticleController@view' );
    });
    Route::group(['prefix'=>'profile'],function(){
        Route::get('/{id}','UserController@viewProfile');
        Route::post('/{id}','UserController@editProfile');

    });
});
//comment system in laravel
Route::post('/comment/add', 'CommentController@Add')->name('comment.add');
Route::post('/reply/add', 'CommentController@replyAdd')->name('reply.add');
Route::get('/search','PagesController@search');
Route::get('/category/{id}','PagesController@view');



Auth::routes();

Route::get('/', 'PagesController@index');

// gate admin
Route::get('/admin', 'HomeController@admin')->name('admin');