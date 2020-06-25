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

Route::middleware('auth')->group(function () {
    Route::resource('quize','QuizeController');

    Route::get('{quize}/question','QuestionController@index')->name('question.all');
    Route::get('{quize}/question/create','QuestionController@create')->name('question.create');
    Route::post('{quize}/question/store','QuestionController@store')->name('question.store');

});
