<?php


Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');
Route::post('quote', 'Api\QuoteController@store')->middleware('auth:api');
Route::get('quote', 'Api\QuoteController@index')->middleware('auth:api');
Route::get('quote/{quote}', 'Api\QuoteController@show')->middleware('auth:api');