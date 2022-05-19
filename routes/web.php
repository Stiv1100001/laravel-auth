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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('posts')->name('posts.')->middleware('auth')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{id}', 'PostController@show')->name('show');
});


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
