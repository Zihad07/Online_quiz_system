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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','UserController@show')->name('user.home');

Route::middleware('auth')->group(function (){
    Route::get('/quize/exam-start/{quize}','UserController@showQuestion')->name('user.exam.start');
});

Route::middleware('auth')->group(function () {
    Route::resource('quize','QuizeController');

    Route::get('{quize}/question','QuestionController@index')->name('question.all');
    Route::get('{quize}/question/create','QuestionController@create')->name('question.create');
    Route::post('{quize}/question/store','QuestionController@store')->name('question.store');
    Route::delete('{quize}/question/{question}','QuestionController@destroy')->name('question.delete');

    Route::get('{quize}/question/{question}','QuestionController@edit')->name('question.edit');
    Route::post('{quize}/question/{question}','QuestionController@update')->name('question.update');

//    Quize view with questions and answers
    Route::get('question/{quize}/view','QuestionController@questionsView')->name('question.view');



    Route::post('/question/submit/{quize}',[\App\Http\Controllers\ApiQuizeQuestionContrller::class, 'questionAnswerAnalysis'])->name('api.question.answer.analysis');




});
