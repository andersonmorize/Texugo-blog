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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/presentation', function() {
    return view('presentation');
})->name('presentation');

route::namespace('Client')->group(function ()
{
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/post/{slug}', 'PostController@show')->name('show');
    Route::get('/tag/{id}', 'PostController@tagIndex')->name('tag');
    route::get('/post', 'PostController@store')->name('store');
});

Route::group(['middleware' => ['auth']], function ()
{
    Route::namespace('Client')->group( function()
    {
        Route::prefix('user')->group( function ()
        {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('edit', 'UserController@edit')->name('user.edit');
            Route::post('update', 'UserController@update')->name('user.update');
            Route::get('delete', 'UserController@delete')->name('user.delete');
        });
    });

    Route::prefix('admin')->namespace('Admin')->middleware(['auth.admin'])->group(function ()
    {
        Route::get('/', function ()
        {
            return redirect()->route('home');
        });

        Route::get('/home', 'HomeController@index')->name('home');

        Route::prefix('users')->group(function ()
        {
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('new', 'UsersController@new')->name('admin.users.new');
            Route::post('store', 'UsersController@store')->name('admin.users.store');
            Route::get('{user}/edit', 'UsersController@edit')->name('admin.users.edit');
            Route::post('{id}/update', 'UsersController@update')->name('admin.users.update');
            Route::get('{id}/delete', 'UsersController@delete')->name('admin.users.delete');
        });

        Route::prefix('posts')->group(function ()
        {
            Route::get('/', 'PostController@index')->name('post.index');
            Route::get('create', 'PostController@create')->name('post.create');
            Route::post('store', 'PostController@store')->name('post.store');
            Route::get('{post}/edit', 'PostController@edit')->name('post.edit');
            Route::post('{id}/update', 'PostController@update')->name('post.update');
            Route::get('{id}/destroy', 'PostController@destroy')->name('post.destroy');
        });

        Route::prefix('tags')->group(function ()
        {
            Route::get('/', 'TagController@index')->name('tag.index');
            Route::get('create', 'TagController@create')->name('tag.create');
            Route::post('store', 'TagController@store')->name('tag.store');
            Route::get('{tag}/edit', 'TagController@edit')->name('tag.edit');
            Route::post('{id}/update', 'TagController@update')->name('tag.update');
            Route::get('{id}/destroy', 'TagController@destroy')->name('tag.destroy');
        });

        Route::prefix('photos')->group( function ()
        {
            Route::get('/', 'PostPhotoController@index')->name('postPhoto.index');
        });
    });
});
