<?php

Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::get('/login/{provider}','Auth\SocialAccountController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\SocialAccountController@handleProviderCallback');
