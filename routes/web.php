<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialGithubController;
use Illuminate\Support\Facades\Auth;


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
// categorys read
Route::get('/categorys','App\Http\Controllers\CategoryController@index')->name ('Categories.index');
Route::get('/categorys/show/{id}','App\Http\Controllers\CategoryController@show')->name('Categories.show');
//Route Auth
Route::get('/register','App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('/handle-register','App\Http\Controllers\AuthController@handleRegister')->name('auth.handleRegister');
Route::get('/login','App\Http\Controllers\AuthController@login')->name('auth.login');
Route::post('/handle-login','App\Http\Controllers\AuthController@handleLogin')->name('auth.handleLogin');
Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('auth.logout');
Route::get('/notes/create','App\Http\Controllers\NoteController@create')->name('note.create');
Route::post('notes/store','App\Http\Controllers\NoteController@store')->name('note.store');
Route::get('/notes/delete/{id}','App\Http\Controllers\NoteController@delete')->name('notes.delete');
// Route create
Route::get('/books/delete/{id}','App\Http\Controllers\BookController@delete')->name('books.delete');
//middleware
Route::middleware('isLoginUser')->group(function()
{
    Route::get('/books/create','App\Http\Controllers\BookController@create')->name('books.create');
    Route::post('/books/store','App\Http\Controllers\BookController@store')->name('books.store');
    //Route update
    Route::get('/books/edit/{id}','App\Http\Controllers\BookController@edit')->name('books.edit');
    Route::post('/books/update/{id}','App\Http\Controllers\BookController@update')->name('books.update');
    Route::get('/categorys/create','App\Http\Controllers\CategoryController@create')->name('Categories.create');
    Route::post('/categorys/store','App\Http\Controllers\CategoryController@store')->name('Categories.store');
    Route::get('/categorys/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('Categories.edit');
    Route::post('/categorys/update/{id}','App\Http\Controllers\CategoryController@update')->name('Categories.update');

});
Route::middleware('isLoginAdmin')->group(function()
{
    Route::get('/categorys/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('Categories.delete');
});
Route::get('login/github', 'App\Http\Controllers\AuthController@redirectToProvider')->name('auth.github.redirect');
Route::get('login/github/callback', 'App\Http\Controllers\AuthController@handleProviderCallback')->name('auth.github.handleProviderCallback');



