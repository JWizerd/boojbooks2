<?php

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

Auth::routes();

/**
 * Use '/' instead of '/home' since '/' typically represents the home page
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * ========================================================
 * Routes should be refactored to use the new Controllers,
 * as mentioned in HomeController.php comments i.e.
 * Route::post('/authors', 'AuthorController@addAuthor');
 * ========================================================
 */
Route::get('/authors', 'HomeController@authors')->name('authors');
Route::post('/authors', 'HomeController@addAuthor');
Route::get('/authors/delete/{id}', 'HomeController@deleteAuthor');

Route::get('/books', 'HomeController@books')->name('books');
Route::post('/books', 'HomeController@addBook');
Route::get('/books/delete/{id}', 'HomeController@deleteBook');
