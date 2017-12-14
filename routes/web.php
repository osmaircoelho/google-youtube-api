<?php


Route::get('/', function () {
    return redirect('/search');
});

Route::any('/search', ['middleware' => 'google_login', 'as' => 'search', 'uses' => 'YoutubeAPIController@search']);
Route::any('/search_item/{query}', ['middleware' => 'google_login', 'as' => 'search', 'uses' => 'YoutubeAPIController@searchItem']);

Route::get('/login', ['uses' => 'GoogleLoginController@index', 'as' => 'login']);
Route::get('/loginCallback', ['uses' => 'GoogleLoginController@store', 'as' => 'loginCallback']);
