<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\MessageController;

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
    return view('welcome');
});

// Route::get('/test', function () {
//     return "Welcome in test mode";
// });

Route::get('/posts', 'App\Http\Controllers\postController@index')->name('posts.index');

Route::get('/posts/create', 'App\Http\Controllers\postController@create')->name('posts.create');
Route::post('/posts', 'App\Http\Controllers\postController@store')-> name('posts.store');

route::get('/posts/{post}/edit', 'App\Http\Controllers\postController@edit')-> name('posts.edit');
Route::put('/posts/{post}', 'App\Http\Controllers\postController@update')-> name('posts.update');

Route::delete('/posts/{post}', 'App\Http\Controllers\postController@destroy')-> name('posts.destroy');

Route::get('/posts/{post}', 'App\Http\Controllers\postController@show')->name('posts.show');

