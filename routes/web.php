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


Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'category'], function () {
    Route::get('/','CategoryController@index')->name('category.index');
    Route::get('/list', 'CategoryController@show')->name('category.list');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit-form');
    Route::put('/edit/{id}', 'CategoryController@update')->name('category.edit');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
});

Route::group(['prefix' => 'post'],function (){
    Route::get('/','PostController@index')->name('post.index');
    Route::get('/list', 'PostController@show')->name('post.list');
    Route::get('/edit/{id}', 'PostController@edit')->name('post.edit-form');
    Route::put('/edit/{id}', 'PostController@update')->name('post.edit');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('/store', 'PostController@store')->name('post.store');
    Route::get('/delete/{id}', 'PostController@destroy')->name('post.destroy');
});
