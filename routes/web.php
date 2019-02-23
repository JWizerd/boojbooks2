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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authors', 'AuthorsController@authors')->name('authors');
Route::post('/authors', 'AuthorsController@addAuthor');
Route::get('/authors/delete/{id}', 'AuthorsController@deleteAuthor');

Route::get('/books', 'BooksController@books')->name('books');
Route::post('/books', 'BooksController@addBook');
Route::get('/books/delete/{id}', 'BooksController@deleteBook');
