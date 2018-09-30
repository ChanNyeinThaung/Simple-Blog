<?php


Route::get('/posts', 'PostController@index');
Route::get('/posts/view/{id}', 'PostController@view');

Route::get('/posts/add', 'PostController@add');
Route::post('/posts/add', 'PostController@create');

Route::get('/posts/edit/{id}', 'PostController@edit');
Route::post('/posts/edit/{id}', 'PostController@update');

Route::get('/posts/delete/{id}', 'PostController@delete');

Route::post('/comments/add','PostController@addComment');


Auth::routes();

Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index')->name('home');

