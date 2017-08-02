<?php

App::singleton('App\Billing\Stripe', function(){
	return new \App\Billing\Stripe(config('services.stripe.secret'));
});

Route::get('/','PostController@index')->name('home');

Route::get('/post/create','PostController@create');

Route::post('/post','PostController@store');

Route::get('/post/{post}', 'PostController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/post/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


