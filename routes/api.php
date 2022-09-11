<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('IsApiUser')->group(function () {
    Route::post('/books/store','App\Http\Controllers\ApiBookController@store');
    Route::post('/books/update/{id}','App\Http\Controllers\ApiBookController@update');
    Route::get('/books/delete/{id}','App\Http\Controllers\ApiBookController@delete');

});



Route::get('/books','App\Http\Controllers\ApiBookController@index');
Route::get('/books/show/{id}','App\Http\Controllers\ApiBookController@show');

Route::post('/handle-Register','App\Http\Controllers\ApiAuthController@handleRegister');

Route::post('/handle-login','App\Http\Controllers\ApiAuthController@handlelogin');

Route::post('/logout','App\Http\Controllers\ApiAuthController@logout');
