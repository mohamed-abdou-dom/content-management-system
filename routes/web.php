<?php

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->group(function(){
    Route::get('/','ManageController@index')->name('manage');
    Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/users','UserController');
    Route::resource('/permissions','PermissionController');
    Route::resource('/roles','RoleController');
    Route::resource('/posts','PostController');
});

Route::get('/home', 'HomeController@index')->name('home');
