<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// Route read
Route::get('/books','App\Http\Controllers\BookController@index')->name ('books.index');
Route::get('/books/show/{id}','App\Http\Controllers\BookController@show')->name('books.show');


// Route create

Route::get('/books/create','App\Http\Controllers\BookController@create')->name('books.create');
Route::post('/books/store','App\Http\Controllers\BookController@store')->name('books.store');

//Route update

Route::get('/books/edit/{id}','App\Http\Controllers\BookController@edit')->name('books.edit');
Route::post('/books/update/{id}','App\Http\Controllers\BookController@update')->name('books.update');

//Route delete
Route::get('/books/delete/{id}','App\Http\Controllers\BookController@delete')->name('books.delete');


// categorys route
// Route read
Route::get('/categorys','App\Http\Controllers\CategoryController@index')->name ('Categories.index');
Route::get('/categorys/show/{id}','App\Http\Controllers\CategoryController@show')->name('Categories.show');
// Route create

Route::get('/categorys/create','App\Http\Controllers\CategoryController@create')->name('Categories.create');
Route::post('/categorys/store','App\Http\Controllers\CategoryController@store')->name('Categories.store');

//Route update

Route::get('/categorys/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('Categories.edit');
Route::post('/categorys/update/{id}','App\Http\Controllers\CategoryController@update')->name('Categories.update');

//Route delete

Route::get('/categorys/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('Categories.delete');
//Route Auth

Route::get('/register','App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('/handle-register','App\Http\Controllers\AuthController@handleRegister')->name('auth.handleRegister');

