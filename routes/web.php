<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('message', 'HomeController@messagePost')->name('message-post');

Route::get('auth/user', function () {

    return Auth::user();
});

