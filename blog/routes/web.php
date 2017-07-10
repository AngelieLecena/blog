<?php

Route::get('/','PostController@index');

Route::get('/post/create','PostController@create');

Route::post('/posts','PostController@store');
//Route::get('/post/{post}','PostController@show');